<?php

namespace Abba\PenseesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Citation
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Abba\PenseesBundle\Entity\CitationRepository")
 */
class Citation
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="contenu", type="text")
     */
    private $contenu;


    /**
     * @ORM\ManyToOne(targetEntity="Auteur", inversedBy="citations")
     * @ORM\JoinColumn(name="auteur_id", referencedColumnName="id")
     */
    protected $auteur;

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
     * Set contenu
     *
     * @param string $contenu
     * @return Citation
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
     * Set auteur
     *
     * @param \Abba\PenseesBundle\Entity\Auteur $auteur
     * @return Citation
     */
    public function setAuteur(\Abba\PenseesBundle\Entity\Auteur $auteur = null)
    {
        $this->auteur = $auteur;

        return $this;
    }

    /**
     * Get auteur
     *
     * @return \Abba\PenseesBundle\Entity\Auteur 
     */
    public function getAuteur()
    {
        return $this->auteur;
    }
}
