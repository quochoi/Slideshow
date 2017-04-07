<?php

namespace Foostart\Slideshow\Controllers\Admin;

use Illuminate\Http\Request;
use Foostart\Slideshow\Controllers\Admin\MyController;
use URL;
use Route,
    Redirect;

use Foostart\Slideshow\Models\Slideshows;
use Foostart\Slideshow\Models\SlideshowsCategories;
/**
 * Validators
 */
use Foostart\Slideshow\Validators\SlideshowAdminValidator;

class SlideshowAdminController extends MyController {

    private $obj_slideshow = NULL;
    private $obj_slideshow_categories = NULL;
    private $obj_validator = NULL;

    public function __construct() {
        $this->obj_slideshow = new Slideshows();
    }

    /**
     *
     * @return type
     */
    public function index(Request $request) {

        $params = $request->all();

        $list_slideshows = $this->obj_slideshow->get_slideshows($params);


        $this->data = array_merge($this->data, array(
            'slideshows' => $list_slideshows,
            'request' => $request,
            'params' => $params
        ));
        return view('slideshow::slideshow.admin.slideshow_list', $this->data);
    }

    /**
     *
     * @return type
     */
    public function edit(Request $request) {

        $slideshow = NULL;
        $slideshow_id = (int) $request->get('id');


        if (!empty($slideshow_id) && (is_int($slideshow_id))) {
            $slideshow = $this->obj_slideshow->find($slideshow_id);
        }

        $this->obj_slideshow_categories = new SlideshowsCategories();

        $this->data = array_merge($this->data, array(
            'slideshow' => $slideshow,
            'request' => $request,
            'categories' => $this->obj_slideshow_categories->pluckSelect()
        ));
        return view('slideshow::slideshow.admin.slideshow_edit', $this->data);
    }

    /**
     *
     * @return type
     */
    public function post(Request $request) {

        $this->isAuthentication();


        $this->obj_validator = new SlideshowAdminValidator();
        $this->obj_slideshow_categories = new SlideshowsCategories();

        $input = array_merge($request->all(),
                $this->parseImagePath($request->get('slideshow_image_path')),
                array(
                    'user_id' => $this->current_user->id,
                )
        );

        $slideshow_id = (int) $request->get('id');
        $slideshow = NULL;

        $data = array();

        if (!$this->obj_validator->validate($input)) {

            $data['errors'] = $this->obj_validator->getErrors();

            if (!empty($slideshow_id) && is_int($slideshow_id)) {

                $slideshow = $this->obj_slideshow->find($slideshow_id);
            }
        } else {
            if (!empty($slideshow_id) && is_int($slideshow_id)) {

                $slideshow = $this->obj_slideshow->find($slideshow_id);

                if (!empty($slideshow)) {

                    $input['slideshow_id'] = $slideshow_id;
                    $slideshow = $this->obj_slideshow->update_slideshow($input);

                    //Message
                    $this->addFlashMessage('message', trans('slideshow::slideshow_admin.message_update_successfully'));
                    return Redirect::route("admin_slideshow.edit", ["id" => $slideshow->slideshow_id]);
                } else {

                    //Message
                    $this->addFlashMessage('message', trans('slideshow::slideshow_admin.message_update_unsuccessfully'));
                }
            } else {

                $slideshow = $this->obj_slideshow->add_slideshow($input);

                if (!empty($slideshow)) {

                    //Message
                    $this->addFlashMessage('message', trans('slideshow::slideshow_admin.message_add_successfully'));
                    return Redirect::route("admin_slideshow.edit", ["id" => $slideshow->slideshow_id]);
                } else {

                    //Message
                    $this->addFlashMessage('message', trans('slideshow::slideshow_admin.message_add_unsuccessfully'));
                }
            }
        }

        $this->data = array_merge($this->data, array(
            'slideshow' => $slideshow,
            'request' => $request,
            'categories' => $this->obj_slideshow_categories->pluckSelect()
                ), $data);

        return view('slideshow::slideshow.admin.slideshow_edit', $this->data);
    }

    /**
     *
     * @return type
     */
    public function delete(Request $request) {

        $slideshow = NULL;
        $slideshow_id = $request->get('id');

        if (!empty($slideshow_id)) {
            $slideshow = $this->obj_slideshow->find($slideshow_id);

            if (!empty($slideshow)) {
                //Message
                $this->addFlashMessage('message', trans('slideshow::slideshow_admin.message_delete_successfully'));

                $slideshow->delete();
            }
        } else {

        }

        $this->data = array_merge($this->data, array(
            'slideshow' => $slideshow,
        ));

        return Redirect::route("admin_slideshow");
    }

    public function parseImagePath($url) {

        $patern = '/http:\/\/.*?\/(.*?)\/[a-z0-9-_\.]*$/';
        preg_match($patern, $url, $parse_url);

        $image_info = array(
            'full_path' => $url,
            'sub_path' => @$parse_url[1],
        );

        return $image_info;
    }

}
