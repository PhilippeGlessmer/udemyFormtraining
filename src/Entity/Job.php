<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints\GroupSequence;
use Symfony\Component\Validator\GroupSequenceProviderInterface;

/**
* @Assert\GroupSequenceProvider()
 */
class Job implements GroupSequenceProviderInterface
{
    private $title;
    private $place;
    private $contact;
    /**
     * @Assert\IsTrue(groups={"ForeignJob"},message="New-Work necessite un permis de travail!")
     */
    private $autorizationWork;
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
        return $group;
    }
}