<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Disance
 *
 * @ORM\Table(name="disance")
 * @ORM\Entity
 */
class Disance
{
    /**
     * @var string
     *
     * @ORM\Column(name="fromH", type="string", length=50, nullable=false)
     */
    private $fromh;

    /**
     * @var string
     *
     * @ORM\Column(name="toH", type="string", length=50, nullable=false)
     */
    private $toh;

    /**
     * @var integer
     *
     * @ORM\Column(name="distance", type="integer", nullable=false)
     */
    private $distance;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set fromh
     *
     * @param string $fromh
     *
     * @return Disance
     */
    public function setFromh($fromh)
    {
        $this->fromh = $fromh;

        return $this;
    }

    /**
     * Get fromh
     *
     * @return string
     */
    public function getFromh()
    {
        return $this->fromh;
    }

    /**
     * Set toh
     *
     * @param string $toh
     *
     * @return Disance
     */
    public function setToh($toh)
    {
        $this->toh = $toh;

        return $this;
    }

    /**
     * Get toh
     *
     * @return string
     */
    public function getToh()
    {
        return $this->toh;
    }

    /**
     * Set distance
     *
     * @param integer $distance
     *
     * @return Disance
     */
    public function setDistance($distance)
    {
        $this->distance = $distance;

        return $this;
    }

    /**
     * Get distance
     *
     * @return integer
     */
    public function getDistance()
    {
        return $this->distance;
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
