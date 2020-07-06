<div class="row">
    <div class="space-6"></div>

    <div class="col-sm-7 widget-container-col" >

        <div class="widget-box transparent " >
            <div class="widget-header">
                <h4 class="widget-title lighter">Membership Status</h4>


            </div>

            <div class="widget-body">
                <div class="col-sm-12 infobox-container">
                    <div class="space-6"></div>

                    <!-- #section:pages/dashboard.infobox -->
                    @foreach($membershiptypes as $membershiptype)
                    <div class="infobox infobox-green">
                        <div class="infobox-icon">
                            <i class="ace-icon fa fa-users"></i>
                        </div>
                        <div class="infobox-data">
                            <span class="infobox-data-number">{{ $membershiptype->member->whereIn('membershipstatus_id', [4,5])->count() }}</span>
                            <div class="infobox-content">{{ $membershiptype->title }} </div>
                        </div>
                    </div>
                    @endforeach







                    <!-- /section:pages/dashboard.infobox -->
                    <div class="space-6"></div>

                    <!-- #section:pages/dashboard.infobox.dark -->
            @foreach($membershipstatuses as $membershipstatus)
            <div class="infobox infobox-green infobox-small infobox-dark" style="background-color: {{ $membershipstatus->colour }}">
                <div class="infobox-progress">
                    <!-- #section:pages/dashboard.infobox.easypiechart -->
                    <div class="easy-pie-chart percentage" data-percent="{{ $membershipstatus->member_count*100/$members }}" data-size="39">
                        <span class="percent">{{ $membershipstatus->member_count }}</span>
                    </div>

                    <!-- /section:pages/dashboard.infobox.easypiechart -->
                </div>

                <div class="infobox-data">

                    <div class="infobox-content">{{ $membershipstatus->title }}</div>
                </div>
            </div>
            @endforeach


                    <div class="infobox infobox-green infobox-small infobox-dark" style="background-color: hotpink">
                        <div class="infobox-progress">
                            <!-- #section:pages/dashboard.infobox.easypiechart -->
                            <div class="easy-pie-chart percentage" data-percent="{{ $female*100/$members }}" data-size="39">
                                <span class="percent">{{ $female }}</span>
                            </div>

                            <!-- /section:pages/dashboard.infobox.easypiechart -->
                        </div>

                        <div class="infobox-data">

                            <div class="infobox-content">Female</div>
                        </div>
                    </div>

                    <div class="infobox infobox-green infobox-small infobox-dark" style="background-color: #582d01">
                        <div class="infobox-progress">
                            <!-- #section:pages/dashboard.infobox.easypiechart -->
                            <div class="easy-pie-chart percentage" data-percent="{{ $male*100/$members }}" data-size="39">
                                <span class="percent">{{ $male }}</span>
                            </div>

                            <!-- /section:pages/dashboard.infobox.easypiechart -->
                        </div>

                        <div class="infobox-data">

                            <div class="infobox-content">Male</div>
                        </div>
                    </div>


                    <div class="infobox infobox-green infobox-small infobox-dark" style="
    background: red; /* For browsers that do not support gradients */
    background: -webkit-linear-gradient(right, orange , yellow, green, cyan, blue, violet); /* For Safari 5.1 to 6.0 */
    background: -o-linear-gradient(left, orange, yellow, green, cyan, blue, violet); /* For Opera 11.1 to 12.0 */
    background: -moz-linear-gradient(left, orange, yellow, green, cyan, blue, violet); /* For Firefox 3.6 to 15 */
    background: linear-gradient(to left, orange , yellow, green, cyan, blue, violet); /* Standard syntax (must be last) */
}">
                        <div class="infobox-progress">
                            <!-- #section:pages/dashboard.infobox.easypiechart -->
                            <div class="easy-pie-chart percentage" data-percent="{{ $others*100/$members }}" data-size="39">
                                <span class="percent">{{ $others }}</span>
                            </div>

                            <!-- /section:pages/dashboard.infobox.easypiechart -->
                        </div>

                        <div class="infobox-data">

                            <div class="infobox-content">Others</div>
                        </div>
                    </div>


                    <!-- /section:pages/dashboard.infobox.dark -->
                </div>



                <div class="col-sm-10">
                    <div class="widget-box transparent">
                        <div class="widget-header widget-header-flat">
                            <h4 class="widget-title lighter">
                                <i class="ace-icon fa fa-signal"></i>
                                Ownership Types
                            </h5>


                        </div>

                        <div class="widget-body transparent">
                            <div class="widget-main">
                                <!-- #section:plugins/charts.flotchart -->
                                <div id="piechart-placeholder"></div>

                                <!-- /section:plugins/charts.flotchart -->
                                <div class="hr hr8 hr-double"></div>

                                <div class="clearfix">
                                    <!-- #section:custom/extra.grid -->

                                    @foreach($ownershiptypes as $ownershiptype)
                                        <div class="grid3">
                    <span class="grey">
                        &nbsp; {{ $ownershiptype->name }}
                    </span>
                                            <h4 class="bigger pull-right">{{ $ownershiptype->member->whereIn('membershipstatus_id', [4,5])->count() }}</h4>
                                        </div>
                                @endforeach


                                <!-- /section:custom/extra.grid -->
                                </div>
                            </div><!-- /.widget-main -->
                        </div><!-- /.widget-body -->
                    </div><!-- /.widget-box -->
                </div>
            </div>
        </div>


    </div>



    <div class="vspace-12-sm"></div>




    <div class="col-sm-5">
        <div class="widget-box transparent">
            <div class="widget-header widget-header-flat">
                <h4 class="widget-title lighter">
                    <i class="ace-icon fa fa-star orange"></i>
                    Filter and list or export
                </h4>


            </div>

            <div class="widget-body">
                <div class="widget-main no-padding">
                    {!! Form::open(['url' => 'staff/members/filter', 'class' => 'form-inline', 'method' => 'get']) !!}
                    <table class="table table-bordered table-striped">
                        <thead class="thin-border-bottom">
                        <tr>
                            <th>
                                <i class="ace-icon fa fa-caret-right blue"></i>Instructions
                            </th>

                            <th>
                                <i class="ace-icon fa fa-caret-right blue"></i>Options
                            </th>


                        </tr>
                        </thead>

                        <tbody>
                        <tr>
                            <td>I want to</td>

                            <td>

                                <select name="action" >
                                    <option value="list">List</option>
                                    <option value="export">Export</option>
                                </select>

                            </td>


                        </tr>
                        <tr>
                            <td>The businesses from</td>

                            <td>

                                {!! Form::select('location_id', $locations, null, ['placeholder' => 'Locations']) !!}

                            </td>


                        </tr>
                        <tr>
                            <td>that belongs to </td>

                            <td>

                                {!! Form::select('category_id', $categories, null, ['placeholder' => 'Category']) !!}

                            </td>


                        </tr>
                        <tr>
                            <td>who are</td>

                            <td>

                                {!! Form::select('membershiptype_id', $types, null, ['placeholder' => 'Membership Type', 'class' => 'chosen-select']) !!}

                            </td>


                        </tr>
                        <tr>
                            <td>With status of</td>

                            <td>

                                {!! Form::select('membershipstatus_id', $statuses, null, ['placeholder' => 'Select Status', 'class' => 'chosen-select']) !!}

                            </td>


                        </tr>
                        <tr>
                            <td>and is a</td>

                            <td>

                                {!! Form::select('ownershiptype_id', $ownerships, null, ['placeholder' => 'Ownership Type', 'class' => 'chosen-select']) !!}

                            </td>


                        </tr>
                        <tr>
                            <td>with propritor being</td>

                            <td>

                                <select name="gender" >
                                    <option value="">Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select>

                            </td>


                        </tr>
                        <tr>
                            <td>from the country</td>

                            <td>

                                <select name="nationality" >
                                    <option value="">Country</option>
                                    <option value="NP">Nepal</option>
                                    <option value="others">Others</option>
                                </select>

                            </td>


                        </tr>

                        <tr>
                            <td>In Language </td>

                            <td>

                                <select name="language" >
                                    <option value="eng">English</option>
                                    <option value="nep">नेपाली</option>

                                </select>

                            </td>


                        </tr>


                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-info  input-lg col-xs-4">
                        <i class="ace-icon fa fa-search bigger-110"></i>Search
                    </button>
                    {!! Form::close() !!}
                </div><!-- /.widget-main -->
            </div><!-- /.widget-body -->
        </div><!-- /.widget-box -->
    </div>

    <!-- /.col -->
</div><!-- /.row -->

