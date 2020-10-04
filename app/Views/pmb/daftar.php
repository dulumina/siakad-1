<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <link rel="icon" type="image/png" href="<?php echo base_url();?>/public/gambar/logo.png">
  <title>SIAKAD <?php echo isset($title)?" | {$title}":"";?></title>
    <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url();?>/public/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo base_url();?>/public/adminlte/plugins/fontawesome-free/css/all.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="<?php echo base_url();?>/public/adminlte/plugins/toastr/toastr.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>/public/adminlte/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>/public/adminlte/plugins/sweetalert2/sweetalert2.min.css">
  
   <!-- jQuery -->
  <script src="<?php echo base_url();?>/public/adminlte/plugins/jquery/jquery.min.js"></script>

</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to to the body tag
to get the desired effect
|---------------------------------------------------------|
|LAYOUT OPTIONS | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition layout-top-nav">
<div class="wrapper">
 <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="#" class="navbar-brand">
        <img src="<?php echo base_url();?>/public/gambar/logo.png" alt="SIAKAD Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
      </a>
      
      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="<?php echo base_url();?>" class="nav-link">Home</a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url();?>/dosen/biodata" class="nav-link">Buat Akun</a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url();?>/dosen/biodata" class="nav-link">Pengumuman</a>
          </li>
		  <li class="nav-item">
            <a href="<?php echo base_url();?>/dosen/biodata" class="nav-link">Pengumuman</a>
          </li>
        </ul>

       
      </div>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        
       
        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button"><i
              class="fas fa-th-large"></i></a>
        </li>
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->


  <div class="login-logo">
    <a class="text-info" style="font-size:40px;">Penerimaan Mahasiswa Baru</a>
  </div>
  <!-- /.login-logo -->
  <div class="card" style="padding:20px;">
    <div class="card-body">
     

      <form id="form_login" action="<?php echo base_url();?>/pmb/daftar/prosesdaftar" method="post">
	  <?php
		echo csrf_field();
	  ?>
        <div class="input-group mb-3">
          <input type="text" name="username" id="username" class="form-control" placeholder="Username" aria-describedby="username-error">		  
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
		  <span id="username-error" class="error invalid-feedback">loading...</span>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" id="password" class="form-control" placeholder="Password" aria-describedby="password-error">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
		  <span id="password-error" class="error invalid-feedback">Loading..</span>
        </div>
        <div class="row">
          <div class="col-8">
            
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block btnLogin">Daftar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center mb-3">
	  <br>
        <hr>      
      </div>
      <!-- /.social-auth-links -->
		
     
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

</div>
<!-- ./wrapper -->	  

<!-- REQUIRED SCRIPTS -->

<!-- Toastr -->
<script src="<?php echo base_url();?>/public/adminlte/plugins/toastr/toastr.min.js"></script>

<!-- Bootstrap -->
<script src="<?php echo base_url();?>/public/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- AdminLTE -->
<script src="<?php echo base_url();?>/public/adminlte/dist/js/adminlte.js"></script>
<!-- Jquery form -->
<script src="<?php echo base_url();?>/public/adminlte/plugins/jquery/jquery.form.js"></script>
<script src="<?php echo base_url();?>/public/adminlte/plugins/vegas/vegas.min.js"></script>
<script src="<?php echo base_url();?>/public/adminlte/plugins/sweetalert2/sweetalert2.min.js"></script>

<script>
$(document).ready(function(){
	$("#form_login").on("submit",function(e){
		e.preventDefault();
		$.ajax({
			type:'post',
			url:$(this).attr("action"),
			data:$(this).serialize(),
			dataType:'json',
			beforeSend:function(){
				$(".btnLogin").prop("disabled",true);
				$(".btnLogin").html("<i class='fa fa-spin fa-spinner'></i>");			
			},
			complete:function(){
				$(".btnLogin").prop("disabled",false);
				$(".btnLogin").html("Sign In");	
			},
			success:function(response){
				if(response.error){
					if(response.error.username){
						$("#username").addClass("is-invalid");
						$("#username-error").html(response.error.username);
					}else{
						$("#username").removeClass("is-invalid");
						$("#username-error").html("");
					}
					if(response.error.password){
						$("#password").addClass("is-invalid");
						$("#password-error").html(response.error.password);
					}else{
						$("#password").removeClass("is-invalid");
						$("#password-error").html("");
					}
				}
				if(response.success){
					window.location=response.success.link;
				}
			},
			error:function(xhr,ajaxOptions,thrownError){
				alert(xhr.status+"\n"+xhr.responseText+"\n"+thrownError);				
			}
		})
		return false;
	})
	
})
});
</script>