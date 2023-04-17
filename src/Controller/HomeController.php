<?php

namespace App\Controller;

use App\Repository\SchoolRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_index')]
    public function index(SchoolRepository $schoolRepository): Response
    {
        $schools = $schoolRepository->findAll();

        return $this->render('index.html.twig', [
            'schools' => $schools,
        ]);
    }

}