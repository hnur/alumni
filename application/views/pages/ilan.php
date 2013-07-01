	<style type="text/css">
      .box {
        width: 80%;
        padding: 5px 20px 0px;
        margin: 0 auto 10px;
        background-color: #d9d9d9;
        border: 1px solid #a9a9a9;
        -webkit-border-radius: 2px;
           -moz-border-radius: 2px;
                border-radius: 2px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }

      .imgbox {
        padding: 3px 3px 3px;
        margin: 10 auto 10px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }

      .textbox {
        padding: 3px 3px 3px;
        margin: 0 auto 10px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 0px;
           -moz-border-radius: 0px;
                border-radius: 0px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }

      <? if (count($job) > 4): ?>
        #yekseni {
          overflow-y:scroll;
        }
      <? endif ?>

    </style>

<section id="main-content">
	<div class="container">
    <?php if($message == 1): ?>
      <div class="alert alert-success">
      <button class="close" data-dismiss="alert">&times;</button>
      <h4>GÖNDERİLDİ</h4>
        İlana başarılı bir şekilde başvurdunuz.
      </div>
    <?php endif; ?>
		<!-- Page Header -->
		<div class="page-header">
			<h1>İlanlar</h1>
		</div>
		<div id="yekseni" style="height:550px;">
      <? foreach ($job as $kJob => $vJob) { ?>
      <div id="<? echo $vJob['id']; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h3 id="myModalLabel"><? echo $vJob['subject']; ?></h3>
        </div>
        <div class="modal-body">
          <? echo $vJob['content']; ?>
        </div>
        <div class="modal-footer">
          <button id="sozlesmeoku" class="btn btn-success" data-dismiss="modal" aria-hidden="true">Tamam</button>
        </div>
      </div>
			<div class="box">
				<table style="width:100%;">
					<tr>
						<td style="width:10%;">
							<img class="imgbox" src="<?php echo base_url('assets/uploads/100_0526.jpg');?>" width="100" height="100" alt="">
						</td>
						<td style="padding: 15px;">
              <strong>
							   <? echo $vJob['subject']; ?>
              </strong>
              <br>
                 <? echo substr($vJob['content'],0,60).'...'; ?>
              <br>
                 <? echo $vJob['publish_date']; ?>
						</td>
            <td>
              <a href="#<? echo $vJob['id']; ?>" style="float: right; margin-left:10px;" role="button" class="btn btn-warning" data-toggle="modal">Devamı</a>
              <form style="float: right;" action="<?php echo site_url('home/apply_ilan'); ?>" method="post">
                <input type="hidden" name="ilan_id" value="<? echo $vJob['id']; ?>">
                <button class="btn btn-info" type="submit">Başvur</button>
              </form>
            </td>
					</tr>
				</table>
			</div>
      <? } ?>
		</div>
	</div>
</section>