<?php

/**
 * Created by PhpStorm.
 * User: Adela_PC
 * Date: 29.01.2017
 * Time: 16:37
 */
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;
use AppBundle\Entity\Breed;
use FOS\UserBundle\Entity\User as BaseUser;

/**
 * Class User
 * @ORM\Entity
 * @ORM\Table(name="user")
// * @UniqueEntity(fields="email", message="Email already taken")
// * @UniqueEntity(fields="username", message="Username already taken")
 *
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 *
 * @package AppBundle\Entity
 */
class User extends BaseUser implements UserInterface, \Serializable
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

//    /**
//     * @ORM\Column(type="string", length=100, unique=true)
//     */
//    protected $username;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $firstName;

    /**
     * @ORM\Column(type="string", length=100)
     *
     */
    protected $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="facebook_id", type="string", nullable=true)
     */
    private $facebookID;

//    /**
//     * @var string
//     *
//     * @ORM\Column(name="google_id", type="string", nullable=true)
//     */
//    private $googleID;

    /**
     * @ORM\ManyToMany(targetEntity="Breed", inversedBy="user")
     * @ORM\JoinTable(name="user_breed")
     */
    protected $breed;

    /**
     * Returns the roles granted to the user.
     *
     * <code>
     * public function getRoles()
     * {
     *     return array('ROLE_USER');
     * }
     * </code>
     *
     * Alternatively, the roles might be stored on a ``roles`` property,
     * and populated in any number of different ways when the user object
     * is created.
     *
     * @return (Role|string)[] The user roles
     */
    public function getRoles()
    {
        return array('ROLE_USER');
    }

    /**
     * Returns the password used to authenticate the user.
     *
     * This should be the encoded password. On authentication, a plain-text
     * password will be salted, encoded, and then compared to this value.
     *
     * @return string The password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Returns the salt that was originally used to encode the password.
     *
     * This can return null if the password was not encoded using a salt.
     *
     * @return string|null The salt
     */
    public function getSalt()
    {
        // The bcrypt algorithm doesn't require a separate salt.
        // You *may* need a real salt if you choose a different encoder.
        return null;
    }

    /**
     * Returns the username used to authenticate the user.
     *
     * @return string The username
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Removes sensitive data from the user.
     *
     * This is important if, at any given point, sensitive information like
     * the plain-text password is stored on this object.
     */
    public function eraseCredentials()
    {
    }

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
     * Set username
     *
     * @param string $username
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     * @return User
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = password_hash($password, PASSWORD_BCRYPT);

        return $this;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Add breed
     *
     * @param \AppBundle\Entity\Breed $breed
     * @return User
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

    /** @see \Serializable::serialize() */
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->username,
            $this->password,
            // see section on salt below
            // $this->salt,
        ));
    }

    /** @see \Serializable::unserialize() */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->username,
            $this->password,
            // see section on salt below
            // $this->salt
            ) = unserialize($serialized);
    }
}
