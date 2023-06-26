<?= $this->extend('auth/template')?>
<?= $this->section('content')?>
               <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3></div>
                                    <div class="card-body">
                                    <?= view('Myth\Auth\Views\_message_block') ?>

                                        <form action="<?= route_to('register')?> " method="post">
                                        <?= csrf_field() ?>
                                        <div class="row mb-3">
                                                <div class="col">
                                                    <div class="form-floating mb-3">
                                                        <input class="form-control <?php if(session('errors.firstname')) : ?>is-invalid<?php endif ?>" name="firstname" id="inputPassword" type="text" placeholder="Enter your first name" value="<?=old('firstname')?>"/>
                                                        <label for="inputFirstName">First Name</label>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                <div class="col">
                                                    <div class="form-floating mb-3 ">
                                                        <input class="form-control <?php if(session('errors.lastname')) : ?>is-invalid<?php endif ?>" name="lastname" id="inputPassword" type="text" placeholder="Enter your first name" value="<?=old('lastname')?>"/>
                                                        <label for="inputLasttName">Last Name</label>
                                                    </div>
                                                </div>
                                                
                                                    <div class="form-floating mb-3">
                                                      
                                                <input class="form-control  <?php if(session('errors.email')) : ?>is-invalid<?php endif ?>" id="inputEmail" 
                                                    name="email" type="email" placeholder="<?=lang('Auth.email')?>"value="<?= old('email')?>" />
                                                <label for="inputEmail" ><?=lang('Auth.email')?></label>
                                                </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control <?php if(session('errors.username')) : ?>is-invalid<?php endif ?>"  type="text" placeholder="<?=lang('Auth.username')?>"name="username" placeholder="<?= lang('Auth.username')?> " value="<?= old('username')?>" />
                                                <label for="inputEmail"><?=lang('Auth.username')?></label>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control <?php if(session('errors.password')) : ?>is-invalid<?php endif ?>" name="password" id="inputPassword" type="password" placeholder="<?= lang('Auth.password')?>" autocomplate="off"/>
                                                        <label for="inputPassword"><?= lang('Auth.password')?></label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control <?php if(session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" name="pass_confirm" id="inputPassword" type="password" placeholder="<?= lang('Auth.repeatPassword')?>" autocomplate="off"/>
                                                        <label for="inputPassword"><?= lang('Auth.repeatPassword')?></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><button type="submit" class="btn btn-primary btn-block" href="login.html"><?= lang('Auth.register')?></button></div>
                                            </div>
                                        </form>
                                    </div>
                                                        </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><?= lang('Auth.alreadyRegistered')?><a href="<?=route_to('login')?>"?><?= lang('Auth.signIn')?></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
     <?= $this->endSection()?>

         
