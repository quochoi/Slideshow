<?php

namespace Foostart\Slideshow\Models;

use Illuminate\Database\Eloquent\Model;

class Slideshows extends Model {

    protected $table = 'slideshows';
    public $timestamps = true;
    protected $fillable = [
        'slideshow_name',
        'category_id',
        'user_id',
        'slideshow_image_name',
        'slideshow_image_dir',
        'slideshow_images',
        'slideshow_overview',
        'slideshow_description',
        'slideshow_status',
        'created_at',
        'updated_at',
        'slideshow_created_at',
        'slideshow_updated_at',
    ];
    protected $primaryKey = 'slideshow_id';

    /**
     *
     * @param type $params
     * @return type
     */
    public function get_slideshows($params = array()) {
        $eloquent = self::orderBy('slideshow_id');

        //slideshow_name
        if (!empty($params['slideshow_name'])) {
            $eloquent->where('slideshow_name', 'like', '%' . $params['slideshow_name'] . '%');
        }

        $slideshows = $eloquent->paginate(10); //TODO: change number of item per page to configs

        return $slideshows;
    }

    /**
     *
     * @param type $input
     * @param type $slideshow_id
     * @return type
     */
    public function update_slideshow($input, $slideshow_id = NULL) {

        $slideshow_images = $this->encodeImages($input);

        if (empty($slideshow_id)) {
            $slideshow_id = $input['slideshow_id'];
        }

        $slideshow = self::find($slideshow_id);

        if (!empty($slideshow)) {

            $slideshow->slideshow_name = $input['slideshow_name'];
            $slideshow->category_id = $input['category_id'];
            $slideshow->slideshow_overview = $input['slideshow_overview'];
            $slideshow->slideshow_description = $input['slideshow_description'];

            $slideshow->slideshow_image_name = @$input['slideshow_image_name'];
            $slideshow->slideshow_image_dir = @$input['sub_path'];

            $slideshow->slideshow_images = $slideshow_images;

            $slideshow->slideshow_updated_at = time();

            $slideshow->save();

            return $slideshow;
        } else {
            return NULL;
        }
    }

    /**
     *
     * @param type $input
     * @return type
     */
    public function add_slideshow($input) {

        $slideshow_images = $this->encodeImages($input);
        $slideshow = self::create([
                    'slideshow_name' => $input['slideshow_name'],
                    'category_id' => $input['category_id'],
                    'user_id' => $input['user_id'],
                    'slideshow_overview' => $input['slideshow_overview'],
                    'slideshow_description' => $input['slideshow_description'],
                    'slideshow_image_name' => $input['slideshow_image_name'],
                    'slideshow_image_dir' => $input['sub_path'],
                    'slideshow_images' => $slideshow_images,
                    'slideshow_created_at' => time(),
                    'slideshow_updated_at' => time(),
        ]);
        return $slideshow;
    }

    public function encodeImages($input) {
        $json_images = array();

        if (!empty($input['images_name'])) {
            foreach ($input['images_name'] as $index => $image_name) {
                if (!empty($image_name)) {
                    $image = $this->parseImagePath($image_name);
                    $json_images[] = array(
                        'full_path' => @$image['full_path'],
                        'sub_path' => @$image['sub_path'],
                        'name' => @$image['name'],
                        'info' => @$input['images_info'][$index]
                    );
                }
            }
        }

        return json_encode($json_images);
    }

    public function decodeImages($slideshow_images) {
        $slideshow_images = json_decode($slideshow_images);
        return $slideshow_images;
    }

    public function pluckSelect($slideshow_id = NULL) {
        if ($slideshow_id) {
            $slideshow = self::where('slideshow_id', '!=', $slideshow_id)
                    ->orderBy('slideshow_name', 'ASC')
                    ->pluck('slideshow_name', 'slideshow_id');
        } else {
            $slideshow = self::orderBy('slideshow_name', 'ASC')
                    ->pluck('slideshow_name', 'slideshow_id');
        }
        return $slideshow;
    }

    public function parseImagePath($url) {

        $patern = '/http:\/\/.*?\/(.*?)\/([a-zA-Z0-9-_\.]*)$/';
        preg_match($patern, $url, $parse_url);

        $image_info = array(
            'full_path' => $url,
            'sub_path' => @$parse_url[1],
            'name' => @$parse_url[2],
        );

        return $image_info;
    }

}
