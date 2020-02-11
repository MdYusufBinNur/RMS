<?php


namespace App\Helper;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

interface Base
{
    public function index();
    public function store(Request $request);
    public function show(Model $model);
    public function destroy(Model $model);
}
