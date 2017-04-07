@extends('laravel-authentication-acl::admin.layouts.base-2cols')

@section('title')
Admin area: {{ trans('slideshow::slideshow_admin.page_edit') }}
@stop
@section('content')
<div class="row">
    <div class="col-md-12">

        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title bariol-thin">
                        {!! !empty($slideshow->slideshow_id) ? '<i class="fa fa-pencil"></i>'.trans('slideshow::slideshow_admin.form_edit') : '<i class="fa fa-users"></i>'.trans('slideshow::slideshow_admin.form_add') !!}
                    </h3>
                </div>

                {{-- model general errors from the form --}}
                @if($errors->has('slideshow_name') )
                <div class="alert alert-danger">{!! $errors->first('slideshow_name') !!}</div>
                @endif

                @if($errors->has('name_unvalid_length') )
                <div class="alert alert-danger">{!! $errors->first('name_unvalid_length') !!}</div>
                @endif

                {{-- successful message --}}
                <?php $message = Session::get('message'); ?>
                @if( isset($message) )
                <div class="alert alert-success">{{$message}}</div>
                @endif

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                            <h4>{!! trans('slideshow::slideshow_admin.form_heading') !!}</h4>
                            {!! Form::open(['route'=>['admin_slideshow.post', 'id' => @$slideshow->slideshow_id],  'files'=>true, 'method' => 'post'])  !!}



                            <!--QUICK TABS-->
                            <ul class="nav nav-tabs">

                                <!--TAB HOME-->
                                <li class="active">
                                    <a data-toggle="tab" href="#home">
                                        {!! trans('slideshow::slideshow_admin.tab_overview') !!}
                                    </a>
                                </li>
                                <!--/END TAB HOME-->

                                <!--TAB ATTRIBUTES-->
                                <li>
                                    <a data-toggle="tab" href="#attributes">
                                        {!! trans('slideshow::slideshow_admin.tab_attributes') !!}
                                    </a>
                                </li>
                                <!--/END TAB ATTRIBUTES-->

                                <!--TAB IMAGE-->
                                <li>
                                    <a data-toggle="tab" href="#image">
                                        {!! trans('slideshow::slideshow_admin.tab_image') !!}
                                    </a>
                                </li>
                                <!--/END TAB IMAGE-->

                                <!--TAB IMAGES-->
                                <li>
                                    <a data-toggle="tab" href="#images">
                                        {!! trans('slideshow::slideshow_admin.tab_images') !!}
                                    </a>
                                </li>
                                <!--/END TAB IMAGES-->


                            </ul>
                            <!--/END QUICK TABS-->


                            <div class="tab-content">

                                <!--TAB OVERVIEW-->
                                <div id="home" class="tab-pane fade in active">
                                    <!--INPUT-->
                                    @include('slideshow::slideshow.elements.input', ['name' => 'slideshow_name'])
                                    <!--/END INPUT-->

                                     <!--TEXT-->
                                    @include('slideshow::slideshow.elements.text', ['name' => 'slideshow_name'])
                                    <!--/END TEXT-->
                                </div>
                                <!--/END TAB OVERVIEW-->

                                <!--TAB ATTRIBUTES-->
                                <div id="attributes" class="tab-pane fade">
                                    <!--SELECT-->
                                    @include('slideshow::slideshow.elements.select', ['name' => 'slideshow_categoty_name'])
                                    <!--/END SELECT-->
                                </div>
                                <!--TAB ATTRIBUTES-->

                                <!--TAB IMAGE-->
                                <div id="image" class="tab-pane fade">
                                    <!--IMAGE-->
                                    @include('slideshow::slideshow.elements.image', ['name' => 'slideshow_image'])
                                    <!--/END IMAGE-->
                                </div>
                                <!--TAB IMAGE-->

                                <!--TAB IMAGES-->
                                <div id="images" class="tab-pane fade">
                                    <!--IMAGES-->
                                    @include('slideshow::slideshow.elements.images', ['name' => 'slideshow_images'])
                                    <!--/END IMAGES-->
                                </div>
                                <!--TAB IMAGES-->

                            </div>

                            {!! Form::hidden('id',@$slideshow->slideshow_id) !!}

                            <!-- DELETE BUTTON -->
                            <a href="{!! URL::route('admin_slideshow.delete',['id' => @$slideshow->slideshow_id, '_token' => csrf_token()]) !!}"
                               class="btn btn-danger pull-right margin-left-5 delete">
                                Delete
                            </a>
                            <!-- DELETE BUTTON -->

                            <!-- SAVE BUTTON -->
                            {!! Form::submit('Save', array("class"=>"btn btn-info pull-right ")) !!}
                            <!-- /SAVE BUTTON -->

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('footer_scripts_more')

{!! HTML::script('vendor/laravel-filemanager/js/tinymce.min.js') !!}
{!! HTML::script('vendor/laravel-filemanager/js/tinymce-configs.js') !!}
{!! HTML::script('vendor/laravel-filemanager/js/lfm_sample.js') !!}

<script type='text/javascript'>
    $(document).ready(function () {
        $('#lfm').filemanager('image');
        $('#lfm_images').filemanager('image');
    });
</script>
@stop