@include('admin.laporan.print.header')

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 11pt;
        }

    </style>
    <h6 class="text-center mb-4 font-weight-normal">Ringkasan Statistik Anggota Perpustakaan <br> STMIK AMIKBANDUNG</h6>

    <table class='table table-bordered'>
        <tbody>
            <tr>
                <td>Total Anggota</td>
                <td class="text-center">{{ $buku }}</td>
            </tr>
            <tr>
                <td>Total Anggota (Per Bulan)</td>
                <td class="text-center">{{ $eksemplar }}</td>
            </tr>
            <tr>
                <td>Total Anggota Belum Terverifikasi</td>
                <td class="text-center">{{ $eksemplar_dipinjam }}</td>
            </tr>
            <tr>
                <td>Total Anggota Kadaluarsa</td>
                <td class="text-center">{{ $masuk }}</td>
            </tr>
            <tr>
                <td>10 Anggota Paling Aktif</td>
                <td>
                    <ol>
                        @foreach ($popular as $p)
                        <li>{{  ucwords($p->user->name) }} ({{ $p->user_id }})</li>
                        @endforeach
                    </ol>
                </td>
            </tr>
        </tbody>
    </table>
    <span style="font-size: 10pt">Dicetak pada: {{ $time }}</span>

</body>

</html>
