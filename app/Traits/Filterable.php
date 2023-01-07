<?php

namespace App\Traits;

use App\Services\FilterBuilderService;

trait Filterable
{
    public function scopeFilterBy($query, $filters)
    {
        $path = explode('\\', get_class($this));
        $namespace = 'App\Filters\\'.array_pop($path);
        
        $filter = new FilterBuilderService($query, $filters, $namespace);

        return $filter->apply();
    }
    
}