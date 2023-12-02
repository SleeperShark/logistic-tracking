<?php

namespace Database\Factories;

use App\Enums\LogisticsStatus;
use App\Models\Location;
use App\Models\LogisticsOrder;
use App\Models\Recipient;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class LogisticsOrderFactory extends Factory
{
    protected $model = LogisticsOrder::class;

    public function definition(): array
    {
        $status = $this->statusLottery();

        if (in_array($status, [
            LogisticsStatus::DELIVERY_ATTEMPTED,
            LogisticsStatus::DELIVERED,
            LogisticsStatus::RETURNED_TO_SENDER,
        ])) {
            $estimatedDelivery = Carbon::now()->subDays(random_int(1, 360));
        } else {
            $estimatedDelivery = Carbon::now()->addDays(random_int(1, 360));
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

    /**
     * Status Weight
     * CREATE:             5
     * PACKAGE_RECEIVED:   5
     * IN_TRANSIT:         15
     * OUT_FOR_DELIVERY:   10
     * DELIVERY_ATTEMPTED: 3
     * DELIVERED:          10
     * RETURNED_TO_SENDER: 1
     * EXCEPTION:          1
     * ----------------------
     * TOTAL              50
     */
    private function statusLottery()
    {
        $rand = random_int(1, 50);

        if ($rand <= 5) {
            return LogisticsStatus::CREATED;
        } elseif ($rand <= 10) {
            return LogisticsStatus::PACKAGE_RECEIVED;
        } elseif ($rand <= 25) {
            return LogisticsStatus::IN_TRANSIT;
        } elseif ($rand <= 35) {
            return LogisticsStatus::OUT_FOR_DELIVERY;
        } elseif ($rand <= 38) {
            return LogisticsStatus::DELIVERY_ATTEMPTED;
        } elseif ($rand <= 48) {
            return LogisticsStatus::DELIVERED;
        } elseif ($rand == 49) {
            return LogisticsStatus::RETURNED_TO_SENDER;
        }

        return LogisticsStatus::EXCEPTION;

    }
}
