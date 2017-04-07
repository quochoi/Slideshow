<!--ITEM IMAGE-->

<tr class="item_image" style='display: {{$display}}'>
    <!--IMG THUMB-->
    <td>
        <div class="img-thumb">
            <div class="form-group config-images">
                <div class="input-group">
                    <span class="input-group-btn">
                        <img style="margin-top:15px;max-height:100px;" src='{{ URL::to(@$slideshow_image->sub_path.'/thumbs/'.@$slideshow_image->name) }}'>
                    </span>
                    <input class="form-control" type="hidden" name="images_name[]" value='{{ @$slideshow_image->full_path}}'>
                </div>
            </div>
        </div>
    </td>
    <!--/END IMG THUMB-->

    <!--IMG INFO-->
    <td>
        <div class="form-group">
            {!!
            Form::textarea('images_info[]', @$slideshow_image->info,
            ['class' => 'form-control view-write simple_tinymce', 'placeholder' => trans('re.description'), 'rows' => 7, 'cols' => 40])
            !!}
            <div class='view-read'>
            </div>
        </div>
    </td>
    <!--/END IMG INFO-->

    <!--BUTTON CONTROL-->
    <td>
        <span href="#" title='view' class='view'><i class="fa fa-eye fa-2x"></i></span>
        <span href="#" title='edit' class="edit margin-left-5"><i class="fa fa-pencil-square-o fa-2x"></i></span>
        <span href="#" title='delete' class="margin-left-5"><i class="fa fa-trash-o delete fa-2x"></i></span>
        <span href="#" title='down' class='down'><i class="fa fa-sort-desc fa-2x" aria-hidden="true"></i></span>
        <span href="#" title='up' class='up'><i class="fa fa-sort-asc fa-2x" aria-hidden="true"></i></span>
    </td>
    <!--/END BUTTON CONTROL-->
</tr>

<!--/END ITEM IMAGE-->