<?php
/**
 * Created by PhpStorm.
 * User: hashedtox
 * Date: 23/01/15
 * Time: 9:43 AM
 */

class user_model extends CI_Model {

    public function getUserByUsername($user) {
        $this->db->select('id, firstName, lastName, username, password, createdByIndicator,
        creationDate, modifyByIndicator, modifyDate');
        $this->db->from('users');
        $this->db->where('username',$user);
        $this->db->limit(1);

        $query = $this->db->get()->result_array();

        $this->db->select('roles_id');
        $this->db->from('users_roles');
        $this->db->where('user_id',$query['id']);

        $roleArray = $this->db->get()->result_array();

        $user = new User($query['id'], $query['firstName'], $query['lastName'], $query['username'], $query['password'],
            $roleArray, $query['createdByIndicator'], $query['creationDate'], $query['modifyByIndicator'], $query['modifyDate']);

        return $user;
    }
}