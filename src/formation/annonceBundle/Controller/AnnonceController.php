<?php

namespace formation\annonceBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use formation\annonceBundle\Entity\Annonces;
use formation\annonceBundle\Form\AnnoncesType;
class AnnonceController extends Controller{
    
    public function addAction(){
        
        /*$annonce1=new Annonces();
        $annonce2=new Annonces();
        $annonce3=new Annonces();
        
        $annonce1->setTitre("Dell");
        $annonce2->setTitre("Toshiba");
        $annonce3->setTitre("Hp");
        
        $annonce1->setDate(new \DateTime);
        $annonce2->setDate(new \DateTime);
        $annonce3->setDate(new \DateTime);
         
        $annonce1->setContenu("Dell 500dt");
        $annonce2->setContenu("Toshiba 450dt");
        $annonce3->setContenu("Hp 750dt");
        
       $doctrine= $this->getDoctrine();
       $em=$doctrine->getManager();
       $em->persist($annonce1);
       $em->persist($annonce2);
       $em->persist($annonce3);
       
       $em->flush();*/
         $annonce=new Annonces();
         $message='';
           /* $annonce->setTitre("Dell");
            $annonce->setContenu("Dell 500dt");
              $annonce->setDate(new \DateTime);*/
       $em= $this->getDoctrine()->getManager();
       $form= $this->createForm(new AnnoncesType(), $annonce);
       $user= $this->get('security.context')->getToken()->getUser();
      $request= $this->getRequest();
       
     if($request->getMethod()  =='POST' ){
         $form->bind($request);
         $annonce->setUtilisateur($user);
         $em->persist($annonce);
         $em->flush();
         $message='Annonce ajouté avec succée';
     
    }
        
        
               
return $this->render('annonceBundle:Annonces:add.html.twig',array('form'=>$form->createView(),'message'=>$message));
    }
public function listAction(){
     
  
   $em=  $this->getDoctrine()->getManager();
   $repository=$em->getRepository('annonceBundle:Annonces');
   $annonces= $repository->findAll();
   
    return $this->render('annonceBundle:Annonces:list.html.twig',array('annonces'=>$annonces));
}
public function supprimerAction($id){
    $em= $this->getDoctrine()->getManager();
    $annonce=$em->getRepository('annonceBundle:Annonces')->find($id);
    
    $em->remove($annonce);
    $em->flush();
    $url= $this->generateUrl('annonces_lister');
    return $this->redirect($url);
    
}
public function editerAction($id){
    $message='';
    $em= $this->getDoctrine()->getManager();
    $annonce=$em->getRepository('annonceBundle:Annonces')->find($id);
    $form= $this->createForm(new AnnoncesType(), $annonce);
    $request= $this->getRequest();
if($request->getMethod()=='POST'){
    $form->bind($request);
    $em->flush();
$message="annonce modfiier avec succée";

}

 return $this->render('annonceBundle:Annonces:editer.html.twig',array('form'=>$form->createView(),'message'=>$message));
}
public function topAction(){
 $em= $this->getDoctrine()->getManager();
 $query=$em->createQuery(
         'select A from annonceBundle:Annonces A /*((((alias))) dql*/
         ORDER By A.id DESC')->setMaxResults(3);
  $annonces=$query->getResult();           
  
 return $this->render('annonceBundle:Annonces:list.html.twig',array('annonces'=>$annonces));
}
public function isIinferieure($text){
    $verif=$this->container->get("monservice");
    if ($verif->isInferieur($text)==true){
   throw new \Exception ("la longeur de ".$text." est infereur a 50")  ;  
    }
}
}