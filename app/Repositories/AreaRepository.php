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
        $data['area_name'] = $request->area_name;
        $data['area_ward'] = $request->area_ward;
        $data['area_union'] = $request->area_union;
        $data['area_thana'] = $request->area_thana;
        $data['area_city'] = $request->area_city;

        if (!empty($request->area_id)){
            $isAvailable = Area::find($request->area_id);
            if (!empty($isAvailable)){
                $isAvailable->update($data);
                return 'success';
            }

        }else{
            if (Area::create($data)){
                return 'success';
            }
        }
        return 'error';

    }

    public function show(Model $model)
    {
        // TODO: Implement show() method.
    }

    public function destroy(Model $model)
    {
        // TODO: Implement destroy() method.
        return Area::find($model->id)->delete();
    }
}
