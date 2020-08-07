@extends('layouts.app')

@section('style')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
@endsection

@section('content')
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <h4 class="title">Project List</h4>
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
                                        <th class="text-center"> Details</th>
                                        <th class="text-center"> Status</th>
                                        <th class="text-center disabled-sorting">Actions</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @if(!empty($comments))
                                        @foreach($comments as $comment)
                                            <tr>
                                                <td class="text-center">{!! $comment->task_name !!}</td>
                                                <td class="text-center">{!! $comment->task_details !!}</td>
                                                <td class="text-center">
                                                    @if ($comment->isFinished == 0)
                                                        PENDING
                                                    @else
                                                        FINISHED
                                                    @endif
                                                </td>

                                                <td class="text-center">
                                                    <form action="{{ url("/all_comments/") }}" method="post">
                                                        @csrf()
                                                        <input type="text" name="task_id" value="{{ $comment->id }}" hidden>
                                                        <input type="text" name="task_name" value="{{ $comment->task_name }}" hidden>

{{--                                                    <a href="#" class="btn btn-simple btn-warning btn-icon edit" data-toggle="modal" data-body="{{ "comment" }}" data-id="{{ $comment->id }}" data-target="#Modal"><i class="ti-pencil-alt"></i></a>--}}
{{--                                                        <a href="{{ url("/all_comments/".$comment->id."/".$comment->task_name) }}" class="btn btn-simple btn-warning btn-icon" ><i class="ti-eye"></i></a>--}}
                                                        <button type="submit" class="btn btn-simple btn-warning btn-icon" ><i class="ti-eye"></i></button>
                                                    </form>
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

@endsection

@section('script')

    <script src="{{asset('Admin/paper_dashboard/assets/js/datatable_search_pagination.js') }}" ></script>

    {{--<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js">datatable_search_pagination.js</script>--}}
@endsection


