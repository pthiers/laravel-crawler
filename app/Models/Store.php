<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $key
 * @property string $url
 * @property string|null $sitemap
 * @property int $timeout
 * @property ?Carbon|null $created_at
 * @property ?Carbon|null $updated_at
 * @method static Builder|Store newModelQuery()
 * @method static Builder|Store newQuery()
 * @method static Builder|Store query()
 * @method static Builder|Store whereCreatedAt($value)
 * @method static Builder|Store whereId($value)
 * @method static Builder|Store whereKey($value)
 * @method static Builder|Store whereName($value)
 * @method static Builder|Store whereUpdatedAt($value)
 * @method static Builder|Store whereUrl($value)
 * @method static Builder|Store whereSitemap($value)
 * @method static Builder|Store whereTimeout($value)
 * @mixin Eloquent
 */
class Store extends Model
{
    public const ID_TRIPODES = 1;

    public const ID_SONY = 2;

    protected $fillable = [
        'name',
        'key',
        'url',
        'sitemap',
        'timeout',
    ];
}
