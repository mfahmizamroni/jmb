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

              <div class="box box-primary">
                <div class="box-header">
                  <div class="pull-right">
                    <a href="<?= base_url().'klien/add' ?>"><button class="btn btn-info"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Klien</button></a>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Nama Klien</th>
                        <th>Alamat</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i = 0; 
                      foreach ($klien->result() as $kliens) {
                        $i++;
                        ?>
                        <tr>
                          <td><?= $i; ?></td>
                          <td><?= $kliens->nama_klien; ?></td>
                          <td><?= $kliens->alamat; ?></td>
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