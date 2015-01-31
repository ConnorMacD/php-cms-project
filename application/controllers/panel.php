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

    /*
     * TODO: Add authentication to all CRUD elements when finished
     * TODO: Add more style to the back-end panel
     * */

    function stylesheets() {

        //Make the object. use this object type
        $crud = new ajax_grocery_CRUD();

        //set table. Then set columns. Can be done in one line or 2.
        $crud->set_table('stylesheet')
             ->columns('name','content','description','activeState',
                 'createsByIndicator', 'creationDate','lastModifyBy',
                 'modifyDate');
        //adds the relations. Format: set_relation('columnThatShouldBeRelated', 'tableThatIsRelated', 'columnThatHasRelatedData');
        //So in this case, the createsByIndicator relates to the 'user' table, and will show 'username' on a related field.
        $crud->set_relation('createsByIndicator','users', 'username');
        //Controls what fields are shown on the 'add' stylesheets page.
        $crud->add_fields('name','content','description','activeState','createsByIndicator','creationDate');

        //$session_data = $this->session->userdata('logged_in');
        //will be using the stored session's id to automatically assign the ID.
        //time will be saved as TEXT, because DATETIME has a specific format.
        //this may not fully work until you set all DATETIME fields to TEXT.

        //field_type sets a 'default' value on a specific type.
        //Here, we use it on 'createsByIndicator'. 'hidden' causes it to not be shown.
        //We hide it so the user doesn't have to worry about it.
        //The third parameter will be what that field is set to.
        //Because no logins are set currently when accessing this page, the default is userid:1.
        //It will be changed to grab the current session's later when its more set up.

        $crud->field_type('createsByIndicator','hidden',1);
        $crud->field_type('creationDate','hidden','date');


        //this renders the crud view. We put it in $output as whats returned is an array.
        $output = $crud->render();

        //$output is sent along as data with the view.
        $this->load->view('crud_view',$output);


        //and that's it!

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