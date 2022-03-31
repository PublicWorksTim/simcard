<?php

class SubscriptionFactory
{
    /**
     * Get Subscription object by id
     *
     * @param string $id
     * @return Subscription
     */
    public static function getSubscription(string $id): SubscriptionObject
    {
        return new SubscriptionObject(BeanFactory::getBean('subscription', $id));
    }

    /**
     * Get Subscription objects related to Person_id
     *
     * @param string $person_id
     * @return array
     */
    public static function getSubscriptionsByPerson(string $person_id): array
    {
        $subscriptions = [];
        foreach (BeanFactory::getBeansBy('subscription', 'person_id', $person_id) as $bean) {
            $subscriptions[$bean['id']] = new SubscriptionObject($bean);
        }
        return $subscriptions;
    }
}
