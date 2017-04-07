<?php namespace Foostart\Slideshow\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use URL;
use Route,
    Redirect;
/**
 * Validators
 */

class MyController extends Controller {

    public $data = array();
    public $authentication = NULL;
    public $is_members = FALSE;
    public $current_user = NULL;

    private $obj_validator = NULL;
    
    public function __construct() {
    }

    public function addFlashMessage($message_key, $message_value) {
        \Session::flash($message_key, $message_value);
    }

    public function isAuthentication() {

        $this->authentication = \App::make('authenticator');
        $this->current_user = $this->authentication->getLoggedUser();
        if ($this->current_user) {
            $this->is_members = TRUE;
        }
        $this->data = array(
            'is_members' => $this->is_members,
            'authentication' => $this->authentication
        );
    }

}