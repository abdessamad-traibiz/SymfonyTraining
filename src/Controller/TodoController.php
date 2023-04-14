<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TodoController extends AbstractController
{
    #[Route('/todo', name: 'todo')]
    public function index(Request $request): Response
    {
        $session = $request->getSession();
        // Afficher le tableau de todo
        if (!$session->has('todos')){
            $todos= [
                'achat'=>'Achetr clé USB',
                'cours'=>'Finaliser mon cours',
                'correction'=>'Corriger mes examens'
            ];
            $session->set('todos', $todos);
            $this->addFlash('info','La liste des messages vient d\'être initialisée');

        }
        return $this->render('todo/index.html.twig');
    }
    #[Route('/todo/{name}/{content}', name: 'todo.add')]
    public function addTodo(Request $request, $name,$content)
    {
        if($session -has('todos')){
            $todos= $session->get('todos');
            if(isset($todos[$name])){
                $this->addFlash('error',"Le todos existe déja'");

            }
        } else {
            $this->addFlash('error',"La liste des messages n'est pas encore initialisée'");
        }
        return $this->redirectToRoute('todo');
    }
}
