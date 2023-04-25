<?php

namespace App\Controller\User_Online;

use App\Repository\StadeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class StadeController extends AbstractController
{

    private EntityManagerInterface $em;

    /**
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    #[Route('/user/stade', name: 'app_stade')]
    public function index(StadeRepository $staderepository): Response
    {

        $stade=$staderepository->findAll();

        return $this->render('stade/index.html.twig', [
            'stades' => $stade,
        ]);
    }
}
