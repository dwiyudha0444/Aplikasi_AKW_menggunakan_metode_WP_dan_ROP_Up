<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reseller Terbaik</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Daftar Reseller Terbaik</h2>

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Ranking</th>
                    <th>ID Pemesanan</th>
                    <th>Skor WP</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ranking as $index => $reseller)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $reseller['id_pemesanan'] }}</td>
                    <td>{{ number_format($reseller['score'], 4) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
