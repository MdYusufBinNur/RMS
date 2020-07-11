<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Constructor;
use App\Admin\Report;
use App\Http\Controllers\Controller;
use App\Repositories\ReportRepository;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ReportController extends Controller
{
    public $reportRepository;
    public function __construct(ReportRepository $reportRepository)
    {
        $this->reportRepository = $reportRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $reports = $this->reportRepository->index();
        //return $reports;
        return view('Admin.Report.report_list', compact('reports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return array
     */
    public function store(Request $request)
    {
        return $this->reportRepository->store($request);
//        return $this->reportRepository->send_notification($this->reportRepository->store($request));
    }

    /**
     * Display the specified resource.
     *
     * @param Report $report
     * @return Builder|Model|object
     */
    public function show(Report $report)
    {
        return  $this->reportRepository->show($report);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Report $report
     * @return void
     */
    public function edit(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Report $report
     * @return void
     */
    public function update(Request $request, Report $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Report $report
     * @return void
     */
    public function destroy(Report $report)
    {
        $this->reportRepository->destroy($report);
    }

    public function get_report($report_sate)
    {
        switch ($report_sate){
            case 'pending':
                $flag_name = "On Going Project";
                $tasks = $this->reportRepository->pending_tasks();
                break;
            case 'finished':
                $flag_name = "Finished Project";
                $tasks = $this->reportRepository->finished_tasks();
                break;
            default:
                $flag_name = "All Project";
                $tasks = $this->reportRepository->all_tasks();
                break;
        }

        return view('Admin.Report.list', compact('tasks', 'flag_name'));
    }

    public function get_rank()
    {
        $constructors = Constructor::with('user')->where('available', '=', true)->orderBy('rating','desc')->get();
        //return $constructors;

        return view('Admin.Report.rank', compact('constructors'));
    }
}
