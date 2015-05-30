<div class="image-container set-full-height">
	<div class="login-bg">
		<div class="row-fluid login-wrapper">
			<div class="span4 box">
				<div class="content-wrap">
					<h6>PORTAL Log in</h6>
					<?php if (isset($msg)){?>
					<div class="alert alert-danger" role="alert">
						<?php echo validation_errors('<p class="error">'); ?>
						<?php if (isset($msg)){echo $msg; }?>
					</div>
					<?php } ?>
					
					<?php echo form_open('auth/validate_user','class="form-signin"'); ?>
						<fieldset>
						<div class="form-group">
							<input class="form-control" placeholder="E-mail" name="username"
								type="text" required autofocus>
						</div>
						<div class="form-group">
							<input class="form-control" placeholder="Password"
								name="password" type="password" value="">
						</div>
						<div class="checkbox" style="text-align: left;">
							<label> <input name="remember" type="checkbox"
								value="Remember Me"> Remember Me
							</label>
						</div>
						<input class="btn btn-lg btn-success btn-block" type="submit"
							value="Login">
					</fieldset>
					</form>
					<a href="#" class="forgot hide">Forgot password?</a>

					<div class="row">
						<br /> New Member ? <a class=""
							href="<?php echo site_url('auth/signup') ?>">Register here</a>
					</div>
				</div>
				<br />
			</div>