<?php

//namespace AppBundle\Controller\Listener;
//use Symfony\Component\HttpFoundation\Response;
//use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;
//use Symfony\Component\Templating\EngineInterface;
///**
// * Kernel exception listener
// */
//class ExceptionListener
//{
//    /**
//     * The template engine
//     *
//     * @var EngineInterface
//     */
//    private $templateEngine;
//    /**
//     * Constructor.
//     *
//     * @param EngineInterface $templateEngine The template engine
//     */
//    public function __construct(EngineInterface $templateEngine)
//    {
//        $this->templateEngine = $templateEngine;
//    }
//    /**
//     * Handles a kernel exception and returns a relevant response.
//     *
//     * Aims to deliver content to the user that explains the exception, rather than falling
//     * back on symfony's exception handler which displays a less verbose error message.
//     *
//     * @param GetResponseForExceptionEvent $event The exception event
//     */
//    public function onKernelException(GetResponseForExceptionEvent $event)
//    {
//        $response = $this->templateEngine->render(
//            'TwigBundle:Exception:error500.html.twig',
//            array('status_text' => $event->getException()->getMessage())
//        );
//        $event->setResponse(new Response($response));
//    }
//}