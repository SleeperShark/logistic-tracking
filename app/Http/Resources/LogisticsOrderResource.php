<?php

namespace App\Http\Resources;

use App\Models\LogisticsItem;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\LogisticsOrder */
class LogisticsOrderResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'status' => 'success',
            'data'   => [
                'sno'                => $this->sno,
                'tracking_status'    => $this->tracking_status->description,
                'estimated_delivery' => $this->estimated_delivery->toDateString(),
                'details'            => $this->items->map(fn (LogisticsItem $item) => [
                    'id'             => $item->id,
                    // TODO: date and time
                    'status'         => $item->status->description,
                    'location_id'    => $item->location_id,
                    'location_title' => $item->location->title,
                ]),
                'recipient'          => [
                    'id'      => $this->recipient->id,
                    'name'    => $this->recipient->name,
                    'address' => $this->recipient->address,
                    'phone'   => $this->recipient->phone,
                ],
                'current_location'   => [
                    'location_id' => $this->currentLocation->id,
                    'title'       => $this->currentLocation->title,
                    'city'        => $this->currentLocation->city,
                    'address'     => $this->currentLocation->address,
                ],
            ],
            'error'  => null,
        ];
    }
}
