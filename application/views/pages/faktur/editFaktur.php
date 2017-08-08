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
                      <table class="table" style="border-width: 2px">
                        <tr>
                        <th style="width: 30px">
                      <div class="form-group">
                        <div class="row">

                          <div class="col-xs-6">
                            <div class="box-body">
                            <h1 class="text-aqua"><i class="fa fa-truck fa-fw fa-2x"> </i><strong class="">JAYA MULYA BARU</strong></h1>
                              <blockquote>
                                <p>Margomulyo Permai Blok B - 14 - SBY</p>
                                <small>(031) 234 345 345</small>
                              </blockquote>
                              <blockquote>
                                <p>MALANG - Kolonel Sugiono No. 22</p>
                                <small>089 678 567 567</small>
                              </blockquote>
                            </div>
                          </div>
                          <div class="col-xs-6">
                            <label for="nama1">No Faktur</label>
                            <input type="text" class="form-control" id="kode_faktur" name="kode_faktur" value="<?= $faktur->kode_faktur ?>">
                            <br>
                            <label for="nama1">Pengirim</label>
                            <input type="text" class="form-control" id="pengirim" name="pengirim" value="<?= $faktur->id_faktur_pengirim ?>" >
                            <br>
                            <label for="nama1">Penerima</label>
                            <input type="text" class="form-control" id="penerima" name="penerima" value="<?= $faktur->id_faktur_penerima ?>" >
                            <br>
                            <label for="nama1"> Tujuan</label>
                            <input type="text" class="form-control" id="tujuan" name="tujuan" value="<?= $faktur->tujuan ?>">
                            <br>
                            </div>
                        </div>
                        </th>
                        </tr>
                      </table>
                      
                        <br>
                        <table class="table table-bordered" style="border-width: 2px" id="table">
                          <tr>
                            <th style="width: 30px">Banyaknya</th>
                            <th>Jenis Barang Menurut Pengakuan</th>
                            <th>Harga/Unit</th>
                            <th>Jumlah Uang</th>
                            <th style="width: 100px">#</th>
                          </tr>
                          <?php $i = 1;
                          foreach ($item->result() as $items) {?>
                          <tr id="item<?= $i; ?>">
                            <td id="jumlahBarangtd<?= $i; ?>"><?= $items->qty ?></td>
                            <td id="jenistd<?= $i; ?>"><?= $items->jenis ?></td>
                            <td id="hargatd<?= $i; ?>"><?= $items->harga ?></td>
                            <td id="jumlahUangtd<?= $i; ?>"><?= $items->total ?></td>
                            <td id="editid<?= $i; ?>">
                              <input type="hidden" name="idItem<?= $i; ?>" id="idItem<?= $i; ?>" value="<?= $items->id_item ?>">
                              <input type="hidden" name="jumlahBarang<?= $i; ?>" id="jumlahBarang<?= $i; ?>" value="<?= $items->qty ?>">
                              <input type="hidden" name="jenis<?= $i; ?>" id="jenis<?= $i; ?>" value="<?= $items->jenis ?>">
                              <input type="hidden" name="harga<?= $i; ?>" id="harga<?= $i; ?>" value="<?= $items->harga ?>">
                              <input type="hidden" name="jumlahUang<?= $i; ?>" id="jumlahUang<?= $i; ?>" value="<?= $items->total ?>">
                              <a href="" class="btn btn-default" data-toggle="modal" data-target="#edit-modal" onclick="appEdit(<?= $i; ?>)"><i class="fa fa-pencil"></i></a>
                              <!-- <a href="" class="btn btn-default"><i class="fa fa-trash-o"></i></a> -->
                              <a href="#" data-href="<?php echo base_url().'faktur/deleteitem/'.$items->id_item.'?id_faktur='.$faktur->id_faktur;?>" class="btn btn-default" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash-o"></i></a>
                            </td>
                          </tr>
                          <?php $i++; } ?>
                        </table>                   
                        <a href="" class="btn btn-default" data-toggle="modal" data-target="#add-modal"><i class="fa fa-plus"> Tambah Barang</i></a><br><br><br>

                        <div class="checkbox" style="margin: 0px; display: inline-block;"><label><input type="checkbox" name="lunas" value="1" <?php if ($faktur->lunas == 1) {echo "checked";} ?>>Lunas</label></div> 
                        
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
            
