<?php

/**
 * Mockup BeansFactory class for testing
 */
class BeanFactory
{
    private static array $data = [];
    private static bool $initialized = false;

    private static function initialize()
    {
        if (self::$initialized) {
            return;
        }

        $person = [];
        $person['0'] = ['id'=>'0', 'first_name'=>'Carl', 'last_name'=>'Pratt', 'actions_blocked'=>true];
        $person['1'] = ['id'=>'1', 'first_name'=>'Steve', 'last_name'=>'Muppet', 'actions_blocked'=>false];
        $person['2'] = ['id'=>'2', 'first_name'=>'Valerie', 'last_name'=>'Doco', 'actions_blocked'=>false];
        $person['3'] = ['id'=>'3', 'first_name'=>'Moop', 'last_name'=>'Planned', 'actions_blocked'=>false];
        $person['4'] = ['id'=>'4', 'first_name'=>'Jelle', 'last_name'=>'Doco', 'actions_blocked'=>false];
        $person['5'] = ['id'=>'5', 'first_name'=>'Riek', 'last_name'=>'Klaar', 'actions_blocked'=>false];
        $person['6'] = ['id'=>'6', 'first_name'=>'Peter', 'last_name'=>'Lek', 'actions_blocked'=>false];
        $person['7'] = ['id'=>'7', 'first_name'=>'Maan', 'last_name'=>'Dar', 'actions_blocked'=>false];
        self::$data['person'] = $person;

        $subscription = [];
        $subscription['0'] = ['id'=>'0', 'phone_number'=>'06060606', 'active'=>true, 'person_id'=>'0'];
        $subscription['1'] = ['id'=>'1', 'phone_number'=>'06060606', 'active'=>true, 'person_id'=>'1'];
        $subscription['2'] = ['id'=>'2', 'phone_number'=>'06060606', 'active'=>false, 'person_id'=>'2'];
        $subscription['3'] = ['id'=>'3', 'phone_number'=>'06060606', 'active'=>true, 'person_id'=>'3'];
        $subscription['4'] = ['id'=>'4', 'phone_number'=>'06060606', 'active'=>true, 'person_id'=>'4'];
        $subscription['5'] = ['id'=>'5', 'phone_number'=>'06060606', 'active'=>true, 'person_id'=>'5'];
        $subscription['6'] = ['id'=>'6', 'phone_number'=>'06060606', 'active'=>true, 'person_id'=>'6'];
        $subscription['7'] = ['id'=>'7', 'phone_number'=>'06060606', 'active'=>true, 'person_id'=>'7'];
        $subscription['8'] = ['id'=>'8', 'phone_number'=>'06060606', 'active'=>true, 'person_id'=>'5'];
        self::$data['subscription'] = $subscription;

        $invoice = [];
        $invoice['0'] = ['id'=>'0', 'date'=>'05-01-2022 06:30:40', 'paid'=>true, 'amount'=>5.55, 'subscription_id'=>'0'];
        $invoice['1'] = ['id'=>'1', 'date'=>'05-01-2022 06:30:40', 'paid'=>true, 'amount'=>5.55, 'subscription_id'=>'1'];
        $invoice['2'] = ['id'=>'2', 'date'=>'05-01-2022 06:30:40', 'paid'=>true, 'amount'=>5.55, 'subscription_id'=>'2'];
        $invoice['3'] = ['id'=>'3', 'date'=>'05-01-2022 06:30:40', 'paid'=>false, 'amount'=>5.55, 'subscription_id'=>'3'];
        $invoice['4'] = ['id'=>'4', 'date'=>'05-01-2022 06:30:40', 'paid'=>true, 'amount'=>5.55, 'subscription_id'=>'4'];
        $invoice['5'] = ['id'=>'5', 'date'=>'05-01-2022 06:30:40', 'paid'=>true, 'amount'=>5.55, 'subscription_id'=>'5'];
        $invoice['6'] = ['id'=>'6', 'date'=>'05-01-2022 06:30:40', 'paid'=>true, 'amount'=>5.55, 'subscription_id'=>'6'];
        $invoice['7'] = ['id'=>'7', 'date'=>'05-01-2022 06:30:40', 'paid'=>true, 'amount'=>5.55, 'subscription_id'=>'7'];
        $invoice['8'] = ['id'=>'8', 'date'=>'05-01-2022 06:30:40', 'paid'=>true, 'amount'=>5.55, 'subscription_id'=>'8'];
        self::$data['invoice'] = $invoice;

        $order = [];
        $order['0'] = ['id'=>'0', 'type'=>OrderTypeEnum::NEWCUSTOMER, 'status'=>OrderStatusEnum::COMPLETED, 'date'=>'01-05-2022 06:30:40', 'subscription_id'=>'0'];
        $order['1'] = ['id'=>'1', 'type'=>OrderTypeEnum::NEWCUSTOMER, 'status'=>OrderStatusEnum::INPROGRESS, 'date'=>'01-05-2022 06:30:40', 'subscription_id'=>'1'];
        $order['2'] = ['id'=>'2', 'type'=>OrderTypeEnum::NEWCUSTOMER, 'status'=>OrderStatusEnum::COMPLETED, 'date'=>'01-05-2022 06:30:40', 'subscription_id'=>'2'];
        $order['3'] = ['id'=>'3', 'type'=>OrderTypeEnum::NEWCUSTOMER, 'status'=>OrderStatusEnum::COMPLETED, 'date'=>'01-05-2022 06:30:40', 'subscription_id'=>'3'];
        $order['4'] = ['id'=>'4', 'type'=>OrderTypeEnum::NEWCUSTOMER, 'status'=>OrderStatusEnum::COMPLETED, 'date'=>'01-05-2022 06:30:40', 'subscription_id'=>'4'];
        $order['5'] = ['id'=>'5', 'type'=>OrderTypeEnum::NEWCUSTOMER, 'status'=>OrderStatusEnum::COMPLETED, 'date'=>'01-05-2022 06:30:40', 'subscription_id'=>'5'];
        $order['6'] = ['id'=>'6', 'type'=>OrderTypeEnum::NEWCUSTOMER, 'status'=>OrderStatusEnum::COMPLETED, 'date'=>'01-05-2022 06:30:40', 'subscription_id'=>'6'];
        $order['7'] = ['id'=>'7', 'type'=>OrderTypeEnum::NEWCUSTOMER, 'status'=>OrderStatusEnum::COMPLETED, 'date'=>'01-05-2022 06:30:40', 'subscription_id'=>'7'];

        $order['8'] = ['id'=>'8', 'type'=>OrderTypeEnum::ACTIVATESIM, 'status'=>OrderStatusEnum::INPROGRESS, 'date'=>'01-05-2022 06:30:40', 'subscription_id'=>'4'];
        $order['9'] = ['id'=>'9', 'type'=>OrderTypeEnum::ACTIVATESIM, 'status'=>OrderStatusEnum::CANCELLED, 'date'=>'01-05-2022 06:30:40', 'subscription_id'=>'4'];

        $order['10'] = ['id'=>'10', 'type'=>OrderTypeEnum::ACTIVATESIM, 'status'=>OrderStatusEnum::COMPLETED, 'date'=>'31-03-2022 06:30:40', 'subscription_id'=>'8'];
        $order['11'] = ['id'=>'11', 'type'=>OrderTypeEnum::ACTIVATESIM, 'status'=>OrderStatusEnum::COMPLETED, 'date'=>'31-03-2022 06:30:40', 'subscription_id'=>'8'];
        $order['12'] = ['id'=>'12', 'type'=>OrderTypeEnum::ACTIVATESIM, 'status'=>OrderStatusEnum::INPROGRESS, 'date'=>'31-03-2022 06:30:40', 'subscription_id'=>'8'];

        $order['13'] = ['id'=>'13', 'type'=>OrderTypeEnum::NEWSIM, 'status'=>OrderStatusEnum::COMPLETED, 'date'=>'31-03-2022 06:30:40', 'subscription_id'=>'0'];
        $order['14'] = ['id'=>'14', 'type'=>OrderTypeEnum::RENEWEL, 'status'=>OrderStatusEnum::COMPLETED, 'date'=>'31-03-2022 06:30:40', 'subscription_id'=>'1'];
        $order['15'] = ['id'=>'15', 'type'=>OrderTypeEnum::NEWSIM, 'status'=>OrderStatusEnum::COMPLETED, 'date'=>'31-03-2022 06:30:40', 'subscription_id'=>'2'];
        $order['16'] = ['id'=>'16', 'type'=>OrderTypeEnum::NEWSIM, 'status'=>OrderStatusEnum::COMPLETED, 'date'=>'31-03-2022 06:30:40', 'subscription_id'=>'3'];
        $order['17'] = ['id'=>'17', 'type'=>OrderTypeEnum::NEWSIM, 'status'=>OrderStatusEnum::COMPLETED, 'date'=>'31-03-2022 06:30:40', 'subscription_id'=>'4'];
        $order['18'] = ['id'=>'18', 'type'=>OrderTypeEnum::RENEWEL, 'status'=>OrderStatusEnum::COMPLETED, 'date'=>'31-03-2022 06:30:40', 'subscription_id'=>'5'];
        $order['20'] = ['id'=>'20', 'type'=>OrderTypeEnum::RENEWEL, 'status'=>OrderStatusEnum::COMPLETED, 'date'=>'31-03-2022 06:30:40', 'subscription_id'=>'7'];
        $order['21'] = ['id'=>'21', 'type'=>OrderTypeEnum::NEWSIM, 'status'=>OrderStatusEnum::COMPLETED, 'date'=>'31-03-2022 06:30:40', 'subscription_id'=>'8'];

        $order['22'] = ['id'=>'22', 'type'=>OrderTypeEnum::ACTIVATESIM, 'status'=>OrderStatusEnum::COMPLETED, 'date'=>'31-01-2022 06:30:40', 'subscription_id'=>'7'];
        $order['23'] = ['id'=>'23', 'type'=>OrderTypeEnum::ACTIVATESIM, 'status'=>OrderStatusEnum::COMPLETED, 'date'=>'31-01-2022 06:30:40', 'subscription_id'=>'7'];
        $order['24'] = ['id'=>'24', 'type'=>OrderTypeEnum::ACTIVATESIM, 'status'=>OrderStatusEnum::COMPLETED, 'date'=>'31-01-2022 06:30:40', 'subscription_id'=>'7'];

        self::$data['order'] = $order;
        self::$initialized = true;
    }

    /**
     * GetBean mockup for testing
     *
     * @param string $module
     * @param string $id
     * @return array
     */
    public static function getBean(string $module, string $id): array
    {
        self::initialize();
        return self::$data[$module][$id];
    }

    /**
     * GetBeansBy mockup for testing
     *
     * @param string $module
     * @param string $field
     * @param string $id
     * @return array
     */
    public static function getBeansBy(string $module, string $field, string $id): array
    {
        self::initialize();
        $returnBeans = [];

        foreach (self::$data[$module] as $bean) {
            if ($bean[$field] == $id) {
                $returnBeans[] = $bean;
            }
        }

        return $returnBeans;
    }
}
