<?php

class SubscriptionObject
{
    private string $id;
    private string $phoneNumber;
    private bool $active;
    private string $personId;
    private PersonObject $lazyPerson;
    private array $lazyInvoices;
    private array $lazyOrders;

    public function __construct($bean)
    {
        $this->id = $bean['id'];
        $this->phoneNumber = $bean['phone_number'];
        $this->active = $bean['active'];
        $this->personId = $bean['person_id'];
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }

    public function getActive(): bool
    {
        return $this->active;
    }

    public function getPersonId(): string
    {
        return $this->personId;
    }

    public function getPerson(): PersonObject
    {
        if (isset($this->lazyPerson)) {
            return $this->lazyPerson;
        } else {
            return $this->lazyPerson = PersonFactory::getPerson($this->getPersonId());
        }
    }

    public function getInvoices()
    {
        if (isset($this->lazyInvoices)) {
            return $this->lazyInvoices;
        }

        return  $this->lazyInvoices = InvoiceFactory::getInvoicesBySubscription($this->getId());
    }

    public function getOrders()
    {
        if (isset($this->lazyOrders)) {
            return $this->lazyOrders;
        }

        return  $this->lazyOrders = OrderFactory::getOrdersBySubscription($this->getId());
    }
}
