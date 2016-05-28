<?php

namespace AppBundle\Entity;

/**
 * Distance
 */
class Distance
{
    /**
     * @var integer
     */
    private $distance;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \AppBundle\Entity\Icu
     */
    private $location1;

    /**
     * @var \AppBundle\Entity\Icu
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

