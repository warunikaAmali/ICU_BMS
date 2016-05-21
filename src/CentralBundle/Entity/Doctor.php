<?php

namespace CentralBundle\Entity;

/**
 * Doctor
 */
class Doctor
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $speciallity;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set name
     *
     * @param string $name
     *
     * @return Doctor
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return Doctor
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set speciallity
     *
     * @param string $speciallity
     *
     * @return Doctor
     */
    public function setSpeciallity($speciallity)
    {
        $this->speciallity = $speciallity;

        return $this;
    }

    /**
     * Get speciallity
     *
     * @return string
     */
    public function getSpeciallity()
    {
        return $this->speciallity;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}

