<?php

namespace App\DataFixtures;

use App\Entity\Cliente;
use App\Entity\Usuario;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UsuarioFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $usuario1 = new Usuario();
        $usuario1->setNombre('Sergio');
        $usuario1->setApellidos('Sánchez López');
        $usuario1->setPoblacion('Majadahonda');
        $usuario1->setCategoria('X');
        $usuario1->setEdad(34);
        $usuario1->setActivo(true);
        $usuario1->setFechaCreacion(new \DateTime());
        $usuario1->setFechaModificacion(new \DateTime());
        $manager->persist($usuario1);

        $usuario2 = new Usuario();
        $usuario2->setNombre('Lorena');
        $usuario2->setApellidos('Jurado Gónzalez');
        $usuario2->setPoblacion('Pozuelo');
        $usuario2->setCategoria('Z');
        $usuario2->setEdad(22);
        $usuario2->setActivo(false);
        $usuario2->setFechaCreacion(new \DateTime());
        $usuario2->setFechaModificacion(new \DateTime());
        $manager->persist($usuario2);

        $usuario3 = new Usuario();
        $usuario3->setNombre('Oscar');
        $usuario3->setApellidos('Perea Gómez');
        $usuario3->setPoblacion('Alcobendas');
        $usuario3->setCategoria('Y');
        $usuario3->setEdad(53);
        $usuario3->setActivo(true);
        $usuario3->setFechaCreacion(new \DateTime());
        $usuario3->setFechaModificacion(new \DateTime());
        $manager->persist($usuario3);

        $usuario4 = new Usuario();
        $usuario4->setNombre('Ester');
        $usuario4->setApellidos('López Díaz');
        $usuario4->setPoblacion('Torrejón');
        $usuario4->setCategoria('Z');
        $usuario4->setEdad(61);
        $usuario4->setActivo(true);
        $usuario4->setFechaCreacion(new \DateTime());
        $usuario4->setFechaModificacion(new \DateTime());
        $manager->persist($usuario4);

        $usuario5 = new Usuario();
        $usuario5->setNombre('Teresa');
        $usuario5->setApellidos('Fernández Casado');
        $usuario5->setPoblacion('Getafe');
        $usuario5->setCategoria('X');
        $usuario5->setEdad(37);
        $usuario5->setActivo(false);
        $usuario5->setFechaCreacion(new \DateTime());
        $usuario5->setFechaModificacion(new \DateTime());
        $manager->persist($usuario5);

        $usuario6 = new Usuario();
        $usuario6->setNombre('Juan Antonio');
        $usuario6->setApellidos('Maqueda Gil');
        $usuario6->setPoblacion('Fuenlabrada');
        $usuario6->setCategoria('Y');
        $usuario6->setEdad(18);
        $usuario6->setActivo(true);
        $usuario6->setFechaCreacion(new \DateTime());
        $usuario6->setFechaModificacion(new \DateTime());
        $manager->persist($usuario6);

        $clienteA = new Cliente();
        $clienteA -> setNombre("Cliente A");

        $clienteB = new Cliente();
        $clienteB -> setNombre("Cliente B");

        $clienteC = new Cliente();
        $clienteC -> setNombre("Cliente C");

        $usuario1 -> addCliente($clienteA);
        $usuario1 -> addCliente($clienteC);

        $usuario2 -> addCliente($clienteA);
        $usuario2 -> addCliente($clienteC);

        $usuario3 -> addCliente($clienteB);

        $usuario4 -> addCliente($clienteA);

        $usuario5 -> addCliente($clienteC);
        $usuario5 -> addCliente($clienteB);

        $usuario6 -> addCliente($clienteA);

        $manager->persist($clienteA);
        $manager->persist($clienteB);
        $manager->persist($clienteC);



        $manager->flush();
    }
}
