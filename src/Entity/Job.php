<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints\GroupSequence;
use Symfony\Component\Validator\GroupSequenceProviderInterface;
use App\Validator\Constraints  as CustomAssert;
/**
* @Assert\GroupSequenceProvider()
 */
class Job implements GroupSequenceProviderInterface
{
    private $title;
    private $place;

    private $country;

    /**
     * @CustomAssert\FrenchDomaineName(groups={"FrenchJob"})
     */
    private $contact;

    /**
     * @Assert\IsTrue(groups={"ForeignJob"},message="New-Work necessite un permis de travail!")
     */
    private $autorizationWork;

    private $salary;
    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title): void
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getPlace()
    {
        return $this->place;
    }

    /**
     * @param mixed $place
     */
    public function setPlace($place): void
    {
        $this->place = $place;
    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param mixed $country
     */
    public function setCountry($country): void
    {
        $this->country = $country;
    }


    /**
     * @return mixed
     */
    public function getContact()
    {
        return $this->contact;
    }
    /**
     * @param mixed $contact
     */
    public function setContact($contact): void
    {
        $this->contact = $contact;
    }

    /**
     * @return mixed
     */
    public function getAutorizationWork()
    {
        return $this->autorizationWork;
    }

    /**
     * @param mixed $autorizationWork
     */
    public function setAutorizationWork($autorizationWork): void
    {
        $this->autorizationWork = $autorizationWork;
    }


    public function getGroupSequence(): array|GroupSequence
    {
        $group = ['Job'];
        if($this->getPlace() == 'New-York'){
            $group[] = "ForeignJob";
        }
        if($this->getPlace() == 'Paris'){
            $group[] = "FrenchJob";
        }
        return $group;
    }

    /**
     * @return mixed
     */
    public function getSalary()
    {
        return $this->salary;
    }

    /**
     * @param mixed $salary
     */
    public function setSalary($salary): void
    {
        $this->salary = $salary;
    }


}