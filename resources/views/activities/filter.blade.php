@extends('wrapper')

    @section('headerscripts')
        {{--commmon header script for this module and individual files for this page--}}

        <link rel="stylesheet" href="{{ asset('components/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css') }}" />





    @stop

    @section('title')
        Activity Log: List logs from date


    @stop

    @section('content')

        <div class="row">
            {!! Form::open(['url' => 'staff/activities/filter', 'class' => 'form-inline', 'method' =>'get' ]) !!}

            <input type="text" class="input-lg col-xs-7 date-picker" placeholder="Select Date" name="created_at">

            <select name="description" class="input-lg col-xs-2">

                <option value=""></option>
                <option value="updated">Updated</option>
                <option value="created">Created</option>

            </select>


            <button type="submit" class="btn btn-info  input-lg col-xs-2">
                <i class="ace-icon fa fa-search bigger-110"></i>Search
            </button>
            {!! Form::close() !!}
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-10 col-sm-offset-1">
                <!-- #section:pages/timeline -->
                <div class="timeline-container">
                    <div class="timeline-label">
                        <!-- #section:pages/timeline.label -->


                        <!-- /section:pages/timeline.label -->
                    </div>

                    <div class="timeline-items">
                        <!-- #section:pages/timeline.item -->

                        @foreach($activities as $activity)
                            <div class="timeline-item clearfix">
                            <!-- #section:pages/timeline.info -->
                            <div class="timeline-info">
                                {!! $activity->description == "updated" ? '<i class="fa fa-cloud-upload" style="font-size:42px; color:#FFB752"></i>' : '<i class="menu-icon fa fa-plus-circle" style="font-size:42px; color:#629B58"></i>' !!}

                                <span class="label label-info label-sm">
                                    {{ $activity->created_at->format('H:i') }}
                                </span>
                            </div>

                            <!-- /section:pages/timeline.info -->
                            <div class="widget-box  transparent collapsed">
                                <div class="widget-header widget-header-small ">
                                    <h5 class="widget-title smaller">
                                        <b>{{ App\User::find($activity->causer_id)->name }}</b>
                                        <span class="grey">{{ $activity->description }} {{ $activity->log_name }}, number {{ $activity->subject_id }}, on  {{ $activity->created_at->format('l jS \\of F Y') }}</span>
                                    </h5>

                                    <span class="widget-toolbar no-border">
                                        <i class="ace-icon fa fa-clock-o bigger-110"></i>
                                        {{ $activity->created_at->format('H:i') }}
                                    </span>

                                    <span class="widget-toolbar">
                                        <a href="#" data-action="collapse">
                                                <i class="ace-icon fa fa-chevron-up"></i>
                                            </a>
                                        </span>
                                </div>

                                <div class="widget-body">
                                    <div class="widget-main" style="word-wrap: break-word;">
                                        <b>{{ App\User::find($activity->causer_id)->name }}</b>
                                        @if($activity->description == "updated")
                                            updated {{ $activity->log_name }} number {{ $activity->subject_id }}


                                        @else
                                            created {{ $activity->log_name }} number {{ $activity->subject_id }} with the following details
                                            <br>
                                            {{ $activity->properties  }}

                                        @endif





                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach


                    </div><!-- /.timeline-items -->
                </div><!-- /.timeline-container -->

            </div>
        </div>


    @stop

    @section('footerscripts')
        <script src="{{ asset('components/chosen/chosen.jquery.js')}}"></script>
        <script src="{{ asset('components/bootstrap-datepicker/dist/js/bootstrap-datepicker.js')}}"></script>
        {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.28/vue.min.js"></script>--}}

        <script type="text/javascript">






            jQuery(function($) {



                //datepicker plugin
                //link
                $('body').on('focus',".date-picker", function(){
                    $(this).datepicker({
                        autoclose: true,
                        todayHighlight: true,
                        format: 'yyyy-mm-dd'
                    })
                })






            });

        </script>

        {{--<script src="{{ asset('components/moment/moment.js')}}"></script>--}}
        {{--<script src="{{ asset('components/fullcalendar/dist/fullcalendar.js')}}"></script>--}}
        {{--<script src="{{ asset('components/bootbox.js/bootbox.js')}}"></script>--}}



    @stop


