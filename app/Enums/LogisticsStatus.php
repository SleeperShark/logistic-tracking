<?php

namespace App\Enums;

use BenSampo\Enum\Attributes\Description;
use BenSampo\Enum\Enum;

final class LogisticsStatus extends Enum
{
    #[Description('Created')]
    const CREATED = 1;

    #[Description('Package Received')]
    const PACKAGE_RECEIVED = 2;

    #[Description('In Transit')]
    const IN_TRANSIT = 3;

    #[Description('Out for Delivery')]
    const OUT_FOR_DELIVERY = 4;

    #[Description('Delivery Attempted')]
    const DELIVERY_ATTEMPTED = 5;

    #[Description('Delivered')]
    const DELIVERED = 6;

    #[Description('Returned to Sender')]
    const RETURNED_TO_SENDER  = 7;

    #[Description('Exception')]
    const EXCEPTION = 8;
}
