<?php

namespace Cmauto\Http\Controllers;

use Cmauto\HeadSetting\HeadSetting;
use Cmauto\HeadSetting\HeadSettingTransformer;
use Cmauto\Http\Requests;
use Illuminate\Http\Request;

class HeadSettingController extends ApiController
{
    /**
     * The Eloquent Model used for querying.
     *
     * @return EloquentBaseModel
     */
    protected function getModel()
    {
        return new HeadSetting();
    }

    /**
     * Transformer used to transform entities
     *
     * @return TransformerAbstract
     */
    protected function getTransformer()
    {
        return new HeadSettingTransformer();
    }

    public function index(Request $request)
    {
        $headSettings = $this->getHeadSetting();

        return $this->getSingleResponse($headSettings);
    }

    public function updateSettings(Request $request)
    {
        return $this->updateModel($this->getHeadSetting(), $request);
    }

    private function getHeadSetting()
    {
        return HeadSetting::firstOrFail();
    }
}
