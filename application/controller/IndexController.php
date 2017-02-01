<?php

class IndexController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index($subcategory_id)
    {
        if (empty($subcategory_id)){

            $subcategory_id = NULL;
        }
        
        $this->View->render('Arduino/index', array(
            'subjects' => ArduinoModel::getSubjects($subcategory_id)
        ));
    }}
