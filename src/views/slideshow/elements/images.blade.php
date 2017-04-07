<div class='images-form'>
    <div class="input-group">
        <span class="input-group-btn">
            <a id="lfm_images" data-input="thumb" data-preview="show" class="btn btn-primary">
                <i class="fa fa-picture-o"></i> Choose
            </a>
        </span>
        <input id="thumb" class="form-control" type="text">
    </div>

    <div class="showfile">
        <img id="show" style="margin-top:15px;max-height:100px;">
        <span class="add-image" style='display: none'>Add</span>
    </div>
</div>

<!--IMAGES-->
@include('slideshow::slideshow.elements.images_table', [])
<!--/END IMAGES-->

@section('footer_scripts_sub_more')
{!! HTML::script('js/config-images.js') !!}

<script type='text/javascript'>

    $(document).ready(function () {

        $('.task-slideshow').task_image();


        $('.add-image').click(function () {

            //get value
            var img_src = $('.images-form img').attr('src');
            var img_name = $('.images-form input').val();

            //reset value
            $('.images-form img').attr('src', '');
            $('.images-form input').val('');

            if (img_src.length != 0 && img_name.length != 0) {
                // check slideshow_images is NULL
                $temp = $('.item_image').first().clone();
                $temp.css('display','');
                $('.item_image').first().after($temp);
            }

            // set value
            var item_image = $('.item_image:nth-child(2)');
            item_image.find('.img-thumb input').val(img_src);
            item_image.find('.img-thumb img').attr('src', img_src);
            // reset event
            $('.task-slideshow').task_image();

            $(this).hide();

        })


    });
</script>

@stop
