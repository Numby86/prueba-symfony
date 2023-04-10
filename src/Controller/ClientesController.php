<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ClientesController extends AbstractController
{
    #[Route('/clientes', name: 'app_clientes')]
    public function index(Request $request)
    {
        $nombre = $request->request->get('nombre');
    }
}
