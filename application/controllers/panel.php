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
     * TODO: Add more style to the back-end panel
     * TODO: 'change password' form.
     * */

    function stylesheets() {
        if($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            if (in_array(2, $session_data['roles'])) {

                //Make the object. use this object type
                $crud = new ajax_grocery_CRUD();

                //set table. Then set columns. Can be done in one line or 2.
                $crud->set_table('stylesheet')
                    ->columns('name', 'content', 'description', 'activeState',
                        'createsByIndicator', 'creationDate', 'lastModifyBy',
                        'modifyDate');
                //adds the relations. Format: set_relation('columnThatShouldBeRelated', 'tableThatIsRelated', 'columnThatHasRelatedData');
                //So in this case, the createsByIndicator relates to the 'user' table, and will show 'username' on a related field.

                //$crud->field_type('createsByIndicator','hidden');
                $crud->field_type('createdByIndicator','readonly','');
                $crud->field_type('modifyBy','readonly','');
                $crud->field_type('creationDate', 'hidden', date("Y-m-d H:i:s"));
                $crud->field_type('modifyDate', 'hidden', date("Y-m-d H:i:s"));

                $session_data = $this->session->userdata('logged_in');
                $crud->set_relation('createsByIndicator', 'users', 'username', null, null, $default_value = $session_data['id']);
                $crud->set_relation('lastModifyBy', 'users', 'username', null, null, $default_value = $session_data['id']);

                //set callbacks
                $crud->callback_before_insert(array($this, '_on_stylesheet_create'));
                $crud->callback_before_update(array($this, '_on_stylesheet_update'));

                //$crud->field_type('createsByIndicator','dropdown', 1);
                //Controls what fields are shown on the 'add' stylesheets page.
                $crud->add_fields('name', 'content', 'description', 'activeState', 'createsByIndicator', 'creationDate');
                $crud->edit_fields('name', 'content', 'description', 'activeState', 'lastModifyBy', 'modifyDate');

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


                //this renders the crud view. We put it in $output as whats returned is an array.
                $output = $crud->render();

                //$output is sent along as data with the view.
                $this->load->view('crud_view', $output);


                //and that's it!

            } else {
                    //No session? No access.
                    redirect('login','refresh');
            }
        } else {
            //No session? No access.
            redirect('login','refresh');
        }
    }

    function pages() {

        if($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            if (in_array(2, $session_data['roles'])) {
                $crud = new ajax_grocery_CRUD();
                $crud->set_table('pages');
                $session_data = $this->session->userdata('logged_in');
                $crud->set_relation('createdByIndicator','users', 'username',null,null,$default_value = $session_data['id']);
                $crud->set_relation('modifyByIndicator','users', 'username',null,null,$default_value = $session_data['id']);

                $crud->field_type('modifyDate','hidden',date("Y-m-d H:i:s"));
                $crud->field_type('creationDate','hidden',date("Y-m-d H:i:s"));
                $crud->add_fields('name','alias','description','createdByIndicator','creationDate');

                $output = $crud->render();
                $this->load->view('crud_view',$output);
            } else {
                //No session? No access.
                redirect('login','refresh');
            }
        } else {
            //No session? No access.
            redirect('login','refresh');
        }

    }


    function articles() {

        if($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            if (in_array(2, $session_data['roles'])) {
                $crud = new ajax_grocery_CRUD();
                $crud->set_table('articles');
                $session_data = $this->session->userdata('logged_in');
                $crud->set_relation('contentArea_id', 'contentarea','name');
                $crud->set_relation('page_id', 'pages', 'name');
                $crud->set_relation('createdByIndicator','users','username');
                $crud->set_relation('ModifyBy','users','username');
                $crud->add_fields('title', 'description','contentArea_id','page_id','allPages','body','createdByIndicator','createdate');
                $crud->edit_fields('title','description','contentArea_id','page_id','allPages','body','modifyBy','modifyDate');

                $crud->callback_before_insert(array($this, '_on_article_create'));
                $crud->callback_before_update(array($this, '_on_article_update'));

                $crud->field_type('createdByIndicator','readonly',123);
                $crud->field_type('modifyBy','readonly',123);
                $crud->field_type('modifyDate','hidden',date("Y-m-d H:i:s"));
                $crud->field_type('createdate','hidden',date("Y-m-d H:i:s"));

                $output = $crud->render();
                $this->load->view('crud_view',$output);

            } else {
                //No session? No access.
                redirect('login','refresh');
            }
        } else {
            //No session? No access.
            redirect('login','refresh');
        }
    }


    function contentarea() {
        if($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            if (in_array(2, $session_data['roles'])) {
                $crud = new ajax_grocery_CRUD();
                $session_data = $this->session->userdata('logged_in');
                $crud->set_table('contentarea');
                $crud->set_subject('contentarea');
                $crud->set_relation('creatByIndicator','users', 'username');
                $crud->set_relation('modifyByIndicator','users', 'username');
                $crud->add_fields('name','alias','description','creatByIndicator','creationDate');
                $crud->edit_fields('name','alias','description','modifyByIndicator','modifyDate');

                $crud->callback_before_insert(array($this, 'on_contentarea_create'));
                $crud->callback_before_update(array($this, 'on_contentarea_update'));

                $crud->field_type('creatByIndicator','readonly','');
                $crud->field_type('modifyByIndicator','readonly','');
                $crud->field_type('modifyDate','hidden',date("Y-m-d H:i:s"));
                $crud->field_type('creationDate','hidden',date("Y-m-d H:i:s"));

                $output = $crud->render();
                $this->load->view('crud_view',$output);

            } else {
                //No session? No access.
                redirect('login','refresh');
            }
        } else {
            //No session? No access.
            redirect('login','refresh');
        }
    }

    function users() {

        if($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            if (in_array(3, $session_data['roles'])) {

                $crud = new ajax_grocery_CRUD();

                $crud->set_table('users');
                $crud->set_subject('users');
                $crud->required_fields('username', 'firstName', 'lastName');
                $crud->set_relation('createdByIndicator', 'users', 'username');
                $crud->set_relation('modifyByIndicator', 'users', 'username');
                $crud->add_fields('username', 'firstName', 'lastName', 'password', 'createdByIndicator', 'creationDate');
                $crud->edit_fields('firstName', 'lastName', 'password', 'modifyByIndicator', 'modifyDate');

                $crud->callback_edit_field('password', array($this, 'prevent_user_password_edit'));
                $crud->callback_before_insert(array($this, '_hash_password_before_insert'));
                $crud->callback_before_update(array($this, '_on_user_changed'));

                $crud->field_type('createdByIndicator', 'readonly', 1);
                $crud->field_type('modifyByIndicator', 'readonly', 1);
                $crud->field_type('modifyDate', 'hidden', date("Y-m-d H:i:s"));
                $crud->field_type('creationDate', 'hidden', date("Y-m-d H:i:s"));
                $output = $crud->render();
                $this->load->view('crud_view', $output);

            } else {
                //No session? No access.
                redirect('login','refresh');
            }
        } else {
            //No session? No access.
            redirect('login','refresh');
        }
    }


    //roles crud
    function roles() {
        //add quick checking
        $crud = new grocery_CRUD();

        $crud->set_table('users_roles');
        $crud->set_subject('role');

        $crud->set_relation('user_id','users','username');
        $crud->set_relation('roles_id','roles','name');

        $output = $crud->render();

        $this->load->view('crud_view',$output);
    }


    //articles callbacks
    //--------------------------------------------------------
    function _on_article_create($post_array) {
        $session_data = $this->session->userdata('logged_in');

        $post_array['createdByIndicator'] = $session_data['id'];

        return $post_array;
    }

    function _on_article_update($post_array) {
        $session_data = $this->session->userdata('logged_in');
        $post_array['modifyBy'] = $session_data['id'];
        return $post_array;
    }

    //pages callbacks
    //--------------------------------------------------------

    function _on_page_create($post_array) {
        $session_data = $this->session->userdata('logged_in');

        $post_array['createdByIndicator'] = $session_data['id'];

        return $post_array;
    }

    function _on_page_update($post_array) {
        $session_data = $this->session->userdata('logged_in');

        $post_array['modifyBy'] = $session_data['id'];

        return $post_array;
    }

    //users callbacks
    //--------------------------------------------------------

    //stops the user from changing the password.
    function prevent_user_password_edit() {
        return "Please use the 'Change User Password' option to change passwords.";
    }


    //THIS IS FOR ON-ADD
    function _hash_password_before_insert($post_array) {
        $options = array('cost'=>15);
        $post_array['password'] = password_hash($post_array['password'],PASSWORD_DEFAULT, $options);
        $session_data = $this->session->userdata('logged_in');
        $post_array['createdByIndicator'] = (int) $session_data['id'];
        return $post_array;
    }

    //THIS IS FOR ON-EDIT

    function _on_user_changed($post_array) {
        $session_data = $this->session->userdata('logged_in');

        $post_array['modifyByIndicator'] = (int) $session_data['id'];
        return $post_array;
    }


    //stylesheets callbacks
    //---------------------------------------------------------

    function _on_stylesheet_create($post_array) {
        $session_data = $this->session->userdata('logged_in');

        $post_array['createsByIndicator'] = $session_data['id'];
        return $post_array;
    }

    function _on_stylesheet_update($post_array) {
        $session_data = $this->session->userdata('logged_in');

        $post_array['lastModifyBy'] = $session_data['id'];
        return $post_array;
    }

    //contentarea callbacks
    //---------------------------------------------------------

    function on_contentarea_create($post_array) {
        $session_data = $this->session->userdata('logged_in');

        $post_array['creatByIndicator'] = (int) $session_data['id'];

        return $post_array;
    }

    function on_contentarea_update($post_array) {
        $session_data = $this->session->userdata('logged_in');
        $post_array['modifyByIndicator'] = (int) $session_data['id'];
        return $post_array;
    }

    //-----------------------------------------------------------

    function logout() {
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect('homepage','refresh');
    }
}
