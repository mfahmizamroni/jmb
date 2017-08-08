<div class="modal modal-default fade" id="add-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Tambah Barang</h4>
      </div>

      <div class="modal-body">
        <div class="form-group">
        <label for="nama1">banyaknya</label>
          <input type="text" class="form-control" id="jumlahBarang" placeholder="Jumlah Barang">
        </div>
        <div class="form-group">
          <label for="nama1">Jenis Barang Menurut Pengakuan</label>
          <input type="text" class="form-control" id="jenis" placeholder="Jenis Barang">
        </div>
        <div class="form-group">
          <label for="nama1">Harga/Unit</label>
          <input type="text" class="form-control" id="harga" placeholder="Harga tiap Unit">
        </div>
        <div class="form-group">
          <label for="nama1">Jumlah Uang</label>
          <input type="text" class="form-control" id="jumlahUang" placeholder="Jumlah Uang">
        </div>
        <p class="debug-url"></p>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" onclick="noPadding()">Cancel</button>
        <button type="button" class="btn btn-primary btn-ok" onclick="tambahkanBaru()" data-dismiss="modal" onclick="noPadding()">Tambahkan</button>
      </div>
    </div>
  </div>
</div>

<div class="modal modal-default fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Edit barang</h4>
      </div>

      <div class="modal-body">
        <div class="form-group">
        <label for="nama1">banyaknya</label>
          <input type="text" class="form-control" id="jumlahBarangEdit" placeholder="Jumlah Barang">
        </div>
        <div class="form-group">
          <label for="nama1">Jenis Barang Menurut Pengakuan</label>
          <input type="text" class="form-control" id="jenisEdit" placeholder="Jenis Barang">
        </div>
        <div class="form-group">
          <label for="nama1">Harga/Unit</label>
          <input type="text" class="form-control" id="hargaEdit" placeholder="Harga tiap Unit">
        </div>
        <div class="form-group">
          <label for="nama1">Jumlah Uang</label>
          <input type="text" class="form-control" id="jumlahUangEdit" placeholder="Jumlah Uang">
        </div>
        <p class="debug-url"></p>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" onclick="noPadding()">Cancel</button>
        <button type="button" class="btn btn-primary btn-ok" data-dismiss="modal" id="editButton">Tambahkan</button>
      </div>
    </div>
  </div>
</div>

<div class="modal modal-danger fade" id="hapus-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Confirm Delete</h4>
      </div>

      <div class="modal-body">
        <p>Apakah Anda ingin menghapus barang?</p>
        <p class="debug-url"></p>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" onclick="noPadding()">Cancel</button>
        <button type="button" class="btn btn-danger btn-ok" data-dismiss="modal" id="deleteButton" onclick="noPadding()">Hapus</button>
      </div>
    </div>
  </div>
</div>