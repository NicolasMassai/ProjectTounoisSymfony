<?php

namespace App\Controller;

use App\Repository\MatchsRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ClassementController extends AbstractController
{
    #[Route('/user/classement', name: 'app_classement')]
    public function index(MatchsRepository $matchsrepository): Response
    {
        $matchs = $matchsrepository->findAll();



        return $this->render('classement/index.html.twig', [
            'matchs' => $matchs,
        ]);
    }

}
