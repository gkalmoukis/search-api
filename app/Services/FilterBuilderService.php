<?php

namespace App\Services;

class FilterBuilderService
{
    public function __construct(
        protected $query,
        protected $filters,
        protected $namespace
    ) { }

    public function apply()
    {
        foreach ($this->filters as $name => $value) {
            $normailizedName = ucfirst($name);
            $class = $this->namespace."\\{$normailizedName}";

            if (! class_exists($class)) {
                continue;
            }
            
            if (!empty($value)) {
                (new $class($this->query))->handle($value);
            } else {
                (new $class($this->query))->handle();
            }
        }

        return $this->query;
    }
}