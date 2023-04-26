<?php

namespace App\Controller\User_Online;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ClassementController extends AbstractController
{
    #[Route('/user/classement', name: 'app_classement')]
    public function index(): Response
    {
        return $this->render('classement/index.html.twig', [
            'controller_name' => 'ClassementController',
        ]);
    }
}
