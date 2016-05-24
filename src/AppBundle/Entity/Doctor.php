<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Doctor
 *
 * @ORM\Table(name="doctor")
 * @ORM\Entity
 */
class Doctor
{
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=30, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=200, nullable=false)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="speciallity", type="string", length=30, nullable=false)
     */
    private $speciallity;

    /**
     * @var integer
     *
     * @ORM\Column(name="hospital_id", type="integer", nullable=false)
     */
    private $hospitalId;

    /**
     * @var \AppBundle\Entity\Icu
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Icu")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id", referencedColumnName="id")
     * })
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
     * Set hospitalId
     *
     * @param integer $hospitalId
     *
     * @return Doctor
     */
    public function setHospitalId($hospitalId)
    {
        $this->hospitalId = $hospitalId;

        return $this;
    }

    /**
     * Get hospitalId
     *
     * @return integer
     */
    public function getHospitalId()
    {
        return $this->hospitalId;
    }

    /**
     * Set id
     *
     * @param \AppBundle\Entity\Icu $id
     *
     * @return Doctor
     */
    public function setId(\AppBundle\Entity\Icu $id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get id
     *
     * @return \AppBundle\Entity\Icu
     */
    public function getId()
    {
        return $this->id;
    }
}
