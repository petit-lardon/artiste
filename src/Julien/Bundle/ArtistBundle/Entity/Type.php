<?php

namespace Julien\Bundle\ArtistBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Type
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Julien\Bundle\ArtistBundle\Entity\TypeRepository")
 */
class Type
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
    * @ORM\OneToMany(targetEntity="Work", mappedBy="type")
    */
    protected $works;

    /**
    * @ORM\ManyToMany(targetEntity="Category", inversedBy="types", cascade={"persist"})
    * @ORM\JoinTable(name="type_category")
    */
    protected $categories;

    /**
    * @ORM\ManyToMany(targetEntity="Artist", mappedBy="types")
    */
    protected $artists;

    
    
    
    
    
    
    public function __construct() {
        $this->works = new ArrayCollection();
    }


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
     * Set name
     *
     * @param string $name
     * @return Type
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Type
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }
}
