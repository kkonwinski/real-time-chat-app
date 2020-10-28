<?php

namespace App\Controller;

use App\Form\MessageType;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/message")
 */
class MessageController extends AbstractController
{



    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @Route("/", name="app_websocket")
     */
    public function showWebsocket(): Response
    {
        $form = $this->createForm(MessageType::class);
        //$form->handleRequest($request);
        return $this->render('message/websocket.html.twig', [
            'messageAuthor'=> $this->getUser()->getUsername(),
            'messageForm' => $form->createView(),
        ]);
    }

}
