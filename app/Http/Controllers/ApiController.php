<?php

namespace LearnGP\Http\Controllers;

use League\Fractal\TransformerAbstract;
use LearnGP\Core\EloquentBaseModel;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use League\Fractal\Manager;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;

abstract class ApiController extends Controller
{
    protected $manager;

    function __construct(Manager $manager)
    {
        $this->manager = $manager;
    }

    /**
     * The Eloquent Model used for querying.
     *
     * @return EloquentBaseModel
     */
    abstract protected function getModel();

    /**
     * Transformer used to transform entities
     *
     * @return TransformerAbstract
     */
    abstract protected function getTransformer();

    /*
    |--------------------------------------------------------------------------
    | RESTFUL methods
    |--------------------------------------------------------------------------
    */

    public function index(Request $request)
    {
        $model = $this->getModel();

        $search = $request->input('search', '');

        if ($search && $search != '') {
            $model = $model->search($search);
        }

        if ($request->has('page')) {
            return $this->getPaginateResponse($request, $model);
        }

        return $this->getCollectionResponse($model->get());
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $model = $this->getModel()->create($request->all());

        return $this->getSingleResponse($model);
    }

    public function show($id)
    {
        $model = $this->getModel()->findById($id);

        return $this->getSingleResponse($model);
    }

    public function update($id, Request $request)
    {
        $model = $this->getModel()->findById($id);

        return $this->updateModel($model, $request);
    }

    public function destroy($id)
    {
        $model = $this->getModel()->findById($id);

        $deleted = $model->delete();

        if (!$deleted) {
            return response()->json('', 500);
        }

        return response()->json('successfully deleted model', 200);
    }

    public function reactivate($id)
    {
        $model = $this->getModel()->withTrashed()->where('id', $id)->firstOrFail();

        if ($model->deleted_at) {
            $model->deleted_at = null;
            $model->save();

            return $this->getSingleResponse($model);
        }

        return response()->json('', 500);
    }

    /*
    |--------------------------------------------------------------------------
    | RESTFUL method helpers
    |--------------------------------------------------------------------------
    */

    /**
     * @param EloquentBaseModel $model
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateModel(EloquentBaseModel $model, Request $request)
    {
        $model->update($request->all());

        return $this->getSingleResponse($model);
    }

    /*
    |--------------------------------------------------------------------------
    | API abstract methods
    |--------------------------------------------------------------------------
    */

    /**
     * @return Manager
     */
    protected function getManager()
    {
        $this->manager->parseIncludes(request()->get('include', ''));

        return $this->manager;
    }

    /**
     * @param EloquentBaseModel $model
     * @return \Illuminate\Http\JsonResponse
     */
    protected function getSingleResponse(EloquentBaseModel $model)
    {
        $item = new Item($model, $this->getTransformer(), $this->getResourceKey($model));

        $data = $this->getManager()->createData($item)->toArray();

        return response()->json($data);
    }

    protected function getCollectionResponse($data)
    {
        $collection = new Collection($data, $this->getTransformer(), $this->getResourceKey($this->getModel()));

        $data = $this->getManager()->createData($collection)->toArray();

        return response()->json($data);
    }

    protected function getPaginateResponse(Request $request, Builder $builder)
    {
        // order the collection
        foreach ((array)$request->get('order_by') as $orderColumn) {
            list($column, $direction) = strpos($orderColumn, '|') !== false ?
                explode('|', $orderColumn) : [$orderColumn, 'asc'];

            $builder = $builder->orderBy($column, $direction);
        }

        $paginator = $builder->paginate();

        if ($request->has('search')) {
            $paginator->appends(['search', $request->input('search')]);
        }

        $data = $paginator->getCollection();

        $collection = new Collection($data, $this->getTransformer(), $this->getResourceKey($builder));
        $collection->setPaginator(new IlluminatePaginatorAdapter($paginator));

        $data = $this->getManager()->createData($collection)->toArray();

        return response()->json($data);
    }

    /**
     * @param $model
     * @return string
     */
    protected function getResourceKey($model)
    {
        if ($model instanceof Builder) {
            return strtolower((new \ReflectionClass($this->getModel()->getModel()))->getShortName());
        }

        return strtolower((new \ReflectionClass($model))->getShortName());
    }
}
