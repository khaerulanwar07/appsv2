<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/landing-saham', function () {
    $symbols = ['BBCA.JK', 'BBRI.JK', 'TLKM.JK', 'ASII.JK', '^JKSE'];
    $query = implode(',', $symbols);

    $stocks = [];
    $error = null;

    try {
        $response = Http::acceptJson()
            ->timeout(10)
            ->get('https://query1.finance.yahoo.com/v7/finance/quote', [
                'symbols' => $query,
            ]);

        if (!$response->ok()) {
            throw new RuntimeException('Gagal mengambil data harga saham.');
        }

        $results = data_get($response->json(), 'quoteResponse.result', []);

        foreach ($results as $item) {
            $stocks[] = [
                'symbol' => $item['symbol'] ?? '-',
                'name' => $item['shortName'] ?? ($item['longName'] ?? '-'),
                'price' => $item['regularMarketPrice'] ?? null,
                'change' => $item['regularMarketChange'] ?? null,
                'changePercent' => $item['regularMarketChangePercent'] ?? null,
                'currency' => $item['currency'] ?? 'IDR',
                'marketTime' => isset($item['regularMarketTime']) ? date('Y-m-d H:i:s', (int) $item['regularMarketTime']) : null,
            ];
        }
    } catch (Throwable $th) {
        $error = 'Data sementara tidak tersedia. Silakan refresh beberapa saat lagi.';
    }

    return view('landing', [
        'stocks' => $stocks,
        'error' => $error,
        'updatedAt' => now()->format('d M Y H:i:s'),
        'source' => 'Yahoo Finance (Free Public API)',
    ]);
})->name('landing.stocks');
