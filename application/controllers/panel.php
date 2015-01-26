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
            $data['username'] = $session_data['username'];
            $this->load->view('panel', $data);
        } else {
            //No session? No access.
            redirect('login','refresh');
        }
    }

    function logout() {
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect('homepage','refresh');
    }
}