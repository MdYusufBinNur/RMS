<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Task;
use App\Http\Controllers\Controller;
use App\Repositories\TaskRepository;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public $taskRepository;
    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {

        $results = $this->taskRepository->index();
        $tasks = $results['tasks'];
        $areas = $results['areas'];
        $constructors = $results['constructors'];
       // return  $tasks;
        return  view('Admin.Task.task_list', compact('tasks', 'constructors', 'areas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $tasks = $this->taskRepository->index();
        $areas = $tasks['areas'];
        $constructors = $tasks['constructors'];
        return  view('Admin.Task.task', compact('areas','constructors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
//        return $this->taskRepository->store($request);
        return $this->taskRepository->send_notification($this->taskRepository->store($request));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin\Task  $task
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|object
     */
    public function show(Task $task)
    {
        return $this->taskRepository->show($task);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        return $this->taskRepository->destroy($task);
    }

    public function print_media($img)
    {
        return view('Admin.Task.print',compact('img'));
    }
}
