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
            $crud->set_theme('datatables');
            $crud->set_table('stylesheet');
            $crud->display_as('activeState','Enabled');
            $crud->set_subject('stylesheet');
            //$crud->set_relation('createsByIndicator','users','firstName');

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
}