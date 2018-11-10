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

            <div style="color:white">
              <?php echo validation_errors(); ?>
              <br>
              <?php $message = $this->session->flashdata('message_data');echo $message ?>
              <br>
            </div>

            <form method="POST" action="<?php echo base_url()?>index.php/auth/form_register">
            <div class="ui stacked segment">  
                <!--
                <div class="field">
                    <label>First name</label>
                    <input name="first_name" type="text" placeholder="First Name">
                  </div>
                  <div class="field">
                    <label>Last name</label>
                    <input name="last_name" type="text" placeholder="Last Name">
                  </div>
                -->
                  <div class="field">
                    <label>NIA</label>
                    <input name="username" type="text" placeholder="NIA">
                  </div>
                  <div class="field">
                    <label>Password</label>
                    <input name ="password" type="password" placeholder="Password">
                  </div>
                  <div class="field">
                    <label>Email</label>
                    <input name="email" type="text" placeholder="Email">
                  </div>
                    <button type="submit" class="ui primary button">
                        Registrar
                    </button>
                    <a href="<?php echo base_url()?>index.php/auth/" class="ui button">
                        Cancelar
                    </a>
            </div>
            </form>
        </div>
    </div>
</div>