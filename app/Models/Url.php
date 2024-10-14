<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * 
 *
 * @property int $id
 * @property int $store_id
 * @property string $url
 * @property bool $ignorable
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Store $store
 * @method static Builder|Url newModelQuery()
 * @method static Builder|Url newQuery()
 * @method static Builder|Url query()
 * @method static Builder|Url whereCreatedAt($value)
 * @method static Builder|Url whereId($value)
 * @method static Builder|Url whereIgnorable($value)
 * @method static Builder|Url whereStoreId($value)
 * @method static Builder|Url whereUpdatedAt($value)
 * @method static Builder|Url whereUrl($value)
 * @mixin Eloquent
 */
class Url extends Model
{
    protected $fillable = [
        'url',
        'store_id',
        'ignorable',
    ];

    public function store(): BelongsTo
    {
        return $this->belongsTo(Store::class);
    }

    protected function casts(): array
    {
        return [
            'ignorable' => 'boolean',
        ];
    }
}
