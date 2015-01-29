<?php if (! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: hashedtox
 * Date: 23/01/15
 * Time: 11:25 AM
 */

class Panel extends CI_Controller {

    function index() {
        if($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            //just for testing!
            $data['roles'] = $session_data['roles'];
            $data['name'] = $session_data['name'];
            $this->load->view('panel', $data);
        } else {
            //No session? No access.
            redirect('login','refresh');
        }
    }

    /*Add each CRUD element here, and then use routes to access it.*/

    function stylesheets() {
        try {
            //adding checking against user auth later
            $crud = new grocery_CRUD();
            $crud->set_table('stylesheet');
            $crud->display_as('activeState','Enabled');
            $crud->set_subject('stylesheet');
            $crud->callback_add_field('createsByIndicator',array($this,'stylesheet_set_id_add'));
            $crud->callback_add_field('creationDate',array($this, 'stylesheet_set_current_time_add'));
            $crud->callback_edit_field('modifyBy',array($this, 'stylesheet_set_id_edit'));
            $crud->callback_edit_field('modifyDate',array($this, 'stylesheet_set_current_time_edit'));
            $crud->add_fields('name','content','description','activeState','createsByIndicator','creationDate');
            $crud->edit_fields('name','content','description','activeState','lastModifyBy','modifyDate');

            $output = $crud->render();

            $this->load->view('crud_view', $output);
        } catch (Exception $E) {
            show_error($E->getMessage(). '---'.$E->getTraceAsString());
        }
    }



    function logout() {
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect('homepage','refresh');
    }


    //Callback Functions
    //These functions all us to control the elements of the editing or adding forms.
    //Separated by CRUD views.

    function stylesheet_set_id_add() {
        $session_data = $this->session->userdata('logged_in');
        $id = $session_data['id'];
        return "<input type=\"text\" maxlength=\"3\" disabled value=\"" . $id . "\" name=\"createsByIndicator\" \\>";
    }

    function stylesheet_set_current_time_add() {
        $date = date('d/m/y h:i:s');
        return "<input type=\"text\" disabled value=\"". $date . "\" name=\"creationDate\" \\> (dd/mm/yyyy) hh:mm:ss";
    }

    function stylesheet_set_id_edit() {
        $session_data = $this->session->userdata('logged_in');
        $id = $session_data['id'];
        return "<input type=\"text\" maxlength=\"3\" disabled value=\"" . $id . "\" name=\"modifyBy\" \\>";
    }

    function stylesheet_set_current_time_edit() {
        $date = date('d/m/y h:i:s');
        return "<input type=\"text\" disabled value=\"". $date . "\" name=\"modifyDate\" \\> (dd/mm/yyyy) hh:mm:ss";
    }
}