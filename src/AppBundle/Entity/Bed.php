<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Bed
 *
 * @ORM\Table(name="bed")
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
    private $oxygenSupply;

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
    public function setOxygenSupply($oxygensupply)
    {
        $this->oxygenSupply = $oxygensupply;

        return $this;
    }

    /**
     * Get oxygensupply
     *
     * @return string
     */
    public function getOxygenSupply()
    {
        return $this->oxygenSupply;
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
     * @var string
     */
    private $oxygensypply;



    /**
     * Set oxygensypply
     *
     * @param string $oxygensypply
     *
     * @return Bed
     */
    public function setOxygensypply($oxygensypply)
    {
        $this->oxygensypply = $oxygensypply;

        return $this;
    }

    /**
     * Get oxygensypply
     *
     * @return string
     */
    public function getOxygensypply()
    {
        return $this->oxygensypply;
    }
    /**
     * @var string
     */
    private $oxygensupply;


}
