<?php

declare(strict_types=1);

namespace App\Modules\Sites;

use App\Models\Store;
use App\Models\Url;
use App\Modules\Product;
use App\Modules\Sitemap;
use Http;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Redis;

abstract class Site
{
    protected ?string $cacheKey = null;

    protected Sitemap $sitemap;

    protected array $ignorableUrl = [];

    public function __construct(protected Store $store)
    {
        $this->sitemap = new Sitemap($this->store);
    }

    abstract protected function getAttributeFromPage(string $htmlDoc): Product;

    public function getPageFromRedis(): string|bool
    {
        return Redis::lPop($this->cacheKey);
    }

    public function handler(): bool
    {
        $this->cacheKey = $this->sitemap->getCacheKey();
        $this->loadIgnorableUrl();
        if ($this->store->timeout === 0) {

        }
    }

    /**
     * @throws ConnectionException
     */
    public function downloadPage(string $url)
    {
        $response = Http::withHeaders([
            'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.3',
        ])->get($url);

        if ($response->successful()) {
            $producto = $this->getAttributeFromPage($response->body());
            //if()
        }
    }

    public function getUrl(): string
    {
        do {
            $url = $this->getPageFromRedis();
            $ignorable = $this->ignorableUrl[$url] ?? false;
        } while ($ignorable);

        return $url;
    }

    public function loadIgnorableUrl(): void
    {
        $urls = Url::query()
            ->where('store_id', $this->store->id)
            ->where('ignorable', true)
            ->toBase()
            ->get('url');

        foreach ($urls as $url) {
            $this->ignorableUrl[$url->url] = true;
        }
    }
}
