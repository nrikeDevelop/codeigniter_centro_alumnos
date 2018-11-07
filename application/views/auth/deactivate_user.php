<head>
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>semantic/dist/semantic.min.css">
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
        <div class="ui large form" >
            <div class="ui stacked segment">  
                <h1><?php echo lang('deactivate_heading');?></h1>
                <p><?php echo sprintf(lang('deactivate_subheading'), $user->username);?></p>
                <?php echo form_open("auth/deactivate/".$user->id);?>

                  <p>                    
                    <?php echo lang('deactivate_confirm_y_label', 'confirm');?>
                    <input type="radio" name="confirm" value="yes" checked="checked" />
                    <?php echo lang('deactivate_confirm_n_label', 'confirm');?>
                    <input type="radio" name="confirm" value="no" />
                  </p>

                  <?php echo form_hidden($csrf); ?>
                  <?php echo form_hidden(array('id'=>$user->id)); ?>

                <button type="submit" class="ui primary button">
                    Crear usuario
                </button>
                <a href="<?php echo base_url()?>index.php/auth/" class="ui button">
                    Cancelar
                </a>
                <?php echo form_close();?>
            </div>
        </div>
    </div>
</div>


