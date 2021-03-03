<div class="row">
        <div class="col s12">
            <div class="container">
                <div id="login-page" class="row">
                    <div class="col s12 m6 l4 z-depth-4 card-panel border-radius-6 login-card bg-opacity-8">

                            <form action="<?= base_url('/register/save'); ?>"  method="post" class="login-form">
                            <div class="row">
                                <div class="input-field col s12">
                                    <h5 class="ml-4">Register</h5>
                                    <p class="ml-4">Join to our community now !</p>
                                </div>
                            </div>
                            <div class="row margin">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix pt-2">person_outline</i>
                                    <input id="username" type="text"  name="name"  value="<?= set_value('name') ?>">
                                    <label for="username" class="center-align">Username</label>
                                    <?php if(isset($validation) && $validation->hasError('name'))
                                    {
                                        echo '<span class="red-text text-darken-4">'.$validation->getError('name').'</span>';
                                    } ?>
                                </div>
                            </div>
                            <div class="row margin">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix pt-2">mail_outline</i>
                                    <input id="email" type="email" name="email" value="<?= set_value('email') ?>">
                                    <label for="email">Email</label>
                                    <?php if(isset($validation) && $validation->hasError('email'))
                                    {
                                        echo '<span class="red-text text-darken-4">'.$validation->getError('email').'</span>';
                                    } ?>
                                </div>
                            </div>
                            <div class="row margin">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix pt-2">lock_outline</i>
                                    <input id="password" name="password" type="password">
                                    <label for="password">Password</label>
                                    <?php if(isset($validation) && $validation->hasError('password'))
                                    {
                                        echo '<span class="red-text text-darken-4">'.$validation->getError('password').'</span>';
                                    } ?>
                                </div>
                            </div>
                            <div class="row margin">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix pt-2">lock_outline</i>
                                    <input id="password-again" name="confpassword" type="password">
                                    <label for="password-again">Password again</label>
                                    <?php if(isset($validation) && $validation->hasError('confpassword'))
                                    {
                                        echo '<span class="red-text text-darken-4">'.$validation->getError('confpassword').'</span>';
                                    } ?>
                                </div>
                            </div>
                            <div class="row">
                          
                                <div class="input-field col s12">
                                <button class="btn waves-effect waves-light border-round gradient-45deg-purple-deep-orange col s12" type="submit" >Register<Button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <p class="margin medium-small"><a href="<?= base_url('login'); ?>">Already have an account? Login</a></p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="content-overlay"></div>
        </div>
    </div>
