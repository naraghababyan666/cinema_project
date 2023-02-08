<?php

namespace App\Traits;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;

trait AddEdit
{
    public static function add($fields) // Добавление
    {
        $add = new static;
        $add->fill($fields);

        return $add;
    }

    public function edit($fields) // Изменение
    {
        $this->fill($fields);
    }

    public function isBoolean($request,$name)
    {
        $this->$name = ($request->has($name) and $request->$name == 'on') ? true : false;
    }

    public function isJson($request,$name)
    {
        $this->$name = $request->has($name) ? $request->$name : null;
//        dd($request->$name, json_encode($request->$name));
    }

    public function views($key,$time = 3600)
    {
        if (!Cache::has($key)) {
            Cache::put($key, 'true', $time);
            $this->increment('views');
        }
    }
}
