<?php

namespace CentralBundle\Entity;

/**
 * Patient
 */
class Patient
{
    /**
     * @var integer
     */
    private $bedno;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $gender;

    /**
     * @var string
     */
    private $nic;

    /**
     * @var \DateTime
     */
    private $birthdate;

    /**
     * @var integer
     */
    private $phonenumber;

    /**
     * @var string
     */
    private $address;

    /**
     * @var \DateTime
     */
    private $admitteddate;

    /**
     * @var \DateTime
     */
    private $dischargeddate;

    /**
     * @var string
     */
    private $reasontoadmit;

    /**
     * @var integer
     */
    private $bhtNo;


    /**
     * Set bedno
     *
     * @param integer $bedno
     *
     * @return Patient
     */
    public function setBedno($bedno)
    {
        $this->bedno = $bedno;

        return $this;
    }

    /**
     * Get bedno
     *
     * @return integer
     */
    public function getBedno()
    {
        return $this->bedno;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Patient
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
     * Set gender
     *
     * @param string $gender
     *
     * @return Patient
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender
     *
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set nic
     *
     * @param string $nic
     *
     * @return Patient
     */
    public function setNic($nic)
    {
        $this->nic = $nic;

        return $this;
    }

    /**
     * Get nic
     *
     * @return string
     */
    public function getNic()
    {
        return $this->nic;
    }

    /**
     * Set birthdate
     *
     * @param \DateTime $birthdate
     *
     * @return Patient
     */
    public function setBirthdate($birthdate)
    {
        $this->birthdate = $birthdate;

        return $this;
    }

    /**
     * Get birthdate
     *
     * @return \DateTime
     */
    public function getBirthdate()
    {
        return $this->birthdate;
    }

    /**
     * Set phonenumber
     *
     * @param integer $phonenumber
     *
     * @return Patient
     */
    public function setPhonenumber($phonenumber)
    {
        $this->phonenumber = $phonenumber;

        return $this;
    }

    /**
     * Get phonenumber
     *
     * @return integer
     */
    public function getPhonenumber()
    {
        return $this->phonenumber;
    }

    /**
     * Set address
     *
     * @param string $address
     *
     * @return Patient
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set admitteddate
     *
     * @param \DateTime $admitteddate
     *
     * @return Patient
     */
    public function setAdmitteddate($admitteddate)
    {
        $this->admitteddate = $admitteddate;

        return $this;
    }

    /**
     * Get admitteddate
     *
     * @return \DateTime
     */
    public function getAdmitteddate()
    {
        return $this->admitteddate;
    }

    /**
     * Set dischargeddate
     *
     * @param \DateTime $dischargeddate
     *
     * @return Patient
     */
    public function setDischargeddate($dischargeddate)
    {
        $this->dischargeddate = $dischargeddate;

        return $this;
    }

    /**
     * Get dischargeddate
     *
     * @return \DateTime
     */
    public function getDischargeddate()
    {
        return $this->dischargeddate;
    }

    /**
     * Set reasontoadmit
     *
     * @param string $reasontoadmit
     *
     * @return Patient
     */
    public function setReasontoadmit($reasontoadmit)
    {
        $this->reasontoadmit = $reasontoadmit;

        return $this;
    }

    /**
     * Get reasontoadmit
     *
     * @return string
     */
    public function getReasontoadmit()
    {
        return $this->reasontoadmit;
    }

    /**
     * Get bhtNo
     *
     * @return integer
     */
    public function getBhtNo()
    {
        return $this->bhtNo;
    }
}

