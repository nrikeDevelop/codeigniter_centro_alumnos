<head>
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>semantic/dist/semantic.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">


<script
  src="https://code.jquery.com/jquery-3.1.1.min.js"
  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
  crossorigin="anonymous"></script>
<script src="<?php echo base_url()?>semantic/dist/semantic.min.js"></script>
<style>
    body{
      background-color: #4E2EA3;
    }

    body > .grid {
      height: 100%;
    }

  .resize{
    max-width:500px;
  }
  
</style>
</head>
<div class="ui middle aligned center aligned grid">
    <div class="column resize">
       
        <div style="color:white;" id="infoMessage"><?php echo $message;?></div> 
        <div class="ui stacked segment">
            <form class="ui large form" method="POST" action="<?php echo base_url()?>index.php/auth/create_user" >   
                <p>
                      <?php echo lang('create_user_fname_label', 'first_name');?> <br />
                      <?php echo form_input($first_name);?>
                </p>

                <p>
                      <?php echo lang('create_user_lname_label', 'last_name');?> <br />
                      <?php echo form_input($last_name);?>
                </p>

                <?php
                if($identity_column!=='email') {
                    echo '<p>';
                    echo lang('create_user_identity_label', 'identity');
                    echo '<br />';
                    echo form_error('identity');
                    echo form_input($identity);
                    echo '</p>';
                }
                ?>

                <p>
                      <?php echo lang('create_user_company_label', 'company');?> <br />
                      <?php echo form_input($company);?>
                </p>

                <p>
                      <?php echo lang('create_user_email_label', 'email');?> <br />
                      <?php echo form_input($email);?>
                </p>

                <p>
                      <?php echo lang('create_user_phone_label', 'phone');?> <br />
                      <?php echo form_input($phone);?>
                </p>

                <p>
                      <?php echo lang('create_user_password_label', 'password');?> <br />
                      <?php echo form_input($password);?>
                </p>

                <p>
                      <?php echo lang('create_user_password_confirm_label', 'password_confirm');?> <br />
                      <?php echo form_input($password_confirm);?>
                </p>
            
                <button type="submit" class="ui primary button">
                    Crear usuario
                </button>
                <a href="<?php echo base_url()?>index.php/auth/" class="ui button">
                    Cancelar
                </a>
            </form>
        </div>
    </div>
</div>
                    

        