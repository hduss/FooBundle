<?php

namespace CustomerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Customer
 */
class Customer
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    private $pastName;

    /**
     * @var \DateTime
     */
    private $birthday;

    /**
     * @var string
     */
    private $balance;




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
     * Set firstName
     *
     * @param string $firstName
     * @return Customer
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
     * Set pastName
     *
     * @param string $pastName
     * @return Customer
     */
    public function setPastName($pastName)
    {
        $this->pastName = $pastName;

        return $this;
    }

    /**
     * Get pastName
     *
     * @return string 
     */
    public function getPastName()
    {
        return $this->pastName;
    }

    /**
     * Set birthday
     *
     * @param \DateTime $birthday
     * @return Customer
     */
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;

        return $this;
    }

    /**
     * Get birthday
     *
     * @return \DateTime 
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * Set balance
     *
     * @param string $balance
     * @return Customer
     */
    public function setBalance($balance)
    {
        $this->balance = $balance;

        return $this;
    }

    /**
     * Get balance
     *
     * @return string 
     */
    public function getBalance()
    {
        return $this->balance;
    }

}
