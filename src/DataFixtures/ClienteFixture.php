<?php

namespace App\DataFixtures;

use App\Entity\Cliente;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ClienteFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $clienteA = new Cliente();
        $clienteA->setNombre("Cliente A");
        $manager->persist($clienteA);

        $clienteB = new Cliente();
        $clienteB->setNombre("Cliente B");
        $manager->persist($clienteB);

        $clienteC = new Cliente();
        $clienteC->setNombre("Cliente C");
        $manager->persist($clienteC);

        $manager->flush();
    }
}
