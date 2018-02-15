<?php

namespace formation\UserBundle\Entity;
use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="formation\UserBundle\Repository\UserRepository")
 */

class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
   /**
     * 
     * @ORM\OneToMany(targetEntity="formation\annonceBundle\Entity\Annonces", mappedBy="utilisateur")
    * 
    *
     */
    
    private $annonces;
    
    
    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

  

   

    /**
     * Add annonces
     *
     * @param \formation\annonceBundle\Entity\Annonces $annonces
     * @return User
     */
    public function addAnnonce(\formation\annonceBundle\Entity\Annonces $annonces)
    {
        $this->annonces[] = $annonces;

        return $this;
    }

    /**
     * Remove annonces
     *
     * @param \formation\annonceBundle\Entity\Annonces $annonces
     */
    public function removeAnnonce(\formation\annonceBundle\Entity\Annonces $annonces)
    {
        $this->annonces->removeElement($annonces);
    }

    /**
     * Get annonces
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAnnonces()
    {
        return $this->annonces;
    }
}
