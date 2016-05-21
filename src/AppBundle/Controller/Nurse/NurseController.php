<?php

namespace AppBundle\Controller\Nurse;

use AppBundle\Entity\Bed;
use AppBundle\Entity\Condition;
use AppBundle\Entity\Nurse;
use AppBundle\Entity\Patient;
use AppBundle\Entity\Records;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;

class NurseController extends Controller
{
    /**
     * @Route("/nurse", name="nurse_homepage")
     */
    public function nurseHomeAction(Request $request)
    {
        return $this->render('nurse/home.html.twig', array());
    }
    /**
     * @Route("/nurse/addPatient", name="add_patients")
     */
    public function patientAddAction(Request $request)
    {
        $patient = new Patient();

        $em = $this->getDoctrine()->getManager();
        $connection = $em->getConnection();

        $form = $this->createFormBuilder($patient)
            ->add('bhtNo', IntegerType::class)
            ->add('bedNo', IntegerType::class)
            ->add('name', TextType::class, ['required' => false])
            ->add('gender', ChoiceType::class, array('choices' => array('Male' => 'Male', 'Female'=>'Female')))
            ->add('nic', TextType::class)
            ->add('birthDate', DateType::class,
                ['input'  => 'datetime', 'widget' => 'choice', 'years' => range(1980,2016)],['required' => false])
            ->add('phoneNumber', IntegerType::class, ['required' => false])
            ->add('address', TextType::class, ['required' => false])
            ->add('admittedDate', DateType::class,
                ['input'  => 'datetime', 'widget' => 'choice', 'years' => range(2016,2050)])
//            ->add('dischargedDate', DateType::class,
//                ['input'  => 'datetime', 'widget' => 'choice', 'years' => range(2016,2050)],['required' => false])
            ->add('reasonToAdmit',ChoiceType::class, ['choices' => ['Shock' => 'Shock', 'Acute Respiratory Failure'=>'Acute Respiratory Failure', 'Chronic Respiratory Failure'=>'Chronic Respiratory Failure'
                , 'Infections'=> 'Infections','Renal Failure'=>'Renal Failure' ,'Bleeding'=>'Bleeding','Clotting'=>'Clotting','Multiple Organ Dysfunction Syndrome – MODS'=>'Multiple Organ Dysfunction Syndrome – MODS' ], 'choices_as_values' => true])
            ->add('save', SubmitType::class, array('label' => 'Add new Patient'))
            ->getForm();
        $form->handleRequest($request);
        if($form->isValid()){

            $query = "SELECT name FROM patient where BHT_No = $patient->getBhtNo()";
            $statement = $connection->prepare($query);
            $statement->execute();
            $result = $statement->fetchAll();

            if($result==null){
                $query_patient = "INSERT INTO patient ";
                $query_patient .= "(BHT_No, bedNo, name, gender, nic, birthDate, ";
                $query_patient .= "phoneNumber, address, admittedDate, reasonToAdmit)";
                $query_patient .= "VALUES ";
                $query_patient .= "(" . $patient->getBhtNo() . ", " . $patient->getBedno() . ", '" . $patient->getName() . "', ";
                $query_patient .= "'" . $patient->getGender() . "', '" . $patient->getNic() . "', '" . $patient->getBirthDate()->format('y/m/d') . "', ";
                $query_patient .= "" . $patient->getPhonenumber() . ", '" . $patient->getAddress() . "', ";
                $query_patient .= "'" . $patient->getAdmitteddate()->format('y/m/d') . "', '" . $patient->getReasontoadmit() ."' )";
                $statement = $connection->prepare($query_patient);
                $statement->execute();

                return $this->render('nurse/addPatient.html.twig');
            }
            else{

            }


        }
        return $this->render('nurse/addPatient.html.twig', array('patient' => $patient,
            'form' => $form->createView(),
        ));
    }
    /**
     * @Route("/nurse/addRecord{bhtNo}", defaults={"bhtNo"=0}, name="addRecord")
     */
    public function patientRecordAction(Request $request, $bhtNo)
    {
        $records = new Records();

        $em = $this->getDoctrine()->getManager();
        $connection = $em->getConnection();


        $query = "SELECT BHT_No FROM patient";
        $statement = $connection->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();

        $bhtNo_list = array();

        foreach($result as $res){
            $bhtNo_list[$res['BHT_No']] = $res['BHT_No'];
        }


        $form = $this->createFormBuilder($records)
            //->add('recordNo', IntegerType::class)

            ->add('bhtNo',  ChoiceType::class, ['choices' => $bhtNo_list])
//            ->add('date',  DateType::class,
//                ['input'  => 'datetime', 'widget' => 'choice', 'years' => range(2016,2050)])
//            ->add('time', TimeType::class, array(
//                'input'  => 'datetime',
//                'widget' => 'choice',))
//            ->add('date',  DateTimeType::class,
//                array(
//                    'widget' => 'single_text',
//                    'format' => 'YYYY-MM-dd  HH:mm'))
            ->add('acuteRenalFailure', ChoiceType::class, array('choices' => array('Yes' => 'Yes', 'No'=>'No')))
            ->add('confirmedInfection', ChoiceType::class, array('choices' => array('Yes' => 'Yes', 'No'=>'No')))
            ->add('vasoactiveMedication', ChoiceType::class, array('choices' => array('Yes' => 'Yes', 'No'=>'No')))
            ->add('invasiveMedication', ChoiceType::class, array('choices' => array('Yes' => 'Yes', 'No'=>'No')))
            ->add('noninvasivemedication', ChoiceType::class, array('choices' => array('Yes' => 'Yes', 'No'=>'No')))
            ->add('dialysis', ChoiceType::class, array('choices' => array('Yes' => 'Yes', 'No'=>'No')))
            ->add('dialysisType', ChoiceType::class, array('choices' => array('Haemo' => 'Haemo', 'Peritonea'=>'Peritonea')))
            ->add('spontaneousBreathing', ChoiceType::class, array('choices' => array('Yes' => 'Yes', 'No'=>'No')))
            ->add('paralysed', ChoiceType::class, array('choices' => array('Yes' => 'Yes', 'No'=>'No')))
            ->add('bodyTemperature', IntegerType::class)
            ->add('hydrogenState', IntegerType::class)
            ->add('bloodPressure', IntegerType::class)
            ->add('pulseRate', IntegerType::class)
            ->add('heartState', IntegerType::class)
            ->add('save', SubmitType::class, array('label' => 'Add new Record'))
            ->getForm();

        $form->handleRequest($request);

        if($form->isValid()){

//            $query = "INSERT INTO records (BHT_No) VALUES ";
            $query = "INSERT INTO records (BHT_No, acuteRenalFailure, confirmedInfection, vasoactiveMedication, invasiveMedication,
                           nonInvasiveMedication, dialysis, dialysisType,heartRate, pulseRate, bodyTemperature, paralysed,spontaneousBreathing, bloodPressure, hydrogenState) VALUES ";
            $query .= "(" . $records->getBhtNo() .  ", ";
            $query .= "'"  . $records->getAcuterenalfailure() . "', '" . $records->getConfirmedinfection() . "', ";
            $query .= "'" . $records->getVasoactivemedication() . "', '" . $records->getInvasivemedication() . "', ";
            $query .= "'" . $records->getNoninvasivemedication() . "', '" . $records->getDialysis() . "', ";
            $query .= "'" . $records->getDialysistype() . "', " . $records->getHeartrate() . ", " . $records->getPulserate() . ", ";
            $query .= "" . $records->getBodytemperature() . ", '" . $records->getParalysed() . "', ";
            $query .= "'" . $records->getSpontaneousbreathing() . "', " . $records->getBloodpressure() . ", " . $records->getHydrogenstate() ." )";
            $statement = $connection->prepare($query);
            $statement->execute();

           // print_r($query);
            return $this->render('nurse/addRecord.html.twig');
        }
        return $this->render('nurse/addRecord.html.twig', array('records' => $records,
            'form' => $form->createView(),
        ));
    }


    /**
     * @Route("/nurse/view", name="view_patients")
     */
    public function patientViewAction(Request $request)
    {
        return $this->render('nurse/home.html.twig', array());
    }

    /**
     * @Route("/nurse/addBed", name="add_beds")
     */
    public function bedAddAction(Request $request)
    {

        $bed = new Bed();

        $em = $this->getDoctrine()->getManager();
        $connection = $em->getConnection();

        $form = $this->createFormBuilder($bed)

            ->add('status', ChoiceType::class, array('choices' => array('Occupied' => 'Occupied', 'Not Occupied'=>'Not Occupied')))
            ->add('oxygenSupply', ChoiceType::class, array('choices' => array('Yes' => 'Yes', 'No'=>'No')))
            ->add('artificialRespiration', ChoiceType::class, array('choices' => array('Yes' => 'Yes', 'No'=>'No')))
            ->add('cardiacMonitor', ChoiceType::class, array('choices' => array('Yes' => 'Yes', 'No'=>'No')))
            ->add('save', SubmitType::class, array('label' => 'Add new Bed'))
            ->getForm();
        $form->handleRequest($request);
        if($form->isValid()){
            $query = "INSERT INTO bed ";
            $query .= "(status,oxygenSupply, artificialRespiration, cardiacMonitor )";
            $query .= "VALUES ";
            $query .= "('" . $bed->getStatus() . "', '" . $bed->getOxygenSupply() . "', '" . $bed->getArtificialrespiration() . "', '" . $bed->getCardiacmonitor() . "')";
            $statement = $connection->prepare($query);
            $statement->execute();

            return $this->render('nurse/addBed.html.twig');
        }
        return $this->render('nurse/addBed.html.twig', array('bed' => $bed,
            'form' => $form->createView(),
        ));

    }

}
?>