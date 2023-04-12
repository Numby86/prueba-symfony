<?php

namespace App\Controller;

use App\Entity\Usuario;
use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class UsuariosController extends AbstractController
{
    #[Route('/new/user', name: 'newUser')]
    public function newUser(Request $request, EntityManagerInterface $doctrine, UserPasswordHasherInterface $hasher)
    {
        $form = $this-> createForm(UserType::class);
        $form->handleRequest($request);
        if ($form-> isSubmitted() && $form-> isValid()) {
            $user = $form-> getData();
            $password = $user-> getPassword();
            $passCifrado = $hasher-> hashPassword($user, $password);
            $user-> setPassword($passCifrado);
            $doctrine -> persist($user);
            $doctrine -> flush();
            $this-> addFlash('success', 'Usuario creado correctamente');
            return $this-> redirectToRoute('inicio');
        }
        return $this->render('registro.html.twig', 
        [
            'UserForm' => $form
        ]);
    }

    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    #[Route("/users/edades", name: 'userEdades')]
    public function search(Request $request)
    {
        $repository = $this->em->getRepository(Usuario::class);
        $rangoEdad = $repository->createQueryBuilder('u')
            ->where('u.edad > :minAge')
            ->andWhere('u.edad < :maxAge')
            ->setParameter('minAge', 20)
            ->setParameter('maxAge', 50)
            ->getQuery()
            ->getResult();

        return $this->render('edades.html.twig', [
            'rangoEdad' => $rangoEdad
        ]);
    }

    #[Route("/categoryY", name: 'cateY')]
    public function cateY(Request $request)
    {
        $repository = $this->em->getRepository(Usuario::class);
        $cateY = $repository->createQueryBuilder('u')
            ->where('u.categoria = :categoria')
            ->setParameter('categoria', 'Y')
            ->getQuery()
            ->getResult();

        return $this->render('category.html.twig', [
            'cateY' => $cateY,
        ]);
    }

    #[Route("/notApellido", name: 'notApellido')]
    public function notApellido(Request $request)
    {
        $repository = $this->em->getRepository(Usuario::class);
        $notApellido = $repository->createQueryBuilder('u')
            ->where('u.apellidos != :apellidos')
            ->setParameter('apellidos', 'Núñez Sánchez')
            ->getQuery()
            ->getResult();

        return $this->render('notApellido.html.twig', [
            'notApellido' => $notApellido,
        ]);
    }

}
