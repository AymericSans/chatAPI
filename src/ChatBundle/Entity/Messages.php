<?php

namespace ChatBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Messages
 *
 * @ORM\Table(name="messages", indexes={@ORM\Index(name="fk_messages_group1_idx", columns={"group_id"}), @ORM\Index(name="fk_messages_users1_idx", columns={"users_id"})})
 * @ORM\Entity
 */
class Messages
{
    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text", nullable=true)
     */
    private $content;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=true)
     */
    private $createdAt;

    /**
     * @var integer
     *
     * @ORM\Column(name="messages_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $messagesId;

    /**
     * @var \ChatBundle\Entity\Users
     *
     * @ORM\ManyToOne(targetEntity="ChatBundle\Entity\Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="users_id", referencedColumnName="users_id")
     * })
     */
    private $users;

    /**
     * @var \ChatBundle\Entity\Group
     *
     * @ORM\ManyToOne(targetEntity="ChatBundle\Entity\Group")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="group_id", referencedColumnName="group_id")
     * })
     */
    private $group;



    /**
     * Set content
     *
     * @param string $content
     * @return Messages
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Messages
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Get messagesId
     *
     * @return integer 
     */
    public function getMessagesId()
    {
        return $this->messagesId;
    }

    /**
     * Set users
     *
     * @param \ChatBundle\Entity\Users $users
     * @return Messages
     */
    public function setUsers(\ChatBundle\Entity\Users $users = null)
    {
        $this->users = $users;

        return $this;
    }

    /**
     * Get users
     *
     * @return \ChatBundle\Entity\Users 
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * Set group
     *
     * @param \ChatBundle\Entity\Group $group
     * @return Messages
     */
    public function setGroup(\ChatBundle\Entity\Group $group = null)
    {
        $this->group = $group;

        return $this;
    }

    /**
     * Get group
     *
     * @return \ChatBundle\Entity\Group 
     */
    public function getGroup()
    {
        return $this->group;
    }
}
