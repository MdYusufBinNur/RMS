@extends('layouts.app')

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="card">
                        <form id="registerFormValidation" action="{{ url('tasks') }}" method="post" enctype="multipart/form-data">
                            @csrf()
                            <div class="card-header">
                                <a href="{{ url('tasks') }}" class="btn btn-outline-dark  pull-right">List</a>

                                <div class="form-group pull-left">
                                    <h5><strong>Task</strong></h5>
                                </div>

                            </div>
                            <div class="clearfix"></div>


                            <div class="card-content">
                                <div class="form-group">
                                    <label for="">Select Constructor<star>*</star></label>
                                    <select  title="-" class="selectpicker"  data-style="btn-dark btn-block" data-size="4" name="constructor_id" id="constructor_id" required >

                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="">Select Area<star>*</star></label>
                                    <select  title="-" class="selectpicker"  data-style="btn-dark btn-block" data-size="4" name="area_id" id="area_id" required >

                                    </select>
                                </div>


                                <div class="form-group">
                                    <label class="control-label" for="name">
                                        Task Name
                                    </label>

                                    <input class="form-control " type="text" name="task_name" id="task_name"  required/>
                                </div>

                                <div class="form-group">
                                    <label class="control-label" for="email">
                                        Details
                                    </label>

                                    <textarea class="form-control" rows="3"  name="task_details" id="email"   required></textarea>
                                </div>

                                <div class="form-group">
                                    <label class="control-label" for="national_id">
                                       Budget
                                    </label>
                                    <input class="form-control" type="text" name="task_budget" id="task_budget" required/>
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
