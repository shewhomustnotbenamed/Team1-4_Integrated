<!-- Header File -->

<html>
	<head>
		<title><?=$title?></title>
		<!-- Link stylesheets here -->
	</head>
	<body>

	<div>
		<?php if($this->session->userdata('loggedIn')){ ?>
			Hi <?=$this->session->userdata('username')?>!
			<br/>
				<?php 
				
				if($this->session->userdata('userType')=='F' || $this->session->userdata('userType')=='S'){?>
				
				<?=anchor(base_url('index.php/profile'), 'View Profile')?>
				
				<?php
				}
				?>
			<?=anchor(base_url('index.php/logout'), '<button>Logout</button>')?>
		<?php }else{ ?>
			<form action='<?=base_url('index.php/login')?>' method='post'>
				Username: <input type='text' name='username' required/>
				Password: <input type='password' name='password' required/>
				<input type='submit' name='submit' value='Login'/>
			</form>
		<?php } ?>
		<?php
		if(!($this->session->userdata('loggedIn'))){
		?>
			<?=anchor(base_url('index.php/create_account'), 'Create Account')?>
		<?php
		}
		?>
	</div>