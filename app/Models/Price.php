<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property-read Url|null $url
 *
 * @method static Builder|Price newModelQuery()
 * @method static Builder|Price newQuery()
 * @method static Builder|Price query()
 *
 * @mixin \Eloquent
 */
class Price extends Model
{
    protected $fillable = [
        'url_id',
        'date',
        'price',
        'offer_price',
        'card_price',
    ];

    public function url(): BelongsTo
    {
        return $this->belongsTo(Url::class);
    }

    protected function casts(): array
    {
        return [
            'date' => 'date',
        ];
    }
}
