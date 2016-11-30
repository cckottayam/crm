                    	<form action="<?php if(isset($form_action)) echo $form_action; ?>" method="post" >
                              <div class="form-group">
                                <input type="email" class="form-control" name="email" required id="exampleInputEmail1" placeholder="Email">
                              </div>
                              <div class="form-group">
                                <input type="password" class="form-control" name="password" required id="exampleInputPassword1" placeholder="Password">
                              </div>
                              
                              <div class="checkbox">
                                <!--<label>
                                  <input type="checkbox"> Remember me
                                </label>-->
                                <label style="float:right;color:#0abcfa;">
                                  Forgot password?
                                </label>
                              </div>
                              <button type="submit" class="btn btn-default">Login</button>
                              <p class="signup">Sign up to your account</p>
                        </form>