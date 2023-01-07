<?php 

namespace App\Contracts;

interface FilterContract
{
    public function handle(mixed $value): void;
}