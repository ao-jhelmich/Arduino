<?php

class ReadController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index($subject_id)
    {
        $this->View->render('Arduino/read', array(
            'content' => ArduinoModel::getContent($subject_id)
        ));
    }
}