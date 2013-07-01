<style type="text/css" title="currentStyle">
      @import "<?php echo base_url('assets/css/demo_page.css') ?>";
      @import "<?php echo base_url('assets/css/jquery.dataTables.css') ?>";
</style>
<script type="text/javascript" language="javascript" src="<?php echo base_url('assets/js/jquery.dataTables.js') ?>"></script>
<script type="text/javascript" charset="utf-8">
      $(document).ready(function() {
        <? foreach ($bolumler as $kBolumler => $vBolumler) { ?>
          $('#<? echo $vBolumler["id"]; ?>').dataTable();
        <? } ?>
      } );
</script>
<!-- Accordion Widget -->
<div class="row">
  <div>
    <div class="underline-heading">
      <h2>Fakülteler</h2>
    </div>
    <div class="accordion">
      <? foreach ($fakulteler as $key => $value) { ?>
      <h3><? echo $value['name']; ?></h3>
      <div>
        <!-- Start alt baslik -->
        <div class="row">
          <div style="width:100%;">
            <div class="underline-heading">
              <h2 style="border-bottom: 3px solid #0069a6; !important">Bölümler</h2>
            </div>
            <div class="accordion">
              <? foreach ($bolumler as $kBolumler => $vBolumler) { ?>
                <? if($vBolumler['faculty_id'] == $value['id']): ?>
                  <h3 style="border-left: 3px solid #0069A6;"><? echo $vBolumler['name']; ?></h3>
                  <div>
                    <div style="margin:20px;"></div>
                    <table cellpadding="0" cellspacing="0" border="0" class="display" id="<? echo $vBolumler['id']; ?>" width="100%">
                    <thead>
						<tr class="odd gradeX">
                          <th align='left'>İSİM</th>
                          <th align= 'left'>SOYİSİM</th>
                          <th align='left'>BAŞLAMA YILI</th>
                          <th align='left'>MEZUNİYET YILI</th>
						  <th align='left'>PROFİL</th>
                        </tr>
                    </thead>
                      <? foreach ($users as $kuser => $vuser) { ?>
						             <? if($vBolumler['id'] == $vuser['department_id']): ?>
          								<tr class="odd gradeX">
          								  <td><? echo $vuser['first_name'] ?></td>
          								  <td><? echo $vuser['last_name']?> </td>
										  <td><? echo $vuser['joining_date'] ?></td>
										  <td><? echo $vuser['graduated_date']?> </td>
										  <td><a href="<?php echo site_url('home/user?userid='.$vuser['id'].'&message=0');?>">Profile git</a></td>
          								</tr>
						          <? endif; ?>
				              <? } ?>
                    </table>
                  </div>
                <? endif; ?>
              <? } ?>
            </div>
          </div>
        </div>
        <!-- End alt baslik-->
      </div>
      <? } ?>
    </div>
  </div>
</div>

