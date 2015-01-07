<?php

namespace Julien\Bundle\ArtistBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Exponent
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Julien\Bundle\ArtistBundle\Entity\ExponentRepository")
 */
class Exponent
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
     * @ORM\Column(name="status", type="string", length=255)
     */
    private $status;
    
    /**
    * @ORM\OneToMany(targetEntity="Exposure", mappedBy="exponent")
    */
    protected $exposures;


    public function __construct() {
        $this->$exposures = new ArrayCollection();
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
     * Set status
     *
     * @param string $status
     * @return Exponent
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string 
     */
    public function getStatus()
    {
        return $this->status;
    }
}
