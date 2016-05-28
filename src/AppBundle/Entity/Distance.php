<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Distance
 *
 * @ORM\Table(name="distance", indexes={@ORM\Index(name="location2", columns={"location2"}), @ORM\Index(name="location1", columns={"location1"})})
 * @ORM\Entity
 */
class Distance
{
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
     * @var \AppBundle\Entity\Icu
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Icu")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="location1", referencedColumnName="id")
     * })
     */
    private $location1;

    /**
     * @var \AppBundle\Entity\Icu
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Icu")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="location2", referencedColumnName="id")
     * })
     */
    private $location2;



    /**
     * Set distance
     *
     * @param integer $distance
     *
     * @return Distance
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

    /**
     * Set location1
     *
     * @param \AppBundle\Entity\Icu $location1
     *
     * @return Distance
     */
    public function setLocation1(\AppBundle\Entity\Icu $location1 = null)
    {
        $this->location1 = $location1;

        return $this;
    }

    /**
     * Get location1
     *
     * @return \AppBundle\Entity\Icu
     */
    public function getLocation1()
    {
        return $this->location1;
    }

    /**
     * Set location2
     *
     * @param \AppBundle\Entity\Icu $location2
     *
     * @return Distance
     */
    public function setLocation2(\AppBundle\Entity\Icu $location2 = null)
    {
        $this->location2 = $location2;

        return $this;
    }

    /**
     * Get location2
     *
     * @return \AppBundle\Entity\Icu
     */
    public function getLocation2()
    {
        return $this->location2;
    }
}
