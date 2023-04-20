<?php

namespace App\Controller;

use App\Entity\Autos;
//use App\Repository\AutosRepository;
//use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AutoController extends AbstractController
{
    #[Route('/auto', name: 'app_auto')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $autos = $entityManager->getRepository(Autos::class)->findAll();
        return $this->render('auto/index.html.twig', [
            "autos"=>$autos
        ]);
    }
    #[Route('/auto/{id}', name: 'app_auto')]
    public function details(EntityManagerInterface $entityManager, Autos $autoclass): Response
    {
        $id = $autoclass->getId();
        $autos = $entityManager->getRepository(Autos::class)->find($id);
        return $this->render('auto/details.html.twig', [
            "autos"=>$autos
            ]);
    }

}
