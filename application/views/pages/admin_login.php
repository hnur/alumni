
	<style type="text/css">
      .form-signin {
        max-width: 300px;
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

    <form class="form-signin" action="<?=site_url('admin/check_login')?>" method="post" accept-charset="utf-8">

      <? if($message == 1): ?>
        <div class="alert alert-error">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Hatalı giriş! </strong>Lütfen bilgilerinizi kontrol ediniz...
        </div>
      <? endif; ?>

      <h2 class="form-signin-heading">Admin olarak giriş yapın</h2>
      <table style="width:100%;">
        <tr>
          <td>
        <input type="text" class="input-block-level" name="email" placeholder="Email" required maxlength="40" />
          </td>
        </tr>
        <tr>
          <td>
        <input type="password" class="input-block-level" name="password" placeholder="Şifre" required maxlength="20" /> 
          </td>
        </tr>
        <tr>
          <td>
        <button style="float: right;" class="btn btn-success" type="submit">Giriş</button>
        </td>
        </tr>
      </table>
    </form>


