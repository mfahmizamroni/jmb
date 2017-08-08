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
                        <label for="nama1">No Surat Jalan</label>
                        <input type="text" class="form-control" id="kode_faktur" name="no_sj" value="<?= $suratjalan->no_sj ?>" placeholder="Masukkan No Surat Jalan">
                        <br>
                        <table id="example1" class="table table-bordered" style="border-width: 2px">
                          <thead>
                            <th>No. SM</th>
                            <th>Pengirim</th>
                            <th>Penerima</th>
                            <th>Harga</th>
                            <th style="width: 100px" class="notPrintable">#</th>
                          </thead>
                          <?php $i = 1;
                          foreach ($faktursj->result() as $faktursjs) {?>
                          <tr id="item<?= $i; ?>">
                            <td id="nosm<?= $i; ?>"><?= $faktursjs->kode_faktur ?></td>
                            <td id="pengirim<?= $i; ?>"><?= $faktursjs->nama_pengirim ?></td>
                            <td id="penerima<?= $i; ?>"><?= $faktursjs->nama_penerima ?></td>
                            <td id="harga<?= $i; ?>"><?= $faktursjs->total ?></td>
                            <td>
                              <input type="hidden" name="nosm<?= $i; ?>" id="nosm<?= $i; ?>" value="<?= $faktursjs->kode_faktur ?>">
                              <div class="checkbox" style="margin: 0px; display: inline-block;"><label><input type="checkbox" name="lunas<?= $i; ?>" value="1" <?php if ($faktursjs->lunas == 1) {echo "checked";} ?>>Lunas</label></div>&nbsp;
                              <a href="#" data-href="<?php echo base_url().'suratjalan/deletefaktursj/'.$faktursjs->id_faktur?>" class="btn btn-default btn-xs" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash-o"></i></a>
                            </td>
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
            
