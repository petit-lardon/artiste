<?php

namespace Julien\Bundle\ArtistBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Step
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Julien\Bundle\ArtistBundle\Entity\StepRepository")
 */
class Step
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
     * @var \DateTime
     *
     * @ORM\Column(name="achieved_at", type="datetime")
     */
    private $achievedAt;


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
     * @return Step
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
     * @return Step
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
     * @return Step
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
}
