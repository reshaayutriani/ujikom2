<body>
    <h2>C A F E</h2>
    <h5>Jl. Siliwangi N0. 61 Cianjur</h5>
    <hr>
    @if($transaksi ?? null)
    <h5>No. Faktur : {{$detailtransaksi->id}} </h5>
    <h5> {{$transaksi->tanggal}} </h5>

    <table border="0">
        <thead>
            <tr>
                <td>Qty</td>
                <td>Item</td>
                <td>Harga</td>
                <td>Total</td>
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
    @endif
</body>