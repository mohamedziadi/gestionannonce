<?php

namespace formation\annonceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        
        return $this->render('annonceBundle:Default:index.html.twig');
    }
}
