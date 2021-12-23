<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;

class ExampleCacheController extends Controller
{
    public $startMicrotime;

    public function __construct()
    {
        $this->startMicrotime = microtime(true);;
    }

    public function index()
    {
        if (Cache::has('key')) {
            var_dump(Cache::get('key'));
            echo 'if get';
        } else {
            Cache::add('key', 'testValue');
            echo 'else add';
        }

        echo 'Время выполнения скрипта: '.round(microtime(true) - $this->startMicrotime, 4).' сек.';
    }

    public function flush()
    {
        Cache::flush();
        echo 'Cache::flush()';
    }

}
