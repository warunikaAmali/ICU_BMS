<?php

namespace AppBundle\Controller\Doctor;

use AppBundle\Entity\Doctor;
use AppBundle\Entity\Patient;
use AppBundle\Entity\Records;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class DoctorController extends Controller
{
    /**
     * @Route("/doctor", name="doctor_homepage")
     */
    public function doctorHomeAction(Request $request)
    {
        return $this->render('doctor/home.html.twig', array());
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
     * @Route("/doctor/dischargePatient", name="discharge_patients")
     */
    public function patientDischargeAction(Request $request)
    {
        $patient = new Patient();

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

        $query = "SELECT patient_id FROM patient WHERE dischargedDate='0000-00-00'";
        $statement = $connection->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();

        $bhtNo_list = array();

        foreach($result as $res){
            $bhtNo_list[$res['patient_id']] = $res['patient_id'];
        }

        $form = $this->createFormBuilder($patient)

            ->add('patientId',ChoiceType::class, ['choices' => $bhtNo_list])
            ->add('save', SubmitType::class, array('label' => 'Discharge Patient'))
            ->getForm();

        $form->handleRequest($request);

        if($form->isValid()){
            $query_patient = "UPDATE patient SET dischargedDate =  CURRENT_TIMESTAMP ";
            $query_patient .= " WHERE patient_id=  " . $patient->getPatientId() ;
            $statement = $connection->prepare($query_patient);
            $statement->execute();

            $query_icu="UPDATE icu set vacancies=" .$vacancy. " WHERE id=" .$hospital_id;
            $statementi = $connection->prepare($query_icu);
            $statementi->execute();

            $queryp = "SELECT bedNo FROM patient WHERE patient_id=" . $patient->getPatientId();
            $statementp = $connection->prepare($queryp);
            $statementp->execute();
            $resultp = $statementp->fetchAll();

            foreach($resultp as $res){
                $bed = $res['bedNo'];
            }
            $query_bed="UPDATE bed set status='Not Occupied' WHERE hospital_id=" .$hospital_id. " AND bedNo= " . $bed ;
            $statementb = $connection->prepare($query_bed);
            $statementb->execute();

            return $this->render('doctor/dischargePatient.html.twig');
        }
        return $this->render('doctor/dischargePatient.html.twig', array('patient' => $patient,
            'form' => $form->createView(),
        ));
    }
    /**
     * @Route("/doctor/viewPatients/{id}", defaults={"id" = 0}, name="view_patients")     *
     */
    public function sportViewAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $connection = $em->getConnection();

        $hospital=$this->getHospital();


        if($id == 0) {

            $query = "SELECT * FROM patient WHERE hospital_id=" .$hospital;
            $statement = $connection->prepare($query);
            $statement->execute();
            $patients = $statement->fetchAll();

            return $this->render('doctor/viewPatients.html.twig', array(
                'patients' => $patients,
            ));
        }

        $query = "SELECT * FROM records WHERE patient_id=" . $id ;
        $statement = $connection->prepare($query);
        $statement->execute();
        $records = $statement->fetchAll();



        return $this->render('doctor/viewRecords.html.twig', array(
            'records' => $records, 'id' => $id,
        ));

    }


}