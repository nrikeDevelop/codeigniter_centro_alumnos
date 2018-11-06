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
    <form class="ui large form" method="POST" action="<?php echo base_url()?>index.php/auth/login" >
      <div class="ui stacked segment">
        <div class="ui message">
          <p>     
          <?php echo $message;?>
          </p>
        </div>
        <div class="field">
          <div class="ui left icon input">
            <i class="user icon"></i>
            <?php echo form_input($identity);?>
          </div>
        </div>
        <div class="field">
          <div class="ui left icon input">
            <i class="lock icon"></i>
            <?php echo form_input($password);?>
          </div>
        </div>
        <button class="ui fluid large teal submit button" type="submit">Entrar</button>        

      </div>

      <div class="ui error message"></div>

    </form>
<!--
    <div class="ui message">
      ¿No estas registrado? <a href="#">Registrate</a>
    </div>
  </div>
  -->
  
</div>

</div>