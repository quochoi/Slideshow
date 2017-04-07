<!-- SAMPLE NAME -->
<div class="form-group">
    <?php $slideshow_category_name = $request->get('slideshow_titlename') ? $request->get('slideshow_name') : @$slideshow->slideshow_category_name ?>
    {!! Form::label($name, trans('slideshow::slideshow_admin.name').':') !!}
    {!! Form::text($name, $slideshow_category_name, ['class' => 'form-control', 'placeholder' => trans('slideshow::slideshow_admin.name').'']) !!}
</div>
<!-- /SAMPLE NAME -->