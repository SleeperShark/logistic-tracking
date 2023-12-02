<?php

namespace Database\Factories;

use App\Models\Location;
use App\Models\Recipient;
use App\Enums\LogisticsStatus;
use App\Models\LogisticsOrder;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class LogisticsOrderFactory extends Factory
{
    protected $model = LogisticsOrder::class;

    public function definition(): array
    {
        $status = array_rand(LogisticsStatus::getValues());

        if (in_array($status, [
            LogisticsStatus::DELIVERY_ATTEMPTED,
            LogisticsStatus::DELIVERED,
            LogisticsStatus::RETURNED_TO_SENDER,
        ])) {
            $estimatedDelivery = Carbon::now()->subDays(random_int(1, 180));
        } else {
            $estimatedDelivery = Carbon::now()->addDays(random_int(1, 180));
        }

        return [
            'sno'                 => $this->generateSno($estimatedDelivery),
            'tracking_status'     => $status,
            'recipient_id'        => Recipient::inRandomOrder()->first()->id,
            'current_location_id' => Location::inRandomOrder()->first()->id,
            'estimated_delivery'  => $estimatedDelivery,
        ];
    }

    private function generateSno(Carbon $date)
    {
        $timestamp = $date->timestamp;
        $series    = str_pad(random_int(1, 9999), 4, 0, STR_PAD_LEFT);
        return str_pad($timestamp . $series, 16, 0, STR_PAD_LEFT);
    }
}
