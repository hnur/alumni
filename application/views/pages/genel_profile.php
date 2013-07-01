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
		<?php if($message == 1): ?>
			<div class="alert alert-success">
			<button class="close" data-dismiss="alert">&times;</button>
			<h4>GÖNDERİLDİ</h4>
				Mesajınız başarılı bir şekilde gönderilmiştir.
			</div>
		<?php endif; ?>
		<div class="container">
			<div class="column alpha our-team">
				<div class="photo">
					<img src="<?php echo base_url('assets/profile_images/'.$user_info->id.'.png');?>" width="230" height="230" alt="">
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
						<li><a href="#"><i class="icos-facebook"></i></a></li>
						<li><a href="#"><i class="icos-twitter"></i></a></li>
						<li><a href="#"><i class="icos-google"></i></a></li>
						<li><a href="#"><i class="icos-picasa"></i></a></li>
						<li><a href="#"><i class="icos-dribbble"></i></a></li>
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
				                <td><i><strong>Değiştirilemez.</strong></i></td>
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
				            <tr>
				                <td><strong>Başlama Tarihi</strong></td>
				                <td><?php echo ucfirst($user_info-> joining_date); ?></td>
				                <td><i><strong>Değiştirilemez.</strong></i></td>
				            </tr>
				            <tr>
				                <td><strong>Mezuniyet Tarihi</strong></td>
				                <td><?php echo ucfirst($user_info-> graduated_date); ?></td>
				                <td><i><strong>Değiştirilemez.</strong></i></td>
				            </tr>
				        </tbody>
				    </table>
				</div>
		 </div>
		<ul style="float:right;" class="nav nav-list">
			<li class="nav-header">İletişim Kur</li>
			<li><a href="#myModal" id="but" role="button" class="btn" data-toggle="modal">Mesaj Yaz</a></li>
		</ul>
		<!-- Modal -->
		<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-header">
		    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		    <h3 id="myModalLabel">Mesaj Gönder</h3>
		  </div>
		  <form action="<?=site_url('home/send_message')?>" method="post" accept-charset="utf-8">
		  <div class="modal-body">
				<table style="width:100%;">
					<tr style="margin-top:10px;">
						<td>
							<strong>Konu</strong>
						</td>
					</tr>
					<tr>
						<td style="width:50px;">
							<input type="text" class="input-block-level" name="subject" required maxlength="40" />
						</td>
					</tr>
					<tr>
						<td>
							<strong>İçerik</strong><br>
						</td>
					</tr>
					<tr>
						<td>
							<textarea name="content" cols="60" rows="5" placeholder="İçerik" placeholder="Konu">
							</textarea>
						</td>
					</tr>
					<input type="hidden" class="input-block-level" name="touserid" value="<?php echo $user_info->id;?>"/>
					<input type="hidden" class="input-block-level" name="fromuserid" value="<?php echo $this->session->userdata('id'); ?>"/>
				</table>
		   </div>
		  <div class="modal-footer">
		    <button type="submit" class="btn btn-success">Gönder</button>
		  </div>
		  </form>
		</div>
		<!-- End Modal -->
		
