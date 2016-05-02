<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Patient
 *
 * @ORM\Table(name="patient", indexes={@ORM\Index(name="FOREIGN", columns={"bedNo"})})
 * @ORM\Entity
 */
class Patient
{
    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Bed")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="bedNo", referencedColumnName="bedNo")
     * })
     */
    private $bedno;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=30, nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="gender", type="string", length=6, nullable=true)
     */
    private $gender;


    /**
     * @var string
     *
     * @ORM\Column(name="nic", type="string", length=11, nullable=false)
     */
    private $nic;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="birthDate", type="date", nullable=false)
     */
    private $birthDate;

    /**
     * @var integer
     *
     * @ORM\Column(name="phoneNumber", type="integer", length=10, nullable=false)
     */
    private $phonenumber;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=50, nullable=false)
     */
    private $address;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="admittedDate", type="date", nullable=true)
     */
    private $admitteddate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dischargedDate", type="date", nullable=true)
     */
    private $dischargeddate;

    /**
     * @var string
     *
     * @ORM\Column(name="reasonToAdmit", type="string", length=15, nullable=true)
     */
    private $reasontoadmit;

    /**
     * @var integer
     *
     * @ORM\Column(name="BHT_No", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
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
        $this->name = $gender;

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
     * Set birthDate
     *
     * @param \DateTime $birthDate
     *
     * @return Patient
     */
    public function setBirthDate($birthDate)
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    /**
     * Get birthDate
     *
     * @return \DateTime
     */
    public function getBirthDate()
    {
        return $this->birthDate;
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

    /**
     * Set bhtNo
     *
     * @param integer $bhtNo
     *
     * @return Patient
     */
    public function setBhtNo($bhtNo)
    {
        $this->bhtNo = $bhtNo;

        return $this;
    }
    /**
     * @var \DateTime
     */
    private $birthdate;


}
