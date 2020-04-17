@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="card">
                        <form id="registerFormValidation" action="{{ url('areas') }}" method="post" enctype="multipart/form-data">
                            @csrf()
                            <div class="card-header">
                                <a href="{{ url('areas') }}" class="btn btn-outline-dark  pull-right">Area List</a>
                                <div class="form-group pull-left">
                                    <h5><strong>Area</strong></h5>
                                </div>

                            </div>
                            <div class="clearfix"></div>

                            <div class="card-content">
                                <div class="form-group">
                                    <label class="control-label" for="area_name">Name</label>
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
                                <div class="category"><star>*</star> Required fields</div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info btn-fill pull-right">Submit</button>
                                <div class="clearfix"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
