<?php

namespace Foostart\Slideshow\Controllers\Admin;

use Illuminate\Http\Request;
use Foostart\Slideshow\Controllers\Admin\MyController;
use URL;
use Route,
    Redirect;
use Foostart\Slideshow\Models\SlideshowsCategories;
/**
 * Validators
 */
use Foostart\Slideshow\Validators\SlideshowCategoryAdminValidator;

class SlideshowCategoryAdminController extends MyController {

    public $data_view = array();
    private $obj_slideshow_category = NULL;
    private $obj_validator = NULL;

    public function __construct() {
        $this->obj_slideshow_category = new SlideshowsCategories();
    }

    /**
     *
     * @return type
     */
    public function index(Request $request) {

        $params = $request->all();

        $list_slideshow_category = $this->obj_slideshow_category->get_slideshows_categories($params);

        $this->data_view = array_merge($this->data_view, array(
            'slideshows_categories' => $list_slideshow_category,
            'request' => $request,
            'params' => $params
        ));
        return view('slideshow::slideshow_category.admin.slideshow_category_list', $this->data_view);
    }

    /**
     *
     * @return type
     */
    public function edit(Request $request) {

        $slideshow = NULL;
        $slideshow_id = (int) $request->get('id');


        if (!empty($slideshow_id) && (is_int($slideshow_id))) {
            $slideshow = $this->obj_slideshow_category->find($slideshow_id);
        }

        $this->data_view = array_merge($this->data_view, array(
            'slideshow' => $slideshow,
            'request' => $request
        ));
        return view('slideshow::slideshow_category.admin.slideshow_category_edit', $this->data_view);
    }

    /**
     *
     * @return type
     */
    public function post(Request $request) {

        $this->obj_validator = new SlideshowCategoryAdminValidator();

        $input = $request->all();


        $slideshow_category_id = (int) $request->get('id');

        $slideshow_category = NULL;

        $data = array();

        if (!$this->obj_validator->validate($input)) {

            $data['errors'] = $this->obj_validator->getErrors();

            if (!empty($slideshow_category_id) && is_int($slideshow_category_id)) {

                $slideshow_category = $this->obj_slideshow_category->find($slideshow_category_id);
            }
        } else {
            if (!empty($slideshow_category_id) && is_int($slideshow_category_id)) {

                $slideshow_category = $this->obj_slideshow_category->find($slideshow_category_id);

                if (!empty($slideshow_category)) {

                    $input['slideshow_category_id'] = $slideshow_category_id;
                    $slideshow_category = $this->obj_slideshow_category->update_slideshow_category($input);

                    //Message
                    $this->addFlashMessage('message', trans('slideshow::slideshow_admin.message_update_successfully'));
                    return Redirect::route("admin_slideshow_category.edit", ["id" => $slideshow_category->slideshow_category_id]);
                } else {

                    //Message
                    $this->addFlashMessage('message', trans('slideshow::slideshow_admin.message_update_unsuccessfully'));
                }
            } else {

                $slideshow_category = $this->obj_slideshow_category->add_slideshow_category($input);

                if (!empty($slideshow_category)) {

                    //Message
                    $this->addFlashMessage('message', trans('slideshow::slideshow_admin.message_add_successfully'));
                    return Redirect::route("admin_slideshow_category.edit", ["id" => $slideshow_category->slideshow_category_id]);
                } else {

                    //Message
                    $this->addFlashMessage('message', trans('slideshow::slideshow_admin.message_add_unsuccessfully'));
                }
            }
        }

        $this->data_view = array_merge($this->data_view, array(
            'slideshow_category' => $slideshow_category,
            'request' => $request,
                ), $data);

        return view('slideshow::slideshow_category.admin.slideshow_category_edit', $this->data_view);
    }

    /**
     *
     * @return type
     */
    public function delete(Request $request) {

        $slideshow = NULL;
        $slideshow_id = $request->get('id');

        if (!empty($slideshow_id)) {
            $slideshow = $this->obj_slideshow_category->find($slideshow_id);

            if (!empty($slideshow)) {
                //Message
                $this->addFlashMessage('message', trans('slideshow::slideshow_admin.message_delete_successfully'));

                $slideshow->delete();
            }
        } else {
            
        }

        $this->data_view = array_merge($this->data_view, array(
            'slideshow' => $slideshow,
        ));

        return Redirect::route("admin_slideshow_category");
    }

}
