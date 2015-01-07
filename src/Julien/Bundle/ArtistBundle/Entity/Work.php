<?php

namespace Julien\Bundle\ArtistBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Work
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Julien\Bundle\ArtistBundle\Entity\WorkRepository")
 */
class Work
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
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="achieved_at", type="datetime")
     */
    private $achievedAt;

    /**
     * @var string
     *
     * @ORM\Column(name="height", type="string", length=255)
     */
    private $height;

    /**
     * @var string
     *
     * @ORM\Column(name="width", type="string", length=255)
     */
    private $width;

    /**
     * @var string
     *
     * @ORM\Column(name="depth", type="string", length=255)
     */
    private $depth;
    
    /**
    * @ORM\OneToMany(targetEntity="Artist", mappedBy="work")
    */
    protected $artists;

    /**
    * @ORM\OneToMany(targetEntity="Step", mappedBy="work")
    */
    protected $steps;

    /**
    * @ORM\ManyToOne(targetEntity="Type", inversedBy="works", cascade={"persist"})
    * @ORM\joinColumn(name="type_id", referencedColumnName="id", nullable=false)
    */
    private $type;

    /**
    * @ORM\ManyToMany(targetEntity="Keyword", inversedBy="works", cascade={"persist"})
    * @ORM\JoinTable(name="work_keyword")
    */
    protected $keywordss;


    public function __construct() {
        $this->artists = new ArrayCollection();
        $this->steps = new ArrayCollection();
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
     * @return Work
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
     * @return Work
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

    /**
     * Set achievedAt
     *
     * @param \DateTime $achievedAt
     * @return Work
     */
    public function setAchievedAt($achievedAt)
    {
        $this->achievedAt = $achievedAt;

        return $this;
    }

    /**
     * Get achievedAt
     *
     * @return \DateTime 
     */
    public function getAchievedAt()
    {
        return $this->achievedAt;
    }

    /**
     * Set height
     *
     * @param string $height
     * @return Work
     */
    public function setHeight($height)
    {
        $this->height = $height;

        return $this;
    }

    /**
     * Get height
     *
     * @return string 
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Set width
     *
     * @param string $width
     * @return Work
     */
    public function setWidth($width)
    {
        $this->width = $width;

        return $this;
    }

    /**
     * Get width
     *
     * @return string 
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * Set depth
     *
     * @param string $depth
     * @return Work
     */
    public function setDepth($depth)
    {
        $this->depth = $depth;

        return $this;
    }

    /**
     * Get depth
     *
     * @return string 
     */
    public function getDepth()
    {
        return $this->depth;
    }
}
