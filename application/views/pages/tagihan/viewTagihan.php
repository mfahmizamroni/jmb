      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Tagihan
          </h1>
          <ol class="breadcrumb">
            <li><a href="#">Dashboard</a></li>
            <li>Tagihan</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">

              <div class="box box-primary">
                <div class="box-header">
                  <div class="pull-right">
                    <a href="<?= base_url().'tagihan/add' ?>"><button class="btn btn-info"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Tagihan</button></a>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No Tagihan</th>
                        <th>Nama Perusahaan</th>
                        <th>Tipe Pembayaran</th>
                        <th>Total Tagihan</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i = 0; 
                      foreach ($tagihan->result() as $tagihans) {
                        $i++;
                        ?>
                        <tr>
                          <td><?= $tagihans->no_tagihan; ?></td>
                          <td><?= $tagihans->klien; ?></td>
                          <td><?= $tagihans->tipe_pembayaran; ?></td>
                          <td><?= $tagihans->total_tagihan; ?></td>
                          <td>
                            <a href="<?php echo base_url().'tagihan/edit/'.$tagihans->id_tagihan;?>" class="btn btn-default btn-xs"><i class="fa fa-pencil"></i></a>
                            <a href="#" data-href="<?php echo base_url().'tagihan/delete/'.$tagihans->id_tagihan;?>" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash"></i></a> 
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