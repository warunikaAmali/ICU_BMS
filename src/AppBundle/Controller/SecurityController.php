<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\User;

class SecurityController extends Controller
{


    /**
     * @Route("/login", name="security_login_form")
     */
    public function loginAction()
    {
        if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
            // redirect authenticated users to homepage

            return $this->redirect($this->generateUrl('default_homepage'));
        }

        $helper = $this->get('security.authentication_utils');

        return $this->render('security/login.html.twig', array(
            // last username entered by the user (if any)
            //'last_username' => $helper->getLastUsername(),
            // last authentication error (if any)
            'error' => $helper->getLastAuthenticationError(),
        ));
    }

    /**
     * @Route("/login/check", name="roleRedirect")
     */
    public function roleRedirection()
    {
        if ($this->get('security.authorization_checker')->isGranted('ROLE_NURSE')) {
            return $this->redirect($this->generateUrl('nurse_homepage'));
        }else if ($this->get('security.authorization_checker')->isGranted('ROLE_DOCTOR')) {
            return $this->redirect($this->generateUrl('doctor_homepage'));
        }else if ($this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            return $this->redirect($this->generateUrl('admin_homepage'));
        }else {
            return $this->redirect($this->generateUrl('homepage'));
        }
    }

    /**
     * This is the route the login form submits to.
     *
     * But, this will never be executed. Symfony will intercept this first
     * and handle the login automatically. See form_login in app/config/security.yml
     *
     * @Route("/login_check", name="security_login_check")
     */
    public function loginCheckAction()
    {


        throw new \Exception('This should never be reached!');
    }

    /**
     * This is the route the user can use to logout.
     *
     * But, this will never be executed. Symfony will intercept this first
     * and handle the logout automatically. See logout in app/config/security.yml
     *
     * @Route("/logout", name="security_logout")
     */
    public function logoutAction()
    {
        throw new \Exception('This should never be reached!');
    }

    /**
     * @Route("/changePassword", name="changePassword")
     */
    public function changePasswordAction(Request $request)
    {
        $user=new User();
        $em = $this->getDoctrine()->getManager();
        $connection = $em->getConnection();

        //getting the current user's id
        $userId=$this->get('security.token_storage')->getToken()->getUser()->getUsername();

        //Getting the current password of the user
        $query1 = "SELECT password FROM user where username= '" . $userId. "'" ;
        $statement1 = $connection->prepare($query1);
        $statement1->execute();
        $result1 = $statement1->fetchAll();
        foreach($result1 as $res){
            $currentPassword= $res['password'];
        }

        $post = Request::createFromGlobals();
        if ($post->request->has('submit')) {

            print_r($user);
            $current= $_POST['current'];
            $new= $_POST['new'];
            $retype= $_POST['retype'];
            $encoder = $this->container->get('security.password_encoder');
            $encodedCurrent = $encoder->encodePassword($user, $current);
            $encodedNew = $encoder->encodePassword($user, $new);
            if($currentPassword!=$encodedCurrent){
                print_r("not equal");
                //display Error msg
            }else{
                print_r("Correct curent pwd");
                if($new==$retype){
                    print_r(" matching");

                    $query2 = "UPDATE user SET password='" . $encodedNew. "' WHERE username='" . $userId. "'";
                    $statement2 = $connection->prepare($query2);
                    $statement2->execute();
                }else{
                    //display Error msg
                }
            }
            return $this->render('security/changePassword.html.twig', array('new'=> $encodedCurrent));
        } else {
//            $name = 'Not submitted yet';
        }

        return $this->render('security/changePassword.html.twig', array('form'=> $userId) );
    }
}
