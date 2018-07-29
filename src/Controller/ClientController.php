<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use App\Repository\BeteRepository;
use App\Entity\Commande;
use App\Repository\RaceRepository;
use App\Repository\CommandeRepository;
use App\Repository\LivraisonRepository;
use Symfony\Component\Validator\Constraints\DateTime;

class ClientController extends Controller
{
    /**
     * @Route("/client/{id}", name="client")
     */
    public function index($id,BeteRepository $beterepo)
    {

        $client=$this->getUser();
        $em=$this->getDoctrine()->getManager();
        $bete=$beterepo->findBy(['id'=>$id]);
$vue=false;
        if(isset($_POST['Valider'])){
            $commande=new Commande();
            $commande->setBete($bete[0]);
            $commande->setClient($client);
            $commande->setEtat(false);
            $commande->setDate(new \DateTime('now'));
            $em->persist($commande);
            $em->flush();
            $vue=true;
            $this->addFlash('success', 'Votre commande à bien été enregistré et sera traité dans les plus bref delais.');

        }
            if(isset($_POST['annuler'])){
                $vue=true;
            }
        
        
        return $this->render('client/index.html.twig', [
            'client'=>$client,
            'mouton'=>$bete,
            'vue'=>$vue
                    ]);
                }
                  /**
     * @Route("/commandes-validees/client", name="commandes-validees")
     */
    public function List_commande_Valide(CommandeRepository $commanderepo,BeteRepository $beterepo)
    {
        $client=$this->getUser();
        $moutons =$beterepo->findAll();

        foreach($moutons as $values){
            foreach($values->getImages() as $image){
                $image->setImage(base64_encode(stream_get_contents($image->getImage())));
            }
        }
        $commandevalide =$commanderepo->findBy(['etat'=>1,'client'=>$client]);
        return $this->render('client/commandevalide.html.twig', [
            'client'=>$client,
            'commande'=>$commandevalide
     ]);
    }
    
    /**
    * @Route("/commandes-encours/client", name="commandes-encours")
    */
   public function List_commande_En_cours(CommandeRepository $commanderepo,BeteRepository $beterepo)
   {
       $client=$this->getUser();
       $moutons =$beterepo->findAll();

       foreach($moutons as $values){
           foreach($values->getImages() as $image){
               $image->setImage(base64_encode(stream_get_contents($image->getImage())));
           }
       }
       $commandeencours =$commanderepo->findBy(['etat'=>0,'client'=>$client]);
       return $this->render('client/commandevalide.html.twig', [
           'client'=>$client,
           'commande'=>$commandeencours
    ]);
   }
   
    /**
    * @Route("/livraison-encours/client", name="livraison-encours")
    *//*
    public function List_commande_En_cours(LivraisonRepository $livraisonrepo,BeteRepository $beterepo)
    {
        $client=$this->getUser();
        $moutons =$beterepo->findAll();
 
        foreach($moutons as $values){
            foreach($values->getImages() as $image){
                $image->setImage(base64_encode(stream_get_contents($image->getImage())));
            }
        }
        $commandeencours =$livraisonrepo->findBy(['etat'=>0]);
        return $this->render('client/commandevalide.html.twig', [
            'client'=>$client,
            'commande'=>$commandeencours
     ]);
    }*/
}
