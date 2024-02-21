<?php

declare(strict_types=1);

use App\Enums\ShippingMethods;

return [
    /**
     *  const FLATRATE = 'flat_rate';
     *
     *  const FREESHIPPING = 'free_shipping';
     *
     *  const LOCALPICKUP = 'local_pickup';
     */
    ShippingMethods::class => [
        ShippingMethods::FLATRATE => 'flat_rate',
        ShippingMethods::FREESHIPPING => 'free_shipping',
        ShippingMethods::LOCALPICKUP => 'local_pickup',
    ],

];
