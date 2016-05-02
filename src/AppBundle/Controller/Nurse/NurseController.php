<?php

namespace AppBundle\Controller\Nurse;

use AppBundle\Entity\Condition;
use AppBundle\Entity\Nurse;
use AppBundle\Entity\Patient;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
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
            ->add('dischargedDate', DateType::class,
                ['input'  => 'datetime', 'widget' => 'choice', 'years' => range(2016,2050)],['required' => false])
            ->add('reasonToAdmit',ChoiceType::class, ['choices' => ['Shock' => 'Shock', 'Acute Respiratory Failure'=>'Acute Respiratory Failure', 'Chronic Respiratory Failure'=>'Chronic Respiratory Failure'
            , 'Infections'=> 'Infections','Renal Failure'=>'Renal Failure' ,'Bleeding'=>'Bleeding','Clotting'=>'Clotting','Multiple Organ Dysfunction Syndrome – MODS'=>'Multiple Organ Dysfunction Syndrome – MODS' ], 'choices_as_values' => true])


            ->add('save', SubmitType::class, array('label' => 'Add new Patient'))
            ->getForm();

        $form->handleRequest($request);

        if($form->isValid()){

            $query_patient = "INSERT INTO patient ";
//            $query_student .= "(id, first_name, second_name, faculty, department, gender, ";
//            $query_student .= "birthday, contact_number, e_mail, address)";
            $query_patient .= "VALUES ";
            $query_patient .= "('" . $patient->getBhtNo() . "', '" . $patient->getBedno() . "', '" . $patient->getName() . "', ";
            $query_patient .= "'" . $patient->getGender() . "', '" . $patient->getNic() . "', '" . $patient->getBirthDate()->format('y/m/d') . "', ";
            $query_patient .= "'" . $patient->getPhonenumber() . "', '" . $patient->getAddress() . "', ";
            $query_patient .= "'" . $patient->getAdmitteddate()->format('y/m/d') . "', '" . $patient->getDischargeddate()->format('y/m/d') . "', '" . $patient->getReasontoadmit() ."' )";

            $statement = $connection->prepare($query_patient);
            $statement->execute();


            return $this->render('nurse/addPatient.html.twig');
        }

        return $this->render('nurse/addPatient.html.twig', array('patient' => $patient,
            'form' => $form->createView(),
        ));
    }


    /**
     * @Route("/nurse/addRecord", name="addRecord")
     */
    public function patientRecordAction(Request $request)
    {
        $condition = new Condition();

        $em = $this->getDoctrine()->getManager();
        $connection = $em->getConnection();

        $form = $this->createFormBuilder($condition)
            ->add('recordNo', IntegerType::class)
            ->add('bhtNo', IntegerType::class)
            ->add('date',  DateType::class,
                ['input'  => 'datetime', 'widget' => 'choice', 'years' => range(2016,2050)])
            ->add('time', TimeType::class, array(
                'input'  => 'timestamp',
                'widget' => 'choice',))
            ->add('acuteRenalFailure', ChoiceType::class, array('choices' => array('Yes' => 'Yes', 'No'=>'No')))
            ->add('confirmedInfection', ChoiceType::class, array('choices' => array('Yes' => 'Yes', 'No'=>'No')))
            ->add('vasoactiveMedication', ChoiceType::class, array('choices' => array('Yes' => 'Yes', 'No'=>'No')))
            ->add('invasiveMedication', ChoiceType::class, array('choices' => array('Yes' => 'Yes', 'No'=>'No')))
            ->add('nonInvaisveMedication', ChoiceType::class, array('choices' => array('Yes' => 'Yes', 'No'=>'No')))
            ->add('dialysis', ChoiceType::class, array('choices' => array('Yes' => 'Yes', 'No'=>'No')))
          /*  ->add('dialysisType', ChoiceType::class, array('choices' => array('Haemo' => 'Haemo', 'Peritonea'=>'Peritonea')))
            ->add('spontaneousBreathing', ChoiceType::class, array('choices' => array('Yes' => 'Yes', 'No'=>'No')))
            ->add('paralysed', ChoiceType::class, array('choices' => array('Yes' => 'Yes', 'No'=>'No')))
            ->add('bodyTemperature', IntegerType::class)
            ->add('hydrogenState', IntegerType::class)
            ->add('bloodPressure', IntegerType::class)
            ->add('pulseRate', IntegerType::class)
            ->add('heartRate', IntegerType::class)*/

            ->add('save', SubmitType::class, array('label' => 'Add new Patient'))
            ->getForm();

        $form->handleRequest($request);

        if($form->isValid()){

            $query = "INSERT INTO condition ";
//            $query_student .= "(id, first_name, second_name, faculty, department, gender, ";
//            $query_student .= "birthday, contact_number, e_mail, address)";
            $query .= "VALUES ";
            $query .= "('" . $condition->getRecordNo() . "', '" . $condition->getBhtNo() . "', '" . $condition->getDate(). "', ";
            $query .= "'" . $condition->getTime() . "', '" . $condition->getAcuterenalfailure() . "', '" . $condition->getConfirmedinfection() . "', ";
            $query .= "'" . $condition->getVasoactivemedication() . "', '" . $condition->getInvasivemedication() . "', ";
            $query .= "'" . $condition->getNoninvaisvemedication() . "', '" . $condition->getDialysis() . "' )";

            $statement = $connection->prepare($query);
            $statement->execute();

            return $this->render('nurse/addRecord.html.twig');
        }

        return $this->render('nurse/addRecord.html.twig', array('condition' => $condition,
            'form' => $form->createView(),
        ));

    }

    /**
     * @Route("/nurse", name="view_patients")
     */
    public function patientViewAction(Request $request)
    {
        return $this->render('nurse/home.html.twig', array());
    }


}

?>