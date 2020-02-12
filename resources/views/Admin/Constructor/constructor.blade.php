@extends('layouts.app')

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="card">
                        <form id="registerFormValidation" action="{{ url('constructors') }}" method="post" enctype="multipart/form-data">
                            @csrf()
                            <div class="card-header">
                                <a href="{{ url('constructors') }}" class="btn btn-outline-dark  pull-right">List</a>

                                <div class="form-group pull-left">
                                    <h5><strong>Constructor</strong></h5>
                                </div>

                            </div>
                            <div class="clearfix"></div>


                            <div class="card-content">
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
                                    <label for="password-confirm">{{ __('Confirm Password') }}</label>

                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>

                                <div class="form-group">
                                    <label class="control-label" for="photo"> Image </label>
                                    <input type="file" name="photo" class="form-control" required/>
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
