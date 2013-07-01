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
  		$(function() {
      		$("#sozlesmeoku").click( function()
           	{
            	$('input[name=sozlesme]').attr('checked', true);
           	});
		  });
    	$(function() {
          $( "#datepicker" ).datepicker();
    	});
      $(function() {
          $( "#datestartpicker" ).datepicker();
      });

		$(function(){
		  $("select#fakulte").change(function(){
        if($(this).val() != '0') {
  		    $.getJSON("register/get_department_name",{id: $(this).val(), ajax: 'true'}, function(j){
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

    $(function(){
      $("select#user_type").change(function(){
        if($(this).val() != '0') {
          if($(this).val() == 1) {
            $('#tableogrencino').show();
            $('#tablehocano').hide();
            $('#tablestartdate').css("display", "table-row", "important", "block");
            $('#tablefinishdate').css("display", "table-row", "important", "block");
            $('input[name=baslamadate]').val('');
            $('input[name=mezuniyetdate]').val('');
          } else {
            $('#tablehocano').show();
            $('#tableogrencino').hide();
            $('#tablestartdate').css("display", "none");
            $('#tablefinishdate').css("display", "none");
            $('input[name=baslamadate]').val('x');
            $('input[name=mezuniyetdate]').val('x');
          }
          $('#tableno').show();
        } else {
          $('#tableno').hide();
        }
      })
    });
  	</script> 

<section id="main-content">
	<div class="container">
		<!-- Page Header -->
		<div class="page-header">
			<h1>Kayıt Ol! <small>Üye olmak için kullanım şartlarını okumalısınız.
				<a href="#myModal" id="but" role="button" class="btn" data-toggle="modal">Oku</a>
			</small></h1>
		</div>
		<!-- End Page Header -->

		<!-- Modal -->
		<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-header">
		    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		    <h3 id="myModalLabel">Kullanım Şartları</h3>
		  </div>
		  <div class="modal-body">
		    <font size="5" color="#005244"><strong>Kullanım Şartları</strong></font><br>
			<font size="4" color="#005244"><strong>Toplanan Bilgilerin Kullanımı</strong></font><br>

			Sisteme girdiğiniz kişisel bilgileriniz, OMU tarafından istatistik oluşturmak ve iletişime geçmek için kullanılacaktır. Seçtiğiniz gizlilik seviyesine göre diğer mezunlarla paylaşmadığınız bilgiler üçüncü şahıslara verilmeyecektir.
		</div>
		  <div class="modal-footer">
		    <button id="sozlesmeoku" class="btn btn-success" data-dismiss="modal" aria-hidden="true">Tamam</button>
		  </div>
		</div>
		<!-- End Modal -->

	<form class="form-signin" action="<?=site_url('register/create_member')?>" method="post" accept-charset="utf-8">

      <? if($message == 1): ?>
        <div class="alert alert-error">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Hatalı giriş! </strong>Şifreniz uyuşmamaktadır.Lütfen kontrol ediniz.
        </div>
      <? endif; ?>

      <? if($message == 2): ?>
        <div class="alert alert-success">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Kaydınız Alındı! </strong>Bilgileriniz bölüm sekreterinize başarılı bir şekilde iletilmiştir.
          Kaydınız onaylandığı zaman giriş yapabilirsiniz.
        </div>
      <? endif; ?>

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
              Kullanıcı Türü&nbsp;<font color="red">*</font>
          </td> 
          <td>
            <select name="user_type" id="user_type">
              <option value="0">Seçiniz...</option>
              <? foreach ($user_type as $key => $value) {
            ?><option value="<?echo $value['id_user'];?>"><? echo $value['name']; ?></option>
            <? } ?>
          </select>
          </td>
        </tr>
        <tr style="display:none;" id="tableno">
          <td style="display:none;" id="tableogrencino">
            Öğrenci No&nbsp;<font color="red">*</font>
          </td>
          <td style="display:none;" id="tablehocano">
            Sicil No:&nbsp;<font color="red">*</font>
          </td>
          <td>
          <input type="text" class="input-block-level" name="studentno" required maxlength="100" />
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
        <tr id="tablestartdate">
            <td style="width:30%;">
               Başlama Tarihi&nbsp;<font color="red">*</font>
          </td>
            <td>
              <input type="text" class="input-block-level" name="baslamadate" required id="datestartpicker" />
            </td>
        </tr>
        <tr id="tablefinishdate">
          	<td style="width:30%;">
          		 Mezuniyet Tarihi&nbsp;<font color="red">*</font>
        	</td>
          	<td>
          		<input type="text" class="input-block-level" name="mezuniyetdate" required id="datepicker" />
          	</td>
        </tr>
        <tr >
        	<td>
        	</td>
        	<td>
        		<input id="sozles" type="checkbox" name="sozlesme" required value="sozlesme">Kullanıcı Sözleşmesini Okudum.<br>
        	</td>
        </tr>
        <tr>
        	<td>
        	</td>
          	<td>
        		<button style="float: right;" id="sendbutton" class="btn btn-success" type="submit">Kayıt Ol</button>
        	</td>
        </tr>
      </table>
    </form>

		</section>
