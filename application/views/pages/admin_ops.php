 <div class="columns">
    <ul class="nav nav-pills">
        <li class="active"><a href="#tab-01" data-toggle="tab">TÜM KULLANICILAR</a></li>
        <li><a href="#tab-02" data-toggle="tab">ÖĞRENCİLER</a></li>
        <li><a href="#tab-03" data-toggle="tab">ÖĞRETİM GÖREVLİLERİ</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="tab-01">
        	<p>
				<table class="table table-bordered" style="width:800px;">
					<thead>
						<tr class="odd gradeX">
							<th align='left'>ÖĞRENCİ NO/SİCİL NO</th>
							<th align='left'>KULLANICI TÜRÜ</th>
							<th align= 'left'>İSİM</th>
							<th align= 'left'>SOYİSİM</th>
							<th align= 'left'>EMAİL</th>
							<th align='left'>iŞLEM</th>
							<th align='left'>AKTİF</th>
						</tr>
					</thead>
					<tbody>
						<?foreach($users as $kuser => $vuser) { ?>
							<tr>
								<td><?  echo $vuser['user_type_no']?></td>
								<?php if($vuser['user_type'] == 1): ?>
									<td>ÖĞRENCİ</td>
								<?php else:?>
									<td>ÖĞRETİM GÖREVLİSİ</td>
								<?php endif;?>
								<td><?  echo $vuser['first_name']?></td>
								<td><?  echo $vuser['last_name']?></td>
								<td><?  echo $vuser['email']?></td>
								<td><a href="<?php echo site_url('home/delete?userid='.$vuser['id']);?>">SİL</a></td>
								<?php if ($vuser['active'] == 0): ?>
									<td><a href="<?php echo site_url('home/onayla?userid='.$vuser['id']);?>">ONAYLA</a></td>
								<?php else: ?>
									<td>üye aktif</td>
								<?php endif; ?>
							</tr>
						<? } ?>
					</tbody>
				</table>
            </p>
        </div>
        <div class="tab-pane" id="tab-02">
            <p>
				<table class="table table-bordered" style="width:800px;">
					<thead>
						<tr class="odd gradeX">
							<th align='left'>ÖĞRENCİ NO/SİCİL NO</th>
							<th align='left'>KULLANICI TÜRÜ</th>
							<th align= 'left'>İSİM</th>
							<th align= 'left'>SOYİSİM</th>
							<th align= 'left'>EMAİL</th>
							<th align='left'>iŞLEM</th>
							<th align='left'>AKTİF</th>
						</tr>
					</thead>
					<tbody>
						<?foreach($users as $kuser => $vuser) { ?>
							<?php if($vuser['user_type'] == 1): ?>
							<tr>
								<td><?  echo $vuser['user_type_no']?></td>
								<td>ÖĞRENCİ</td>
								<td><?  echo $vuser['first_name']?></td>
								<td><?  echo $vuser['last_name']?></td>
								<td><?  echo $vuser['email']?></td>
								<td><a href="<?php echo site_url('home/delete?userid='.$vuser['id']);?>">SİL</a></td>
								<?php if ($vuser['active'] == 0): ?>
									<td><a href="<?php echo site_url('home/onayla?userid='.$vuser['id']);?>">ONAYLA</a></td>
								<?php else: ?>
									<td>üye aktif</td>
								<?php endif; ?>
							</tr>
							<?php endif;?>
						<? } ?>
					</tbody>
				</table>
            </p>
        </div>
        <div class="tab-pane" id="tab-03">
            <p>
				<table class="table table-bordered" style="width:800px;">
					<thead>
						<tr class="odd gradeX">
							<th align='left'>ÖĞRENCİ NO/SİCİL NO</th>
							<th align='left'>KULLANICI TÜRÜ</th>
							<th align= 'left'>İSİM</th>
							<th align= 'left'>SOYİSİM</th>
							<th align= 'left'>EMAİL</th>
							<th align='left'>iŞLEM</th>
							<th align='left'>AKTİF</th>
						</tr>
					</thead>
					<tbody>
						<?foreach($users as $kuser => $vuser) { ?>
							<?php if($vuser['user_type'] == 2): ?>
							<tr>
								<td><?  echo $vuser['user_type_no']?></td>
								<td>ÖĞRETİM GÖREVLİSİ</td>
								<td><?  echo $vuser['first_name']?></td>
								<td><?  echo $vuser['last_name']?></td>
								<td><?  echo $vuser['email']?></td>
								<td><a href="<?php echo site_url('home/delete?userid='.$vuser['id']);?>">SİL</a></td>
								<?php if ($vuser['active'] == 0): ?>
									<td><a href="<?php echo site_url('home/onayla?userid='.$vuser['id']);?>">ONAYLA</a></td>
								<?php else: ?>
									<td>üye aktif</td>
								<?php endif; ?>
							</tr>
						    <?php endif;?>
						<? } ?>
					</tbody>
				</table>
            </p>
        </div>
    </div>
</div>
