<?php

class InvoiceObject
{
    private string $id;
    private DateTime $date;
    private bool $paid;
    private float $amount;
    private string $subscriptionId;
    private SubscriptionObject $lazySubscription;

    public function __construct($bean)
    {
        $this->id = $bean['id'];
        $this->date = DateTime::createFromFormat('d-m-Y H:i:s', $bean['date']);
        $this->paid = $bean['paid'];
        $this->amount = $bean['amount'];
        $this->subscriptionId = $bean['subscription_id'];
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getDate(): DateTime
    {
        return $this->date;
    }

    public function getPaid(): bool
    {
        return $this->paid;
    }

    public function getAmount(): float
    {
        return $this->amount;
    }

    public function getSubscriptionId(): string
    {
        return $this->subscriptionId;
    }

    public function getSubscription(): SubscriptionObject
    {
        if (isset($this->lazySubscription)) {
            return $this->lazySubscription;
        } else {
            return $this->lazySubscription = SubscriptionFactory::getSubscription($this->getSubscriptionId());
        }
    }
}
