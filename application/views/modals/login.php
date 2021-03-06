<div class="modal" id="loginModal">
	<div class="modal-window">
		<div class="modal-inner">
			<div class="modal-close" data-bind="click:hide"></div>
			<h2>Sign In</h2>
			<div class="modal-left">	 
				<form data-bind="validateForm:login" role="form" method="post" action="<?php echo user::url('login'); ?>">
					<p class="errmsg hidden"></p>
					<div class="form-group">
						<span class="modal-login-icon fa fa-user"></span>
						<input type="text" minlength="2" required="required" class="form-control modal-login" name="email" value="<?php echo arr::get($_POST, 'email',''); ?>" placeholder="Email or Username" />
					</div>
					<div class="form-group">
						<span class="modal-login-icon fa fa-lock"></span>
						<input type="password" required="required" class="form-control modal-login" value="" name="password" placeholder="Password" />
					</div>
					<div class="form-group">
						<label>
							<input type="checkbox" name="remember" value="yes" /> Keep me logged in?
						</label>
					</div>
					<div class="form-group">
						<button type="submit">Sign In</button>
					</div>
					<hr />
					<p>
						<a href="<?php echo user::url('help'); ?>" title="Reset your password">forgot password?</a>
					</p>
				</form>
			</div>
			<div class="modal-right">
				<ul class="social-buttons">
					<?php /*<li>
						<a href="#" data-bind="click:fblogin" class="social-button facebook-button">
					      <span><i class="fa fa-facebook-square"></i></span> Login with Facebook
					    </a>
					</li>*/ ?>
					<li>
						<a  href="<?php echo URL::site('auth/twitter'); ?>" class="social-button twitter-button">
					      <span><i class="fa fa-twitter-square"></i></span> Login with Twitter
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>