<?php

namespace App\Controller;

use App\Entity\Statistique;
use App\Form\StatistiqueType;
use App\Service\FirstService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\String\ByteString;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class StatistiqueController extends AbstractController
{
    private EntityManagerInterface $em;

    /**
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }
  

    #[Route('/user/statistique/create', name: 'app_statistique_create')]
    public function create(FirstService $myService,Request $request): Response

    {            
        $form = $myService->create($request,new Statistique,new StatistiqueType,new ByteString('joueur'),new ByteString('statistique'));
        
        return $form;
    }
}
