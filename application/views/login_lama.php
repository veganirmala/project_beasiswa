<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
  <title>Login Assessment</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">

  <link rel="stylesheet" href="<?php echo base_url(); ?>autocomplete/plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>autocomplete/plugins/datepicker/datepicker3.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>autocomplete/plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>autocomplete/plugins/colorpicker/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>autocomplete/plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>autocomplete/plugins/select2/select2.min.css">


  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/select2.css" />

  <style type="text/css">
    body {
      font-family: 'Open Sans', sans-serif;
    }

    .logo i {
      font-size: 31px;
      margin-right: 4px;
      word-spacing: 14px;
    }

    .logo {
      color: white;
      margin: 0;
      font-size: 20px;
      padding: 4px 0;
      padding-bottom: 15px;

    }

    .login-bottom-text {
      margin-top: 0px;
      margin-bottom: 0px;
      font-size: 12px;
      color: white;
      line-height: 19px;
    }

    header {
      /*F5F5F5*/

      background: #008080;
      padding-top: 10px;
      border-bottom-style: groove #FF9;
    }

    header .form-group {
      margin-bottom: 0px;
    }

    header .btn-header-login {
      margin-bottom: 15px;
    }

    .login-main {
      margin-top: 130px;
    }

    .multibox {
      padding-left: 0px;
      padding-bottom: 10px;
    }

    .login-main span {
      font-size: 12px;
    }



    footer hr {
      margin-top: 0px;
      padding-top: 0px;
    }

    .footer-options ul {
      clear: both;
      padding: 0px;
      margin: 0px;
    }

    .footer-options ul li {
      float: left;
      list-style: none;
      padding: 5px;
      font-size: 12px;
    }

    .footer-options ul li a {
      text-decoration: none;
      color: #000;
    }

    .copyrights {
      margin-top: 25px;
    }

    .ui-autocomplete {
      max-height: 100px;
      overflow-y: auto;
      overflow-x: hidden;
    }

    .ui-autocomplete {
      height: 100px;
    }



    .jwpopup {
      display: none;
      position: fixed;
      z-index: 1;
      padding-top: 110px;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgb(0, 0, 0);
      background-color: rgba(0, 0, 0, 0.7);
    }

    .jwpopup-content {
      position: relative;
      background-color: #fefefe;
      margin: auto;
      padding: 0;
      max-width: 500px;
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
      -webkit-animation-name: animatetop;
      -webkit-animation-duration: 0.4s;
      animation-name: animatetop;
      animation-duration: 0.4s
    }

    .jwpopup-head {
      font-size: 11px;
      padding: 1px 16px;
      color: white;
      background: #006faa;
      /* For browsers that do not support gradients */
      background: -webkit-linear-gradient(#006faa, #002c44);
      /* For Safari 5.1 to 6.0 */
      background: -o-linear-gradient(#006faa, #002c44);
      /* For Opera 11.1 to 12.0 */
      background: -moz-linear-gradient(#006faa, #002c44);
      /* For Firefox 3.6 to 15 */
      background: linear-gradient(#006faa, #002c44);
      /* Standard syntax */
    }

    .jwpopup-main {
      padding: 5px 16px;
    }

    .jwpopup-foot {
      font-size: 12px;
      padding: .5px 16px;
      color: #ffffff;
      background: #006faa;
      /* For browsers that do not support gradients */
      background: -webkit-linear-gradient(#006faa, #002c44);
      /* For Safari 5.1 to 6.0 */
      background: -o-linear-gradient(#006faa, #002c44);
      /* For Opera 11.1 to 12.0 */
      background: -moz-linear-gradient(#006faa, #002c44);
      /* For Firefox 3.6 to 15 */
      background: linear-gradient(#006faa, #002c44);
      /* Standard syntax */
    }

    /* tambahkan efek animasi */
    @-webkit-keyframes animatetop {
      from {
        top: -300px;
        opacity: 0
      }

      to {
        top: 0;
        opacity: 1
      }
    }

    @keyframes animatetop {
      from {
        top: -300px;
        opacity: 0
      }

      to {
        top: 0;
        opacity: 1
      }
    }

    /* style untuk tombol close */
    .close {
      margin-top: 7px;
      color: white;
      float: left;
      font-size: 28px;
      font-weight: bold;
    }

    .close:hover,
    .close:focus {
      color: #999999;
      text-decoration: none;
      cursor: pointer;
    }
  </style>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


  <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
  <script src="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>


</head>

<body>

  <header>
    <div class="container">
      <div class="row">
        <div class="col-sm-6">
          <div class="logo"><img src="<?php echo base_url() . 'assetsku/img/logo_paon.png'; ?>"></div>
        </div>
        <!--<div class="col-sm-6 hidden-xs">-->
        <div class="col-sm-6">
          <form method="post" action="<?php echo base_url() . 'Login/login'; ?>">
            <div class="row">
              <div class="col-sm-5">
                <div class="form-group">
                  <input type="text" class="form-control" name="username" placeholder="Username" id="username" required>
                  <div class="login-bottom-text checkbox hidden-sm">
                    <!-- <label>
						      <input type="checkbox" id="">
						      Keep me sign in
						    </label>--->
                  </div>
                </div>
              </div>
              <div class="col-sm-5">
                <div class="form-group">
                  <input type="password" class="form-control" name="password" placeholder="Password" id="password" required>
                  <!-- <div class="login-bottom-text hidden-sm"> Forgot your password?  </div>--->
                </div>
              </div>
              <div class="col-sm-2">
                <div class="form-group">
                  <input type="submit" value="login" class="btn btn-default btn-header-login">
                </div>
              </div>
            </div>
          </form>
        </div>

      </div>

    </div>

  </header>

  <article class="container">

    <div class="row">
      <div class="col-sm-8">
        <div class="col-sm-8 hidden-xs">
          <img style="width:600px; margin-left:50px;" src="<?php echo base_url() . 'assetsku/img/ganesha.png'; ?>">
        </div>
        <div class="login-main">






        </div>
      </div>

      <form method="post" action="<?php echo base_url() . 'login/daftar'; ?>">
        <div class="col-sm-4">
          <div class="">
            <?php echo $this->session->flashdata('message'); ?>
            <h3><i class="fa fa-shield"></i> Daftar Disini</h3>
            <?php echo $this->session->flashdata("k"); ?>
            <?php echo $this->session->flashdata('message'); ?>

            <hr>

            <div class="form-group">
              <label class="control-label" for="">Sebagai</label>

              <select class="form-control select2" style="width:100%;" name="type">
                <option value="1">Pengajar</option>
                <option value="2">Siswa</option>
              </select>


            </div>



            <div class="form-group">
              <label class="control-label">Institusi</label>

              <select class="form-control select2" style="width:100%;" name="institusi">

                <?php foreach ($institusi as $in) { ?>
                  <option value="<?php echo $in['rf_idInstitusi']; ?>"><?php echo $in['rf_namaInstitusi']; ?></option>
                <?php } ?>
              </select>


              <p style="font-size:12px; font:Verdana, Geneva, sans-serif;"><i>* Daftarkan Institusi jika Tidak Tersedia, <a href="javascript:void(0);" id="jwpopupLink"> klik disini</a></i></p>

            </div>

            <div class="form-group">
              <label class="control-label" for="">Nama</label>
              <input type="text" class="form-control" placeholder="Nama" name="nama" required>
            </div>











            <!-- <div class="">
					<label>Institusi</label>
                 <div class="form-group">
					  <div class="col-sm-12 multibox">
					 	<select class="form-control">
					 		<option>Undiksha</option>
                            <option>Dll</option>
					 	</select>
					  </div>
                 </div>
                 </div>--->

            <div class="form-group">
              <label class="control-label" for="">Id Pada Institusi</label>
              <input type="text" class="form-control" placeholder="Id Pada Institusi" name="id_institusi" required>
            </div>

            <div class="form-group">
              <label class="control-label" for="">Email</label>
              <input type="email" class="form-control" placeholder="Email" name="email" required>
            </div>


            <div class="form-group">
              <label class="control-label" for="">Password</label>
              <input type="password" class="form-control" placeholder="Password" name="pass" required>
            </div>


            <!--
				<div class="">
					<label>Birthday</label>
				  <div class="form-group">
					  <div class="col-sm-4 multibox">
					 	<select class="form-control">
					 		<option>Day</option>
					 	</select>
					  </div>
					   <div class="col-sm-4 multibox">
					 	<select class="form-control">
					 		<option>Month</option>
					 	</select>
					  </div>
					   <div class="col-sm-4 multibox">
					 	<select class="form-control">
					 		<option>Year</option>
					 	</select>
					  </div>
				   
				  </div>
				</div>
		      --->
            <small>
              Silahkan Mengisi Pendaftaran Dengan Benar
            </small>
            <div style="height:10px;"></div>
            <div class="form-group">
              <label class="control-label" for=""></label>
              <input style="background:#008080; color:#fff;" type="submit" value="Daftar" class="btn">
            </div>

          </div>
        </div>
    </div>
    </div>
    </form>

    <!--<a href="javascript:void(0);" id="jwpopupLink">Klik disini untuk membuka popup</a>-->

    <!-- jwpopup box -->
    <div style="width:100%;" id="jwpopupBox" class="jwpopup">
      <!-- jwpopup content -->
      <div class="jwpopup-content">
        <form method="post" action="<?php echo base_url() . 'login/tambah_institusi'; ?>">
          <div class="jwpopup-head">
            <span class="close">×</span>
            <h2 align="center">Tambah Institusi</h2>
          </div>

          <div class="jwpopup-main">
            <p>

              <div class="form-group">
                <label class="control-label" for="">Jenis Institusi</label>

                <div>
                  <select class="form-control select2" style="width:100%;" name="v_kodeJenisInstitusi">
                    <?php foreach ($jenisinstitusi as $in) { ?>
                      <option value="<?php echo $in['rf_idJenisInstitusi']; ?>"><?php echo $in['rf_namaInstitusi']; ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label" for="">Nama Institusi</label>
                <input type="text" name="v_nama" class="form-control" placeholder="Nama Institusi" required>
              </div>
              <div class="form-group">
                <label class="control-label" for="">Negara</label>

                <div>
                  <select class="form-control select2" style="width:100%;" name="v_kodeNegara">
                    <?php foreach ($negara as $en) { ?>
                      <option value="<?php echo $en['rf_idNegara']; ?>"><?php echo $en['rf_namaNegara']; ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>

            </p>
          </div>


          <div class="jwpopup-foot">
            <p>
              <div class="form-group">
                <label class="control-label" for=""></label>
                <input style="background:#008080; color:#fff;" type="submit" value="Simpan" class="btn">
              </div>
            </p>
          </div>

        </form>
      </div>
    </div>


  </article>
  <footer class="container">
    <hr>
    <div class="footer-options">
      <ul>
        <li><a href="#">Universitas</li>
        <li><a href="#">Pendidikan</li>
        <li><a href="#">Ganesha</li>
      </ul>
    </div>
    <div style="clear:both"></div>
    <small class="copyrights"> © Copyrights Manajemen Informatika 2017</small>
  </footer>


  <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/jquery.ui.custom.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/jquery.uniform.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/select2.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/maruti.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/maruti.tables.js"></script>

  <script src="<?php echo base_url(); ?>autocomplete/plugins/jQuery/jquery-2.2.3.min.js"></script>
  <!-- Bootstrap 3.3.6 -->
  <script src="<?php echo base_url(); ?>autocomplete/bootstrap/js/bootstrap.min.js"></script>
  <!-- Select2 -->
  <script src="<?php echo base_url(); ?>autocomplete/plugins/select2/select2.full.min.js"></script>
  <!-- InputMask -->
  <script src="<?php echo base_url(); ?>autocomplete/plugins/input-mask/jquery.inputmask.js"></script>
  <script src="<?php echo base_url(); ?>autocomplete/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
  <script src="<?php echo base_url(); ?>autocomplete/plugins/input-mask/jquery.inputmask.extensions.js"></script>
  <!-- date-range-picker -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
  <script src="<?php echo base_url(); ?>autocomplete/plugins/daterangepicker/daterangepicker.js"></script>
  <!-- bootstrap datepicker -->
  <script src="<?php echo base_url(); ?>autocomplete/plugins/datepicker/bootstrap-datepicker.js"></script>
  <!-- bootstrap color picker -->
  <script src="<?php echo base_url(); ?>autocomplete/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
  <!-- bootstrap time picker -->
  <script src="<?php echo base_url(); ?>autocomplete/plugins/timepicker/bootstrap-timepicker.min.js"></script>
  <!-- SlimScroll 1.3.0 -->
  <script src="<?php echo base_url(); ?>autocomplete/plugins/slimScroll/jquery.slimscroll.min.js"></script>
  <!-- iCheck 1.0.1 -->
  <script src="<?php echo base_url(); ?>autocomplete/plugins/iCheck/icheck.min.js"></script>
  <!-- FastClick -->
  <script src="<?php echo base_url(); ?>autocomplete/plugins/fastclick/fastclick.js"></script>

  <script type="text/javascript">
    $(document).ready(function() {
      $(" #alert").fadeOut(9000);
    });
  </script>
  <script type="text/javascript">
    // untuk mendapatkan jwpopup
    var jwpopup = document.getElementById('jwpopupBox');

    // untuk mendapatkan link untuk membuka jwpopup
    var mpLink = document.getElementById("jwpopupLink");

    // untuk mendapatkan aksi elemen close
    var close = document.getElementsByClassName("close")[0];

    // membuka jwpopup ketika link di klik
    mpLink.onclick = function() {
      jwpopup.style.display = "block";
    }

    // membuka jwpopup ketika elemen di klik
    close.onclick = function() {
      jwpopup.style.display = "none";
    }

    // membuka jwpopup ketika user melakukan klik diluar area popup
    window.onclick = function(event) {
      if (event.target == jwpopup) {
        jwpopup.style.display = "none";
      }
    }
  </script>

  <script>
    $(function() {
      //Initialize Select2 Elements
      $(".select2").select2();

      //Datemask dd/mm/yyyy
      $("#datemask").inputmask("dd/mm/yyyy", {
        "placeholder": "dd/mm/yyyy"
      });
      //Datemask2 mm/dd/yyyy
      $("#datemask2").inputmask("mm/dd/yyyy", {
        "placeholder": "mm/dd/yyyy"
      });
      //Money Euro
      $("[data-mask]").inputmask();

      //Date range picker
      $('#reservation').daterangepicker();
      //Date range picker with time picker
      $('#reservationtime').daterangepicker({
        timePicker: true,
        timePickerIncrement: 30,
        format: 'MM/DD/YYYY h:mm A'
      });
      //Date range as a button
      $('#daterange-btn').daterangepicker({
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate: moment()
        },
        function(start, end) {
          $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
      );

      //Date picker
      $('#datepicker').datepicker({
        autoclose: true
      });

      //iCheck for checkbox and radio inputs
      $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
        checkboxClass: 'icheckbox_minimal-blue',
        radioClass: 'iradio_minimal-blue'
      });
      //Red color scheme for iCheck
      $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
        checkboxClass: 'icheckbox_minimal-red',
        radioClass: 'iradio_minimal-red'
      });
      //Flat red color scheme for iCheck
      $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
        checkboxClass: 'icheckbox_flat-green',
        radioClass: 'iradio_flat-green'
      });

      //Colorpicker
      $(".my-colorpicker1").colorpicker();
      //color picker with addon
      $(".my-colorpicker2").colorpicker();

      //Timepicker
      $(".timepicker").timepicker({
        showInputs: false
      });
    });
  </script>


</body>

</html>