<?php
/**
 * Created by PhpStorm.
 * User: Connor
 * Date: 1/20/2015
 * Time: 8:14 PM
 */

class Article {
    private $id;
    private $title;
    private $body;
    private $description;
    private $contentAreaId;

    function __construct($id, $title, $body, $description, $area)
    {
        $this->id = $id;
        $this->title = $title;
        $this->body = $body;
        $this->description = $description;
        $this->contentAreaId = $area;
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
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getContentAreaId()
    {
        return $this->contentAreaId;
    }


}