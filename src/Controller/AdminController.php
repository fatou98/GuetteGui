<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Commande;
use App\Entity\Client;
use App\Entity\Bergerie;

class AdminController extends Controller
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index()
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }
      /**
      * Lister New Commande
      *
      * @Route("modules/Commande/new", name="listofNewCommande")
      */
      public function ListOfNewCommande()
      {
            $em = $this->getDoctrine()->getManager();
            $commande= $em->getRepository(Commande::class)->findBy(['etat'=>0]);
           
          return $this->render('admin/modules/ListOfNewCommande.html.twig', 
          array('commande' => $commande));
        }

        /**
         * Lister Commande Approved
        *
        * @Route("modules/Commande/approved", name="listofCommandeApproved")
        */
            public function ListOfCommandeApproved()
            {
            $em = $this->getDoctrine()->getManager();
            $commande= $em->getRepository(Commande::class)->findBy(['etat'=>1]);
            return $this->render('admin/modules/ListofApprovedCommande.html.twig', 
            array('commande' => $commande));
                    
        }
        /**
         * Lister les Clients
        *
        * @Route("modules/Commandes/client", name="list of  Client")
        */
      public function ListOfClient()
      {
        $em = $this->getDoctrine()->getManager();
        $Clients= $em->getRepository(Client::class)->findAll();
        if(!empty($Clients)){
        return $this->render('admin/modules/ListOfCustomers.html.twig', 
        array('Client' => $Clients));
        };
    }
     /**
      * Rechercher Client Par nom
      *
      * @Route("", name="FoundClient")
      */
      public function FoundClient(Request $request)
      {
        $em = $this->getDoctrine()->getManager();
        if ($request->isMethod('POST')) {
            extract($_POST);
        $Clients= $em->getRepository(Client::class)->findOneByNomComplet($nomcomplet);
             if(empty($Clients))
                      {
                        return $this->render('admin/modules/', array(
                            "Désolé Ce client n'existe pas" => $Clients));
                    };
             if(!empty($Clients)){
                    return $this->render('admin/modules/', array(
                        'commande' => $Clients));
                    };
                }
    }
            /**
          * Lister les Bergeries
          *
          * @Route("modules/Bergerie/list", name="list of  Bergeries")
          */
          public function ListOfBergerie()
          {
            $em = $this->getDoctrine()->getManager();
            $bergeries= $em->getRepository(Bergerie::class)->findAll();
                        return $this->render('admin/modules/ListOfBergerie.html.twig', array(
                            'Bergerie' => $bergeries));
        }
        /**
          * Détails Bergerie
          *
          * @Route("modules/Bergerie/list/{id}", name="Found  Client")
          */
          public function detailsBergerie($id)
          {
            $em= $this->getDoctrine()->getManager();
            $details= $em->getRepository(Bergerie::class)->findBy(['id'=>$id]);
                                    return $this->render('admin/modules/detailsOfBergerie.html.twig', array(
                                        'Bergerie' => $bergeries));
        }

}
