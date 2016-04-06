<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class TestController extends Controller
{
    /**
     * @Route("/test", name="test_page")
     */
    public function testAction(Request $request)
    {
        return new Response("<HTML><HEAD><TITLE>Test page</TITLE></HEAD> <BODY>This is test page</BODY></HTML>");
    }
}
