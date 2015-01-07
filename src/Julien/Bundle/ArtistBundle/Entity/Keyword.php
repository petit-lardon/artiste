<?php

namespace Julien\Bundle\ArtistBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Keywords
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Julien\Bundle\ArtistBundle\Entity\KeywordRepository")
 */
class Keyword
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
     * @ORM\Column(name="word", type="string", length=255)
     */
    private $word;


    /**
    * @ORM\ManyToMany(targetEntity="Work", mappedBy="keywords")
    */
    protected $works;

    

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
     * Set word
     *
     * @param string $word
     * @return Keywords
     */
    public function setWord($word)
    {
        $this->word = $word;

        return $this;
    }

    /**
     * Get word
     *
     * @return string 
     */
    public function getWord()
    {
        return $this->word;
    }
}
