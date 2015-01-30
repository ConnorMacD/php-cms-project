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

    function stylesheets() {
        $crud = new ajax_grocery_CRUD();

        $crud->set_table('stylesheet')
             ->columns('name','content','description','activeState',
                 'createsByIndicator', 'creationDate','lastModifyBy',
                 'modifyDate');
        $crud->add_fields('name','content','description','activeState','createsByIndicator','creationDate');
        //$session_data = $this->session->userdata('logged_in');
        //$crud->field_set_defaults('createsByIndicator','readonly', '1');
        $crud->field_type('createsByIndicator','hidden',1);
        $crud->field_type('creationDate','hidden','date');
        //$crud->field_set_defaults('creationDate','readonly',time('mm/dd/yy h:i:s'));
        //$crud->change_field_type('createsByIndicator', 'disabled');
        $output = $crud->render();

        $this->load->view('crud_view',$output);

    }

    function articles() {
        $crud = new ajax_grocery_CRUD();
        $crud->set_table('articles');
        $crud->set_relation('contentArea_id', 'contentarea','name');
        $crud->set_relation('page_id', 'pages', 'name');
        $crud->set_relation('createdByIndicator','users','username');
        $crud->add_fields('title', 'description','contentArea_id','page_id','allPages','body','createdByIndicator','createDate');

        $output = $crud->render();
        $this->load->view('crud_view',$output);
    }

    function logout() {
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect('homepage','refresh');
    }
}