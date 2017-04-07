@extends('laravel-authentication-acl::admin.layouts.base-2cols')

@section('title')
Admin area: {{ trans('slideshow::slideshow_admin.page_category') }}
@stop

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="col-md-8">

            <div class="panel panel-info">

                <div class="panel-heading">
                    <h3 class="panel-title bariol-thin">
                        <i class="fa fa-group"></i>
                        {!! $request->all() ?
                            trans('slideshow::slideshow_admin.page_search') : trans('slideshow::slideshow_admin.page_category')
                        !!}
                    </h3>
                </div>
                <!--MESSAGE-->
                <?php $message = Session::get('message'); ?>
                @if( isset($message) )
                <div class="alert alert-success flash-message">{!! $message !!}</div>
                @endif
                <!--/END MESSAGE-->

                <!--ERRORS-->
                @if($errors && ! $errors->isEmpty() )
                @foreach($errors->all() as $error)
                <div class="alert alert-danger flash-message">{!! $error !!}</div>
                @endforeach
                @endif
                <!--/END ERRORS-->
                <div class="panel-body">
                    @include('slideshow::slideshow_category.admin.slideshow_category_item')
                </div>
            </div>
        </div>
        <div class="col-md-4">
            @include('slideshow::slideshow_category.admin.slideshow_category_search')
        </div>
    </div>
</div>
@stop

@section('footer_scripts')
<!-- DELETE CONFIRM -->
<script>
    $(".delete").click(function () {
        return confirm("{{ trans('slideshow:slideshow_admin.delete_confirm') }}");
    });
</script>
<!-- /END DELETE CONFIRM -->
@stop