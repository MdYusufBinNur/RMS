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

}
