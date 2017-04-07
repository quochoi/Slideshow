<?php

namespace Foostart\Slideshow\Models;

use Illuminate\Database\Eloquent\Model;

class SlideshowsCategories extends Model {

    protected $table = 'slideshows_categories';
    public $timestamps = false;
    protected $fillable = [
        'slideshow_category_name'
    ];
    protected $primaryKey = 'slideshow_category_id';

    public function get_slideshows_categories($params = array()) {
        $eloquent = self::orderBy('slideshow_category_id');

        if (!empty($params['slideshow_category_name'])) {
            $eloquent->where('slideshow_category_name', 'like', '%'. $params['slideshow_category_name'].'%');
        }
        $slideshows_category = $eloquent->paginate(10);
        return $slideshows_category;
    }

    /**
     *
     * @param type $input
     * @param type $slideshow_id
     * @return type
     */
    public function update_slideshow_category($input, $slideshow_id = NULL) {

        if (empty($slideshow_id)) {
            $slideshow_id = $input['slideshow_category_id'];
        }

        $slideshow = self::find($slideshow_id);

        if (!empty($slideshow)) {

            $slideshow->slideshow_category_name = $input['slideshow_category_name'];

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
    public function add_slideshow_category($input) {

        $slideshow = self::create([
                    'slideshow_category_name' => $input['slideshow_category_name'],
        ]);
        return $slideshow;
    }

    /**
     * Get list of slideshows categories
     * @param type $category_id
     * @return type
     */
     public function pluckSelect($category_id = NULL) {
        if ($category_id) {
            $categories = self::where('slideshow_category_id', '!=', $category_id)
                    ->orderBy('slideshow_category_name', 'ASC')
                ->pluck('slideshow_category_name', 'slideshow_category_id');
        } else {
            $categories = self::orderBy('slideshow_category_name', 'ASC')
                ->pluck('slideshow_category_name', 'slideshow_category_id');
        }
        return $categories;
    }

}
