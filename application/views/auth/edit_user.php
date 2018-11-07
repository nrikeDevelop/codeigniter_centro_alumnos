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
            <div style="color:white" id="infoMessage"><?php echo $message;?></div>
            <div class="ui stacked segment">
              
                <?php echo form_open(uri_string());?>
                    <p>
                          <?php echo lang('edit_user_fname_label', 'first_name');?> <br />
                          <?php echo form_input($first_name);?>
                    </p>

                    <p>
                          <?php echo lang('edit_user_lname_label', 'last_name');?> <br />
                          <?php echo form_input($last_name);?>
                    </p>

                    <p>
                          <?php echo lang('edit_user_company_label', 'company');?> <br />
                          <?php echo form_input($company);?>
                    </p>

                    <p>
                          <?php echo lang('edit_user_phone_label', 'phone');?> <br />
                          <?php echo form_input($phone);?>
                    </p>

                    <p>
                          <?php echo lang('edit_user_password_label', 'password');?> <br />
                          <?php echo form_input($password);?>
                    </p>

                    <p>
                          <?php echo lang('edit_user_password_confirm_label', 'password_confirm');?><br />
                          <?php echo form_input($password_confirm);?>
                    </p>

                    <div style="width:auto;height:auto">
                        <div class="ui middle aligned left aligned grid">
                            <div class="column">
                                <?php if ($this->ion_auth->is_admin()): ?>
                                      <h3><?php echo lang('edit_user_groups_heading');?></h3>
                                      <?php foreach ($groups as $group):?>
                                          <label class="checkbox">
                                          <?php
                                              $gID=$group['id'];
                                              $checked = null;
                                              $item = null;
                                              foreach($currentGroups as $grp) {
                                                  if ($gID == $grp->id) {
                                                      $checked= ' checked="checked"';
                                                  break;
                                                  }
                                              }
                                          ?>
                                          <input type="checkbox" name="groups[]" value="<?php echo $group['id'];?>"<?php echo $checked;?>>
                                          <?php echo htmlspecialchars($group['name'],ENT_QUOTES,'UTF-8');?>
                                          </label>
                                      <br>
                                      <?php endforeach?>
                                  <?php endif ?>                               
                            </div>
                        </div>
                    </div>
  

                    <?php echo form_hidden('id', $user->id);?>
                    <?php echo form_hidden($csrf); ?>

                    <button type="submit" class="ui primary button">
                        Crear Grupo
                    </button>
                    <a href="<?php echo base_url()?>index.php/auth/" class="ui button">
                        Cancelar
                    </a>

                <?php echo form_close();?>       
            </div>
        </div>
    </div>
</div>


