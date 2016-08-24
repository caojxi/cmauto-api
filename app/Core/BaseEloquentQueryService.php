<?php

namespace LearnGP\Core;

trait BaseEloquentQueryService
{
    public function findById($id)
    {
        return $this->findOrFail($id);
    }
}
