<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SecureAreaController extends AbstractController
{
    #[Route('/secure', name: 'app_secure')]
    public function index(): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');

        return $this->render('secure_area/index.html.twig', [
            'message' => 'This is a secure area!',
        ]);
    }

    #[Route('/secure/admin', name: 'app_secure_admin')]
    public function admin(): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        return $this->render('secure_area/admin.html.twig', [
            'message' => 'This is admin area!',
        ]);
    }
}