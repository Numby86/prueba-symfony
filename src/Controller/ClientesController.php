<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Cliente;
use App\Entity\Usuario;
use App\Form\UsuariosType;

class ClientesController extends AbstractController
{
    #[Route('/inicio', name: 'inicio')]
    public function inicio(Request $request, EntityManagerInterface $doctrine)
    {
        return $this->render('inicio.html.twig');
    }

    #[Route("/usuarios", name:"usuarios")]
    public function usuarios(EntityManagerInterface $doctrine){

        $repository = $doctrine->getRepository(Usuario::class);
        $usuarios = $repository->findAll();

    return $this -> render('usuarios.html.twig', ['usuarios' => $usuarios]);
    }

    #[Route("/user/{id}", name:"detailUser")]
    public function detailUser(EntityManagerInterface $doctrine, $id){

        $repository = $doctrine->getRepository(Usuario::class);
        $user = $repository->find($id);

        return $this -> render("detailUser.html.twig", ["user" => $user]);
    }

    #[Route('/create/usuario', name: 'createUsuario')]
    public function createUsuario(Request $request, EntityManagerInterface $doctrine)
    {
        $form = $this-> createForm(UsuariosType::class);
        $form->handleRequest($request);
        if ($form-> isSubmitted() && $form-> isValid()) {
            $usuario = $form-> getData();
            $doctrine -> persist($usuario);
            $doctrine -> flush();
            $this-> addFlash('success', 'Usuario creado correctamente');
            return $this-> redirectToRoute('inicio');
        }
        return $this->render('createUsuario.html.twig', 
        [
            'UsuarioForm' => $form
        ]);
    }

    #[Route('/edit/usuario/{id}', name: 'editUsuario')]
    public function editUsuario(Request $request, EntityManagerInterface $doctrine, $id)
    {
        $repositorio = $doctrine-> getRepository(Usuario::class);
        $user = $repositorio->find($id);

        $form = $this-> createForm(UsuariosType::class, $user);
        $form->handleRequest($request);
        if ($form-> isSubmitted() && $form-> isValid()) {
            $usuario = $form-> getData();
            $doctrine -> persist($usuario);
            $doctrine -> flush();
            $this-> addFlash('success', 'Usuario creado correctamente');
            return $this-> redirectToRoute('inicio');
        }
        return $this->render('createUsuario.html.twig', 
        [
            'UsuarioForm' => $form
        ]);
    }

    #[Route("/delete/usuario/{id}", name:"deleteUsuario")]
    public function deleteUsuario(EntityManagerInterface $doctrine, $id){

        $repository = $doctrine->getRepository(Usuario::class);
        $usuario = $repository->find($id);
        $doctrine-> remove($usuario);
        $doctrine-> flush();
        $this-> addFlash('success', 'Usuario borrado correctamente');

        return $this -> redirectToRoute("usuarios");
    }
}
