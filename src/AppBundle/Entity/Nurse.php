<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Nurse
 *
 * @ORM\Table(name="nurse")
 * @ORM\Entity
 */
class Nurse
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
     * @var \DateTime
     *
     * @ORM\Column(name="shift", type="time", nullable=false)
     */
    private $shift;

    /**
     * @var integer
     *
     * @ORM\Column(name="hospital_id", type="integer", nullable=false)
     */
    private $hospitalId;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set name
     *
     * @param string $name
     *
     * @return Nurse
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
     * @return Nurse
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
     * Set shift
     *
     * @param \DateTime $shift
     *
     * @return Nurse
     */
    public function setShift($shift)
    {
        $this->shift = $shift;

        return $this;
    }

    /**
     * Get shift
     *
     * @return \DateTime
     */
    public function getShift()
    {
        return $this->shift;
    }

    /**
     * Set hospitalId
     *
     * @param integer $hospitalId
     *
     * @return Nurse
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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}
