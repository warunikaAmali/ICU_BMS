<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Condition
 *
 * @ORM\Table(name="condition")
 * @ORM\Entity
 */
class Condition
{
    /**
     * @var string
     *
     * @ORM\Column(name="acuteRenalFailure", type="string", length=5, nullable=false)
     */
    private $acuterenalfailure;

    /**
     * @var string
     *
     * @ORM\Column(name="confirmedInfection", type="string", length=5, nullable=false)
     */
    private $confirmedinfection;

    /**
     * @var string
     *
     * @ORM\Column(name="vasoactiveMedication", type="string", length=5, nullable=false)
     */
    private $vasoactivemedication;

    /**
     * @var string
     *
     * @ORM\Column(name="invasiveMedication", type="string", length=5, nullable=false)
     */
    private $invasivemedication;

    /**
     * @var string
     *
     * @ORM\Column(name="nonInvaisveMedication", type="string", length=5, nullable=false)
     */
    private $noninvaisvemedication;

    /**
     * @var string
     *
     * @ORM\Column(name="dialysis", type="string", length=5, nullable=false)
     */
    private $dialysis;

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Patient")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="BHT_No", referencedColumnName="BHT_No")
     * })
     */
    private $bhtNo;

    /**
     * @var integer
     *
     * @ORM\Column(name="recordNo", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * })
     */
    private $recordNo;


    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date", nullable=false)
     */
    private $date;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date", nullable=false)
     */
    private $time;

    /**
     * Set time
     *
     * @param \Time $time
     *
     * @return Condition
     */
    public function setTime($time)
    {
        $this->time = $time;

        return $this;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Condition
     */
    public function setDate($date)
    {
        $this->time = $date;

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
     * Get time
     *
     * @return \Time
     */
    public function getTime()
    {
        return $this->time;
    }


    /**
     * Set acuterenalfailure
     *
     * @param string $acuterenalfailure
     *
     * @return Condition
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
     * @return Condition
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
     * @return Condition
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
     * @return Condition
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
     * Set noninvaisvemedication
     *
     * @param string $noninvaisvemedication
     *
     * @return Condition
     */
    public function setNoninvaisvemedication($noninvaisvemedication)
    {
        $this->noninvaisvemedication = $noninvaisvemedication;

        return $this;
    }

    /**
     * Get noninvaisvemedication
     *
     * @return string
     */
    public function getNoninvaisvemedication()
    {
        return $this->noninvaisvemedication;
    }

    /**
     * Set dialysis
     *
     * @param string $dialysis
     *
     * @return Condition
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
     * Set bhtNo
     *
     * @param integer $bhtNo
     *
     * @return Condition
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
     * Set recordNo
     *
     * @param integer $recordNo
     *
     * @return Condition
     */
    public function setRecordNo($recordNo)
    {
        $this->recordNo = $recordNo;

        return $this;
    }

    /**
     * Get recordNo
     *
     * @return integer
     */
    public function getRecordNo()
    {
        return $this->recordNo;
    }
    /**
     * @var integer
     */
    private $heartrate;

    /**
     * @var string
     */
    private $dialysistype;

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
    private $recordno;


    /**
     * Set heartrate
     *
     * @param integer $heartrate
     *
     * @return Condition
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
     * Set dialysistype
     *
     * @param string $dialysistype
     *
     * @return Condition
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
     * Set pulserate
     *
     * @param integer $pulserate
     *
     * @return Condition
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
     * @return Condition
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
     * @return Condition
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
     * @return Condition
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
     * @return Condition
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
     * @return Condition
     */
    public function setHydrogenstate($hydrogenstate)
    {
        $this->hydrogenstate = $hydrogenstate;

        return $this;
    }

    /**
     * Get hydrogenstate
     *
     * @return integer
     */
    public function getHydrogenstate()
    {
        return $this->hydrogenstate;
    }
}
