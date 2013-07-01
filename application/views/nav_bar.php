<!-- NAVBAR
================================================== -->
<div id="joiee-customizer"></div>

<div id="main-wrapper" class="wide">
	<!-- Main Header -->
	<header id="main-header">
		<!-- Top Header -->
		<div id="header-top">
			<div class="container">
				<div class="sixteen columns">

					<!-- Logo Container -->
					<div id="logo-container">
						<div id="logo-center">
							<a href="<?=site_url('home/index'); ?>">
								<img src="<?php echo base_url('assets/img/19-normal-32x32.png') ?>" alt="Omu">
							</a>
						</div>
					</div>
					<!-- END Logo Container -->

					<div class="tagline"><a href="<?=site_url('home/index'); ?>" class="brand" style="color: #32b0fc;" >OMÜ MEZUN SİSTEMİ</a></div>

					<!-- Main Navigation -->
					<nav id="main-nav">
						<ul>
							<? if($this->session->userdata('is_admin')): ?>
								<? if($this->session->userdata('page') == 'panel'): ?>
									<li class="active">
								<? else: ?>
									<li>
								<? endif; ?>
									<?php if($this->session->userdata('type') == 1): ?>
										<a href="<?=site_url('home/admin_ekle'); ?>">PANEL</a>
									<? else: ?>
										<a href="<?=site_url('home/admin_ops'); ?>">PANEL</a>
									<? endif; ?>
								</li>
							<? endif; ?>
							<? if ($this->session->userdata('logged_in') == FALSE): ?>
								
								<? if($this->session->userdata('page') == 'hakkimizda'): ?>
									<li class="active">
								<? else: ?>
									<li>
								<? endif; ?>
									<a href="<?=site_url('home/hakkimizda'); ?>">HAKKIMIZDA</a>
								</li>
								
								<? if($this->session->userdata('page') == 'iletisim'): ?>
									<li class="active">
								<? else: ?>
									<li>
								<? endif; ?>
									<a href="<?=site_url('home/iletisim'); ?>">İLETİSİM</a>
								</li>
								
								<? if($this->session->userdata('page') == 'giris'): ?>
									<li class="active">
								<? else: ?>
									<li>
								<? endif; ?>
								<a href="<?=site_url('login'); ?>" class="navbar-link">Giris Yap</a></li>
								
								<? if($this->session->userdata('page') == 'kayit'): ?>
									<li class="active">
								<? else: ?>
									<li>
								<? endif; ?>
								<a href="<?=site_url('register'); ?>" class="navbar-link">Kayıt Ol</a></li>
							<? else: ?>
								
								<? if($this->session->userdata('page') == 'mezun'): ?>
									<li class="active">
								<? else: ?>
									<li>
								<? endif; ?>
									<a href="<?=site_url('home/mezun'); ?>">MEZUNLAR</a>
								
								<? if($this->session->userdata('page') == 'ilan'): ?>
									<li class="active">
								<? else: ?>
									<li>
								<? endif; ?>
									<a href="<?=site_url('home/ilan'); ?>">İLANLAR</a>
								</li>
								
								<? if($this->session->userdata('page') == 'hakkimizda'): ?>
									<li class="active">
								<? else: ?>
									<li>
								<? endif; ?>
									<a href="<?=site_url('home/hakkimizda'); ?>">HAKKIMIZDA</a>
								</li>
								
								<? if($this->session->userdata('page') == 'iletisim'): ?>
									<li class="active">
								<? else: ?>
									<li>
								<? endif; ?>
									<a href="<?=site_url('home/iletisim'); ?>">İLETİSİM</a>
								</li>
								
								<? if($this->session->userdata('page') == 'profile'): ?>
									<li class="active">
								<? else: ?>
									<li>
								<? endif; ?>
								<? if($this->session->userdata('user_type') == 1 || $this->session->userdata('user_type') == 2): ?>
										<a style="color: #32b0fc;" href="#">Hosgeldin <? echo $this->session->userdata('username') ?></a>
									    <? if ($this->session->userdata('user_type') == 1): ?>
											<ul class="dropdown-menu">
												<li><a href="<?=site_url('home/profile'); ?>" >Profilim</a></li>
												<li><a href="<?=site_url('login/logout'); ?>">Çıkış</a></li>
											</ul>
										<? else: ?>
											<ul class="dropdown-menu">
												<li><a href="<?=site_url('home/profile_hoca'); ?>" >Profilim</a></li>
												<li><a href="<?=site_url('login/logout'); ?>">Çıkış</a></li>
											</ul>
										<? endif; ?>	
								<? else: ?>
										<a style="color: #32b0fc;" href="#">Hosgeldin <? echo $this->session->userdata('username') ?></a>
										<ul class="dropdown-menu">
												<li><a href="<?=site_url('admin/logout'); ?>">Çıkış</a></li>
										</ul>
								<? endif; ?>
								</li>
							<? endif; ?>
						</ul>
					</nav>
					<!-- END Main Navigation -->
				</div>
			</div>
		</div>
	</header>
</div>
<br>
