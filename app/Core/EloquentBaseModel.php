<?php

namespace LearnGP\Core;

use Illuminate\Database\Eloquent\Model;

abstract class EloquentBaseModel extends Model
{
    use BaseEloquentQueryService;

    abstract function getSearchableColumns();

    public function scopeSearch($query, $search)
    {
        $columns = $this->getSearchableColumns();

        if ($columns && is_array($columns) && count($columns) > 0) {
            $table = $this->getTable();

            $statement = '';

            foreach ($columns as $column) {
                $statement .= "{$table}.{$column} like '%{$search}%' or ";
            }

            // remove extra ' or '
            $statement = substr($statement, 0, -4);

            return $query->whereRaw($statement);
        }

        // return everything if no searchable columns defined
        return $query->where('id', -1);
    }
}
