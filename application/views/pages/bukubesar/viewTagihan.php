          <!-- Content Wrapper. Contains page content -->
          <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
              <h1>
                Faktur Pengiriman Barang
                <small>Preview</small>
              </h1>
              <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Forms</a></li>
                <li class="active">General Elements</li>
              </ol>
            </section>

            <!-- Main content -->
            <section class="content">
              <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                  <!-- general form elements -->
                  <div class="box box-info box-solid">
                  <div class="box-header"></div>
                    <?php if (validation_errors()) : ?>
                      <p><font color="red"><center><?= validation_errors() ?></center></font></p>
                    <?php endif; ?>
                    <?php if (isset($error)) : ?>
                      <p><font color="red"><center><?= $error ?></center></font></p>
                    <?php endif; ?>
                    <?php if (isset($success)) : ?>
                      <p><font color="green"><center><?= $success ?></center></font></p>
                    <?php endif; ?>
                    <!-- form start -->
                    <?= form_open() ?>
                    <!-- <form> -->
                      <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                              <div class="">
                                <label for="nama1">No. Tagihan</label>
                                <input type="text" class="form-control" id="kode_faktur" name="no_tagihan" value="<?= $tagihan->no_tagihan ?>" readonly>
                                <br>
                              </div>
                              <div class="">
                                <label for="nama1">Status Pembayaran</label>
                                <select class="form-control" name="status" readonly>
                                  <optgroup label="Lunas">
                                     <option value="transfer" <?php if ($tagihan->status == "transfer") { echo "selected"; } ?>>Transfer</option>
                                     <option value="giro" <?php if ($tagihan->status == "giro") { echo "selected"; } ?>>Giro</option>
                                     <option value="tunai" <?php if ($tagihan->status == "tunai") { echo "selected"; } ?>>Tunai</option>
                                  </optgroup>
                                  <optgroup label="Belum Lunas">
                                     <option value="surat" <?php if ($tagihan->status == "surat") { echo "selected"; } ?>>Surat</option>
                                  </optgroup>
                                </select>
                                <br>
                              </div>
                            </div>
                            <div class="col-md-6">
                            <div class="">
                              <label for="nama1">Nama Perusahaan</label>
                              <input type="text" class="form-control" id="kode_faktur" name="klien" value="<?= $tagihan->klien ?>" placeholder="Masukkan Nama Perusahaan" readonly>
                              <br>
                            </div>
                            <div class="">
                              <label for="nama1">Tanggal</label>
                              <input type="text" class="form-control" id="kode_faktur" name="tanggal_tagihan" value="<?= $tagihan->tanggal_tagihan ?>" readonly>
                              <br>
                            </div>
                          </div>
                        </div>
                        <br>
                        <table id="table" class="table table-bordered" style="border-width: 2px">
                          <thead>
                            <th>No. SM</th>
                            <th>No. DM</th>
                            <th>Pengirim</th>
                            <th>Penerima</th>
                            <th>Harga</th>
                          </thead>
                          <?php $i = 1;
                          foreach ($fakturtagihan->result() as $fakturtagihans) {?>
                          <tr id="item<?= $i; ?>">
                            <td id="id<?= $i; ?>" style="display: none;"><?= $fakturtagihans->id_faktur ?></td>
                            <td id="nosm<?= $i; ?>"><?= $fakturtagihans->kode_faktur ?></td>
                            <td id="nosm<?= $i; ?>"><?= $fakturtagihans->id_faktur_dm ?></td>
                            <td id="pengirim<?= $i; ?>"><?= $fakturtagihans->id_faktur_pengirim ?></td>
                            <td id="penerima<?= $i; ?>"><?= $fakturtagihans->id_faktur_penerima ?></td>
                            <td id="harga<?= $i; ?>"><?= $fakturtagihans->total ?></td>
                            <!-- <td>
                              <input type="hidden" name="id<?= $i; ?>" id="id<?= $i; ?>" value="<?= $fakturtagihans->id_faktur ?>">
                              <input type="hidden" name="nosm<?= $i; ?>" id="nosm<?= $i; ?>" value="<?= $fakturtagihans->kode_faktur ?>">
                              <input type="hidden" name="total<?= $i; ?>" id="total<?= $i; ?>" value="<?= $fakturtagihans->total ?>">
                              <div class="checkbox" style="margin: 0px; display: inline-block;"><label><input type="checkbox" name="lunas<?= $i; ?>" value="1" <?php if ($fakturtagihans->lunas == 1) {echo "checked";} ?>>Lunas</label></div>&nbsp;
                              <a href="#" data-href="<?php echo base_url().'tagihan/deletefakturtagihan/'.$fakturtagihans->id_faktur?>" class="btn btn-default btn-xs" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash-o"></i></a>
                            </td> -->
                          </tr>
                          <?php $i++; } ?>
                        </table>                    
                        <!-- <a href="" class="btn btn-default" data-toggle="modal" data-target="#add-modal"><i class="fa fa-plus"> Tambah Faktur</i></a> -->
                        
                      </div><!-- /.box-body -->
                      <br>
                      <div class="box-footer">
                        <div class="pull-right">
                          <p><strong>Total</strong></p>
                          <input type="text" class="form-control" value="<?= $tagihan->total_tagihan ?>">
                        </div>
                      </div>
                    </form>
                  </div><!-- /.box -->

                </div>   <!-- /.row -->
              </section><!-- /.content -->
            </div><!-- /.content-wrapper -->
            
