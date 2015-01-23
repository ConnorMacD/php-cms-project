<?php
/**
 * Created by PhpStorm.
 * User: Connor
 * Date: 1/20/2015
 * Time: 7:55 PM
 */


class ContentArea extends CI_Model {
    private $id;
    private $name;
    private $alias;
    private $description;
    private $creatByIndicator;
    private $creationDate;
    private $modifyByIndicator;

    function __construct($id, $name, $alias) {
        $this->id = $id;
        $this->name = $name;
        $this->alias = $alias;
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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getAlias()
    {
        return $this->alias;
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
    public function getCreatByIndicator()
    {
        return $this->creatByIndicator;
    }

    /**
     * @return mixed
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * @return mixed
     */
    public function getModifyByIndicator()
    {
        return $this->modifyByIndicator;
    }

    /**
     * @return mixed
     */
    public function getModifyDate()
    {
        return $this->modifyDate;
    }
    private $modifyDate;


}