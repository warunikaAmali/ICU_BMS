<?php

namespace AppBundle\Controller\Nurse;

use AppBundle\Entity\Bed;
use AppBundle\Entity\Condition;
use AppBundle\Entity\Distance;
use AppBundle\Entity\Icu;
use AppBundle\Entity\Nurse;
use AppBundle\Entity\Operation;
use AppBundle\Entity\Patient;
use AppBundle\Entity\Records;
use AppBundle\Entity\User;
use AppBundle\Form\ChangePasswordType;
use AppBundle\Form\Model\ChangePassword;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\DataTransformer\NumberToLocalizedStringTransformer;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
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
    public function getHospital(){
        $em = $this->getDoctrine()->getManager();
        $connection = $em->getConnection();

        //getting the current user's id
        $user = $this->get('security.token_storage')->getToken()->getUser();
        $userId = $user->getUsername();

        //getting the hospital of current user
        $query = "SELECT hospital_id FROM user WHERE username='$userId'";
        $statement = $connection->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        foreach($result as $res){
            $hospital_id = $res['hospital_id'];
        }
        return $hospital_id;
    }
    /**
     * @Route("/nurse/addPatient", name="add_patients")
     */
    public function patientAddAction(Request $request)
    {

        $patient = new Patient();
        $em = $this->getDoctrine()->getManager();
        $connection = $em->getConnection();

        $hospital_id=$this->getHospital();



        //getting the available beds of hospital
        $query2 = "SELECT bedNo FROM bed WHERE hospital_id=". $hospital_id. " AND status='Not Occupied'";
        $statement2 = $connection->prepare($query2);
        $statement2->execute();
        $result2 = $statement2->fetchAll();
        $beds=array();
        if($result2==null){
            return $this->render('nurse/noBeds.html.twig');
        }
        else{
            foreach($result2 as $res){
                $beds[$res['bedNo']] = $res['bedNo'];

            }

            //getting the vacancies of the hospital
            $query1 = "SELECT vacancies FROM icu WHERE id=". $hospital_id;
            $statement1 = $connection->prepare($query1);
            $statement1->execute();
            $result1 = $statement1->fetchAll();
            foreach($result1 as $res){
                $vacancy = $res['vacancies']-1;

            }

            $query3="SELECT patient_id from patient";
            $statement3 = $connection->prepare($query3);
            $statement3->execute();
            $result3 = $statement3->fetchAll();
            $patient_id=0;
            foreach($result3 as $res){
                $patient_id = $res['patient_id'];
            }

            $form = $this->createFormBuilder($patient)
                ->add('patientId', TextType::class , array(
                    'label' => 'Patient Id',
                    'data' => $patient_id+1,
                    'disabled' => true
                ))
                ->add('bedNo',  ChoiceType::class, ['choices' => $beds])
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
                $dis='0000-00-00';

                $query_patient = "INSERT INTO patient ";
                $query_patient .= "(hospital_id, bedNo, name, gender, nic, birthDate, ";
                $query_patient .= "phoneNumber, address, admittedDate,dischargedDate, reasonToAdmit)";
                $query_patient .= "VALUES ";
                $query_patient .= "(" .$hospital_id. ", " . $patient->getBedno() . ", '" . $patient->getName() . "', ";
                $query_patient .= "'" . $patient->getGender() . "', '" . $patient->getNic() . "', '" . $patient->getBirthDate()->format('y/m/d') . "', ";
                $query_patient .= "" . $patient->getPhonenumber() . ", '" . $patient->getAddress() . "', ";
                $query_patient .= "'" . $patient->getAdmitteddate()->format('y/m/d') . "','" . $dis. "' ,'" . $patient->getReasontoadmit() ."' )";
                $statement = $connection->prepare($query_patient);
                $statement->execute();

                $query_bed="UPDATE bed set status='Occupied' WHERE hospital_id=" .$hospital_id. " AND bedNo=" .$patient->getBedno();
                $statementb = $connection->prepare($query_bed);
                $statementb->execute();

                $query_icu="UPDATE icu set vacancies=" .$vacancy. " WHERE id=" .$hospital_id;
                $statementi = $connection->prepare($query_icu);
                $statementi->execute();

                return $this->render('nurse/addPatient.html.twig', array('patient' => $patient,

                ));
            }
            return $this->render('nurse/addPatient.html.twig', array('patient' => $patient,'form' => $form->createView(),

            ));
        }


        return $this->render('nurse/addPatient.html.twig', array('patient' => $patient,
            'no_beds' => 'true',
        ));
    }
    /**
     * @Route("/nurse/addRecord{PatientId}", defaults={"PatientId"=0}, name="addRecord")
     */
    public function patientRecordAction(Request $request, $PatientId)
    {
        $records = new Records();

        $em = $this->getDoctrine()->getManager();
        $connection = $em->getConnection();

        $hospital_id=$this->getHospital();

        $query = "SELECT patient_id FROM patient WHERE hospital_id=". $hospital_id;
        $statement = $connection->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();

        $PatientId_list = array();

        foreach($result as $res){
            $PatientId_list[$res['patient_id']] = $res['patient_id'];
        }


        $form = $this->createFormBuilder($records)
            ->add('Patient',  ChoiceType::class, ['choices' => $PatientId_list])
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
            ->add('heartRate', IntegerType::class)
            ->add('save', SubmitType::class, array('label' => 'Add new Record'))
            ->getForm();

        $form->handleRequest($request);

        if($form->isValid()){
            $query = "INSERT INTO records (patient_id, acuteRenalFailure, confirmedInfection, vasoactiveMedication, invasiveMedication,
                           nonInvasiveMedication, dialysis, dialysisType,heartRate, pulseRate, bodyTemperature, paralysed,spontaneousBreathing, bloodPressure, hydrogenState) VALUES ";
            $query .= "(" . $records->getPatient() .  ", ";
            $query .= "'"  . $records->getAcuterenalfailure() . "', '" . $records->getConfirmedinfection() . "', ";
            $query .= "'" . $records->getVasoactivemedication() . "', '" . $records->getInvasivemedication() . "', ";
            $query .= "'" . $records->getNoninvasivemedication() . "', '" . $records->getDialysis() . "', ";
            $query .= "'" . $records->getDialysistype() . "', " . $records->getHeartrate() . ", " . $records->getPulserate() . ", ";
            $query .= "" . $records->getBodytemperature() . ", '" . $records->getParalysed() . "', ";
            $query .= "'" . $records->getSpontaneousbreathing() . "', " . $records->getBloodpressure() . ", " . $records->getHydrogenstate() ." )";
            $statement = $connection->prepare($query);
            $statement->execute();

            return $this->render('nurse/addRecord.html.twig');
        }
        return $this->render('nurse/addRecord.html.twig', array('records' => $records,
            'form' => $form->createView(),
        ));
    }


    /**
     * @Route("/nurse/addBed", name="add_beds")
     */
    public function bedAddAction(Request $request)
    {

        $bed = new Bed();
        $icu=new Icu();

        $em = $this->getDoctrine()->getManager();
        $connection = $em->getConnection();
        $hospital_id=$this->getHospital();

        //getting the vacancies of the hospital
        $query1 = "SELECT vacancies FROM icu WHERE id=". $hospital_id;
        $statement1 = $connection->prepare($query1);
        $statement1->execute();
        $result1 = $statement1->fetchAll();
        foreach($result1 as $res){
            $vacancy = $res['vacancies']+1;

        }

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
            $query .= "(hospital_id, status,oxygenSupply, artificialRespiration, cardiacMonitor )";
            $query .= "VALUES ";
            $query .= "(" . $hospital_id . ", '" . $bed->getStatus() . "', '" . $bed->getOxygenSupply() . "', '" . $bed->getArtificialrespiration() . "', '" . $bed->getCardiacmonitor() . "')";
            $statement = $connection->prepare($query);
            $statement->execute();

            $query_icu="UPDATE icu set vacancies=" .$vacancy. " WHERE id=" .$hospital_id;
            $statementi = $connection->prepare($query_icu);
            $statementi->execute();

            return $this->render('nurse/addBed.html.twig');
        }
        return $this->render('nurse/addBed.html.twig', array('bed' => $bed,
            'form' => $form->createView(),
        ));

    }

    /**
     * @Route("/nurse/searchIcu", name="search_icu")
     */
    public function searchIcuAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $connection = $em->getConnection();

        $hospital_id=$this->getHospital();

        //Get other ICUs in the database
        $query1 = "SELECT location2, distance FROM distance RIGHT JOIN icu ON location2=icu.id WHERE location1= " . $hospital_id. " AND vacancies!=0" ;
        $statement1 = $connection->prepare($query1);
        $statement1->execute();
        $result1 = $statement1->fetchAll();

        $hospital_list1 = array(array());
        $min1=1000000;
        $nearest1=null;
        foreach($result1 as $res){
            $hospital_list1['location'][0] = $res['location2'];
            $hospital_list1['location'][1] = $res['distance'];
            if($hospital_list1['location'][1]<$min1){
                $min1=$hospital_list1['location'][1];//min distance1
                $nearest1=$hospital_list1['location'][0];//location1
            }
        }

        $query2 = "SELECT location1, distance FROM distance RIGHT JOIN icu ON location1=icu.id WHERE location2= " . $hospital_id. " AND vacancies!=0" ;
        $statement2 = $connection->prepare($query2);
        $statement2->execute();
        $result2 = $statement2->fetchAll();

        $hospital_list2 = array(array());
        $min2=1000000;
        $nearest2=null;
        foreach($result2 as $res){
            $hospital_list2['location'][0] = $res['location1'];
            $hospital_list2['location'][1] = $res['distance'];
            if($hospital_list2['location'][1]<$min2){
                $min2=$hospital_list2['location'][1];//min distance2
                $nearest2=$hospital_list2['location'][0];//location of min distance2
            }
        }
        //getting the nearest ICU
        if($min1!=1000000 and $min2!=1000000){
            if($min2<$min1){
                $nearest=$nearest2;
                $min=$min2;
            }
            else{
                $nearest=$nearest1;
                $min=$min1;
            }
        }
        elseif($min1==1000000){
            $nearest=$nearest2;
            $min=$min2;
        }
        elseif($min2==1000000){
            $nearest=$nearest1;
            $min=$min1;
        }
        else{
            print_r($min1);
            $nearest=0;
            $min=0;
        }

        if($nearest==0){
            $icu = NULL;
            $phno=NULL;
            $vacan=NULL;
        }
        else{
            $query3 = "SELECT hospital,phoneNumber,vacancies FROM icu WHERE id=" .$nearest;
            $statement3 = $connection->prepare($query3);
            $statement3->execute();
            $result3 = $statement3->fetchAll();

            foreach($result3 as $res){
                $icu = $res['hospital'];
                $phno=$res['phoneNumber'];
                $vacan=$res['vacancies'];
            }
        }

        return $this->render('nurse/searchIcu.html.twig', array('nearest' => $icu,
            'distance'=>$min, 'phno' =>$phno, 'vacancy' => $vacan,
        ));
    }

    /**
     * @Route("/nurse/addOperation", name="add_operation")
     */
    public function operationAddAction(Request $request)
    {

        $operation = new Operation();

        $em = $this->getDoctrine()->getManager();
        $connection = $em->getConnection();
        $hospital_id=$this->getHospital();

        $query = "SELECT patient_id FROM patient WHERE hospital_id=". $hospital_id;
        $statement = $connection->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();

        $PatientId_list = array();

        foreach($result as $res){
            $PatientId_list[$res['patient_id']] = $res['patient_id'];
        }


        $form = $this->createFormBuilder($operation)

            ->add('Patient',  ChoiceType::class, ['choices' => $PatientId_list])
            ->add('type', TextType::class, ['required' => true])
            ->add('date',  DateType::class,
                ['input'  => 'datetime', 'widget' => 'choice', 'years' => range(2016,2050)])
            ->add('save', SubmitType::class, array('label' => 'Add Operation'))
            ->getForm();
        $form->handleRequest($request);
        if($form->isValid()){
            $query = "INSERT INTO operation ";
            $query .= "(type,patient_id,hospital_id,date )";
            $query .= "VALUES ";
            $query .= "(" . $operation->getType() . ", '" . $operation->getPatient() . "', '" . $hospital_id . "', " . $operation->getDate() ;
            $statement = $connection->prepare($query);
            $statement->execute();

            return $this->render('nurse/addOperation.html.twig');
        }
        return $this->render('nurse/addOperation.html.twig', array('operation' => $operation,
            'form' => $form->createView(),
        ));

    }


    /**
     * @Route("/nurse/changePassword", name="change_password")
     */
    public function changePasswdAction(Request $request)
    {
        $user= new User();

        $em = $this->getDoctrine()->getManager();
        $connection = $em->getConnection();

        $hospital_id=$this->getHospital();


        /*$changePasswordModel = new ChangePassword();
        $form = $this->createForm(new ChangePasswordType(), $changePasswordModel);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // perform some action,
            // such as encoding with MessageDigestPasswordEncoder and persist
            return $this->redirect($this->render('nurse/changePasswd.html.twig'));
        }

        return $this->render('nurse/changePasswd.html.twig', array(
            'form' => $form->createView(),
        ));*/
    }

}
?>