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
    max-width:900px;
  }

</style>
</head>
<div class="ui right aligned container fluid">
	<div class="column">
		salir
	</div>
</div>
<div class="ui middle aligned center aligned grid">
	<div class="column resize">
		<h1 style="color:white"><?php echo lang('index_heading');?></h1>
		<p style="color:white"><?php echo lang('index_subheading');?></p>

		<div id="infoMessage"><?php echo $message;?></div>

		<table style="padding:20px" class="ui compact celled definition table" >
			<tr>
				<th><?php echo lang('index_fname_th');?></th>
				<th><?php echo lang('index_lname_th');?></th>
				<th><?php echo lang('index_email_th');?></th>
				<th><?php echo lang('index_groups_th');?></th>
				<th><?php echo lang('index_status_th');?></th>
				<th><?php echo lang('index_action_th');?></th>
			</tr>
			<?php foreach ($users as $user):?>
				<tr>
					<td><?php echo htmlspecialchars($user->first_name,ENT_QUOTES,'UTF-8');?></td>
					<td><?php echo htmlspecialchars($user->last_name,ENT_QUOTES,'UTF-8');?></td>
					<td><?php echo htmlspecialchars($user->email,ENT_QUOTES,'UTF-8');?></td>
					<td>
						<?php foreach ($user->groups as $group):?>
							<?php echo anchor("auth/edit_group/".$group->id, htmlspecialchars($group->name,ENT_QUOTES,'UTF-8')) ;?><br />
						<?php endforeach?>
					</td>
					<td><?php echo ($user->active) ? anchor("auth/deactivate/".$user->id, lang('index_active_link')) : anchor("auth/activate/". $user->id, lang('index_inactive_link'));?></td>
					<td><?php echo anchor("auth/edit_user/".$user->id, 'Edit') ;?></td>
				</tr>
			<?php endforeach;?>
		</table>
  		<p>
			<div class="ui animated fade button">
			<div class="hidden content">
				<a href="#">Grupos</a>
			</div>
			<div class="visible content">
				<i class="fas fa-users"></i>
			</div>
			</div>
			<div class="ui vertical animated button">
			<div class="hidden content">
				<a href="#">Users</a>
			</div>
			<div class="visible content">
				<i class="fas fa-user"></i>
			</div>
			</div>
		</p>
		<p><?php echo anchor('auth/create_user', lang('index_create_user_link'))?> | <?php echo anchor('auth/create_group', lang('index_create_group_link'))?></p>
	</div>
</div>