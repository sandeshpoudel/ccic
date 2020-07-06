@extends('wrapper')

@section('headerscripts')
    {{--commmon header script for this module and individual files for this page--}}



@stop

@section('title')
    All Available Categories
@stop

@section('content')

    <div class="col-xs-12">
        <p>
            <a  href="categories/create" class="btn btn-success" id="bootbox-root">
                Add New Category
            </a>
        </p>




        <div class="dd" id="nestable">
            @if (count($categories) > 0)
                <ol class="dd-list " >
                    @foreach ($categories as $category)
                        @include('categories._subcat', $category)
                    @endforeach
                </ol>
            @else
                You have no categories!
            @endif
        </div>


    </div>


@stop

@section('footerscripts')
    <script src="{{ asset('components/_mod/jquery.nestable/jquery.nestable.js') }}"></script>
    <script src="{{ asset('components/bootbox.js/bootbox.js') }}"></script>



    <script type="text/javascript">
        jQuery(function($){

            $('.dd').nestable({
                maxDepth: 0,
                noDragClass:'dd-nodrag',
                collapsedClass:'dd-collapsed',
            }).nestable('collapseAll');

            $('.dd-handle a').on('mousedown', function(e){
                e.stopPropagation();
            });

            $('[data-rel="tooltip"]').tooltip();

            // $('.dd').each(function(){
            //     $(.dd).nestable({
            //         maxDepth: 1,
            //         group: $(this).prop('nestable')
            //     });
            // });
            // $('.dd-handle a').on('mousedown', function(e){
            //     e.stopPropagation();
            // });



        });
    </script>
    {{--commmon header script for this module and individual files for this page--}}
@stop