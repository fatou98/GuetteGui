<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Bete;
use App\Entity\Bergerie;
use App\Entity\Image;
use App\Repository\BergerieRepository;
use App\Repository\BeteRepository;
use App\Repository\RaceRepository;
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
     /**
     * @Route("/ListeBergeries", name="ListeBergeries")
     */
    public function ListeBergeries(BeteRepository $beterepo,BergerieRepository $bergerierepo)
    {
        
        $berger=$this->getUser();
        $idberger=$berger->getId();
        $bergeries=$bergerierepo->findBy(['berger'=>$idberger]);

        return $this->render('berger/ListeBergeries.html.twig', [
            'controller_name' => 'BergerController',
            'bergeries'=>$bergeries
        ]);
    }
    /**
     * @Route("/listedemesbetes", name="listedemesbetes")
     */
    public function ListedeMesbetes(BeteRepository $beterepo,BergerieRepository $bergerierepo)
    {
        
        $berger=$this->getUser();
        $idberger=$berger->getId();
        $bergeries=$bergerierepo->findBy(['berger'=>$idberger]);
        $betes=$beterepo->findBy(['bergerie'=>$bergeries]);
        foreach($betes as $values){
            foreach($values->getImages() as $image){
                $image->setImage(base64_encode(stream_get_contents($image->getImage())));
            }
        }
        return $this->render('berger/listesdemesbetes.html.twig', [
            'controller_name' => 'BergerController',
            'betes'=>$betes
        ]);
    }
     /**
     * @Route("/addbergerie", name="addbergerie")
     */
    public function addbergerie(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $berger=$this->getUser();
        $idberger=$berger->getId();
        if(isset($_POST['submit'])){
            if ($request->isMethod('POST')) {
                extract($_POST);
                $bergerie=new Bergerie();
                $bergerie->setLibelle($libelle);
                $bergerie->setAdresse($adresse);
                $bergerie->setBerger($berger);
$em->persist($bergerie);
$em->flush();
$this->addFlash('success', 'Votre bergerie a bien été enregistré.');

            }
        }
        return $this->render('berger/addbergerie.html.twig', [
            'controller_name' => 'BergerController',
        ]);
    }
   /**
    * @Route("/addbetes", name="addbetes")
    */
    public function addbetes(Request $request,BergerieRepository $bergerierepo,RaceRepository $racerepo)
    {
        $em = $this->getDoctrine()->getManager();
        
        $berger=$this->getUser();
        $idberger=$berger->getId();
        $bergeries=$bergerierepo->findBy(['berger'=>$idberger]);
        $races=$racerepo->findAll();
        if(isset($_POST['submit'])){
          
            if ($request->isMethod('POST')) {
                extract($_POST);
                $bergerie=$bergerierepo->findBy(['id'=>$selectbergerie]);
                $race=$racerepo->findBy(['id'=>$selectrace]);
                $bete=new Bete();
                $image=new Image();
                $bete->setNomcomplet($nomcomplet);
                $bete->setAge($age);
                $bete->setCouleur($couleur);
                $bete->setPrix($prix);
                $bete->setGabari($gabari);  
                $bete->setTaille($taille);
                $bete->setDescription($description);
                $bete->setPoids($poids);
                $bete->setRace($race[0]);
                $bete->setEtat(false);
                $bete->setBergerie($bergerie[0]);
                $em->persist($bete);
                $em->flush();
                if (isset($_FILES['imagestable'])) {
                $myFile = $_FILES['imagestable']['tmp_name'];
                $img=file_get_contents($myFile);
                $image->setImage($img);
                $image->setBete($bete);
                $em->persist($image);
                $em->flush();
                }
                $this->addFlash('success', 'Votre bete a bien été enregistré.');
            }
        }



        return $this->render('berger/addbetes.html.twig', [
'races'=>$races,
'bergeries'=>$bergeries        ]);
    }
}
