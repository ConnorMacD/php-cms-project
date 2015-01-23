<?php
/**
 * Created by PhpStorm.
 * User: Connor
 * Date: 1/20/2015
 * Time: 5:52 PM
 */

class Page {
    private $id;
    private $name;
    private $alias;
    private $description;
    private $createdByIndicator;
    private $creationDate;
    private $modifyByIndicator;
    private $modifyDate;


    public function __construct($in_id, $in_name, $in_alias) {
        $this->id = $in_id;
        $this->name = $in_name;
        $this->alias = $in_alias;
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
    public function getCreatedByIndicator()
    {
        return $this->createdByIndicator;
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


}
