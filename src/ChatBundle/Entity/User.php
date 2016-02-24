<?php

namespace ChatBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity="Message", mappedBy="user")
     */
    private $messages;


    /**
    * @ORM\ManyToMany(targetEntity="Room", inversedBy="user")
    * @ORM\JoinTable(name="user_room")
    */
    private $room;


    public function __construct()
    {
        parent::__construct();
        // your own logic
    }
}