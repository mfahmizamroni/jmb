      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Lihat Truk
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

              <div class="box box-info ">
                <div class="box-header">
                  <div class="pull-right">
                    <a href="<?= base_url().'truk/add' ?>"><button class="btn btn-info"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Truk</button></a>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Nomor Polisi</th>
                        <th>Jenis Truk</th>
                        <th>Kapasitas</th>
                        <th>Ongkos</th>
                        <th class="">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i = 0; 
                      foreach ($truk->result() as $truks) {
                        $i++;
                        ?>
                        <tr>
                          <td class="hidden"><?= $truks->id_truk; ?> </td>
                          <td><?= $truks->nopol; ?></td>
                          <td><?= $truks->jenis; ?></td>
                          <td><?= $truks->kapasitas; ?></td>
                          <td><?= $truks->ongkos; ?></td>
                          <td>
                            <a href="<?php echo base_url().'truk/edit/'.$truks->id_truk; ?>" class="btn btn-default btn-xs"><i class="fa fa-pencil"></i></a>
                            <a href="#" data-href="<?php echo base_url().'truk/delete/'.$truks->id_truk;?>" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash"></i></a> 
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