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
                                        <th class="text-center"> Task Name</th>
                                        <th class="text-center"> Constructor</th>
                                        <th class="text-center"> Area</th>
                                        <th class="text-center"> QR Code</th>
                                        <th class="text-center disabled-sorting">Actions</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @if(!empty($tasks))
                                        @foreach($tasks as $task)
                                            <tr>
                                                <td class="text-center">{!! $task->task_name !!}</td>
                                                <td class="text-center">{!! $task->constructor->user->name !!}</td>
                                                <td class="text-center">{!! $task->area->area_name !!}</td>
                                                <td class="text-center"><img src="{{ asset('image/QRCode/'.$task->qr_code) }}" alt=""> </td>

                                                <td class="text-center">
                                                    <a href="#" class="btn btn-simple btn-warning btn-icon edit" data-toggle="modal" data-body="{{ "task" }}" data-id="{{ $task->id }}" data-target="#Modal"><i class="ti-pencil-alt"></i></a>
                                                    <a href="{{ url('print_media/'.$task->qr_code) }}" class="btn btn-simple btn-success btn-icon print" target="_blank"><i class="ti-printer"></i></a>
                                                </td>
                                            </tr>

                                        @endforeach
                                    @endif
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
                <form action="{{ url('tasks') }}" method="post" enctype="multipart/form-data">
                    @csrf()
                    <div class="modal-body">
                        <div class="row" style="padding: 10px">

                            <input type="hidden" id="task_id"  name="task_id">
                            <div class="form-group">
                                <label for="old_constructor">Selected Constructor</label>
                                <input class="form-control" type="text" id="old_constructor" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Select Constructor<star>*</star></label>
                                <select  title="-" class="selectpicker"  data-style="btn-dark btn-block" data-size="4" name="constructor_id" id="constructor_id" required >

                                    @if(!empty($constructors))
                                        @foreach($constructors as $constructor)
                                            <option value="{{ $constructor->id }}">{{ $constructor->user->name }}</option>
                                        @endforeach

                                    @endif

                                </select>
                            </div>

                            <div class="form-group">
                                <label for="old_constructor">Selected Area</label>
                                <input class="form-control" type="text" id="old_area" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Select Area<star>*</star></label>
                                <select  title="-" class="selectpicker"  data-style="btn-dark btn-block" data-size="4" name="area_id" id="area_id" required >
                                    @if(!empty($areas))
                                        @foreach($areas as $area)
                                            <option value="{{ $area->id }}">{{ $area->area_name }}</option>
                                        @endforeach

                                    @endif
                                </select>
                            </div>


                            <div class="form-group">
                                <label class="control-label" for="name">
                                    Task Name
                                </label>

                                <input class="form-control " type="text" name="task_name" id="task_name"  required/>
                            </div>

                            <div class="form-group">
                                <label class="control-label" for="task_details">
                                    Details
                                </label>

                                <textarea class="form-control" rows="3"  name="task_details" id="task_details"   required></textarea>
                            </div>

                            <div class="form-group">
                                <label class="control-label" for="task_budget">
                                    Budget
                                </label>
                                <input class="form-control" type="text" name="task_budget" id="task_budget" required/>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-default" >Update</button>
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


