<?php

declare(strict_types=1);

namespace App\Modules;

use App\Models\Store;
use Illuminate\Support\Facades\Redis;
use vipnytt\SitemapParser;
use vipnytt\SitemapParser\Exceptions\SitemapParserException;

class Sitemap
{
    public function __construct(public Store $store) {}

    /**
     * @throws SitemapParserException
     */
    public function handle(): void
    {
        $sitemapUrl = "{$this->store->url}/{$this->store->sitemap}";
        $parser = new SitemapParser;
        $parser->parseRecursive($sitemapUrl);

        $urls = [];

        foreach ($parser->getUrls() as $url => $tags) {
            $urls[] = $url;
        }
        $this->dispatchToRedis($urls);
    }

    public function dispatchToRedis(array $urls): void
    {
        $key = $this->getCacheKey();
        Redis::pipeline(static function (Redis $redis) use ($urls, $key) {
            foreach ($urls as $url) {
                $redis->lpush($key, $url);
            }
        });
    }

    public function getCacheKey(): string
    {
        $now = now();
        return "{$this->store->id}:{$now->toDateString()}";
    }
}
