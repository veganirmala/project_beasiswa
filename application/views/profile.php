<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Selamat Datang
        <small>"<?= $this->session->userdata('email'); ?>"</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Profile</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Detail Profile</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          <form role="form" method="post" action="<?php echo base_url() . 'log_in/profile_update'; ?>" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Email</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" value="<?php echo $isi['email']; ?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Nama Lengkap</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" value="<?php echo $isi['email']; ?>">
                </div>
				<div class="form-group">
                  <label for="exampleInputPassword1">Foto</label><br>
                  
                                    <img src="<?= base_url() . 'assets/AdminLTE2410/dist/img/profile/' . $isi['image']; ?>" class="img-thumbnail" width="160" height="200">
                                
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Ganti Foto</label>
                  <input type="file" name="image" class="custom-file-input" id="image">
					<input class="span11" type="hidden" name="email" value="<?php echo $isi['email']; ?>">
                </div>
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
        </div>
        <!-- /.box-body -->
        
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->