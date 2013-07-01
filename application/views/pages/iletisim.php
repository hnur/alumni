<section id="main-content">

			<div class="container">

				<!-- Page Header -->
				<div class="page-header">
					<h1>İletişim Bilgileri <small>Sorularınızı Bekliyoruz.</small></h1>
				</div>
				<!-- End Page Header -->

				<!-- Google Maps Widget -->
				<div class="sixteen columns">
					<div class="google-maps"></div>
				</div>
				<!-- END Google Maps Widget -->

				<!-- Contact Form -->
				<div class="twelve columns">
					<div class="underline-heading">
						<h2>Bize Mesaj Gönder</h2>
					</div>
					<form method="post" class="form"  action="<?=site_url('home/send_iletisim')?>">
						<div class="form-row">
							<label class="form-label">İsim</label>
							<div class="form-item">
								<input type="text" class="small" name="isim">
							</div>
						</div>
						<div class="form-row">
							<label class="form-label">Email</label>
							<div class="form-item">
								<input type="text" class="small" name="email">
							</div>
						</div>
						<div class="form-row">
							<label class="form-label">Konu</label>
							<div class="form-item">
								<input type="text" class="small" name="konu">
							</div>
						</div>
						<div class="form-row">
							<label class="form-label">Mesaj</label>
							<div class="form-item">
								<textarea rows="5" cols="" class="large" name="mesaj"></textarea>
							</div>
						</div>
						<div class="button-row">
							<input type="submit" class="btn btn-success" value="Gönder">
						</div>
					</form>
				</div>
				<!-- END Contact Form -->

				<div class="four columns">
					<div class="underline-heading">
						<h2>İletişim Bilgileri</h2>
					</div>
					<address>
						<strong>Ondokuz Mayıs Üniversitesi Rektörlüğü</strong><br>
						<strong>Yazışma Adresi:</strong> Ondokuz Mayıs Üniversitesi Rektörlük Binası 55139 Kurupelit / SAMSUN <br><br>
						<strong>Tel:</strong> (0362) 319 19 19 -Santral<br>
						<strong>Genel Sorular</strong><br />
							<a href="mailto:web@bil.omu.edu.tr">web@bil.omu.edu.tr</a>
							<hr />
						<strong>Yardım için</strong><br />
							<a href="mailto:destek@bil.omu.edu.tr">destek@bil.omu.edu.tr</a>
							<hr />
					</address>
					
					<h2>We're Social</h2>
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
			</div>

		</section>
