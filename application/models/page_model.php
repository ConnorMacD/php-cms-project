<?php
/**
 * Created by PhpStorm.
 * User: Connor
 * Date: 1/20/2015
 * Time: 5:35 PM
 */

require_once 'Page.php';

class Page_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function getPageByAlias($pageAlias) {
        $query = $this->db->query(('SELECT * FROM pages WHERE pages.alias = ?'),array($pageAlias));

        foreach($query->result_array() as $row) {
            $page = new Page($row['id'], $row['name'],$row['alias']);
        }
        return $page;
    }

    public function getAllPages() {
        $query = $this->db->query(('SELECT * FROM pages'));

        foreach($query->result_array() as $row) {
            $pages[] = new Page($row['id'], $row['name'],$row['alias']);
        }
        return $pages;
    }
}

