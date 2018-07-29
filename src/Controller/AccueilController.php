<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Repository\BeteRepository;
class AccueilController extends Controller
{
    /**
     * @Route("/accueil", name="accueil")
     */
    public function index(BeteRepository $beterepostory)
    {
        
        return $this->render('accueil/index.html.twig', [
        ]);
    }
     /**
     * @Route("/ListeBete", name="ListeBete")
     */
    public function ListeBete(BeteRepository $beterepostory)
    {
        return $this->render('accueil/index.html.twig', [
            'controller_name' => 'AccueilController',
        ]);
    }
     /**
     * @Route("/accueil", name="accueil")
     *//*
    public function index()
    {
        return $this->render('accueil/index.html.twig', [
            'controller_name' => 'AccueilController',
        ]);
    } /**
    * @Route("/accueil", name="accueil")
    *//*
   public function index()
   {
       return $this->render('accueil/index.html.twig', [
           'controller_name' => 'AccueilController',
       ]);
   } /**
   * @Route("/accueil", name="accueil")
   *//*
  public function index()
  {
      return $this->render('accueil/index.html.twig', [
          'controller_name' => 'AccueilController',
      ]);
  }*/


}
