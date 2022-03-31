<?php

spl_autoload_register(function ($class) {
    if (str_ends_with($class, 'Enum')) {
        require_once 'enums/' . $class . '.php';
    } elseif (str_ends_with($class, 'Controller')) {
        require_once 'controller/' . $class . '.php';
    } elseif (str_ends_with($class, 'Factory')) {
        require_once 'factories/' . $class . '.php';
    } elseif (str_ends_with($class, 'Object')) {
        require_once 'objects/' . $class . '.php';
    }
});

SubscriptionController::simActivateAllowed('0');
SubscriptionController::simActivateAllowed('1');
SubscriptionController::simActivateAllowed('2');
SubscriptionController::simActivateAllowed('3');
SubscriptionController::simActivateAllowed('4');
SubscriptionController::simActivateAllowed('5');
SubscriptionController::simActivateAllowed('6');
SubscriptionController::simActivateAllowed('7');
