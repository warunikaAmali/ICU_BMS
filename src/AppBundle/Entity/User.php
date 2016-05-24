<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * User
 *
 * @ORM\Table(name="user", indexes={@ORM\Index(name="hospital_id", columns={"hospital_id"})})
 * @ORM\Entity
 */
class User implements UserInterface
{
    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=100, nullable=true)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="role", type="string", length=20, nullable=true)
     */
    private $role;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=20)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $username;

    /**
     * @var \AppBundle\Entity\Icu
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Icu")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="hospital_id", referencedColumnName="id")
     * })
     */
    private $hospital;



    /**
     * Set password
     *
     * @param string $password
     *
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set role
     *
     * @param string $role
     *
     * @return User
     */
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role
     *
     * @return string
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set hospital
     *
     * @param \AppBundle\Entity\Icu $hospital
     *
     * @return User
     */
    public function setHospital(\AppBundle\Entity\Icu $hospital = null)
    {
        $this->hospital = $hospital;

        return $this;
    }

    /**
     * Get hospital
     *
     * @return \AppBundle\Entity\Icu
     */
    public function getHospital()
    {
        return $this->hospital;
    }

    /**
     * Returns the roles or permissions granted to the user for security.
     */
    public function getRoles()
    {
        //$roles = $this->roles;

        // guarantees that a user always has at least one role for security
        //if (empty($roles)) {
        //$roles[] = 'ROLE_USER';
        //}

        //return array_unique($roles);

        return array($this->role);
    }

    /**
     * Returns the salt that was originally used to encode the password.
     */
    public function getSalt()
    {
        // See "Do you need to use a Salt?" at http://symfony.com/doc/current/cookbook/security/entity_provider.html
        // we're using bcrypt in security.yml to encode the password, so
        // the salt value is built-in and you don't have to generate one

        return;
    }

    /**
     * Removes sensitive data from the user.
     */
    public function eraseCredentials()
    {
        // if you had a plainPassword property, you'd nullify it here
        // $this->plainPassword = null;
    }
}
