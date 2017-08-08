      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Tambah Truk
            <small>Preview</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Forms</a></li>
            <li>General Elements</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Tambah Truk</h3>
                </div><!-- /.box-header -->
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
                  <div class="box-body">
                    <div class="form-group">
                      <label for="buku1">Nomor Polisi</label>
                      <input type="text" class="form-control" id="buku1" name="nopol" placeholder="Masukkan Nomor Polisi Truk">
                    </div>
                    <div class="form-group">
                      <label for="buku1">Jenis Truk</label>
                      <input type="text" class="form-control" id="buku1" name="jenis" placeholder="Masukkan Jenis Truk">
                    </div>
                    <div class="form-group">
                      <label for="tahun">Kapasitas</label>
                      <input type="text" class="form-control" id="buku1" name="kapasitas" placeholder="Masukkan Kapasitas">
                    </div>
                    <div class="form-group">
                      <label for="pengarang">Ongkos</label>
                      <input type="text" class="form-control" id="buku1" name="ongkos" placeholder="Masukkan Ongkos">
                    </div>
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div><!-- /.box -->

          </div>   <!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->