<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?= base_url(); ?>assets/AdminLTE2410/dist/img/profile/none.jpg" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>Administrator</p>
        <!-- <p><?= $user['email']; ?></p> -->
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
          <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
          </button>
        </span>
      </div>
    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
      <li class="active treeview">
        <a href="#">
          <i class="fa fa-dashboard"></i> <span>Master Data</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?= base_url() . 'user/user'; ?>"><i class="fa fa-circle-o"></i> User</a></li>
          <li><a href="<?= base_url() . 'fakultas/fakultas'; ?>"><i class="fa fa-circle-o"></i> Fakultas</a></li>
          <li><a href="<?= base_url() . 'jurusan/jurusan'; ?>"><i class="fa fa-circle-o"></i> Jurusan</a></li>
          <li><a href="<?= base_url() . 'prodi/prodi'; ?>"><i class="fa fa-circle-o"></i> Program Studi</a></li>
          <li><a href="<?= base_url() . 'mahasiswa/mahasiswa'; ?>"><i class="fa fa-circle-o"></i> Data Mahasiswa</a></li>
          <li><a href="<?= base_url() . 'jenisbeasiswa/jenis_beasiswa'; ?>"><i class="fa fa-circle-o"></i> Jenis Beasiswa</a></li>
          <li><a href="<?= base_url() . 'tahunusulan/usulan'; ?>"><i class="fa fa-circle-o"></i> Tahun Usulan</a></li>
          <li><a href="<?= base_url() . 'prestasibidang/bidang'; ?>"><i class="fa fa-circle-o"></i> Prestasi Bidang</a></li>
        </ul>
      </li>
      <li class="header">Proses Beasiswa</li>
      <li>
        <a href="<?= base_url() . 'kepribadian/kepribadian'; ?>">
          <i class="fa fa-th"></i> <span>Data Kepribadian</span>
        </a>
      </li>
      <li>
        <a href="<?= base_url() . 'prestasi/prestasi'; ?>">
          <i class="fa fa-th"></i> <span>Data Prestasi</span>
        </a>
      </li>
      <li>
        <a href="<?= base_url() . 'rekap/rekap'; ?>">
          <i class="fa fa-th"></i> <span>Rekap Beasiswa</span>
        </a>
      </li>


    </ul>
  </section>
  <!-- /.sidebar -->
</aside>