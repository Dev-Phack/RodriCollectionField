<?php

namespace App\Controller;

use App\Entity\Codes;
use App\Form\CodesType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CodesController extends AbstractController
{

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManagerInterface)
    {
        $this->entityManager = $entityManagerInterface;
        
    }

    #[Route('/', name: 'codes')]
    public function index(Request $request): Response
    {
        $codes = new Codes();
        $form = $this->createForm(CodesType::class, $codes);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
//            dd($form->getData());
            $this->entityManager->persist($codes);
            $this->entityManager->flush();
        }
        return $this->render('codes/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
