<?php

class InvoiceFactory
{
    /**
     * Get Invoice object by id
     *
     * @param string $id
     * @return Invoice
     */
    public static function getInvoice(string $id): InvoiceObject
    {
        return new InvoiceObject(BeanFactory::getBean('invoice', $id));
    }

    /**
     * Get Invoice objects related to Subscription_id
     *
     * @param string $subscription_id
     * @return array
     */
    public static function getInvoicesBySubscription(string $subscription_id): array
    {
        $invoices = [];
        foreach (BeanFactory::getBeansBy('invoice', 'subscription_id', $subscription_id) as $bean) {
            $invoices[$bean['id']] = new InvoiceObject($bean);
        }
        return $invoices;
    }
}
