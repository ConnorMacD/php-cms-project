<?php
/**
 * Created by PhpStorm.
 * User: Connor
 * Date: 1/20/2015
 * Time: 7:51 PM
 */

require_once ('ContentArea.php');

class contentarea_model extends CI_Model {

    public function getContentAreas() {
        $query = $this->db->query('SELECT * FROM contentarea');

        foreach($query->result_array() as $row) {
            $contentAreas[] = new ContentArea($row['id'], $row['name'],$row['alias']);

        }
        return $contentAreas;
    }
}