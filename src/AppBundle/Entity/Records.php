<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Records
 *
 * @ORM\Table(name="records", indexes={@ORM\Index(name="patient_id", columns={"patient_id"})})
 * @ORM\Entity
 */
class Records
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=false)
     */
    private $date = 'CURRENT_TIMESTAMP';

    /**
     * @var string
     *
     * @ORM\Column(name="acuteRenalFailure", type="string", length=3, nullable=false)
     */
    private $acuterenalfailure;

    /**
     * @var string
     *
     * @ORM\Column(name="confirmedInfection", type="string", length=3, nullable=false)
     */
    private $confirmedinfection;

    /**
     * @var string
     *
     * @ORM\Column(name="vasoactiveMedication", type="string", length=3, nullable=false)
     */
    private $vasoactivemedication;

    /**
     * @var string
     *
     * @ORM\Column(name="invasiveMedication", type="string", length=3, nullable=false)
     */
    private $invasivemedication;

    /**
     * @var string
     *
     * @ORM\Column(name="nonInvasiveMedication", type="string", length=3, nullable=false)
     */
    private $noninvasivemedication;

    /**
     * @var string
     *
     * @ORM\Column(name="dialysis", type="string", length=3, nullable=false)
     */
    private $dialysis;

    /**
     * @var string
     *
     * @ORM\Column(name="dialysisType", type="string", length=12, nullable=false)
     */
    private $dialysistype;

    /**
     * @var integer
     *
     * @ORM\Column(name="heartRate", type="integer", nullable=false)
     */
    private $heartrate;

    /**
     * @var integer
     *
     * @ORM\Column(name="pulseRate", type="integer", nullable=false)
     */
    private $pulserate;

    /**
     * @var integer
     *
     * @ORM\Column(name="bodyTemperature", type="integer", nullable=false)
     */
    private $bodytemperature;

    /**
     * @var string
     *
     * @ORM\Column(name="paralysed", type="string", length=3, nullable=false)
     */
    private $paralysed;

    /**
     * @var string
     *
     * @ORM\Column(name="spontaneousBreathing", type="string", length=3, nullable=false)
     */
    private $spontaneousbreathing;

    /**
     * @var integer
     *
     * @ORM\Column(name="bloodPressure", type="integer", nullable=false)
     */
    private $bloodpressure;

    /**
     * @var integer
     *
     * @ORM\Column(name="hydrogenState", type="integer", nullable=false)
     */
    private $hydrogenstate;

    /**
     * @var integer
     *
     * @ORM\Column(name="recNo", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $recno;

    /**
     * @var \AppBundle\Entity\Patient
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Patient")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="patient_id", referencedColumnName="patient_id")
     * })
     */
    private $patientId;



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

    /**
     * Get recno
     *
     * @return integer
     */
    public function getRecno()
    {
        return $this->recno;
    }

    /**
     * Set patientId
     *
     * @param \AppBundle\Entity\Patient $patientId
     *
     * @return Records
     */
    public function setPatientId(\AppBundle\Entity\Patient $patientId = null)
    {
        $this->patientId = $patientId;

        return $this;
    }

    /**
     * Get patientId
     *
     * @return \AppBundle\Entity\Patient
     */
    public function getPatientId()
    {
        return $this->patientId;
    }
}
