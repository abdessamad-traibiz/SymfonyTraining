<?php

namespace App\Controller;

use http\Env\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FirstController extends AbstractController
{
    #[Route('/first', name: 'first')]
    public function index(): Response
    {
        return $this->render('first/index.html.twig', [
            'name' => 'Abdessamad',
            'lastname' => 'Traibiz'
        ]);
    }

    #[Route('/sayhello/{name}/{lastname}', name: 'say.hello')]
    public function sayHello(RequestStack $request, $name,$lastname): Response
    {
        dd($request);
        return $this->render('first/hello.html.twig', [
            'nom' => $name,
            'prenom'=>$lastname
        ]);

    }
}
