<?php

class AdminController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        // special authentication check for the entire controller: Note the check-ADMIN-authentication!
        // All methods inside this controller are only accessible for admins (= users that have role type 7)
        Auth::checkAdminAuthentication();
    }

    public function index()
    {
	    if (Session::userIsLoggedIn()) {
            $this->View->render('Arduino/admin', array(
                'subjects' => ArduinoModel::getAllpages()
            ));
        }else{
            Redirect::to('login/index');
        }
    }
}
