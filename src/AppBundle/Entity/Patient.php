<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Patient
 *
 * @ORM\Table(name="patient", indexes={@ORM\Index(name="FOREIGN", columns={"bedNo"}), @ORM\Index(name="hospital_id", columns={"hospital_id"})})
 * @ORM\Entity
 */
class Patient
{
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=30, nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="gender", type="string", length=6, nullable=false)
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
     * @ORM\Column(name="birthDate", type="date", nullable=true)
     */
    private $birthdate;

    /**
     * @var integer
     *
     * @ORM\Column(name="phoneNumber", type="integer", nullable=true)
     */
    private $phonenumber;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=50, nullable=true)
     */
    private $address;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="admittedDate", type="date", nullable=false)
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
     * @ORM\Column(name="reasonToAdmit", type="string", length=15, nullable=false)
     */
    private $reasontoadmit;

    /**
     * @var integer
     *
     * @ORM\Column(name="patient_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $patientId;

    /**
     * @var \AppBundle\Entity\Bed
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Bed")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="bedNo", referencedColumnName="bedNo")
     * })
     */
    private $bedno;

    /**
     * @var \AppBundle\Entity\Icu
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Icu")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="hospital_id", referencedColumnName="id")
     * })
     */
    private $hospital;



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
     * Get patientId
     *
     * @return integer
     */
    public function getPatientId()
    {
        return $this->patientId;
    }

    /**
     * Set bedno
     *
     * @param \AppBundle\Entity\Bed $bedno
     *
     * @return Patient
     */
    public function setBedno($bedno )
    {
        $this->bedno = $bedno;

        return $this;
    }

    /**
     * Get bedno
     *
     * @return \AppBundle\Entity\Bed
     */
    public function getBedno()
    {
        return $this->bedno;
    }

    /**
     * Set hospital
     *
     * @param \AppBundle\Entity\Icu $hospital
     *
     * @return Patient
     */
    public function setHospital(\AppBundle\Entity\Icu $hospital)
    {
        $this->hospital = $hospital;

        return $this;
    }

    /**
     * Get hospital
     *
     * @return \AppBundle\Entity\Icu
     */
    public function getHospital()
    {
        return $this->hospital;
    }
}
