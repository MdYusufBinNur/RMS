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
                                        <th class="text-center"> Email</th>
                                        <th class="text-center"> Phone</th>
                                        <th class="text-center disabled-sorting">Actions</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @if(!empty($members))
                                        @foreach($members as $member)
                                            <tr>
                                                <td class="text-center">{!! $member->user->name !!}</td>
                                                <td class="text-center">{!! $member->user->email !!}</td>
                                                <td class="text-center">{!! $member->phone !!}</td>

                                                <td class="text-center">
                                                    <a href="#" class="btn btn-simple btn-warning btn-icon edit" data-toggle="modal" data-body="{{ "member" }}" data-id="{{ $member->id }}" data-target="#Modal"><i class="ti-pencil-alt"></i></a>
                                                    <a href="" class="btn btn-simple btn-info btn-icon del_brand remove" data-id="{{ $member->id }}" data-body="{{ "member" }}"  ><i class="ti-trash"></i></a>
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
                    <h4 class="modal-title">Member Update</h4>
                </div>
                <form action="{{ url('members') }}" method="post" enctype="multipart/form-data">
                    @csrf()
                    <div class="modal-body">
                        <div class="row" style="padding: 10px">
                            <input type="hidden" id="member_id"  name="member_id">
                            <div class="form-group">
                                <label class="control-label" for="old_role">
                                    Selected Role
                                </label>
                                <input class="form-control " type="text" name="old_role" id="old_role"  readonly/>
                            </div>
                            <div class="form-group">
                                <label for="">Select Role<star>*</star></label>
                                <select  title="-" class="selectpicker"  data-style="btn-dark btn-block" data-size="4" name="role" id="role" required >
                                    <option value="constructor">Constructor</option>
                                    <option value="user">User</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="name">
                                    Name
                                </label>
                                <input class="form-control" type="text" name="name" id="name"  required/>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="email">
                                    Email
                                </label>
                                <input class="form-control"  type="email"  name="email" id="email"  required/>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="phone">
                                    Phone
                                </label>
                                <input class="form-control" type="tel" name="phone" id="phone" required/>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="national_id">
                                    National ID
                                </label>
                                <input class="form-control" type="text" name="national_id" id="national_id"  required/>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="address">
                                    Address
                                </label>
                                <input class="form-control" type="text" name="address" id="address"  required/>
                            </div>

                            <div class="form-group">
                                <label class="control-label" for="photo"> Image </label>
                                <input type="file" name="photo" class="form-control" required/>
                            </div>
                            <div class="form-group">
                                <label for="old_logo">Old Image</label>
                                <br>
                                <img src="" alt="" width="50" height="auto" id="old_logo">
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


