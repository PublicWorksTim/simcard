<?php

enum OrderTypeEnum: string
{
    case NEWCUSTOMER = 'newCustomer';
    case NEWSIM = 'newSim';
    case ACTIVATESIM = 'activateSim';
    case RENEWEL = 'renewel';
    case BUNDLECHANGE = 'bundleChange';
}
