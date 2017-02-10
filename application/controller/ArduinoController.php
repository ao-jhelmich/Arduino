<?php
class ArduinoController extends Controller
{
    public function softDelete()
    {
        $var = Request::post('subject_subcategory_id');
        $id = Request::post('subject_id');
        ArduinoModel::softDelete($id);
        if (empty($var)) {
            Redirect::to('admin/index');
        }else{
            Redirect::to('Arduino/read/' . $var);
        }
    }
 
    public function create()
    {
    	$this->View->render('Arduino/create', array(
    		'infocat' => ArduinoModel::getAllpages()
    	));
    }

    public function editsub()
    {
        $this->View->render('Arduino/edit', array(
            'subjects' => ArduinoModel::getSubject(Request::post('subject_id'))
        ));
    }

    public function editSave()
    {
        ArduinoModel::update(Request::post('subject_id'), Request::post('subject_content'), Request::post('subject_name'));
        $var = Request::post('subject_subcategory_id');
        Redirect::to('read/index/' . $var);
    }
    /*
    Eerste generatie function, Jasper 2016.

    public function delete()
    {
        $var = Request::post('target');
        if ($var == "subcat") {
            ArduinoModel::deleteSubcategory(Request::post('id'));
            Redirect::to('Arduino/admin');
        }elseif ($var == "cat") {
            ArduinoModel::deleteCategory(Request::post('id'));
            Redirect::to('Arduino/admin');
        }elseif ($var == "subj") {
            ArduinoModel::deleteSubject(Request::post('id'));
            Redirect::to('Arduino/admin');
        }else{
            Redirect::to('Arduino/snoop');
        }
    }*/
    public function insert()
    {
    	ArduinoModel::createPage(Request::post('subcategory'),Request::post('subject'), Request::post('content'));
    	Redirect::to('Arduino/create');
    }

    public function snoop()
    {
        $this->View->render('Arduino/snoop');
    }

    public function placeBack()
    {
        $id = Request::post('subject_id');
        ArduinoModel::putBackSoftDelete($id);
        Redirect::to("admin/index");
    }
}