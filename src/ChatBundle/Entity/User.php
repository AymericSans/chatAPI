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

    /**
     * @ORM\OneToMany(targetEntity="Room", mappedBy="author")
     */
    private $authors;


    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

    /**
     * Add messages
     *
     * @param \ChatBundle\Entity\Message $messages
     * @return User
     */
    public function addMessage(\ChatBundle\Entity\Message $messages)
    {
        $this->messages[] = $messages;

        return $this;
    }

    /**
     * Remove messages
     *
     * @param \ChatBundle\Entity\Message $messages
     */
    public function removeMessage(\ChatBundle\Entity\Message $messages)
    {
        $this->messages->removeElement($messages);
    }

    /**
     * Get messages
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMessages()
    {
        return $this->messages;
    }

    /**
     * Add room
     *
     * @param \ChatBundle\Entity\Room $room
     * @return User
     */
    public function addRoom(\ChatBundle\Entity\Room $room)
    {
        $this->room[] = $room;

        return $this;
    }

    /**
     * Remove room
     *
     * @param \ChatBundle\Entity\Room $room
     */
    public function removeRoom(\ChatBundle\Entity\Room $room)
    {
        $this->room->removeElement($room);
    }

    /**
     * Get room
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRoom()
    {
        return $this->room;
    }

    /**
     * Add authors
     *
     * @param \ChatBundle\Entity\Room $authors
     * @return User
     */
    public function addAuthor(\ChatBundle\Entity\Room $authors)
    {
        $this->authors[] = $authors;

        return $this;
    }

    /**
     * Remove authors
     *
     * @param \ChatBundle\Entity\Room $authors
     */
    public function removeAuthor(\ChatBundle\Entity\Room $authors)
    {
        $this->authors->removeElement($authors);
    }

    /**
     * Get authors
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAuthors()
    {
        return $this->authors;
    }
}
