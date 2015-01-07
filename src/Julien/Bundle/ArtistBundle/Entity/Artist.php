<?php

namespace Julien\Bundle\ArtistBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Artist
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Julien\Bundle\ArtistBundle\Entity\ArtistRepository")
 */
class Artist
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
     * @ORM\Column(name="career", type="text")
     */
    private $career;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="birthday_at", type="datetime")
     */
    private $birthdayAt;

    /**
    * @ORM\ManyToOne(targetEntity="Work", inversedBy="artists", cascade={"persist"})
    * @ORM\joinColumn(name="work_id", referencedColumnName="id", nullable=false)
    */
    private $work;
    
    
    /**
    * @ORM\ManyToMany(targetEntity="Type", inversedBy="artists", cascade={"persist"})
    * @ORM\JoinTable(name="artist_type")
    */
    protected $types;

    
    
    
    
    
    
    
    
    

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
     * Set career
     *
     * @param string $career
     * @return Artist
     */
    public function setCareer($career)
    {
        $this->career = $career;

        return $this;
    }

    /**
     * Get career
     *
     * @return string 
     */
    public function getCareer()
    {
        return $this->career;
    }

    /**
     * Set birthdayAt
     *
     * @param \DateTime $birthdayAt
     * @return Artist
     */
    public function setBirthdayAt($birthdayAt)
    {
        $this->birthdayAt = $birthdayAt;

        return $this;
    }

    /**
     * Get birthdayAt
     *
     * @return \DateTime 
     */
    public function getBirthdayAt()
    {
        return $this->birthdayAt;
    }
}
