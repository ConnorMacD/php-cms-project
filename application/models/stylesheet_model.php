<?php
/**
 * Created by PhpStorm.
 * User: Connor
 * Date: 1/20/2015
 * Time: 7:58 PM
 */

include_once 'Stylesheet.php';

class StyleSheet_model extends CI_Model {
    public function getActiveStyleSheet() {
        $query = $this->db->query('SELECT * FROM stylesheet WHERE activeState = 1');

        foreach($query->result_array() as $row) {
            $page = new Stylesheet($row['id'], $row['content']);
        }
        return $page;
    }
}