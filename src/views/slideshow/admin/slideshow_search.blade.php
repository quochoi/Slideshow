
<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title bariol-thin"><i class="fa fa-search"></i><?php echo trans('slideshow::slideshow_admin.page_search') ?></h3>
    </div>
    <div class="panel-body">

        {!! Form::open(['route' => 'admin_slideshow','method' => 'get']) !!}

        <!--TITLE-->
        <div class="form-group">
            {!! Form::label('slideshow_name', trans('slideshow::slideshow_admin.slideshow_name_label')) !!}
            {!! Form::text('slideshow_name', @$params['slideshow_name'], ['class' => 'form-control', 'placeholder' => trans('slideshow::slideshow_admin.slideshow_name_placeholder')]) !!}
        </div>
        <!--/END TITLE-->

        {!! Form::submit(trans('slideshow::slideshow_admin.search').'', ["class" => "btn btn-info pull-right"]) !!}
        {!! Form::close() !!}
    </div>
</div>


