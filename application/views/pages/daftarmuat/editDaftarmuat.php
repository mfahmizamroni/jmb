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
                      <div class="box-body table-responsive border-width">
                        <div class="row">
                            <div class="col-md-6">
                              <div class="">
                                <label for="nama1">No. Daftar Muat</label>
                                <input type="text" class="form-control" id="kode_faktur" name="no_dm" value="<?= $daftarmuat->no_dm ?>" placeholder="Masukkan No Surat Jalan" readonly>
                                <br>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="">
                                <label for="nama1">Truk</label>
                                <select name="truk" class="form-control">
                                  <option selected="selected" disabled>Select Option</option>
                                  <?php foreach ($truk->result() as $truks) {?>
                                    <option value="<?= $truks->nopol; ?>" <?php if($daftarmuat->truk == $truks->nopol){echo "selected";} ?>><?= $truks->nopol; ?></option>
                                  <?php } ?>
                                </select>
                                <br>
                              </div>
                              <div class="">
                                <label for="sopir">Sopir</label>
                                <input type="text" class="form-control" id="kode_faktur" name="sopir" value="<?= $daftarmuat->sopir ?>" placeholder="Masukkan No Surat Jalan">
                                <br>
                              </div>
                            </div>
                        </div>
                        <br>
                        <table id="table" class="table table-bordered table-responsive" style="border-width: 2px">
                          <thead>
                            <th style="display: none;">id</th>
                            <th>No. DM</th>
                            <th>Pengirim</th>
                            <th>Penerima</th>
                            <th>Harga</th>
                            <th>Keterangan</th>
                            <th>Potongan</th>
                            <th>Status</th>
                            <th style="width: 20px" class="notPrintable">Action</th>
                          </thead>

                          <?php $i = 1;
                          foreach ($faktursj->result() as $faktursjs) {?>
                          <tr id="item<?= $i; ?>">
                            <td id="id<?= $i; ?>" style="display: none;"><?= $faktursjs->id_faktur ?></td>
                            <td id="nosm<?= $i; ?>"><?= $faktursjs->kode_faktur ?></td>
                            <td id="pengirim<?= $i; ?>"><?= $faktursjs->id_faktur_pengirim ?></td>
                            <td id="penerima<?= $i; ?>"><?= $faktursjs->id_faktur_penerima ?></td>
                            <td id="harga<?= $i; ?>"><?= $faktursjs->total ?></td>
                            <td>
                              <input type="hidden" name="id<?= $i; ?>" id="id<?= $i; ?>" value="<?= $faktursjs->id_faktur ?>">
                              <input type="hidden" name="nosm<?= $i; ?>" id="nosm<?= $i; ?>" value="<?= $faktursjs->kode_faktur ?>">
                              <div class="checkbox" style="margin: 0px; display: inline-block;"><label><input type="checkbox" name="lunas<?= $i; ?>" value="1" <?php if ($faktursjs->lunas == 1) {echo "checked";} ?>>Lunas</label></div>&nbsp;
                            </td>
                            <td>
                            <input type="text" class="form-control" id="potongan" name="potongan<?= $i; ?>" value="<?= $faktursjs->potongan?>">
                                <br>
                            </td>
                            <td>
                                <select name="status_kirim<?= $i; ?>" class="form-control">
                                  <option selected="selected" disabled>Select Option</option>
                                  <?php foreach ($status_kirim->result() as $status_kirims) {?>
                                    <option value="<?= $status_kirims->kode_sk; ?>" <?php if($faktursjs->kode_sk_faktur == $status_kirims->kode_sk){echo "selected";} ?>><?= $status_kirims->nama_sk; ?></option>
                                  <?php } ?>
                                </select>
                            </td>
                            <td><a href="#" data-href="<?php echo base_url().'daftarmuat/deletefaktursj/'.$faktursjs->id_faktur?>" class="btn btn-default btn-xs" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash-o"></i></a></td>
                          </tr>
                          <?php $i++; } ?>
                        </table>                    
                        <a href="" class="btn btn-default" data-toggle="modal" data-target="#add-modal"><i class="fa fa-plus"> Tambah Faktur</i></a>
                        
                      </div><!-- /.box-body -->
                      <br>
                      <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </form>
                  </div><!-- /.box -->

                </div>   <!-- /.row -->
              </section><!-- /.content -->
            </div><!-- /.content-wrapper -->
            
