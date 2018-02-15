<?php

namespace formation\annonceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Annonces
 *
 * @ORM\Table(name="annonces")
 * @ORM\Entity(repositoryClass="formation\annonceBundle\Repository\AnnoncesRepository")
 */
class Annonces
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date")
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="contenu", type="text")
     */
    private $contenu;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set titre
     *
     * @param string $titre
     * @return Annonces
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string 
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Annonces
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set contenu
     *
     * @param string $contenu
     * @return Annonces
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;

        return $this;
    }

    /**
     * Get contenu
     *
     * @return string 
     */
    public function getContenu()
    {
        return $this->contenu;
    }
  /**
  * @ORM\ManyToOne(targetEntity="formation\UserBundle\Entity\User", inversedBy="annonces")
  * 
  */
  private $utilisateur;
 /**
  * @ORM\ManyToOne(targetEntity="formation\annonceBundle\Entity\Categories")
  * 
  */
  private $Categories;

    /**
     * Set Categories
     *
     * @param \formation\annonceBundle\Entity\Categories $categories
     * @return Annonces
     */
    public function setCategories(\formation\annonceBundle\Entity\Categories $categories = null)
    {
        $this->Categories = $categories;

        return $this;
    }

    /**
     * Get Categories
     *
     * @return \formation\annonceBundle\Entity\Categories 
     */
    public function getCategories()
    {
        return $this->Categories;
    }

    /**
     * Set utilisateur
     *
     * @param \formation\UserBundle\Entity\User $utilisateur
     * @return Annonces
     */
    public function setUtilisateur(\formation\UserBundle\Entity\User $utilisateur = null)
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    /**
     * Get utilisateur
     *
     * @return \formation\UserBundle\Entity\User 
     */
    public function getUtilisateur()
    {
        return $this->utilisateur;
    }
}
