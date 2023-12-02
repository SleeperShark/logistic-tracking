<?php

namespace App\Models;

use App\Enums\LogisticsStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @property int $order_id
 * @property int $status
 * @property int $location_id
 *
 * @property-read LogisticsOrder $order
 * @property-read Location       $location
 */
class LogisticsItem extends Model
{
    use HasFactory;

    protected $table = 'logistics_items';
    
    protected $fillable = [
        'order_id',
        'status',
        'location_id',
    ];

    protected $casts = [
        'status' => LogisticsStatus::class,
    ];

    public function order(): BelongsTo
    {
        return $this->belongsTo(LogisticsOrder::class, 'order_id');
    }

    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }
}
