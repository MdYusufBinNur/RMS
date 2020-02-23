<?php


namespace App\Repositories;


use App\Admin\Comment;
use App\Admin\Task;
use App\Helper\Base;
use App\Helper\Common;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class CommentRepository extends Common implements Base
{

    public function index()
    {
        return Comment::orderBy('id','DESC')->get();
        // TODO: Implement create() method.
    }

    public function store(Request $request)
    {
        // TODO: Implement store() method.
        $image = [];

        $dir = "Comments_Images";

        if (!empty($request->file('photo'))){
            foreach ($request->file('photo') as $i=>$item) {
                $image[] =  $this->save_file($request[$i]->file('photo'), $dir);
            }

        }

        $comment['member_id'] = $request->member_id;
        $comment['constructor_id'] = $request->constructor_id;
        $comment['task_id'] = $request->task_id;
        $comment['geo_points'] = $request->geo_points;
        $comment['comment'] = $request->comment;
        $comment['rating'] = $request->rating;
        $comment['photos'] = json_encode($image);

        $checkTask = Task::find($request->task_id);
        if (!empty($checkTask)){
            if (Comment::create($comment)){
                $response = array();
                $response['error'] = false;
                $response['message'] = "Successfully Commented";
                return $response;
            }
        }

        $response = array();
        $response['error'] = true;
        $response['message'] = "Invalid Request";
        return $response;
    }

    public function show(Model $model)
    {
        // TODO: Implement show() method.
        return Comment::with('member','member.user','constructor.user','task')
            ->where('id','=',$model->id)
            ->first();
    }

    public function destroy(Model $model)
    {
        // TODO: Implement destroy() method.
    }
}
