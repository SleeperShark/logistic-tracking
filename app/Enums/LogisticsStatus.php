<?php

namespace App\Enums;

use BenSampo\Enum\Attributes\Description;
use BenSampo\Enum\Enum;

final class LogisticsStatus extends Enum
{
    #[Description('Created')]
    public const CREATED = 1;

    #[Description('Package Received')]
    public const PACKAGE_RECEIVED = 2;

    #[Description('In Transit')]
    public const IN_TRANSIT = 3;

    #[Description('Out for Delivery')]
    public const OUT_FOR_DELIVERY = 4;

    #[Description('Delivery Attempted')]
    public const DELIVERY_ATTEMPTED = 5;

    #[Description('Delivered')]
    public const DELIVERED = 6;

    #[Description('Returned to Sender')]
    public const RETURNED_TO_SENDER = 7;

    #[Description('Exception')]
    public const EXCEPTION = 8;
}
