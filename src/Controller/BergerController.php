<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BergerController extends Controller
{
    /**
     * @Route("/berger", name="berger")
     */
    public function index()
    {
        return $this->render('berger/index.html.twig', [
            'controller_name' => 'BergerController',
        ]);
    }
}
