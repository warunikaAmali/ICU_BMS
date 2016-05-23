<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Bed
 *
 * @ORM\Table(name="bed", indexes={@ORM\Index(name="hospital_id", columns={"hospital_id"}), @ORM\Index(name="hospital_id_2", columns={"hospital_id"})})
 * @ORM\Entity
 */
class Bed
{
    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=8, nullable=false)
     */
    private $status;

    /**
     * @var string
     *
     * @ORM\Column(name="oxygenSupply", type="string", length=15, nullable=false)
     */
    private $oxygensupply;

    /**
     * @var string
     *
     * @ORM\Column(name="artificialRespiration", type="string", length=15, nullable=false)
     */
    private $artificialrespiration;

    /**
     * @var string
     *
     * @ORM\Column(name="cardiacMonitor", type="string", length=15, nullable=false)
     */
    private $cardiacmonitor;

    /**
     * @var integer
     *
     * @ORM\Column(name="bedNo", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
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
     * Set status
     *
     * @param string $status
     *
     * @return Bed
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set oxygensupply
     *
     * @param string $oxygensupply
     *
     * @return Bed
     */
    public function setOxygensupply($oxygensupply)
    {
        $this->oxygensupply = $oxygensupply;

        return $this;
    }

    /**
     * Get oxygensupply
     *
     * @return string
     */
    public function getOxygensupply()
    {
        return $this->oxygensupply;
    }

    /**
     * Set artificialrespiration
     *
     * @param string $artificialrespiration
     *
     * @return Bed
     */
    public function setArtificialrespiration($artificialrespiration)
    {
        $this->artificialrespiration = $artificialrespiration;

        return $this;
    }

    /**
     * Get artificialrespiration
     *
     * @return string
     */
    public function getArtificialrespiration()
    {
        return $this->artificialrespiration;
    }

    /**
     * Set cardiacmonitor
     *
     * @param string $cardiacmonitor
     *
     * @return Bed
     */
    public function setCardiacmonitor($cardiacmonitor)
    {
        $this->cardiacmonitor = $cardiacmonitor;

        return $this;
    }

    /**
     * Get cardiacmonitor
     *
     * @return string
     */
    public function getCardiacmonitor()
    {
        return $this->cardiacmonitor;
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
     * Set hospital
     *
     * @param \AppBundle\Entity\Icu $hospital
     *
     * @return Bed
     */
    public function setHospital(\AppBundle\Entity\Icu $hospital = null)
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
