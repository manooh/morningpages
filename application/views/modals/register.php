<div class="modal" id="registerModal">
	<div class="modal-window">
		<div class="modal-inner">
			<div class="modal-close" data-bind="click:hide"></div>
			<h2>Register</h2>
			<p class="intro">Registration is fast and simple!</p>
			<div class="modal-left">	 
			 <form role="form" method="post" data-bind="validateForm:register" action="<?php echo user::url('signup'); ?>">
			 	<p class="errmsg hidden"></p>
			 	<p class="errors hidden"></p>
				<div class="form-group">
					<span class="modal-login-icon fa fa-envelope"></span>
					<input type="email" required="required" class="form-control modal-login" name="email" value="<?php echo arr::get($_POST, 'email',''); ?>" placeholder="E-mail" />
				</div>
				<div class="form-group">
					<span class="modal-login-icon fa fa-user modal-login"></span>
					<input type="text" minlength="2" required="required" class="form-control modal-login" name="username" value="<?php echo arr::get($_POST, 'username',''); ?>" placeholder="Username" />
				</div>
				<div class="form-group">
					<span class="modal-login-icon fa fa-lock"></span>
					<input type="password" minlength="5" required="required" class="form-control modal-login" value="" name="password" placeholder="Password" />
				</div>
				<div class="form-group">
					<span class="modal-login-icon fa fa-repeat"></span>
					<input type="password" minlength="5" required="required" class="form-control modal-login" value="" name="password_confirm" placeholder="Password Confirm" />
				</div>
				<div class="form-group">
					<button type="submit">Register</button>
				</div>
			</form>
			</div>
			<div class="modal-right">
				<ul class="social-buttons">
					<?php /*<li>
							<a href="<?php echo URL::site('auth/facebook'); ?>" class="social-button facebook-button">
	    						<span><i class="fa fa-facebook-square"></i></span> Register with Facebook
	  						</a>
  						</form>
					</li>*/ ?>
					<li>
							<a href= "<?php echo URL::site('auth/twitter'); ?>" class="social-button twitter-button">
	   						 <span><i class="fa fa-twitter-square"></i></span> Register with Twitter
	 						</a>
 						</form>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>