<div class="modal modal-default fade" id="add-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Tambah Faktur</h4>
      </div>

      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>No.</th>
            <th>No. SM</th>
            <th>Pengirim</th>
            <th>Penerima</th>
            <th>Total</th>
            <th>#</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 0; 
          foreach ($faktur->result() as $fakturs) {
            $i++;
            ?>
            <tr>
              <td><?= $i; ?></td>
              <td id="nosmModal<?= $i; ?>"><?= $fakturs->kode_faktur; ?></td>
              <td id="pengirimModal<?= $i; ?>"><?= $fakturs->id_faktur_pengirim; ?></td>
              <td id="penerimaModal<?= $i; ?>"><?= $fakturs->id_faktur_penerima; ?></td>
              <td id="totalModal<?= $i; ?>"><?= $fakturs->total; ?></td>
              <td>
                <!-- <a href="<?php echo base_url().'faktur/edit/'.$fakturs->id_faktur;?>" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i></a> -->
                <button type="button" class="btn btn-primary btn-ok btn-xs" onclick="tambahkanBaru(<?= $i; ?>)" data-dismiss="modal" onclick="noPadding()"><i class="fa fa-plus"></i></button>
              </td>
            </tr>
            <?php
          } ?>
        </tbody>
      </table>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" onclick="noPadding()">Cancel</button>
      </div>
    </div>
  </div>
</div>

<div class="modal modal-default fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Edit Faktur</h4>
      </div>

      <div class="modal-body">
        
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" onclick="noPadding()">Cancel</button>
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