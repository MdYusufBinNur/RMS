<?php


namespace App\Repositories;


use App\Admin\Report;
use App\Admin\Task;
use App\Helper\Base;
use App\Helper\Common;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ReportRepository extends Common implements Base
{

    public function index()
    {
        // TODO: Implement create() method.
        return Report::all();
    }

    public function store(Request $request)
    {
        // TODO: Implement store() method.
        $image = [];
        $dir = "Report_Images";
        if (!empty($request->file('photo'))){
            foreach ($request->file('photo') as $i=>$item) {
                $image[] =  $this->save_file($request[$i]->file('photo'), $dir);
            }
        }
        $report['constructor_id'] = $request->constructor_id;
        $report['task_id'] = $request->task_id;
        $report['area_id'] = $request->area_id;
        $report['report_details'] = $request->report_details;
        $report['photos'] = json_encode($image);

        if (!empty($request->isFinished)){
            $task['isFinished'] = $request->isFinished;
            Task::find($request->task_id)->update($task);
        }

        if (Report::create($report)){
            $response = array();
            $response['error'] = false;
            $response['message'] = "Successfully Reported";
            return $response;
        }

        $response = array();
        $response['error'] = true;
        $response['message'] = "Try Again";
        return $response;

    }

    public function show(Model $model)
    {
        // TODO: Implement show() method.
        return Report::with('constructor','constructor.user','area','task')->where('id','=',$model->id)->first();
    }

    public function destroy(Model $model)
    {
        // TODO: Implement destroy() method.
    }
}
