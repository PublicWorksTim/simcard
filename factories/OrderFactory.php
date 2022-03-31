<?php

class OrderFactory
{
    /**
     * Get Order object by id
     *
     * @param string $id
     * @return Order
     */
    public static function getInvoice(string $id): OrderObject
    {
        return new OrderObject(BeanFactory::getBean('order', $id));
    }

    /**
     * Get Order objects related to Subscription_id
     *
     * @param string $subscription_id
     * @return array
     */
    public static function getOrdersBySubscription(string $subscription_id): array
    {
        $orders = [];
        foreach (BeanFactory::getBeansBy('order', 'subscription_id', $subscription_id) as $bean) {
            $orders[$bean['id']] = new OrderObject($bean);
        }
        return $orders;
    }
}
