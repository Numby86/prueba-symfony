<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Cliente;
use App\Form\UsuariosType;

class ClientesController extends AbstractController
{

    #[Route('/create/usuario', name: 'createUsuario')]
    public function createUsuario(Request $request, EntityManagerInterface $doctrine)
    {
        $form = $this-> createForm(UsuariosType::class);
        $form->handleRequest($request);
        if ($form-> isSubmitted() && $form-> isValid()) {
            $usuario = $form-> getData();
            $doctrine -> persist($usuario);
            $doctrine -> flush();
        }
        return $this->render('createUsuario.html.twig', 
        [
            'UsuarioForm' => $form
        ]);
    }
}
