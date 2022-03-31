<?php

class SubscriptionController
{
    public static function simActivateAllowed(string $subscriptionId): bool
    {
        $subscription = SubscriptionFactory::getSubscription($subscriptionId);
        $person = $subscription->getPerson();

        self::print("Subscription id: " . $subscription->getId() . " Person: " . $person->getname());

        if ($person->getActionsBlocked()) {
            self::print("Refused: Actions blocked!");
            return false;
        }

        if (!$subscription->getActive()) {
            self::print("Refused: Not active!");
            return false;
        }

        $newOrRenewal = false;
        $checkDate = new DateTime();
        $checkDate->sub(new DateInterval('P30D'));

        foreach ($subscription->getOrders() as $order) {
            if ($order->getType() == OrderTypeEnum::NEWCUSTOMER && $order->getStatus() != OrderStatusEnum::COMPLETED) {
                self::print("Refused: Newcustomer not completed!");
                return false;
            } elseif ($order->getType() == OrderTypeEnum::ACTIVATESIM && $order->getStatus() != OrderStatusEnum::COMPLETED && $order->getStatus() != OrderStatusEnum::CANCELLED) {
                self::print("Refused: Activatesim not completed!");
                return false;
            } elseif ($order->getDate() > $checkDate && $order->getStatus() == OrderStatusEnum::COMPLETED) {
                if ($order->getType() == OrderTypeEnum::NEWSIM) {
                    $newOrRenewal = true;
                } elseif ($order->getType() == OrderTypeEnum::RENEWEL) {
                    $newOrRenewal = true;
                }
            }
        }

        if (!$newOrRenewal) {
            self::print("Refused: No activation reason found!");
            return false;
        }

        foreach ($person->getSubscriptions() as $subscript) {
            foreach ($subscript->getInvoices() as $invoice) {
                if (!$invoice->getPaid() && $invoice->getDate() < $checkDate) {
                    self::print("Refused: Old invoice unpaid!");
                    return false;
                }
            }
            $activeSims = 0;
            foreach ($subscript->getOrders() as $order) {
                if ($order->getType() == OrderTypeEnum::ACTIVATESIM && $order->getDate() > $checkDate && $order->getStatus() != OrderStatusEnum::CANCELLED) {
                    $activeSims++;
                }
            }

            if ($activeSims > 2) {
                self::print("Refused: Too many sims activations requested!");
                return false;
            }
        }

        self::print("Accepted!");
        return true;
    }

    public static function print(string $text)
    {
        echo $text . "<br>";
    }
}
