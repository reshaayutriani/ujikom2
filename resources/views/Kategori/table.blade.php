<div class="x_content">
    <div class="table-responsive">
        <table class="table table-compact table stripped" id="tbl-Kategori">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kategori</th>
                    <th>Tools</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($Kategori as $p)
                <tr>
                    <td>{{ $i = !isset ($i) ? ($i = 1) : ++$i }}</td>
                    <td>{{ $p->Kategori }}</td>

                    <td>
                        <button class="btn text-warning" data-toggle="modal" data-target="#modalFormKategori" data-mode="edit" data-id="{{ $p->id }}" data-nama_Kategori="{{ $p->nama_Kategori }}">
                            <i class="fas fa-edit"></i>
                        </button>
                        <form method="post" action="{{ route('Kategori.destroy', $p->id) }}" style="display: inline">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn text-danger delete-data" data-nama_kategori="{{$p->nama_Kategori}}">
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