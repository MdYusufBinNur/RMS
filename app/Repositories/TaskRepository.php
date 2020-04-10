<?php


namespace App\Repositories;

use Illuminate\Support\Facades\File;
use App\Admin\Area;
use App\Admin\Constructor;
use App\Admin\Task;
use App\Helper\Base;
use App\Helper\Common;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class TaskRepository extends Common implements Base
{

    public function index()
    {
        $tasks = Task::orderBy('isFinished','ASC')->get();
        $constructors = Constructor::with('user')->where('available', '=', true)->orderByDesc('rating')->get();
        $areas = Area::all();

        return compact('areas', 'constructors','tasks');
        // TODO: Implement create() method.
    }

    public function store(Request $request)
    {

        $data['constructor_id'] = $request->constructor_id;
        $data['area_id'] = $request->area_id;
        $data['task_name'] = $request->task_name;
        $data['task_details'] = $request->task_details;
        $data['task_budget'] = $request->task_budget;

        if (!empty($request->task_id)) {
            $isAvailable = Task::find($request->task_id);
            if (!empty($isAvailable)) {
                if (empty($request->area_id)) {
                    $data['area_id'] = $isAvailable->area_id;
                }
                if (empty($request->constructor_id)) {
                    $data['constructor_id'] = $isAvailable->constructor_id;
                }
                if ($isAvailable->update($data)) {
                    return 'success';
                } else {
                    return 'error';
                }
            }
        } else {

            $qrName = ''.rand(0,999999).'.png';
            $task = new Task();
            $task->constructor_id =  $request->constructor_id;
            $task->area_id =  $request->area_id;
            $task->task_name =  $request->task_name;
            $task->task_details =  $request->task_details;
            $task->task_budget =  $request->task_budget;
            $task->qr_code = $qrName;

            if ($task->save()) {
                $path = 'image/QRCode/';
                if(!File::exists($path)) {
                    File::makeDirectory($path,false, false);
                }
                $qrcode = "RMS"."-C_".$request->constructor_id."-T_".$task->id.'-A_'.$request->area_id;
                if (QrCode::size(500)
                    ->format('png')
                    ->generate($qrcode, public_path('image/QRCode/'.$qrName))){
                    return 'success';
                }
            } else {
                return 'error';
            }
        }
        // TODO: Implement store() method.
    }

    public function show(Model $model)
    {
        return Task::with('constructor', 'constructor.user','area')->where('id','=', $model->id)->first();
    }

    public function destroy(Model $model)
    {
        // TODO: Implement destroy() method.
        return Task::find($model->id)->delete();

    }
}
