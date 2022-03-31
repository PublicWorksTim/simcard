<?php

class OrderObject
{
    private string $id;
    private OrderTypeEnum $type;
    private OrderStatusEnum $status;
    private DateTime $date;
    private string $subscriptionId;
    private SubscriptionObject $lazySubscription;

    public function __construct($bean)
    {
        $this->id = $bean['id'];
        $this->type = $bean['type'];
        $this->status = $bean['status'];
        $this->date = DateTime::createFromFormat('d-m-Y H:i:s', $bean['date']);
        $this->subscriptionId = $bean['subscription_id'];
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getType(): OrderTypeEnum
    {
        return $this->type;
    }

    public function getStatus(): OrderStatusEnum
    {
        return $this->status;
    }

    public function getDate(): DateTime
    {
        return $this->date;
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
