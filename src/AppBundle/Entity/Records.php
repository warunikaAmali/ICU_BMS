<?php

namespace AppBundle\Entity;

/**
 * Records
 */
class Records
{
    /**
     * @var integer
     */
    private $bhtNo;

    /**
     * @var \DateTime
     */
    private $date = 'CURRENT_TIMESTAMP';

    /**
     * @var string
     */
    private $acuterenalfailure;

    /**
     * @var string
     */
    private $confirmedinfection;

    /**
     * @var string
     */
    private $vasoactivemedication;

    /**
     * @var string
     */
    private $invasivemedication;

    /**
     * @var string
     */
    private $noninvasivemedication;

    /**
     * @var string
     */
    private $dialysis;

    /**
     * @var string
     */
    private $dialysistype;

    /**
     * @var integer
     */
    private $heartrate;

    /**
     * @var integer
     */
    private $pulserate;

    /**
     * @var integer
     */
    private $bodytemperature;

    /**
     * @var string
     */
    private $paralysed;

    /**
     * @var string
     */
    private $spontaneousbreathing;

    /**
     * @var integer
     */
    private $bloodpressure;

    /**
     * @var integer
     */
    private $hydrogenstate;

    /**
     * @var integer
     */
    private $recno;


    /**
     * Set bhtNo
     *
     * @param integer $bhtNo
     *
     * @return Records
     */
    public function setBhtNo($bhtNo)
    {
        $this->bhtNo = $bhtNo;

        return $this;
    }

    /**
     * Get bhtNo
     *
     * @return integer
     */
    public function getBhtNo()
    {
        return $this->bhtNo;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Records
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set acuterenalfailure
     *
     * @param string $acuterenalfailure
     *
     * @return Records
     */
    public function setAcuterenalfailure($acuterenalfailure)
    {
        $this->acuterenalfailure = $acuterenalfailure;

        return $this;
    }

    /**
     * Get acuterenalfailure
     *
     * @return string
     */
    public function getAcuterenalfailure()
    {
        return $this->acuterenalfailure;
    }

    /**
     * Set confirmedinfection
     *
     * @param string $confirmedinfection
     *
     * @return Records
     */
    public function setConfirmedinfection($confirmedinfection)
    {
        $this->confirmedinfection = $confirmedinfection;

        return $this;
    }

    /**
     * Get confirmedinfection
     *
     * @return string
     */
    public function getConfirmedinfection()
    {
        return $this->confirmedinfection;
    }

    /**
     * Set vasoactivemedication
     *
     * @param string $vasoactivemedication
     *
     * @return Records
     */
    public function setVasoactivemedication($vasoactivemedication)
    {
        $this->vasoactivemedication = $vasoactivemedication;

        return $this;
    }

    /**
     * Get vasoactivemedication
     *
     * @return string
     */
    public function getVasoactivemedication()
    {
        return $this->vasoactivemedication;
    }

    /**
     * Set invasivemedication
     *
     * @param string $invasivemedication
     *
     * @return Records
     */
    public function setInvasivemedication($invasivemedication)
    {
        $this->invasivemedication = $invasivemedication;

        return $this;
    }

    /**
     * Get invasivemedication
     *
     * @return string
     */
    public function getInvasivemedication()
    {
        return $this->invasivemedication;
    }

    /**
     * Set noninvasivemedication
     *
     * @param string $noninvasivemedication
     *
     * @return Records
     */
    public function setNoninvasivemedication($noninvasivemedication)
    {
        $this->noninvasivemedication = $noninvasivemedication;

        return $this;
    }

    /**
     * Get noninvasivemedication
     *
     * @return string
     */
    public function getNoninvasivemedication()
    {
        return $this->noninvasivemedication;
    }

    /**
     * Set dialysis
     *
     * @param string $dialysis
     *
     * @return Records
     */
    public function setDialysis($dialysis)
    {
        $this->dialysis = $dialysis;

        return $this;
    }

    /**
     * Get dialysis
     *
     * @return string
     */
    public function getDialysis()
    {
        return $this->dialysis;
    }

    /**
     * Set dialysistype
     *
     * @param string $dialysistype
     *
     * @return Records
     */
    public function setDialysistype($dialysistype)
    {
        $this->dialysistype = $dialysistype;

        return $this;
    }

    /**
     * Get dialysistype
     *
     * @return string
     */
    public function getDialysistype()
    {
        return $this->dialysistype;
    }

    /**
     * Set heartrate
     *
     * @param integer $heartrate
     *
     * @return Records
     */
    public function setHeartrate($heartrate)
    {
        $this->heartrate = $heartrate;

        return $this;
    }

    /**
     * Get heartrate
     *
     * @return integer
     */
    public function getHeartrate()
    {
        return $this->heartrate;
    }

    /**
     * Set pulserate
     *
     * @param integer $pulserate
     *
     * @return Records
     */
    public function setPulserate($pulserate)
    {
        $this->pulserate = $pulserate;

        return $this;
    }

    /**
     * Get pulserate
     *
     * @return integer
     */
    public function getPulserate()
    {
        return $this->pulserate;
    }

    /**
     * Set bodytemperature
     *
     * @param integer $bodytemperature
     *
     * @return Records
     */
    public function setBodytemperature($bodytemperature)
    {
        $this->bodytemperature = $bodytemperature;

        return $this;
    }

    /**
     * Get bodytemperature
     *
     * @return integer
     */
    public function getBodytemperature()
    {
        return $this->bodytemperature;
    }

    /**
     * Set paralysed
     *
     * @param string $paralysed
     *
     * @return Records
     */
    public function setParalysed($paralysed)
    {
        $this->paralysed = $paralysed;

        return $this;
    }

    /**
     * Get paralysed
     *
     * @return string
     */
    public function getParalysed()
    {
        return $this->paralysed;
    }

    /**
     * Set spontaneousbreathing
     *
     * @param string $spontaneousbreathing
     *
     * @return Records
     */
    public function setSpontaneousbreathing($spontaneousbreathing)
    {
        $this->spontaneousbreathing = $spontaneousbreathing;

        return $this;
    }

    /**
     * Get spontaneousbreathing
     *
     * @return string
     */
    public function getSpontaneousbreathing()
    {
        return $this->spontaneousbreathing;
    }

    /**
     * Set bloodpressure
     *
     * @param integer $bloodpressure
     *
     * @return Records
     */
    public function setBloodpressure($bloodpressure)
    {
        $this->bloodpressure = $bloodpressure;

        return $this;
    }

    /**
     * Get bloodpressure
     *
     * @return integer
     */
    public function getBloodpressure()
    {
        return $this->bloodpressure;
    }

    /**
     * Set hydrogenstate
     *
     * @param integer $hydrogenstate
     *
     * @return Records
     */
    public function sethydrogenState($hydrogenstate)
    {
        $this->hydrogenstate = $hydrogenstate;

        return $this;
    }

    /**
     * Get hydrogenstate
     *
     * @return integer
     */
    public function gethydrogenState()
    {
        return $this->hydrogenstate;
    }

    /**
     * Get recno
     *
     * @return integer
     */
    public function getRecno()
    {
        return $this->recno;
    }
}

