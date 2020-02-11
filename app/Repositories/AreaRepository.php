<?php


namespace App\Repositories;


use App\Admin\Area;
use App\Helper\Base;
use App\Helper\Common;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class AreaRepository extends Common implements Base
{

    public function index()
    {
        // TODO: Implement create() method.
        return Area::all();
    }

    public function store(Request $request)
    {
        // TODO: Implement store() method.
    }

    public function show(Model $model)
    {
        // TODO: Implement show() method.
    }

    public function destroy(Model $model)
    {
        // TODO: Implement destroy() method.
    }
}
