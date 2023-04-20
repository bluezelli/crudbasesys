<?php

namespace App\Controller;

use App\Entity\Autos;
use App\Repository\AutosRepository;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AutoController extends AbstractController
{
    #[Route('/auto', name: 'app_auto')]
    public function index(EntityManager $entityManager): Response
    {
        $autos = $entityManager->getRepository(Autos::class)->findAll();
        return $this->render('auto/index.html.twig', [
            "autos"=>$autos
        ]);
    }
}
