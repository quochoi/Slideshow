<!-- TASK OVERVIEW -->
<div class="form-group">
    {!! Form::label('slideshow_overview', trans('slideshow::slideshow_admin.slideshow_overview').':') !!}
    {!!
        Form::textarea ('slideshow_overview', @$slideshow->slideshow_overview,
            ['class' => 'form-control tinymce my-editor', 'rows' => 5, 'placeholder' => trans('slideshow::slideshow_admin.slideshow_overview')])
    !!}

</div>

<!-- TASK DESCRIPTION   -->
<div class="form-group">
    {!! Form::label('slideshow_description', trans('slideshow::slideshow_admin.slideshow_description').':') !!}
    {!!
        Form::textarea ('slideshow_description', @$slideshow->slideshow_description,
        ['class' => 'form-control tinymce my-editor', 'rows' => 20, 'placeholder' => trans('slideshow::slideshow_admin.slideshow_description')])
    !!}
</div>