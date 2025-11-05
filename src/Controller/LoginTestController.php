<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class LoginTestController extends AbstractController
{
    #[Route('/login-test', name: 'app_login_test')]
    public function index(AuthenticationUtils $authenticationUtils): Response
    {
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('login_test/index.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error,
        ]);
    }

    #[Route('/api/login-test', name: 'app_api_login_test', methods: ['POST'])]
    public function apiLogin(): JsonResponse
    {
        // This will demonstrate JSON login issues
        return $this->json([
            'error' => 'Authentication required',
            'message' => 'Try accessing this with proper credentials'
        ]);
    }
}