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
                                    @if(!empty($constructors))
                                        @foreach($constructors as $constructor)
                                            <tr>
                                                <td class="text-center">{!! $constructor->user->name !!}</td>
                                                <td class="text-center">{!! $constructor->user->email !!}</td>
                                                <td class="text-center">{!! $constructor->phone !!}</td>

                                                <td class="text-center">
                                                    <a href="#" class="btn btn-simple btn-warning btn-icon edit" data-toggle="modal" data-body="{{ "constructor" }}" data-id="{{ $constructor->id }}" data-target="#Modal"><i class="ti-pencil-alt"></i></a>
                                                    <a href="" class="btn btn-simple btn-info btn-icon del_brand remove" data-id="{{ $constructor->id }}" data-body="{{ "constructor" }}"  ><i class="ti-trash"></i></a>
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
                <form action="{{ url('contacts') }}" method="post" enctype="multipart/form-data">
                    @csrf()
                    <div class="modal-body">
                        <div class="row" style="padding: 10px">

                            <input type="hidden" id="contact_id"  name="area_id">

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

                                <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name"  value="{{ old('name') }}" required/>
                            </div>

                            <div class="form-group">
                                <label class="control-label" for="email">
                                    Email
                                </label>

                                <input class="form-control @error('email') is-invalid @enderror" type="email"  name="email" id="email"  value="{{ old('email') }}" required/>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="phone">
                                    Phone
                                </label>
                                <input class="form-control @error('phone') is-invalid @enderror" type="tel" name="phone" id="phone" value="{{ old('phone') }}" required/>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="national_id">
                                    National ID
                                </label>
                                <input class="form-control @error('national_id') is-invalid @enderror" type="text" name="national_id" id="national_id" value="{{ old('national_id') }}" required/>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="address">
                                    Address
                                </label>
                                <input class="form-control @error('address') is-invalid @enderror" type="text" name="address" id="address" value="{{ old('address') }}" required/>
                            </div>

                            <div class="form-group">
                                <label for="password" >{{ __('Password') }}</label>

                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label class="control-label" for="photo"> Image </label>
                                <input type="file" name="photo" class="form-control" required/>
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


