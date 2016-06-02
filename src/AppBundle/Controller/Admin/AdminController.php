<?php

namespace AppBundle\Controller\Admin;

use AppBundle\Entity\changePassword;
use AppBundle\Entity\Distance;
use AppBundle\Entity\Icu;
use AppBundle\Entity\Nurse;
use AppBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
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
     * @Route("/admin/addUser", name="addUser")
     */
    public function userAddAction(Request $request)
    {
        $user = new User();
        print (" ");
        print_r($user);
        print (" ");
        $em = $this->getDoctrine()->getManager();
        $connection = $em->getConnection();

        $hospitals = $em->getRepository('AppBundle:Icu')->findAll();
        $form = $this->createFormBuilder($user)
            ->add('hospital', ChoiceType::class, [
                'choices' => $hospitals,
                'choice_label' => function($hospital, $key, $index) {
                    return $hospital->getHospital() . ' - ' . $hospital->getId();
                },
                'choice_attr' => function($hospital, $key, $index) {
                    return ['value' => $hospital->getId()];
                },
                'choices_as_values' => true,
            ])
            ->add('role', ChoiceType::class, array('choices' => array('Nurse' => 'ROLE_NURSE', 'Doctor'=>'ROLE_DOCTOR')))
            ->add('username', TextType::class, ['required' => true])
            ->add('name', TextType::class, ['required' => true])
            ->add('password', TextType::class , array(
                'label' => 'Password',
                'data' => 'user',
                'disabled' => true
            ))
            ->add('save', SubmitType::class, array('label' => 'Add new User'))
            ->getForm();
            $form->handleRequest($request);

            if($form->isValid()){
                print (" ");
                print_r($user);
				$data = $request->request->all();
				$username = $data['form']['username'];
				$plainPassword = "user";
				$encoder = $this->container->get('security.password_encoder');
				$encoded = $encoder->encodePassword($user, $plainPassword);
                $query = "INSERT INTO user ";
                $query .= "(username,password,name,role,hospital_id) ";
                $query .= "VALUES ";
                $query .= "('" . $username . "', '" . $encoded . "',";
                $query .= " '" . $user->getName() . "', '" . $user->getRole() . "'," . $user->getHospital()->getId() . " )";
                $statement = $connection->prepare($query);
                $statement->execute();

                return $this->render('admin/addUser.html.twig', array('user' => $user,
                ));
            }
            return $this->render('admin/addUser.html.twig', array('user' => $user,
                'form' => $form->createView(),
            ));

    }

    /**
     * @Route("/admin/addICU", name="addICU")
     */
    public function ICUAddAction(Request $request)
    {
        $icu = new Icu();

        $added=false;
        $em = $this->getDoctrine()->getManager();
        $connection = $em->getConnection();

        $form = $this->createFormBuilder($icu)
            ->add('hospital', TextType::class, ['required' => true])
            ->add('address', TextType::class, ['required' => true])
            ->add('phoneNumber', TextType::class, ['required' => true])
            ->add('save', SubmitType::class, array('label' => 'Add new ICU'))
            ->getForm();
        $form->handleRequest($request);
        if($form->isValid()){
            $query1 = "SELECT id FROM icu WHERE hospital='" .$icu->getHospital(). "'";
            $statement1 = $connection->prepare($query1);
            $statement1->execute();
            $result1 = $statement1->fetchAll();

            if($result1==null){
                $query = "INSERT INTO icu ";
                $query .= "(hospital,address,phoneNumber )";
                $query .= "VALUES ";
                $query .= "('" . $icu->getHospital() . "', '" . $icu->getAddress() . "'," . $icu->getPhonenumber(). ")";
                $statement = $connection->prepare($query);
                $statement->execute();
                return $this->render('admin/addIcu.html.twig', array('name'=>$icu->getHospital() ,
                ));
            }else{
                $added='Already Added!';
            }
        }
        return $this->render('admin/addIcu.html.twig', array('user' => $icu,
            'form' => $form->createView(),'added'=>$added,
        ));

    }

    /**
     * @Route("/admin/addDistance/{id}", defaults={"id" = 0}, name="add_distances")
     */
    public function distanceAddAction(Request $request,$id)
    {
        $distance = new Distance();

        $em = $this->getDoctrine()->getManager();
        $connection = $em->getConnection();
        //geting the id of the newly added hospital
        $query1 = "SELECT id FROM icu where hospital= '" . $id. "'" ;
        $statement1 = $connection->prepare($query1);
        $statement1->execute();
        $result1 = $statement1->fetchAll();
        foreach($result1 as $res){
            $hid= $res['id'];
        }
//getting the hospitals in the database
        $query2 = "SELECT id,hospital FROM icu where hospital!= '" . $id. "'" ;
        $statement2 = $connection->prepare($query2);
        $statement2->execute();
        $result2 = $statement2->fetchAll();
        $hospitals=array();
        $hids=array();

        $x=0;
        foreach($result2 as $res){
            $hospitals[$x] = $res['hospital'];
            $hids[$x]=$res['id'];
            $x++;
        }

        $post = Request::createFromGlobals();
        $distances= array();
        if ($post->request->has('submit')) {
            $distances = $_POST['distance'];
            for( $i=0;$i<sizeof($distances);$i++){
                $query3 = "INSERT INTO distance (location1, location2, distance) VALUES " ;
                $query3 .= "(" . $hid . ", " . $hids[$i] . "," . $distances[$i] . ")";
                $statement3 = $connection->prepare($query3);
                $statement3->execute();
            }
            return $this->render('admin/addDistances.html.twig', array('from'=> $id));
        } else {
//            $name = 'Not submitted yet';
        }

        return $this->render('admin/addDistances.html.twig', array('hospitals' => $hospitals, 'from'=> $id));

    }

    /**
     * @Route("/admin/change", name="change")
     */
    public function passwordChangeAction(Request $request)
    {
        $change=new changePassword();
        $em = $this->getDoctrine()->getManager();
        $connection = $em->getConnection();

        //getting the current user's id
        $user = $this->get('security.token_storage')->getToken()->getUser();
        $userId = $user->getUsername();

        $form = $this->createFormBuilder($change)
            ->add('currentPassword', PasswordType::class)
            ->add('Password', RepeatedType::class, array(
                'type' => PasswordType::class,
                'invalid_message' => 'The password fields must match.',
                'required' => true,
                'first_options'  => array('label' => 'Password'),
                'second_options' => array('label' => 'Repeat Password'),))
            ->add('change', SubmitType::class)
            ->getForm();

        $form->handleRequest($request);
        if($form->isValid()){
            $encoder = $this->container->get('security.password_encoder');
            $encoded = $encoder->encodePassword($user, $change->getPassword());
            $query="UPDATE user set password='" .$encoded. "' WHERE username='" .$userId. "'";
            $statement = $connection->prepare($query);
            $statement->execute();
            return $this->render('admin/change.html.twig');
        }
        return $this->render('admin/change.html.twig',array('form'=>$form->createView()));

    }
}