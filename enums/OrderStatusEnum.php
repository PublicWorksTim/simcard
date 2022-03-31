<?php

enum OrderStatusEnum: string
{
    case RECEIVED = 'received';
    case INPROGRESS = 'inProgress';
    case COMPLETED = 'completed';
    case CANCELLED = 'cancelled';
}
