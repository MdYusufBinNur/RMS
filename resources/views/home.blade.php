@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                {{-- <div class="col-lg-3 col-sm-6">
                     <div class="card">
                         <div class="card-content">
                             <div class="row">
                                 <div class="col-xs-7">
                                     <p><a href="{{ url('abouts/create') }}" style="color: black">ON GOING
                                             PROJECTS</a></p>
                                 </div>
                                 <div class="col-xs-5">
                                     <div class="numbers">

                                         <span id="group">
                                              <button type="button" class="btn btn-info">
                                               <i class="fa fa-envelope"></i>
                                              </button>
                                              <span class="badge badge-light">5</span>
                                         </span>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="card-footer">
                             <hr/>

                         </div>
                     </div>
                 </div>--}}
                <div class="col-lg-4 col-sm-6">
                    <div class="card text-center">
                        <div class="card-content">
                            <div class="row">
                                <div class="col-xs-5">
                                    <div class="icon-big icon-info text-center">

                                        <i class="ti-stats-up"></i>
                                    </div>
                                </div>
                                <div class="col-xs-7">
                                    <div class="numbers">
                                        <p><a href="{{ url('/get_reports/pending') }}" style="color: black">ON GOING
                                                PROJECTS</a></p>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <hr/>
                            {{--<div class="stats">--}}
                            {{--<div class="pull-right" style="position:relative; display:inline-block;"><i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" rel="tooltip" title="adasdasdasdasdasd adasdasdasdasdShows the total price of orders minus cost for ads."></i></div>--}}
                            {{--<i class="ti-clipboard"></i><div class="my-inline-block" id="campaign-name4"></div>--}}
                            {{--</div>--}}
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="card">
                        <div class="card-content">
                            <div class="row">
                                <div class="col-xs-5">
                                    <div class="icon-big icon-success text-center">

                                        <i class="ti-flag"></i>
                                    </div>
                                </div>
                                <div class="col-xs-7">
                                    <div class="numbers">
                                        <p><a href="{{ url('get_reports/finished') }}" style="color: black">ALL FINISHED
                                                PROJECTS</a></p>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <hr/>
                            {{--<div class="stats">--}}
                            {{--<div class="pull-right" style="position:relative; display:inline-block;"><i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" rel="tooltip" title="adasdasdasdasdasd adasdasdasdasdShows the total price of orders minus cost for ads."></i></div>--}}
                            {{--<i class="ti-clipboard"></i><div class="my-inline-block" id="campaign-name4"></div>--}}
                            {{--</div>--}}
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="card">
                        <div class="card-content">
                            <div class="row">
                                <div class="col-xs-5">
                                    <div class="icon-big icon-danger text-center">

                                        <i class="ti-menu"></i>
                                    </div>
                                </div>
                                <div class="col-xs-7">
                                    <div class="numbers">
                                        <p><a href="{{ url('get_reports/all') }}" style="color: black">TOTAL <br>
                                                PROJECTS</a></p>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <hr/>
                            {{--<div class="stats">--}}
                            {{--<div class="pull-right" style="position:relative; display:inline-block;"><i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" rel="tooltip" title="adasdasdasdasdasd adasdasdasdasdShows the total price of orders minus cost for ads."></i></div>--}}
                            {{--<i class="ti-clipboard"></i><div class="my-inline-block" id="campaign-name4"></div>--}}
                            {{--</div>--}}
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="card">
                        <div class="card-content">
                            <div class="row">
                                <div class="col-xs-5">
                                    <div class="icon-big icon-danger text-center">

                                        <i class="ti-bar-chart"></i>
                                    </div>
                                </div>
                                <div class="col-xs-7">
                                    <div class="numbers">
                                        <p><a href="{{ url('get_rank') }}" style="color: black">RANKED <br>
                                                CONTRACTORS</a></p>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <hr/>
                            {{--<div class="stats">--}}
                            {{--<div class="pull-right" style="position:relative; display:inline-block;"><i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" rel="tooltip" title="adasdasdasdasdasd adasdasdasdasdShows the total price of orders minus cost for ads."></i></div>--}}
                            {{--<i class="ti-clipboard"></i><div class="my-inline-block" id="campaign-name4"></div>--}}
                            {{--</div>--}}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection

@section('style')
    <style>
        .badge {
            position: relative;
            top: -20px;
            left: -25px;
            border: 1px solid black;
            border-radius: 50%;
        }
    </style>
@endsection
