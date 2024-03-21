<div class="modal fade" id="modalFormproduk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form produk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{ route('produk.store') }}">
          @csrf
          <div id="method"></div>
          <div class="form-group row">
            <label for="nama_produk" class="col-sm-4 col-form-label">Nama produk</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="nama_produk" value="" name="nama_produk">
            </div>
          </div>
          <div class="form-group row">
            <label for="nama_supplier" class="col-sm-4 col-form-label">Nama supplier</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="nama_supplier" value="" name="nama_supplier">
            </div>
          </div>

          <div id="method"></div>
          <div class="input-group mb-3">
            <label for="staticEmail" class="col-sm-4 col-form-label">Harga beli</label>
            <div class="input-group-prepend">
              <span class="input-group-text">Rp.</span>
            </div>
            <input type="number" class="form-control" id="harga_beli" placeholder="Harga beli" name="harga beli">
          </div>

          <div id="method"></div>
          <div class="input-group mb-3">
            <label for="staticEmail" class="col-sm-4 col-form-label">Harga jual</label>
            <div class="input-group-prepend">
              <span class="input-group-text">Rp.</span>
            </div>
            <input type="number" class="form-control" id="harga_jual" placeholder="Harga jual" name="harga jual">
          </div>
          
          <div class="form-group row">
            <label for="stok" class="col-sm-4 col-form-label">Stok</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="stok" value="" name="stok">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>