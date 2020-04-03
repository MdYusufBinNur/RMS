<?php


namespace App\Repositories;


use App\Admin\Constructor;
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
        if (!empty($request->file('photo'))) {
            foreach ($request->file('photo') as $i => $item) {
                $new_image = $this->save_file($item, $dir);
                array_push($image, $new_image);
            }
        }
        $report['constructor_id'] = $request->constructor_id;
        $report['task_id'] = $request->task_id;
        $report['area_id'] = $request->area_id;
        $report['report_details'] = $request->report_details;
        $report['photos'] = json_encode($image);

        if (!empty($request->isFinished)) {
            $task['isFinished'] = $request->isFinished;
            Task::find($request->task_id)->update($task);
        }

        if (Report::create($report)) {
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
        return Report::with('constructor', 'constructor.user', 'area', 'task')->where('id', '=', $model->id)->first();
    }

    public function destroy(Model $model)
    {
        // TODO: Implement destroy() method.
    }

    public function all_reports(Request $request)
    {
        if ($request->input('constructor_id') != null) {
            return response()->json(
                Constructor::with('user', 'report', 'report.task', 'report.area')
                    ->where('id', '=', $request->input('constructor_id'))
                    ->first(),200);
        }
        return response()->json("No Data Found", 500);
    }

    public function task_done(Request $request)
    {
        if ($request->input('task_id') != null && $request->input('constructor_id') != null ){
            $data['isFinished'] = 1;
            if ( Task::find($request->input('task_id'))->update($data)){
                $response = array();
                $response['error'] = false;
                $response['message'] = "Successfully Submitted";
                return $response;
            }
        }

        $response = array();
        $response['error'] = true;
        $response['message'] = "Try Again";
        return $response;
    }


    public function all_finished_tasks(Request $request){
        if ($request->input('constructor_id') != null) {
            return Task::with('constructor','constructor.user','report', 'report.task', 'report.area')
                ->where('constructor_id', '=', $request->input('constructor_id'))
                ->where('isFinished', '=', 1)
                ->get();
        }
        return response()->json("No Data Found", 500);
    }

    public function all_pending_tasks(Request $request){
        if ($request->input('constructor_id') != null) {
            return Task::with('constructor','constructor.user','report', 'report.task', 'report.area')
                ->where('constructor_id', '=', $request->input('constructor_id'))
                ->where('isFinished', '=', 0)
                ->get();
        }
        return response()->json("No Data Found", 500);
    }
}
