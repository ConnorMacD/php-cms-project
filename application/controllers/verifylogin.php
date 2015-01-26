<?php
/**
 * Created by PhpStorm.
 * User: hashedtox
 * Date: 23/01/15
 * Time: 10:47 AM
 */

class VerifyLogin extends CI_Controller {

//    function __construct() {
//        //parent::_construct();
//        $this->load->model('user_model');
//    }

    function index() {

        //we need to verify our input is O-K!
        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', 'Username', "trim|required|xss_clean");
        $this->form_validation->set_rules('password', 'Password', "trim|required|xss_clean|callback_check_database");

        if ($this->form_validation->run() == false) {
            $this->load->view('login');
        } else {
            redirect('panel', 'refresh');
        }
    }

    function check_database($password) {

        $this->load->model('user_model');


        $username = $this->input->post('username');

        $userObject = $this->user_model->getUserByUsername($username);

        if ($userObject) {
            $session_array = array();
            if(password_verify($password,$userObject->getPassword())) {
                $userRoles = $userObject->getRoles();
                if (in_array(2, $userRoles) || in_array(3, $userRoles)) {
                    $session_array = array(
                        'id' => $userObject->getId(),
                        'roles' => $userObject->getRoles(),
                        'username' => $userObject->getUsername(),
                        'name' => $userObject->getFirstName() + $userObject->getLastName()
                    );
                    $this->session->set_userdata('logged_in', $session_array);
                    return true;
                } else {
                    $this->form_validation->set_message('check_database', 'You currently do not a role that allows you to log in here.');
                    return false;
                }
            } else {
                $this->form_validation->set_message('check_database', 'The provided username or password is incorrect or does not exist.');
                return false;
            }
        } else {
            $this->form_validation->set_message('check_database', 'The provided username or password is incorrect or does not exist.');
            return false;
        }

    }
}