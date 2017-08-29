          <!-- Content Wrapper. Contains page content -->
          <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
              <h1>
                Tagihan
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
                              <label for="nama1">No Tagihan</label>
                              <input type="text" class="form-control" id="kode_faktur" name="no_tagihan" value="<?= $no_tagihan; ?>" readonly>
                              <br>
                            </div>
                            <!-- <div class="">
                              <label for="nama1">Tipe Pembayaran</label>
                              <select class="form-control" name="tipe_pembayaran">
                                <option value="transfer">Transfer</option>
                                <option value="giro">Giro</option>
                              </select>
                              <br>
                            </div> -->
                          </div>
                          <div class="col-md-6">
                            <div class="">
                              <label for="nama1">Nama Perusahaan</label>
                              <input type="text" class="form-control" id="kode_faktur" name="klien" value="<?=set_value('klien')?>" placeholder="Masukkan Nama Perusahaan">
                              <br>
                            </div>
                          </div>
                      </div>

                        <table class="table table-bordered" style="border-width: 2px" id="table">
                          <tr>
                            <th>No. SM</th>
                            <th>Pengirim</th>
                            <th>Penerima</th>
                            <th>Total</th>
                            <th style="width: 100px">#</th>
                          </tr>
                          <!-- <tr id="item1">
                            <td id="jumlahBarangtd1"></td>
                            <td id="jenistd1"></td>
                            <td id="hargatd1"></td>
                            <td id="jumlahUangtd1"></td>
                            <td>
                              <input type="hidden" name="jumlahBarang1" id="jumlahBarang1">
                              <input type="hidden" name="jenis1" id="jenis1">
                              <input type="hidden" name="harga1" id="harga1">
                              <input type="hidden" name="jumlahUang1" id="jumlahUang1">
                              <a href="" class="btn btn-default" data-toggle="modal" data-target="#edit-modal" onclick="appEdit(1)"><i class="fa fa-pencil"></i></a>
                              <a href="" class="btn btn-default"><i class="fa fa-trash-o"></i></a>
                            </td>
                          </tr> -->
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
            
