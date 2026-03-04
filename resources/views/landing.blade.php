<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Harga Saham Terbaru</title>
    <style>
        :root {
            --bg: #0b1220;
            --card: #121b2e;
            --text: #e5ecff;
            --muted: #9db0d7;
            --green: #2ecc71;
            --red: #ff6b6b;
            --line: #213354;
        }
        * { box-sizing: border-box; }
        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: linear-gradient(160deg, var(--bg), #0f1a2f);
            color: var(--text);
        }
        .container {
            max-width: 1040px;
            margin: 0 auto;
            padding: 32px 18px 40px;
        }
        .hero {
            background: rgba(18, 27, 46, 0.9);
            border: 1px solid var(--line);
            border-radius: 14px;
            padding: 24px;
            margin-bottom: 20px;
        }
        h1 {
            margin: 0 0 10px;
            font-size: 30px;
            line-height: 1.2;
        }
        p {
            margin: 0;
            color: var(--muted);
            line-height: 1.6;
        }
        .meta {
            margin-top: 12px;
            font-size: 14px;
            color: var(--muted);
        }
        .table-card {
            background: rgba(18, 27, 46, 0.9);
            border: 1px solid var(--line);
            border-radius: 14px;
            overflow: hidden;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 14px 12px;
            border-bottom: 1px solid var(--line);
            text-align: left;
            font-size: 14px;
        }
        th {
            color: #c9d8ff;
            font-size: 13px;
            letter-spacing: .2px;
        }
        tr:last-child td { border-bottom: none; }
        .positive { color: var(--green); font-weight: 600; }
        .negative { color: var(--red); font-weight: 600; }
        .right { text-align: right; }
        .error {
            margin: 16px 0 0;
            background: rgba(255, 107, 107, 0.1);
            border: 1px solid rgba(255, 107, 107, 0.5);
            color: #ffd1d1;
            border-radius: 10px;
            padding: 12px;
            font-size: 14px;
        }
        .refresh {
            display: inline-block;
            margin-top: 16px;
            background: #3451a3;
            color: #fff;
            text-decoration: none;
            padding: 10px 14px;
            border-radius: 8px;
            font-size: 14px;
        }
        .refresh:hover { background: #4060bb; }
    </style>
</head>
<body>
<div class="container">
    <section class="hero">
        <h1>Landing Page Update Harga Saham Terbaru</h1>
        <p>
            Pantau harga saham populer Indonesia secara cepat dalam satu halaman.
            Data ditarik dari API gratis dan diperbarui setiap kali halaman di-refresh.
        </p>
        <div class="meta">
            Sumber data: {{ $source }} | Update halaman: {{ $updatedAt }} WIB
        </div>
        <a href="{{ route('landing.stocks') }}" class="refresh">Refresh Data</a>

        @if($error)
            <div class="error">{{ $error }}</div>
        @endif
    </section>

    <section class="table-card">
        <table>
            <thead>
            <tr>
                <th>Kode</th>
                <th>Nama</th>
                <th class="right">Harga</th>
                <th class="right">Perubahan</th>
                <th class="right">Perubahan (%)</th>
                <th>Waktu Pasar</th>
            </tr>
            </thead>
            <tbody>
            @forelse($stocks as $stock)
                @php
                    $isPositive = ($stock['change'] ?? 0) >= 0;
                @endphp
                <tr>
                    <td>{{ $stock['symbol'] }}</td>
                    <td>{{ $stock['name'] }}</td>
                    <td class="right">{{ isset($stock['price']) ? number_format((float) $stock['price'], 2, ',', '.') : '-' }} {{ $stock['currency'] }}</td>
                    <td class="right {{ $isPositive ? 'positive' : 'negative' }}">
                        {{ isset($stock['change']) ? number_format((float) $stock['change'], 2, ',', '.') : '-' }}
                    </td>
                    <td class="right {{ $isPositive ? 'positive' : 'negative' }}">
                        {{ isset($stock['changePercent']) ? number_format((float) $stock['changePercent'], 2, ',', '.') . '%' : '-' }}
                    </td>
                    <td>{{ $stock['marketTime'] ?? '-' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Belum ada data untuk ditampilkan.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </section>
</div>
</body>
</html>
