<?php


namespace App\Repositories;


use App\Admin\Comment;
use App\Admin\Constructor;
use App\Admin\Member;
use App\Admin\Report;
use App\Admin\Task;
use App\Helper\Base;
use App\Helper\Common;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class CommentRepository extends Common implements Base
{

    public function index()
    {
        return Comment::with('member','member.user','constructor','task')->orderBy('id','DESC')->get();
        // TODO: Implement create() method.
    }

    public function store(Request $request)
    {

        // TODO: Implement store() method.
        $image = [];
        $dir = "Comments_Images";
        if (!empty($request->file('photos'))) {
            foreach ($request->file('photos') as $i=>$item) {
                $new_image =  $this->save_file($item, $dir);
                array_push($image, $new_image);
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
                $comments = Comment::where('constructor_id',$request->constructor_id)->get();
                //r
                $total_rating = 0;
                $rating = 0;
                if (count($comments) > 0){
                    for ($i = 0; $i < count($comments); $i++){
                        $total_rating += $comments[$i]->rating;
                    }
                    $rating = $total_rating/count($comments);
                    $data['rating'] = $rating;
                    Constructor::find($request->constructor_id)->update($data);
                }

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
        return Comment::find($model->id)->delete();
    }

    public function previous_comments(Request $request){
        $user_id = $request->input('member_id');
        if ($user_id != null){
            $data = Member::with('user','comment','comment.task','comment.constructor')
                ->where('id','=',$user_id)
                ->orderBy('id','DESC')
                ->first();
            if ($data){
                return $data;
            }
        }
        return response()->json("No Data Found", 401);
    }

    public function previous_comments_of_a_task(Request $request){
        if ($request->input('member_id') != null){
            return Comment::with('member','member.user','constructor','constructor.user','task')
                ->where('member_id','=', $request->input('member_id'))
                ->where('task_id','=', $request->input('task_id'))
                ->get();
        }
        return response()->json("No Data Found", 401);
    }

    public function comments_of_a_task(Request $request){
        $task_id = $request->input('task_id');
        if ($task_id != null){
            return Comment::with('member','member.user','constructor','constructor.user','task')
                ->where('task_id','=', $task_id)
                ->get();
        }
        return response()->json("No Data Found", 401);

    }


}
