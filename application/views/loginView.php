

		
<button class=" notmemyetsec btn-block btn-large alert alert-info " type="button"  onClick="location='<?php echo base_url();?>'">	<h6 class="nomemyettitle">NOT A MEMBER YET?</h6>
			<h4 class="h3-notmemyet">Create An Account</h5></button>

<section class="gydus-login">
 <h1 class="gydus-login-headertxt">Sign Into GYDUS</h1>



<form action="<?php echo base_url();?>index.php/userController/check_member"  method="post"class="form-horizontal gydus-form-horizontal ">
            <section class="control-group">
              <label class="control-label" for="inputEmail">Email</label>
              <section class="controls">
                <input type="text" class="gydus-login-email-input" name="user_email" id="login-inputEmail" placeholder="Email">
              </section>
            </section>
            <section class="control-group">
              <label class="control-label" for="inputPassword">Password</label>
              <section class="controls">
                <input type="password" id="login-inputPassword" name="user_pass" placeholder="Password">
              </section>
            </section>
            <section class="gydus-loginbtns">
              <section class="gydus-loginbtncontrols">
                 
                <button  class="btn btn-block btn-large btn-success" type="submit" class="btn">Sign in Now</button>
              </section>
              <button  class="fb-btn btn btn-block btn-large btn-info" type="submit" class="btn">Sign in with Facebook</button>
            </section>
          </form>
<button class="btn btn-link btn-danger " type="button"  onClick="location='<?php echo base_url();?>'">Cancel</button>

          </section><!-- end of Gydus Login --> 

