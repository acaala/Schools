<?php

namespace App\Controller;

use App\Entity\Member;
use App\Form\MemberFormType;
use App\Repository\SchoolRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('member')]
class MemberController extends AbstractController
{
    #[Route('/create', name: 'app_member_create')]
    public function create(Request $request, EntityManagerInterface $entityManager, SchoolRepository $schoolRepository): Response
    {
        if(count($schoolRepository->findAll()) == 0) {
            return $this->redirectToRoute('app_school_create');
        }

        $member = new Member();

        $form = $this->createForm(MemberFormType::class, $member);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($member);
            $entityManager->flush();

            return $this->redirectToRoute('app_index');
        }

        return $this->render('member/create.html.twig', [
            'form' => $form,
        ]);
    }
}