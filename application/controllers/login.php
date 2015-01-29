<?php
/**
 * Created by PhpStorm.
 * User: hashedtox
 * Date: 23/01/15
 * Time: 9:11 AM
 */

class Login extends CI_Controller
{

    function index()
    {

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->load->view('login');

    }
}