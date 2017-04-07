<!--TABLE - LIST OF IMAGES-->
<div class="task-slideshow">

    <span class="heading">Hình slideshow</span>

    <table class="table table-hover images-table">

        <!--HEADING-->
        <thead>
            <tr>
                <th style="width: 25%">Hình</th>
                <th style="width: 50%">Mô tả</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <!--/END HEADING-->

        <!--BODY-->
        <tbody class='list_images'>
            <?php
                $slideshow_images = array();
                if (isset($slideshow) && !empty($slideshow->slideshow_images)) {
                    $slideshow_images = json_decode($slideshow->slideshow_images);
                }
            ?>

            @include('slideshow::slideshow.elements.images_table_cell', ['display' => 'none', 'slideshow_image' => NULL])

            <?php if (!empty($slideshow_images)): ?>
                @foreach($slideshow_images as $slideshow_image)

                    @include('slideshow::slideshow.elements.images_table_cell',['display' => '', 'slideshow_image' => $slideshow_image])

                @endforeach
            <?php endif; ?>
        </tbody>
        <!--/END BODY-->

    </table>
</div>
<!--TABLE - LIST OF IMAGES-->