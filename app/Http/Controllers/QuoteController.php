<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class QuoteController extends Controller
{
    private $apiUrl = 'https://api.kanye.rest/';
    private $numberOfQuotes = 5;
    private $cacheKey = 'kanye_quotes';

    public function getQuotes()
    {
        $quotes = $this->getCachedQuotes();

        return response()->json(['quotes' => $quotes]);
    }

    public function refreshQuotes()
    {
        $quotes = $this->fetchAndCacheQuotes();

        return response()->json(['quotes' => $quotes]);
    }

    private function getCachedQuotes()
    {
        return Cache::get($this->cacheKey, function () {
            return $this->fetchAndCacheQuotes();
        });
    }

    private function fetchAndCacheQuotes(): array
    {
        $quotes = [];

        for ($i = 0; $i < $this->numberOfQuotes; $i++) {
            $response = Http::get($this->apiUrl);
            $quote = $response->json('quote');
            $quotes[] = $quote;
        }

        // Cache::put($this->cacheKey, $quotes, now()->addMinutes(1));
        Cache::put($this->cacheKey, $quotes, now()->addSeconds(10));

        return $quotes;
    }
}
