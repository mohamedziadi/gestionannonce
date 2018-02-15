<?php
namespace formation\annonceBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use formation\annonceBundle\Entity\Categories;

/**
 * Description of CategorieController
 *
 * @author Spartacus
 */
class CategorieController extends Controller{
    
    public function addAction(){
        
        $categorie1=new Categories();
        $categorie2=new Categories();
        $categorie3=new Categories();
        
        $categorie1->setNom("immobilier");
        $categorie2->setNom("vehicules");
        $categorie3->setNom("cours");
        
       $doctrine= $this->getDoctrine();
       $em=$doctrine->getManager();
       $em->persist($categorie1);
       $em->persist($categorie2);
       $em->persist($categorie3);
       
       $em->flush();
       
        
               
return $this->render('annonceBundle:Categories:add.html.twig');
    }
 public function listAction(){
     
     
     
     
   $em=  $this->getDoctrine()->getManager();
   $repository=$em->getRepository('annonceBundle:Categories');
   $categories= $repository->findAll();
   
    return $this->render('annonceBundle:Categories:list.html.twig',array('categories'=>$categories)); 
     
 }

        
}
