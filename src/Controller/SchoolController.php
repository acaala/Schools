<?php

namespace App\Controller;

use App\Entity\School;
use App\Form\SchoolFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('school')]
class SchoolController extends AbstractController
{
    #[Route('/create', name: 'app_school_create')]
    public function create(Request $request, EntityManagerInterface $entityManager): Response
    {
        $school = new School();

        $form = $this->createForm(SchoolFormType::class, $school);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($school);
            $entityManager->flush();

            return $this->redirectToRoute('app_index');
        }


        return $this->render('school/create.html.twig', [
            'form' => $form,
        ]);
    }

    #[route("/{id}", name:'app_school_view')]
    public function view(School $school): Response
    {
        return $this->render('school/view.html.twig', [
            'school' => $school
        ]);
    }
}