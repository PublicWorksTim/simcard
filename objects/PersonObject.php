<?php

class PersonObject
{
    private string $id;
    private string $firstName;
    private string $lastName;
    private bool $actionsBlocked;
    private array $lazySubscriptions;

    public function __construct($bean)
    {
        $this->id = $bean['id'];
        $this->firstName = $bean['first_name'];
        $this->lastName = $bean['last_name'];
        $this->actionsBlocked = $bean['actions_blocked'];
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getName(): string
    {
        return $this->getFirstName() . " " . $this->getLastName();
    }

    public function getActionsBlocked(): bool
    {
        return $this->actionsBlocked;
    }

    public function getSubscriptions()
    {
        if (isset($this->lazySubscriptions)) {
            return $this->lazySubscriptions;
        }

        return  $this->lazySubscriptions = SubscriptionFactory::getSubscriptionsByPerson($this->getId());
    }
}
