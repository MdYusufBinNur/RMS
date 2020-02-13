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
                                        <th class="text-center"> Name</th>
                                        <th class="text-center"> Ward</th>
                                        <th class="text-center"> Thana</th>
                                        <th class="text-center"> City</th>
                                        <th class="text-center disabled-sorting">Actions</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @if(!empty($areas))
                                        @foreach($areas as $area)
                                            <tr>
                                                <td class="text-center">{!! $area->area_name !!}</td>
                                                <td class="text-center">{!! $area->area_ward !!}</td>
                                                <td class="text-center">{!! $area->area_thana !!}</td>
                                                <td class="text-center">{!! $area->area_city !!}</td>

                                                <td class="text-center">
                                                    <a href="#" class="btn btn-simple btn-warning btn-icon edit" data-toggle="modal" data-body="{{ "area" }}" data-id="{{ $area->id }}" data-target="#Modal"><i class="ti-pencil-alt"></i></a>
                                                    <a href="" class="btn btn-simple btn-info btn-icon del_brand remove" data-id="{{ $area->id }}" data-body="{{ "area" }}"  ><i class="ti-trash"></i></a>
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
                    <h4 class="modal-title">Message View</h4>
                </div>
                <form action="{{ url('areas') }}" method="post" enctype="multipart/form-data">
                    @csrf()
                    <div class="modal-body">
                        <div class="row" style="padding: 10px">

                            <input type="hidden" id="area_id"  name="area_id">

                            <div class="form-group">
                                <label class="control-label" for="area_name">
                                    Name
                                </label>
                                <input class="form-control" type="text" name="area_name" id="area_name" required/>
                            </div>

                            <div class="form-group">
                                <label class="control-label" for="area_ward"> Ward No<star>*</star></label>
                                <input class="form-control" type="number" name="area_ward" id="area_ward"  required/>

                            </div>
                            <div class="form-group">
                                <label class="control-label" for="area_union"> Union<star>*</star></label>
                                <input class="form-control" type="number" name="area_union" id="area_union"  required/>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="area_thana">Thana<star>*</star></label>
                                <input class="form-control" name="area_thana" id="area_thana"  required/>

                            </div>
                            <div class="form-group">
                                <label class="control-label" for="area_city"> City <star>*</star></label>
                                <input type="text" class="form-control" name="area_city" id="area_city" required />
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-default"  >Update</button>
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


