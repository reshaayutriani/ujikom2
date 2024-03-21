<div class="x_content">
    <div class="table-responsive">
        <table class="table table-compact table stripped" id="tbl-produk">
            <thead>
                <tr>
                    <th>No</th>
                    <th>nama_produk</th>
                    <th>nama_supplier</th>
                    <th>harga_jual</th>
                    <th>harga_beli</th>
                    <th>stok</th>
                    <th>Tools</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produk as $p)
                <tr>
                    <td>{{ $i = !isset ($i) ? ($i = 1) : ++$i }}</td>
                    <td>{{ $p->nama_produk }}</td>
                    <td>{{ $p->nama_supplier }}</td>
                    <td>{{ $p->harga_jual }}</td>
                    <td>{{ $p->harga_beli }}</td>
                    <td>{{ $p->stok }}</td>
                    <td>
                        <button class="btn text-warning" data-toggle="modal" data-target="#modalFormproduk" data-mode="edit" data-id="{{ $p->id }}" data-nama_produk="{{ $p->nama_produk }}"data-nama_supplier="{{ $p->nama_supplier }}"data-harga_jual="{{ $p->harga_jual }}"data-harga_beli="{{ $p->harga_beli }}"data-stok="{{ $p->stok }}">
                            <i class="fas fa-edit"></i>
                        </button>
                        <form method="post" action="{{ route('produk.destroy', $p->id) }}" style="display: inline">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn text-danger delete-data" data-nama_produk="{{ $p->nama_produk }}">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>