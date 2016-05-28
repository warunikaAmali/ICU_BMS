<?php

namespace AppBundle\Controller\Doctor;

use AppBundle\Entity\Doctor;
use AppBundle\Entity\Patient;
use AppBundle\Entity\Records;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
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

    /**
     * @Route("/doctor/dischargePatient", name="discharge_patients")
     */
    public function patientDischargeAction(Request $request)
    {
        $patient = new Patient();

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

        $form = $this->createFormBuilder($patient)

            ->add('bhtNo',ChoiceType::class, ['choices' => $bhtNo_list])
            ->add('save', SubmitType::class, array('label' => 'Discharge Patient'))
            ->getForm();

        $form->handleRequest($request);

        if($form->isValid()){
            $query_patient = "UPDATE patient SET dischargedDate =  CURRENT_TIMESTAMP ";
            $query_patient .= "WHERE BHT_No=  " . $patient->getBhtNo() . "" ;
            $statement = $connection->prepare($query_patient);
            $statement->execute();

            return $this->render('nurse/dischargePatient.html.twig');
        }
        return $this->render('nurse/dischargePatient.html.twig', array('patient' => $patient,
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

            return $this->render('nurse/viewPatients.html.twig', array(
                'patients' => $patients,
            ));
        }

        $query = "SELECT * FROM records WHERE patient_id=" . $id ;
        $statement = $connection->prepare($query);
        $statement->execute();
        $records = $statement->fetchAll();



        return $this->render('nurse/viewRecords.html.twig', array(
            'records' => $records, 'id' => $id,
        ));

    }


}