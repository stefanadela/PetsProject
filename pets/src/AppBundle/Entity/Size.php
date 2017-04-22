<?php
/**
 * Created by PhpStorm.
 * User: Adela_PC
 * Date: 29.01.2017
 * Time: 17:21
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;
use AppBundle\Entity\Breed;

/**
 * Class Size
 * @ORM\Entity
 * @ORM\Table(name="size")
 * @UniqueEntity(fields="name", message="Name already taken")
 *
 * @package AppBundle\Entity
 */
class Size
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
     * @ORM\ManyToMany(targetEntity="Breed", mappedBy="size")
     */
    private $breed;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->breed = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Size
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
     * Add breed
     *
     * @param \AppBundle\Entity\Breed $breed
     * @return Size
     */
    public function addBreed(\AppBundle\Entity\Breed $breed)
    {
        $this->breed[] = $breed;

        return $this;
    }

    /**
     * Remove breed
     *
     * @param \AppBundle\Entity\Breed $breed
     */
    public function removeBreed(\AppBundle\Entity\Breed $breed)
    {
        $this->breed->removeElement($breed);
    }

    /**
     * Get breed
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getBreed()
    {
        return $this->breed;
    }
}
