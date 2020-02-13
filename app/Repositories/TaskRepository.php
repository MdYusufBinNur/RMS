<?php


namespace App\Repositories;


use App\Admin\Area;
use App\Admin\Constructor;
use App\Admin\Task;
use App\Helper\Base;
use App\Helper\Common;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class TaskRepository extends Common implements Base
{

    public function index()
    {
        $constructors = Constructor::with('user')->where('available', '=', true)->orderByDesc('rating')->get();
        $areas = Area::all();

        return compact('areas', 'constructors');
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
            if (Task::create($data)) {
                return 'success';
            } else {
                return 'error';
            }
        }
        // TODO: Implement store() method.
    }

    public function show(Model $model)
    {
        // TODO: Implement show() method.
    }

    public function destroy(Model $model)
    {
        // TODO: Implement destroy() method.
        return Task::find($model->id)->delete();

    }
}
