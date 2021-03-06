<?php include_once 'header.php'; ?>
<div class="col-md-4 col-md-offset-4">
	<form class="form-signin" action="<?php echo site_url('login/auth');?>" method="post">
		<h2 class="form-signin-heading">Please sign in</h2>
		<?php echo $this->session->flashdata('msg');?>
		<label for="username" class="sr-only">Username</label>
		<input type="email" name="email" class="form-control" placeholder="Email" required autofocus>
		<label for="password" class="sr-only">Password</label>
		<input type="password" name="password" class="form-control" placeholder="Password" required>
		<div class="checkbox">
			<label>
				<input type="checkbox" value="remember-me"> Remember me
			</label>
		</div>
		<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
	</form>
 </div>
<?php include_once 'footer.php';