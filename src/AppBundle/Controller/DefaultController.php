<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
        ]);
    }

    /**
     * @Route("/", name="default_homepage")
     */
    public function directAction(Request $request)
    {
        if ($this->securityContext->isGranted('ROLE_NURSE') == true) {
            return $this->redirect($this->generateUrl('nurse_homepage'));
         } else {
            return $this->redirect($this->generateUrl('homepage'));
        }
    }
}
