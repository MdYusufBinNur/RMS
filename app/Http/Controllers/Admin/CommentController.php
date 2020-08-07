<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Comment;
use App\Http\Controllers\Controller;
use App\Repositories\CommentRepository;
use App\Repositories\TaskRepository;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public $commentRepository,$taskRepository;
    public function __construct(CommentRepository $commentRepository, TaskRepository $taskRepository)
    {
        $this->commentRepository = $commentRepository;
        $this->taskRepository = $taskRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $tasks = $this->taskRepository->index();
        $comments = $tasks['tasks'];
        return view('Admin.Comment.comment_list', compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function store(Request $request)
    {

        return $this->commentRepository->store($request);
        /*return $this->commentRepository->send_notification($result);*/
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin\Comment  $comment
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|object
     */
    public function show(Comment $comment)
    {
        return $this->commentRepository->show($comment);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $this->commentRepository->destroy($comment);
    }


    public function all_comments(Request $request)
    {
       // return $request;
        $task_name = $request->task_name;
        $comments = Comment::with('member.user','constructor','task')
            ->orderBy('id','DESC')
            ->where('task_id', '=',$request->task_id)
            ->get();
        //return $comments;
        return view('Admin.Comment.comments', compact('comments','task_name'));
    }
}
