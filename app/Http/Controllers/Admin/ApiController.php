<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\ApiRepository;
use App\Repositories\CommentRepository;
use App\Repositories\MemberRepository;
use App\Repositories\ReportRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ApiController extends Controller
{
    public $memberRepository, $commentRepository, $reportRepository, $apiRepository;

    public function __construct(ApiRepository $apiRepository,MemberRepository $memberRepository, CommentRepository $commentRepository, ReportRepository $reportRepository)
    {
        $this->apiRepository = $apiRepository;
        $this->memberRepository = $memberRepository;
        $this->commentRepository = $commentRepository;
        $this->reportRepository = $reportRepository;
    }

    public function userLogin(Request $request)
    {
        return $this->apiRepository->sign_in($request);
    }

    public function logout()
    {
        return $this->apiRepository->logout();
    }

    public function comments(Request $request)
    {
        return $this->commentRepository->store($request);
    }

    public function reports(Request $request)
    {
        return $this->reportRepository->store($request);
    }

    public function register(Request $request)
    {
        return $this->apiRepository->register($request);
    }

    public function previous_comments(Request $request){
        return $this->commentRepository->previous_comments($request);
    }

    public function comments_of_a_task(Request $request){
        return $this->commentRepository->comments_of_a_task($request);
    }

    public function previous_comments_of_a_task(Request $request){
        return $this->commentRepository->previous_comments_of_a_task($request);
    }

    public function all_reports($constructor_id){
        return $this->reportRepository->all_reports($constructor_id);
    }

    public function task_done(Request $request){
        return $this->reportRepository->task_done($request);
    }

    public function all_pending_task(Request $request){
        return $this->reportRepository->all_pending_tasks($request);
    }

    public function all_finished_task(Request $request){
        return $this->reportRepository->all_finished_tasks($request);
    }

}
