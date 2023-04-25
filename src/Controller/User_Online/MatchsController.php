<?php

namespace App\Controller\User_Online;

use App\Entity\Stade;
use App\Entity\Matchs;
use App\Form\MatchsType;
use Doctrine\ORM\Mapping\Id;
use App\Repository\StadeRepository;
use App\Repository\MatchsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MatchsController extends AbstractController
{

    private EntityManagerInterface $em;

    /**
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }
    
    #[Route('/user/matchs', name: 'app_matchs')]
    public function index(MatchsRepository $matchsrepository): Response
    {
        $matchs=$matchsrepository->findAll();


        return $this->render('matchs/index.html.twig', [
            'matchs' => $matchs,
        ]);
    }

    #[Route('/user/matchs/find/{matchs}', name: 'app_matchs_id')]
    public function getId(Matchs $matchs, MatchsRepository $matchsrepository,StadeRepository $staderepository): Response
    {

        $id = $matchs->getId();
        $id2 = $matchs->getStade();


        $matchs=$matchsrepository->find($id);
        $stade=$staderepository->find($id2);


        return $this->render('matchs/getId.html.twig', [
            'matchs' => $matchs,
            'stade' => $stade            
        ]);
    }

    #[Route('/user/matchs/create', name: 'app_matchs_create')]
    public function create(Request $request): Response
    {
        $matchs = new Matchs();
        $form = $this->createForm(MatchsType::class, $matchs);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $this->em->persist($matchs);
            $this->em->flush();
            return $this->redirectToRoute('app_matchs');
        }

        return $this->render('matchs/create.html.twig', [
            'form' => $form->createView()
        ]);
    }

    #[Route('/user/matchs/update/{matchs}', name: 'app_matchs_update')]
    public function update(Matchs $matchs, Request $request): Response
    {
        $form = $this->createForm(MatchsType::class, $matchs);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $this->em->persist($matchs);
            $this->em->flush();
            return $this->redirectToRoute('app_matchs');
        }
        return $this->render('matchs/create.html.twig', [
            'form' => $form->createView()
        ]);
    }

}   
