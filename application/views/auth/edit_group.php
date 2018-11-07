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
            <div style="color_white" id="infoMessage"><?php echo $message;?></div>
            <div class="ui stacked segment">              
                <?php echo form_open(current_url());?>

                      <p>
                            <?php echo lang('edit_group_name_label', 'group_name');?> <br />
                            <?php echo form_input($group_name);?>
                      </p>

                      <p>
                            <?php echo lang('edit_group_desc_label', 'description');?> <br />
                            <?php echo form_input($group_description);?>
                      </p>

                    <button type="submit" class="ui primary button">
                        Crear Grupo
                    </button>
                    <a href="<?php echo base_url()?>index.php/auth/" class="ui button">
                        Cancelar
                    </a>
            </div>
        </div>
     </div>
</div>
