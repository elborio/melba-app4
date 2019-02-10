<?php
/**
 * Created by PhpStorm.
 * User: Boris
 * Date: 11/14/2016
 * Time: 5:36 PM
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class BeerMark
 * @package App\Entity
 * @ORM\Entity(repositoryClass="App\Entity\BeerMarkRepository")
 */
class BeerMark
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Group")
     */
    private $group;

    /**
     * @ORM\Column(type="datetime", name="date_added")
     */
    private $dateAdded;


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
     * Set dateAdded
     *
     * @param \DateTime $dateAdded
     *
     * @return BeerMark
     */
    public function setDateAdded($dateAdded)
    {
        $this->dateAdded = $dateAdded;

        return $this;
    }

    /**
     * Get dateAdded
     *
     * @return \DateTime
     */
    public function getDateAdded()
    {
        return $this->dateAdded;
    }

    /**
     * Set user
     *
     * @param \App\Entity\User $user
     *
     * @return BeerMark
     */
    public function setUser(\App\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \App\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set group
     *
     * @param \App\Entity\Group $group
     *
     * @return BeerMark
     */
    public function setGroup(\App\Entity\Group $group = null)
    {
        $this->group = $group;

        return $this;
    }

    /**
     * Get group
     *
     * @return \App\Entity\Group
     */
    public function getGroup()
    {
        return $this->group;
    }
}
