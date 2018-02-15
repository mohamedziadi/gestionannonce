<?php

namespace formation\annonceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BonjourController extends Controller
{
    public function index2Action($prenom)
    {
       
        return $this->render('annonceBundle:Default:index2.html.twig',array('p'=>$prenom));
    }

public function sommeAction($var1,$var2)
    {
       
        return $this->render('annonceBundle:Default:somme.html.twig',array('s'=>$var1+$var2));
}
public function informationAction()
    {
       
        return $this->render('annonceBundle:Default:information.html.twig',array('personnes'=>array(
            1=>array('nom'=>"Ons",'prenom'=>"Ben kram",'age'=>25,'date'=>new \dateTime,
                'Diplome'=>array('Nb'=>6,'specialite'=>"informatique")),
            2=>array('nom'=>"Azhar",'prenom'=>"Ben Kram",'age'=>21,'date'=>new \DateTime,
                'Diplome'=>array('Nb'=>3,'specialite'=>"Sport")),
        )));
}
    }