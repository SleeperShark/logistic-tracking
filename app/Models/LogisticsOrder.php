<?php

namespace App\Models;

use App\Enums\LogisticsStatus;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property string          $sno
 * @property LogisticsStatus $tracking_status
 * @property int             $recipient_id
 * @property int             $current_location_id
 * @property Carbon          $estimated_delivery
 *
 * @property-read Collection<LogisticsItem> $items
 * @property-read Location                  $currentLocation
 * @property-read Recipient                 $recipient
 */
class LogisticsOrder extends Model
{
    use HasFactory;

    protected $table = 'logistics_orders';

    protected $fillable = [
        'sno',
        'tracking_status',
        'recipient_id',
        'current_location_id',
        'estimated_delivery',
    ];

    protected $casts = [
        'sno'                => 'string',
        'estimated_delivery' => 'date',
        'tracking_status'    => LogisticsStatus::class,
    ];

    public function items(): HasMany
    {
        return $this->hasMany(LogisticsItem::class, 'order_id', 'id');
    }

    public function currentLocation(): BelongsTo
    {
        return $this->belongsTo(Location::class, 'current_location_id');
    }

    public function recipient(): BelongsTo
    {
        return $this->belongsTo(Recipient::class);
    }
}
