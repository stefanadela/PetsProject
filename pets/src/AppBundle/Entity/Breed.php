<?php
/**
 * Created by PhpStorm.
 * User: Adela_PC
 * Date: 29.01.2017
 * Time: 17:11
 */

namespace AppBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;
use AppBundle\Entity\User;
use AppBundle\Entity\Color;
use AppBundle\Entity\Size;

/**
 * Class Breed
 * @ORM\Entity
 * @ORM\Table(name="breed")
 * @UniqueEntity(fields="name", message="name already taken")
 */
class Breed
{

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100, unique=true)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=225, unique=false, nullable=true)
     */
    private $image;

    /**
     * @ORM\ManyToMany(targetEntity="User", mappedBy="breed")
     */
    private $user;

    /**
     * @ORM\ManyToMany(targetEntity="Color", inversedBy="breed")
     * @ORM\JoinTable(name="breed_color")
     */
    private $color;

    /**
     * @ORM\ManyToMany(targetEntity="Size", inversedBy="breed")
     * @ORM\JoinTable(name="breed_size")
     */
    private $size;

    /**
     * @ORM\Column(type="integer", length=50)
     */
    private $age;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->user = new ArrayCollection();
        $this->color = new ArrayCollection();
        $this->size = new ArrayCollection();
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
     * Set name
     *
     * @param string $name
     * @return Breed
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
     * Add user
     *
     * @param User $user
     * @return Breed
     */
    public function addUser(User $user)
    {
        $this->user[] = $user;

        return $this;
    }

    /**
     * Remove user
     *
     * @param User $user
     */
    public function removeUser(User $user)
    {
        $this->user->removeElement($user);
    }

    /**
     * Get user
     *
     * @return Collection
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Add color
     *
     * @param Color $color
     * @return Breed
     */
    public function addColor(Color $color)
    {
        $this->color[] = $color;

        return $this;
    }

    /**
     * Remove color
     *
     * @param \AppBundle\Entity\Color $color
     */
    public function removeColor(\AppBundle\Entity\Color $color)
    {
        $this->color->removeElement($color);
    }

    /**
     * Get color
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Add size
     *
     * @param \AppBundle\Entity\Size $size
     * @return Breed
     */
    public function addSize(\AppBundle\Entity\Size $size)
    {
        $this->size[] = $size;

        return $this;
    }

    /**
     * Remove size
     *
     * @param \AppBundle\Entity\Size $size
     */
    public function removeSize(\AppBundle\Entity\Size $size)
    {
        $this->size->removeElement($size);
    }

    /**
     * Get size
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param mixed $age
     */
    public function setAge($age)
    {
        $this->age = $age;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }
}
