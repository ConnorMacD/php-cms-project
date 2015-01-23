<?php
/**
 * Created by PhpStorm.
 * User: Connor
 * Date: 1/20/2015
 * Time: 8:03 PM
 */

class Stylesheet {
    private $id;
    private $content;

    function __construct($id, $content)
    {
        $this->id = $id;
        $this->content = $content;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }



}