<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Person
 * @UniqueEntity(fields="email", message="This email is already taken")
 */
class Person implements UserInterface, \Serializable
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     * @Assert\NotBlank()
     * @Assert\Email()
     */
    private $email;

    /**
     * Plain password is not persisted
     * @var string
     * @Assert\NotBlank()
     * @Assert\Length(max=4096)
     */
    private $plainPassword;

    /**
     * @var string
     */
    private $password;

    /**
     * @var array
     */
    private $roles;

    public function __construct()
    {
        $this->roles = new ArrayCollection();
    }

    /**
     * Get id
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set email
     * @param string $email
     * @return Person
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    public function setPlainPassword($password) {
        $this->plainPassword = $password;
    }

    public function getPlainPassword() {
        return $this->plainPassword;
    }

    /**
     * Set password
     * @param string $password
     * @return Person
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return string Email, because login is via email
     */
    public function getUsername()
    {
        return $this->email;
    }

    /**
     * Set user roles
     * @param Role[] $roles
     * @return $this
     */
    public function setRoles(array $roles) {
        foreach($roles as $role) {
            $this->roles->add($role);
        }
        // for chaining
        return $this;
    }
    /**
     * Get user roles
     * @return Role[] roles
     */
    public function getRoles()
    {
        return $this->roles->toArray();
    }

    public function getSalt()
    {
        // no salt is needed, because using bcrypt
        return null;
    }

    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }

    /**
     * Encode session data
     * @return string Serialized session data
     */
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->email,
            $this->password
        ));
    }

    /**
     * Decode session data
     * @param $serialized - Serialized session data
     */
    public function unserialize($serialized)
    {
        list($this->id, $this->email, $this->password) = unserialize($serialized);
    }


}

