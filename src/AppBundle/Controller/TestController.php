<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class TestController extends Controller
{
    /**
     * @Route("/test", name="test_page")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function testAction(Request $request)
    {
        return new Response("<HTML><HEAD><TITLE>Test page</TITLE></HEAD> <BODY>This is test page</BODY></HTML>");
    }
}
