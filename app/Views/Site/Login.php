 <div class="row">
        <div class="col s12">
            <div class="container">
                <div id="login-page" class="row">
                    <div class="col s12 m6 l4 z-depth-4 card-panel border-radius-6 login-card bg-opacity-8">
                   

                        <form action="<?= base_url('/login/connexion'); ?>"  class="login-form" method="post">
                            <div class="row">
                                <div class="input-field col s12">
                                    <h5 class="ml-4">Sign in</h5>
          				        </div>
                            </div>
                            <div class="row margin">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix pt-2">person_outline</i>
                                    <input id="username" type="email"  name="email"  value="">
                                    <label for="username" class="center-align">Username</label>
                                    <?php if(isset($validation) && $validation->hasError('email'))
                                    {
                                        echo '<span class="red-text text-darken-4">'.$validation->getError('email').'</span>';
                                    } ?>
                                </div>
                            </div>
                            <div class="row margin">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix pt-2">lock_outline</i>
                                    <input id="password" type="password" name="password">
                                    <label for="password">Password</label>
                                    <?php if(isset($validation) && $validation->hasError('password'))
                                    {
                                        echo '<span class="red-text text-darken-4">'.$validation->getError('password').'</span>';
                                    } ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12 m12 l12 ml-2 mt-1">
                                    <p>
                                        <label>
                                            <input type="checkbox" />
                                            <span>Remember Me</span>
                                        </label>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <button type="submit" class="btn waves-effect waves-light border-round gradient-45deg-purple-deep-orange col s12">Login</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s6 m6 l6">
                                    <p class="margin medium-small"><a href="<?= base_url('register'); ?>">Register Now!</a></p>
                                </div>
                                <div class="input-field col s6 m6 l6">
                                    <p class="margin right-align medium-small"><a href="user-forgot-password.html">Forgot password ?</a></p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="content-overlay"></div>
        </div>
    </div>
