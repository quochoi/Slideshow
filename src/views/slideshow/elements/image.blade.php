<!--SLIDESHOW INPUT IMAGE-->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script>
    var route_prefix = "{{ url(config('lfm.prefix')) }}";
</script>
<div class="input-group">
    <span class="input-group-btn">
        <a id="lfm" data-input="thumbnail" data-preview="holder" data-dir="dir" class="btn btn-primary">
            <i class="fa fa-picture-o"></i> {{ trans('slideshow::slideshow_admin.post_image_choose') }}
        </a>
    </span>

    <?php $slideshow_image_name = $request->get('slideshow_image_name') ? $request->get('slideshow_image_name') : @$slideshow->slideshow_image_name ?>
    <input id="thumbnail" class="form-control" type="text" name="slideshow_image_name" value="{{$slideshow_image_name}}">
</div>

<?php
$url_src = '';
$slideshow_image_dir = !empty(@$slideshow->slideshow_image_dir) ? $slideshow->slideshow_image_dir : '';

if (empty($slideshow_image_dir)) {
    $url_src = URL::to('');
} else {
    $url_src = URL::to($slideshow_image_dir . '/' . $slideshow_image_name);
}
?>

<img id="holder" style="margin-top:15px;max-height:100px;" src='{{ $url_src }}'>

<input id="dir" class="form-control" type="hidden" name="slideshow_image_path" value="{{ $url_src }}">

 <script>
    {!! \File::get(base_path('vendor/unisharp/laravel-filemanager/public/js/lfm.js')) !!}
    $('#lfm').filemanager('image', {prefix: route_prefix});
 </script>
<!--END SLIDESHOW INPUT IMAGE-->