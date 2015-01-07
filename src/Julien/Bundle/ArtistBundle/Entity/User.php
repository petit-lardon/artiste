<?php

namespace Julien\Bundle\ArtistBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Entity\User as BaseUser;

/**
 * User
 *
 * @ORM\Table(name="fos_user")
 * @ORM\Entity(repositoryClass="Julien\Bundle\ArtistBundle\Entity\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    
    /**
    * @ORM\OneToOne(targetEntity="Artist", cascade={"persist"})
    */
    private $artist;
    
    
    /**
    * @ORM\OneToOne(targetEntity="Exponent", cascade={"persist"})
    */
    private $exponent;


    public function __construct() {
        parent::__construct();
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
}
