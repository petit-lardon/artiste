<?php

namespace Julien\Bundle\ArtistBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Event
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Julien\Bundle\ArtistBundle\Entity\EventRepository")
 */
class Event
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
     * @var \DateTime
     *
     * @ORM\Column(name="begins_at", type="datetime")
     */
    private $beginsAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ends_at", type="datetime")
     */
    private $endsAt;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
    * @ORM\ManyToOne(targetEntity="Exposure", inversedBy="events", cascade={"persist"})
    * @ORM\joinColumn(name="exposure_id", referencedColumnName="id", nullable=false)
    */
    private $exposure;
    

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
     * Set beginsAt
     *
     * @param \DateTime $beginsAt
     * @return Event
     */
    public function setBeginsAt($beginsAt)
    {
        $this->beginsAt = $beginsAt;

        return $this;
    }

    /**
     * Get beginsAt
     *
     * @return \DateTime 
     */
    public function getBeginsAt()
    {
        return $this->beginsAt;
    }

    /**
     * Set endsAt
     *
     * @param \DateTime $endsAt
     * @return Event
     */
    public function setEndsAt($endsAt)
    {
        $this->endsAt = $endsAt;

        return $this;
    }

    /**
     * Get endsAt
     *
     * @return \DateTime 
     */
    public function getEndsAt()
    {
        return $this->endsAt;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Event
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
}
