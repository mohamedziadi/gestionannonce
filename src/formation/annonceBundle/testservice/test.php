<?php
namespace formation\annonceBundle\testservice;

class Test{
    public function isInferieur($text)
    
    {
        return strlen($text)<50;
    }    
    
    
}