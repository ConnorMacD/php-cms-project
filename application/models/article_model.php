<?php
/**
 * Created by PhpStorm.
 * User: Connor
 * Date: 1/20/2015
 * Time: 8:06 PM
 */

require_once 'Article.php';

class article_model extends CI_Model {
    public function getAllArticlesByPageID($page) {
        $query = $this->db->query('SELECT * FROM articles WHERE page_id = '.$page.' OR allPages = 1 ORDER BY articles.createDate ASC');

        foreach($query->result_array() as $row) {
            $articles[] = new Article($row['id'], $row['title'],$row['body'],$row['allPages'],$row['description'],$row['contentArea_id']);
        }

        return $articles;
    }
}


