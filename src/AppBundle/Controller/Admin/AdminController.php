<?php

namespace AppBundle\Controller\Admin;

use AppBundle\Entity\Nurse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class AdminController extends Controller
{

    /**
     * @Route("/admin", name="admin_homepage")
     */
    public function adminHomeAction(Request $request)
    {
        return $this->render('admin/home.html.twig', array());
    }

    /**
     * @Route("/admin/addNurse", name="add_nurse")
     */
    public function nurseAddAction(Request $request)
    {

        $nurse = new Nurse();

        $em = $this->getDoctrine()->getManager();
        $connection = $em->getConnection();

        /*    $form = $this->createFormBuilder($nurse)

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
            ));*/

    }

}