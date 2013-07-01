
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script type="text/javascript">
 function getFile(){
   document.getElementById("upfile").click();
 }
 function sub(obj){
    var file = obj.value;
    var fileName = file.split("\\");
    document.getElementById("yourBtn").innerHTML = fileName[fileName.length-1];
    document.myForm.submit();
    event.preventDefault();
  }
  function setClick(){
    document.event_form.submit();
    event.preventDefault();
  }
 function getVisibleImageUpload(){
 	document.getElementById("uploadForm").style.display="block";
 	document.getElementById("imageUploadVisible").style.display="none";
 	document.getElementById("imageUploadUnVisible").style.display="block";
 }
  function getUnVisibleImageUpload(){
 	document.getElementById("uploadForm").style.display="none";
 	document.getElementById("imageUploadVisible").style.display="block";
 	document.getElementById("imageUploadUnVisible").style.display="none";
 }

 $(function() {
          $( "#datestartpicker" ).datepicker();
      });
 $(function() {
          $( "#datefinishpicker" ).datepicker();
      });
</script>
<style>
#yourBtn{
   font-family: calibri;
   width: 150px;
   padding: 10px;
   -webkit-border-radius: 5px;
   -moz-border-radius: 5px;
   border: 1px dashed #BBB; 
   text-align: center;
   background-color: #DDD;
   cursor:pointer;
  }
</style>
<!-- Email Degistir Popup Begin -->
<div id="myEmail" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="myModalLabel">Email Değiştir</h3>
	</div>
	<form action="<?=site_url('home/change_email')?>" method="post" accept-charset="utf-8">
	<div class="modal-body">
			<table style="width:100%;">
				<tr>
					<td>
						<input type="text" class="input-block-level" name="email" placeholder="Email" required maxlength="40" />
					</td>
				</tr>
			</table>
		
	</div>
	<div class="modal-footer">
		<button type="submit" class="btn btn-success">Değiştir</button>
	</div>
	</form>
</div>
<!-- Email Degistir Popup End -->
<!-- Sifre Degistir Popup Begin -->
<div id="mySifre" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="myModalLabel">Şifre Değiştir</h3>
	</div>
	<form action="<?=site_url('home/change_sifre')?>" method="post" accept-charset="utf-8">
	<div class="modal-body">
			<table style="width:100%;">
				<tr>
					<td>
						<input type="text" class="input-block-level" name="sifre" placeholder="Şifre" required maxlength="40" />
					</td>
				</tr>
			</table>
		
	</div>
	<div class="modal-footer">
		<button type="submit" class="btn btn-success">Değiştir</button>
	</div>
	</form>
</div>
<!-- Sifre Degistir Popup End -->
<!-- Duyuru Ekle Popup Begin -->
<div id="isEkle" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="myModalLabel">Lütfen ekleyeceğiniz etkinliğin tipini seçiniz</h3>
	</div>
	<form id="event_form" action="<?=site_url('home/add_event')?>" method="post" accept-charset="utf-8">
	<div class="modal-body">
		<table style="width:100%;">
			<tr>
				<td>
					<select class="select" class="textfield" name="event_type" title="etkinlik tipi">
						<option value="notice" selected>Duyuru</option>
						<option value="job">İş ilanı</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>
					<h5>Lütfen ekleyeceğiniz etkinliğin konusunu yazınız</h5>
					<input style="width:60%;" name="subject" type="text" required class="textfield" title="konu">
				</td>
			</tr>
			<tr>
				<td>
					<h5>Lütfen ekleyeceğiniz etkinliğin içeriğini açıklayıcı bir şekilde yazınız</h5>
					<textarea type="text" name="content" COLS=60 ROWS=8 required class="textfield" id="content" title="içerik" /></textarea>
				</td>
			</tr>
		</table>
	</div>
	<div class="modal-footer">
		<button type="submit" onclick="setClick()" class="btn btn-success">Gönder</button>
	</div>
	</form>
</div>
<!-- Duyuru Ekle Popup End -->

<section id="main-content">
	<div class="container">
		<!-- Page Header -->
		<div class="page-header">
			<h1>
				<small>
					<?php echo ucfirst($user_info->first_name)." ".ucfirst($user_info->last_name); ?>
				</small>
			</h1>
		</div>
		<div class="container">
			<div class="column alpha our-team">
				<div class="photo">
					<?php if(file_exists('./assets/profile_images/'.$user_info->id.'.png')): ?>
					<img src="<?php echo base_url('assets/profile_images/'.$user_info->id.'.png'); ?>" width="230" height="230" alt="" />
					<?php else: ?>
					<img src="<?php echo base_url('assets/profile_images/default_image.png'); ?>" width="230" height="230" alt="" />
					<?php endif; ?>
					<div class="info">
						<small><?php echo $department->name; ?> &amp; <?php echo $faculty->name; ?></small>
						<form id="uploadForm" style="display:none;" action="<?php echo site_url('home/do_upload'); ?>" method="POST" enctype="multipart/form-data" name="myForm">
							<div style='height: 0px;width: 0px; overflow:hidden;'>
								<input id="upfile" type="file" onchange="sub(this)" name="userfile" size="20" />
							</div>
							<input id="yourBtn" onclick="getFile()" value="Resim yükle" />
						</form>
					</div>
				</div>
				<div class="social">
					<ul>
						<li><a href="https://www.facebook.com"><i class="icos-facebook"></i></a></li>
						<li><a href="https://twitter.com/"><i class="icos-twitter"></i></a></li>
						<li><a href="https://plus.google.com"><i class="icos-google"></i></a></li>
						<li><a href="http://picasa.google.com/"><i class="icos-picasa"></i></a></li>
						<li><a href="http://dribbble.com/"><i class="icos-dribbble"></i></a></li>
					</ul>
				</div>
			</div>
			<div class="column">
				<div class="columns">
					<div class="underline-heading">
						<h2>Kişisel Bilgiler</h2>
					</div>

				    <table class="table table-bordered">
				        <tbody>
				            <tr>
				                <td><strong>İsim</strong></td>
				                <td><?php echo ucfirst($user_info->first_name);?></td>
				                <td><i><strong>Değiştirilemez.</strong></i></td>
				            </tr>
				            <tr>
				                 <td><strong>Soyisim</strong></td>
				                <td><?php echo ucfirst($user_info->last_name);?></td>
				                <td><i><strong>Değiştirilemez.</strong></i></td>
				            </tr>
				            <tr>
				                <td><strong>Email</strong></td>
				                <td><?php echo ucfirst($user_info->email);?></td>
				                <td><a href="#myEmail" id="but" role="button" class="btn" data-toggle="modal">Düzenle</a></td>
				            </tr>
				            <tr>
				                <td><strong>Şifre</strong></td>
				                <td>******</td>
				                <td><a href="#mySifre" id="but" role="button" class="btn" data-toggle="modal">Düzenle</a></td>
				            </tr>
				            <tr>
				                <td><strong>Fakülte</strong></td>
				                <td><?php echo $faculty->name; ?></td>
				                <td><i><strong>Değiştirilemez.</strong></i></td>
				            </tr>
				            <tr>
				                <td><strong>Bölüm</strong></td>
				                <td><?php echo $department->name; ?></td>
				                <td><i><strong>Değiştirilemez.</strong></i></td>
				            </tr>
				        </tbody>
				    </table>
				</div>
			</div>
		<ul style="float:right;" class="nav nav-list">
		  <li class="nav-header">Hesap ayarları</li>
		  <li><a id="imageUploadVisible" style="cursor:pointer;" onclick="getVisibleImageUpload()">profil resmini düzenle</a></li>
		  <li><a id="imageUploadUnVisible" style="display:none; cursor:pointer;" onclick="getUnVisibleImageUpload()">bitti</a></li>
		  <li class="nav-header">Ekle</li>
		  <li><a href="#isEkle" style="cursor:pointer;" role="button" data-toggle="modal">İş İlanı - Duyuru</a></li>
		 </ul>
</div>
