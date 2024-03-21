<div class="modal fade" id="modalFormstok" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit stok</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="stok">
                    @csrf
                    <div class="form-group row">
                        <label for="menu_id" class="col-sm-4 col-form-label">Menu Id</label>
                        <div class="col-sm-8">
                            <select name="menu_id" id="menu_id">
                                {{-- <option value="">Pilih Menu ID</option> --}}
                                @foreach ($menu as $p)
                                <option value="{{ $p->id }}">{{ $p->nama_menu }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div id="method"></div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label">jumlah</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="jumlah" value="" name="jumlah">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>