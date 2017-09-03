      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Surat Muat Belum Berangkat
          </h1>
          <ol class="breadcrumb">
            <li><a href="#">Dashboard</a></li>
            <li>Lihat Truk</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">

              <div class="box box-primary">
                <div class="box-header">
                  <div class="pull-right">
                    <a href="<?= base_url().'faktur/add' ?>"><button class="btn btn-info"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Surat Muat</button></a>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example2" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>No. SM</th>
                        <th>Pengirim</th>
                        <th>Penerima</th>
                        <th>Tujuan</th>
                        <th>Tanggal</th>
                        <th>action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i = 0; 
                      foreach ($faktur->result() as $fakturs) {
                        $i++;
                        ?>
                        <tr>
                          <td><?= $i; ?></td>
                          <td><?= $fakturs->kode_faktur; ?></td>
                          <td><?= $fakturs->id_faktur_pengirim; ?></td>
                          <td><?= $fakturs->id_faktur_penerima; ?></td>
                          <td><?= $fakturs->tujuan; ?></td>
                          <td><?= $fakturs->created_at; ?></td>
                          <td>
                            <a href="<?php echo base_url().'faktur/edit/'.$fakturs->id_faktur.'?kode_faktur='.$fakturs->kode_faktur;?>" class="btn btn-default btn-xs"><i class="fa fa-pencil"></i></a>
                            <a href="#" data-href="<?php echo base_url().'faktur/delete/'.$fakturs->id_faktur;?>" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash"></i></a> 
                          </td>
                        </tr>
                        <?php
                      } ?>
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->

        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Surat Muat Sudah Berangkat
          </h1>
          <ol class="breadcrumb">
            <li><a href="#">Dashboard</a></li>
            <li>Lihat Truk</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">

              <div class="box box-primary">
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>No. SM</th>
                        <th>Pengirim</th>
                        <th>Penerima</th>
                        <th>Tujuan</th>
                        <th>Tanggal</th>
                        <th>action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i = 0; 
                      foreach ($faktur_history->result() as $fakturs_history) {
                        $i++;
                        ?>
                        <tr>
                          <td><?= $i; ?></td>
                          <td><?= $fakturs_history->kode_faktur; ?></td>
                          <td><?= $fakturs_history->id_faktur_pengirim; ?></td>
                          <td><?= $fakturs_history->id_faktur_penerima; ?></td>
                          <td><?= $fakturs_history->tujuan; ?></td>
                          <td><?= $fakturs_history->created_at; ?></td>
                          <td>
                            <a href="<?php echo base_url().'faktur/edit/'.$fakturs_history->id_faktur.'?kode_faktur='.$fakturs_history->kode_faktur;?>" class="btn btn-default btn-xs"><i class="fa fa-pencil"></i></a>
                            <a href="#" data-href="<?php echo base_url().'faktur/delete/'.$fakturs_history->id_faktur;?>" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash"></i></a> 
                          </td>
                        </tr>
                        <?php
                      } ?>
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->


      </div><!-- /.content-wrapper -->
