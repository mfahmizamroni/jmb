      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Daftar Muat
          </h1>
          <ol class="breadcrumb">
            <li><a href="#">Dashboard</a></li>
            <li>Daftar Muat</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">

              <div class="box box-primary">
                <div class="box-header">
                  <div class="pull-right">
                    <a href="<?= base_url().'daftarmuat/add' ?>"><button class="btn btn-info"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Daftar Muat</button></a>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Nomor Surat Jalan</th>
                        <th>Nopol Truck</th>
                        <th>Sopir</th>
                        <th>Total</th>
                        <th>Tanggal</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i = 0; 

                      foreach ($daftarmuat->result() as $sjs) {
                        $i++;
                        ?>
                        <tr>
                          <td><?= $i; ?></td>
                          <td><?= $sjs->no_dm; ?></td>
                          <td><?= $sjs->truk; ?></td>
                          <td><?= $sjs->sopir; ?></td>
                          <td><?= $sjs->total; ?></td>
                          <td><?= $sjs->tanggal; ?></td>
                          <td>
                            <a href="<?php echo base_url().'daftarmuat/edit/'.$sjs->id_dm;?>" class="btn btn-default btn-xs"><i class="fa fa-pencil"></i></a>
                            <a href="<?php echo base_url().'prints?id='.$sjs->id_dm;?>" class="btn btn-success btn-xs"><i class="fa fa-money"></i></a>
                            <a href="#" data-href="<?php echo base_url().'daftarmuat/delete/'.$sjs->id_dm;?>" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash"></i></a> 
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