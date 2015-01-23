<?php
/**
 * Created by PhpStorm.
 * User: hashedtox
 * Date: 23/01/15
 * Time: 9:16 AM
 */

class User {
    private $id;
    private $firstName;
    private $lastName;
    private $username;
    private $password;
    private $roles;
    private $createdByIndicator;
    private $creationDate;
    private $modifyByIndicator;
    private $modifyDate;

    function __construct($id, $firstName, $lastName, $username, $password, $roles, $createdByIndicator, $creationDate, $modifyByIndicator, $modifyDate)
    {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->username = $username;
        $this->password = $password;
        $this->roles = $roles;
        $this->createdByIndicator = $createdByIndicator;
        $this->creationDate = $creationDate;
        $this->modifyByIndicator = $modifyByIndicator;
        $this->modifyDate = $modifyDate;
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
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return mixed
     */
    public function getRoles()
    {
        return $this->roles;
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