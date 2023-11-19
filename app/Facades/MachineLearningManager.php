<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;
// use App\Services\MachineLearningManager;

class MachineLearningManager extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'MachineLearningManager';
    }
}