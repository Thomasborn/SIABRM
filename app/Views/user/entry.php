<?= $this->extend('template/template') ?>
<?= $this->section('content') ?>

<div class="w-full max-w-full px-3 shrink-0 md:flex-0">
    <div class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
        <form action="<?= route_to('register') ?>" method="POST" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <div class="border-black/12.5 rounded-t-2xl border-b-0 border-solid p-6 pb-0">
                <div class="flex items-center">
                    <p class="mb-0 font-bold text-slate-700 text-xl dark:text-white/80">Tambah User</p>
                    <button id="reset" type="reset" class="inline-block px-8 py-2 mb-4 ml-auto font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-blue-500 border-0 rounded-lg shadow-md cursor-pointer text-xs tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85">Reset</button>
                </div>
            </div>
            <div class="flex-auto p-6">
                <div class="-mx-3 md:grid md:grid-cols-2 md:gap-3">
                    <div class="input-data">
                        <div class="w-full max-w-full px-3 shrink-0 md:flex-0">
                            <div class="mb-4">
                                <label for="nama_user" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Nama User</label>
                                <input type="text" name="nama_user" value="<?= old('nama_user') ?>" class="<?= $validation->hasError('nama_user') ? 'is-invalid' : '' ?> focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nama_user') ?>
                                </div>
                            </div>
                        </div>
                        <div class="w-full max-w-full px-3 shrink-0 md:flex-0">
                            <div class="mb-4">
                                <label for="email" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Email</label>
                                <input type="email" name="email" value="<?= old('email') ?>" class="<?php if (session('errors.email')) : ?>is-invalid<?php endif ?> focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                <div class="invalid-feedback">
                                    <?= $validation->getError('email') ?>
                                </div>
                            </div>
                        </div>
                        <div class="w-full max-w-full px-3 shrink-0 md:flex-0">
                            <div class="mb-4">
                                <label for="username" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Username</label>
                                <input type="text" name="username" value="<?= old('username') ?>" class="<?php if (session('errors.username')) : ?>is-invalid<?php endif ?> focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                <div class="invalid-feedback">
                                    <?= $validation->getError('username') ?>
                                </div>
                            </div>
                        </div>
                        <div class="w-full max-w-full px-3 shrink-0 md:flex-0">
                            <div class="mb-4">
                                <label for="password" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Password</label>
                                <input type="password" name="password" value="<?= old('password') ?>" class="<?php if (session('errors.password')) : ?>is-invalid<?php endif ?> focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                <div class="invalid-feedback">
                                    <?= $validation->getError('password') ?>
                                </div>
                            </div>
                        </div>
                        <div class="w-full max-w-full px-3 shrink-0 md:flex-0">
                            <div class="mb-4">
                                <label for="pass_confirm" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Confirm Password</label>
                                <input type="password" name="pass_confirm" value="<?= old('pass_confirm') ?>" class="<?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?> focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                <div class="invalid-feedback">
                                    <?= $validation->getError('pass_confirm') ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="input-foto px-3 w-full">
                        <div class="my-3 w-full">
                            <img src="<?= base_url() ?>/assets/img/user/default-img.jpg" alt="" class="max-h-full max-w-full rounded-lg img-thumbnail img-preview">
                        </div>
                    </div>
                </div>
                <div class="mt-5">
                    <a href="/user" class="inline-block w-25 py-2 mb-4 ml-auto font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-blue-500 border-0 rounded-lg shadow-md cursor-pointer text-xs tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85">Cancel</a>
                    <button type="submit" class="inline-block w-25 py-2 mb-4 ml-3 font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-blue-500 border-0 rounded-lg shadow-md cursor-pointer text-xs tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85">Save</button>
                </div>
                <hr class="h-px mx-0 my-4 bg-transparent border-0 opacity-25 bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent " />
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>