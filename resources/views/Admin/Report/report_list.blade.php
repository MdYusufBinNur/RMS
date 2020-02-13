@extends('layouts.app')

@section('style')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
@endsection

@section('content')
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <h4 class="title"> List</h4>
                    <br>

                    <div class="card">
                        <div class="card-content">
                            <div class="toolbar">
                                <!--Here you can write extra buttons/actions for the toolbar-->
                            </div>
                            <div class="fresh-datatables">
                                <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th class="text-center"> Constructor</th>
                                        <th class="text-center"> Task ID</th>
                                        <th class="text-center"> Area</th>
                                        <th class="text-center"> Report</th>
                                        <th class="text-center disabled-sorting">Actions</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @if(!empty($reports))
                                        @foreach($reports as $report)
                                            <tr>
                                                <td class="text-center">{!! $report->constructor->user_id !!}</td>
                                                <td class="text-center">{!! $report->task_id !!}</td>
                                                <td class="text-center">{!! $report->area_id !!}</td>
                                                <td class="text-center">{!! $report->report !!}</td>

                                                <td class="text-center">
                                                    <a href="#" class="btn btn-simple btn-warning btn-icon edit" data-toggle="modal" data-body="{{ "report" }}" data-id="{{ $report->id }}" data-target="#Modal"><i class="ti-pencil-alt"></i></a>
                                                </td>
                                            </tr>

                                        @endforeach
                                    @endif
                                    <tr>
                                        <th class="text-center"> Constructor</th>
                                        <th class="text-center"> Task ID</th>
                                        <th class="text-center"> Area</th>
                                        <th class="text-center"> Report</th>
                                        <td class="text-center disabled-sorting">
                                            <a href="#" class="btn btn-simple btn-warning btn-icon " data-toggle="modal"  data-target="#Modal"><i class="ti-pencil-alt"></i></a>

                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div><!--  end card  -->
                </div> <!-- end col-md-12 -->
            </div> <!-- end row -->

        </div>
    </div>

    <div class="modal fade" id="Modal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Report View</h4>
                </div>
                <form action="{{ url('reports') }}" method="post" enctype="multipart/form-data">
                    @csrf()
                    <div class="modal-body">
                        <div class="row" style="padding: 10px">

                            <input type="hidden" id="report_id"  name="report_id">

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6 ">
                                        <h5 class=""> <strong>CONSTRUCTOR</strong> </h5>
                                        <p id="constructor_name"> CONSTRUCTOR </p>
                                        <p id="constructor_email"> constructor@octoriz.com</p>
                                        <p id="constructor_phone">01815625375 </p>
                                    </div>

                                    <div class="col-md-6 text-right">
                                        <h5 class="text-left"> <strong>Task</strong> </h5>
                                        <p id="task_id"> USER </p>
                                        <p id="task_area"> arya@octoriz.com</p>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <p id="report"  class="text-justify">We are committed to provide the excellent services to our clients and our business partners. We take pride of our services and are determined to continuously enhance our reputation and relationships with wider stakeholders.</p>
                            </div>

                            <div class="form-group">
                                <div class="col-4">
                                    <img id="report_image" src="" alt="">
                                </div>
                            </div>

                        </div>
                    </div>

                </form>
            </div>

        </div>
    </div>

@endsection

@section('script')

    <script src="{{asset('Admin/paper_dashboard/assets/js/datatable_search_pagination.js') }}" ></script>

    {{--<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js">datatable_search_pagination.js</script>--}}
@endsection


