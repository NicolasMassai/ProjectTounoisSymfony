<?php

namespace App\Controller;

use App\Entity\Joueur;
use App\Form\JoueurType;
use App\Service\FirstService;
use App\Repository\JoueurRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\String\ByteString;
use App\Repository\StatistiqueRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class JoueurController extends AbstractController
{

    private EntityManagerInterface $em;

    /**
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }
    
    #[Route('/user/joueur', name: 'app_joueur')]
    public function index(JoueurRepository $joueurRepository): Response
    {
        
        $joueur = $joueurRepository->findAll();

        return $this->render('joueur/index.html.twig', [
            'joueurs' => $joueur
        ]);
    }

    #[Route('/user/joueur/create', name: 'app_joueur_create')]
    public function create(FirstService $myService,Request $request): Response

    {            
        $form = $myService->create($request,new Joueur,new JoueurType,new ByteString('joueur'),new ByteString('joueur'));
        
        return $form;
    }

    #[Route('/user/joueur/find/{joueurs}', name: 'app_joueurs_id')]
    public function getId(Joueur $joueurs, JoueurRepository $joueurrepository,StatistiqueRepository $statistiquerepository): Response
    {

        $id = $joueurs->getId();
        $joueur=$joueurrepository->requete($id);


        $id2 = $joueurs->getStatistique();
        $stats=$statistiquerepository->find($id2);



        return $this->render('joueur/getId.html.twig', [
            'joueurs' => $joueur,
            'stat'=> $stats
        ]);
    }
}
