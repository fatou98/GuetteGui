<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Repository\BeteRepository;
use App\Repository\RaceRepository;

class AccueilController extends Controller
{
    /**
     * @Route("/accueil", name="accueil")
     */
    public function index(BeteRepository $beterepostory,RaceRepository $racerepo)
    {
        $moutons =$beterepostory->findBy(array('etat'=>0));
        foreach($moutons as $values){
            foreach($values->getImages() as $image){
                $image->setImage(base64_encode(stream_get_contents($image->getImage())));
            }
        }
        $races =$racerepo->findAll();

        return $this->render('accueil/index.html.twig', [
            'races'=>$races,
            'moutons'=>$moutons
        ]);
    }
    /**
     * @Route("/guettegui", name="guettegui")
     */
    public function guettegui(BeteRepository $beterepostory,RaceRepository $racerepo)
    {
        $moutons =$beterepostory->findBy(array('etat'=>0));
        foreach($moutons as $values){
            foreach($values->getImages() as $image){
                $image->setImage(base64_encode(stream_get_contents($image->getImage())));
            }
        }
        $races =$racerepo->findAll();

        return $this->render('accueil/guettegui.html.twig', [
            'races'=>$races,
            'moutons'=>$moutons
        ]);
    }
     /**
     * @Route("/ListeBete", name="ListeBete")
     */
    public function ListeBete()
    {
       


        return $this->render('accueil/index.html.twig', [
            'controller_name' => 'AccueilController',
        ]);
    }
     /**
     * @Route("/Details-Betes/{id}", name="detailsBetes")
     */
    public function DetailsBetes(BeteRepository $beterepostory,RaceRepository $racerepo,$id)
    {
        
        $mouton =$beterepostory->findBy(array('id'=>$id));
        foreach($mouton as $values){
            foreach($values->getImages() as $image){
                $image->setImage(base64_encode(stream_get_contents($image->getImage())));
            }
        }
        if(isset($_POST['Reserver'])){
            return $this->redirectToRoute('client', array('id' => $id));
        }
        return $this->render('accueil/detail.html.twig', [
                'mouton'=>$mouton       
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
  }*/


}
