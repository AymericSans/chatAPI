<?php

namespace ChatBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Group
 *
 * @ORM\Table(name="group", indexes={@ORM\Index(name="fk_group_users1_idx", columns={"author_id"})})
 * @ORM\Entity
 */
class Group
{
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=70, nullable=true)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="group_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $groupId;

    /**
     * @var \ChatBundle\Entity\Users
     *
     * @ORM\ManyToOne(targetEntity="ChatBundle\Entity\Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="author_id", referencedColumnName="users_id")
     * })
     */
    private $author;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="ChatBundle\Entity\Users", inversedBy="group")
     * @ORM\JoinTable(name="group_members",
     *   joinColumns={
     *     @ORM\JoinColumn(name="group_id", referencedColumnName="group_id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="users_id", referencedColumnName="users_id")
     *   }
     * )
     */
    private $users;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Set name
     *
     * @param string $name
     * @return Group
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
     * Get groupId
     *
     * @return integer 
     */
    public function getGroupId()
    {
        return $this->groupId;
    }

    /**
     * Set author
     *
     * @param \ChatBundle\Entity\Users $author
     * @return Group
     */
    public function setAuthor(\ChatBundle\Entity\Users $author = null)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return \ChatBundle\Entity\Users 
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Add users
     *
     * @param \ChatBundle\Entity\Users $users
     * @return Group
     */
    public function addUser(\ChatBundle\Entity\Users $users)
    {
        $this->users[] = $users;

        return $this;
    }

    /**
     * Remove users
     *
     * @param \ChatBundle\Entity\Users $users
     */
    public function removeUser(\ChatBundle\Entity\Users $users)
    {
        $this->users->removeElement($users);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUsers()
    {
        return $this->users;
    }
}
