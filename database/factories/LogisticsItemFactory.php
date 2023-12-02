<?php

namespace Database\Factories;

use App\Models\Location;
use App\Models\LogisticsItem;
use App\Models\LogisticsOrder;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LogisticsItem>
 */
class LogisticsItemFactory extends Factory
{
    protected $model = LogisticsItem::class;

    public function definition(): array
    {
        $order = LogisticsOrder::factory()->create();

        return [
            'order_id' => $order->id,
            'status'   => $order->tracking_status,
            'location_id' => Location::inRandomOrder()->first()->id,
        ];
    }
}
