<?php

namespace CentralBundle\Entity;

/**
 * Hospital
 */
class Hospital
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var integer
     */
    private $vacancies;

    /**
     * @var string
     */
    private $oxygensupply;

    /**
     * @var string
     */
    private $artificialrespiraton;

    /**
     * @var string
     */
    private $cardiacmonitor;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set name
     *
     * @param string $name
     *
     * @return Hospital
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
     * Set vacancies
     *
     * @param integer $vacancies
     *
     * @return Hospital
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
     * Set oxygensupply
     *
     * @param string $oxygensupply
     *
     * @return Hospital
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
     * Set artificialrespiraton
     *
     * @param string $artificialrespiraton
     *
     * @return Hospital
     */
    public function setArtificialrespiraton($artificialrespiraton)
    {
        $this->artificialrespiraton = $artificialrespiraton;

        return $this;
    }

    /**
     * Get artificialrespiraton
     *
     * @return string
     */
    public function getArtificialrespiraton()
    {
        return $this->artificialrespiraton;
    }

    /**
     * Set cardiacmonitor
     *
     * @param string $cardiacmonitor
     *
     * @return Hospital
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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}

