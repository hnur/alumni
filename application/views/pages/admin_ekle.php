 <style type="text/css">
      .form-signin {
        max-width: 500px;
        padding: 29px 29px 29px;
        margin: 0 auto 10px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }

    </style>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
  	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  	<script>

		$(function(){
		  $("select#fakulte").change(function(){
        if($(this).val() != '0') {
  		    $.getJSON("<?=site_url('register/get_department_name'); ?>",{id: $(this).val(), ajax: 'true'}, function(j){
  		      var options = '';
  		      for (var i = 0; i < j.length; i++) {
  		        options += '<option value="' + j[i].id + '">' + j[i].name + '</option>';
  		      }
  		      $("select#bolum").html(options);
  		      $('#tablebolum').show();
  		    })
        } else {
            $('#tablebolum').hide();
        }
		  })
    });

    $(function(){
      $("#sendbutton").click(function(event) {
        if($("#fakulte").val() == "0"){
          alert("Fakülte ve Kullanıcı Türü Boş Bırakılamaz!.");
          event.preventDefault();
        }
      });
    });
  	</script> 
 <div class="columns">
  <?php if($message == 1): ?>
      <div class="alert alert-error">
      <button class="close" data-dismiss="alert">&times;</button>
      <h4>HATA</h4>
        Şifreleriniz Uyuşmamaktadır.
      </div>
    <?php endif; ?>
    <?php if($message == 2): ?>
      <div class="alert alert-success">
      <button class="close" data-dismiss="alert">&times;</button>
      <h4>BAŞARILI</h4>
        Kullanıcı Eklendi.
      </div>
    <?php endif; ?>
    <ul class="nav nav-pills">
        <li class="active"><a href="#tab-01" data-toggle="tab">ADMİN LİSTELE</a></li>
        <li><a href="#tab-02" data-toggle="tab">ADMİN EKLE</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="tab-01">
        	<p>
				<table class="table table-bordered" style="width:800px;">
					<thead>
						<tr class="odd gradeX">
							<th align= 'left'>İSİM</th>
							<th align= 'left'>SOYİSİM</th>
							<th align= 'left'>EMAİL</th>
						</tr>
					</thead>
					<tbody>
							<?foreach($admin as $kadmin => $vadmin) { ?>
								<tr>
									<td><?  echo $vadmin['first_name']?></td>
									<td><?  echo $vadmin['last_name']?></td>
									<td><?  echo $vadmin['email']?></td>
									<td><a href="<?php echo site_url('home/delete_admin?userid='.$vadmin['id']);?>">SİL</a></td>
								</tr>
							<? } ?>
						</tbody>
				</table>
            </p>
        </div>
        <div class="tab-pane" id="tab-02">
            <section id="main-content">
<div>
	<div class="container">
	<form class="form-signin" action="<?=site_url('home/create_admin')?>" method="post" accept-charset="utf-8">

      <table style="width:100%;">
        <tr>
        	<td>
        		İsim&nbsp;<font color="red">*</font>
        	</td>
          <td>
        	<input type="text" class="input-block-level" name="name" required maxlength="100" />
          </td>
        </tr>
        <tr>
        	<td>
        		Soyisim&nbsp;<font color="red">*</font>
        	</td>
          <td>
        	<input type="text" class="input-block-level" name="surname" required maxlength="100" />
          </td>
        </tr>
        <tr>
          <td>
            Email&nbsp;<font color="red">*</font>
          </td>
          <td>
          <input type="text" class="input-block-level" name="email" required maxlength="100" />
          </td>
        </tr>
        <tr>
          <td>
            Şifre&nbsp;<font color="red">*</font>
          </td>
          <td>
          <input type="password" class="input-block-level" name="password" required maxlength="100" />
          </td>
        </tr>
        <tr>
          <td>
            Şifre Tekrar&nbsp;<font color="red">*</font>
          </td>
          <td>
          <input type="password" class="input-block-level" name="passwordagain" required maxlength="100" />
          </td>
        </tr>
         <tr>
         	<td>
          		Fakülte&nbsp;<font color="red">*</font>
        	</td> 
        	<td>
        		<select required id="fakulte">
              <option value="0">Seçiniz...</option>
              <? foreach ($faculty as $key => $value) {
            ?><option value="<?echo $value['id'];?>"><? echo $value['name']; ?></option>
            <? } ?>
        </select>
        	</td>
        </tr>
         <tr id="tablebolum" required style="display:none;">
         	<td>
          		Bölüm&nbsp;<font color="red">*</font>
        	</td> 
        	<td>
        		<select name="bolum" id="bolum">
				    </select>
        	</td>
        </tr>
        <tr>
        	<td>
        	</td>
          	<td>
        		<button style="float: right;" id="sendbutton" class="btn btn-success" type="submit">Ekle</button>
        	</td>
        </tr>
      </table>
    </form>
</div>
</section>

        </div>
    </div>
</div>
