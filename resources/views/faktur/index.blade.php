<body>
    <h2>C A F E</h2>
    <h5>Jl. Siliwangi N0. 61 Cianjur</h5>
    <hr>
    @if($transaksi)
        <h5>No. Faktur : {{ $transaksi->id }}</h5>
        <h5>{{ $transaksi->tanggal }}</h5>

        <table border="1"> <!-- Perbaiki border menjadi 1 -->
            <thead>
                <tr>
                    <th>Qty</th> <!-- Mengganti <td> menjadi <th> untuk header -->
                    <th>Item</th>
                    <th>Harga</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaksi->detailtransaksi as $item)
                <tr>
                    <td>{{ $item->jumlah }}</td>
                    <td>{{ $item->menu->nama_menu }}</td>
                    <td>{{ number_format($item->menu->harga,0,',','.') }}</td>
                    <td>{{ number_format($item->subtotal,0,',','.') }}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3">Total</td>
                    <td>{{ number_format($transaksi->total_harga,0,',','.')}}</td>
                </tr>
            </tfoot>
        </table>
    @else
        <p>Transaksi tidak ditemukan.</p>
    @endif
</body>