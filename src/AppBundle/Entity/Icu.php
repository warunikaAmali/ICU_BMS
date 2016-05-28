<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Icu
 *
 * @ORM\Table(name="icu")
 * @ORM\Entity
 */
class Icu
{
    /**
     * @var string
     *
     * @ORM\Column(name="hospital", type="string", length=50, nullable=false)
     */
    private $hospital;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=60, nullable=false)
     */
    private $address;

    /**
     * @var integer
     *
     * @ORM\Column(name="phoneNumber", type="integer", nullable=false)
     */
    private $phonenumber;

    /**
     * @var integer
     *
     * @ORM\Column(name="vacancies", type="integer", nullable=false)
     */
    private $vacancies;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set hospital
     *
     * @param string $hospital
     *
     * @return Icu
     */
    public function setHospital($hospital)
    {
        $this->hospital = $hospital;

        return $this;
    }

    /**
     * Get hospital
     *
     * @return string
     */
    public function getHospital()
    {
        return $this->hospital;
    }

    /**
     * Set address
     *
     * @param string $address
     *
     * @return Icu
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
     * Set phonenumber
     *
     * @param integer $phonenumber
     *
     * @return Icu
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
     * Set vacancies
     *
     * @param integer $vacancies
     *
     * @return Icu
     */
    public function setVacancies($vacancies)
    {
        $this->vacancies = $vacancies;

        return $this;
    }

    /**
     * Get vacancies
     *
     * @return integer
     */
    public function getVacancies()
    {
        return $this->vacancies;
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
