<?= $this->extend('template/template') ?>
<?= $this->section('content') ?>

<div class="w-full max-w-full px-3 shrink-0 md:flex-0">
    <div class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
        <div class="border-black/12.5 rounded-t-2xl border-b-0 border-solid p-6 pb-0">
            <div class="flex items-center">
                <p class="mb-0 font-bold text-slate-700 text-xl dark:text-white/80">Ubah Data User</p>
                <button id="reset" type="reset" class="inline-block px-8 py-2 mb-4 ml-auto font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-blue-500 border-0 rounded-lg shadow-md cursor-pointer text-xs tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85">Reset</button>
            </div>
        </div>
        <div class="flex-auto p-6">
            <p class="leading-normal uppercase dark:text-white dark:opacity-60 text-sm">Informasi Akun</p>
            <div class="-mx-3 md:grid md:grid-cols-2 md:gap-3">
                <div class="input-data">
                    <div class="w-full max-w-full px-3 shrink-0 md:flex-0">
                        <div class="mb-4">
                            <label for="nama_user" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Nama User</label>
                            <input disabled type="text" name="nama_user" value="<?= old('hp_user', $result->nama_user) ?>" class="<?= $validation->hasError('nama_user') ? 'is-invalid' : '' ?> focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                            <div class="invalid-feedback">
                                <?= $validation->getError('nama_user') ?>
                            </div>
                        </div>
                    </div>
                    <div class="w-full max-w-full px-3 shrink-0 md:flex-0">
                        <div class="mb-4">
                            <label for="username" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Username</label>
                            <input disabled type="text" name="username" value="<?= old('username', $result->username) ?>" class="<?= $validation->hasError('username') ? 'is-invalid' : '' ?> focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                            <div class="invalid-feedback">
                                <?= $validation->getError('username') ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="input-data">
                    <div class="w-full max-w-full px-3 shrink-0 md:flex-0">
                        <div class="mb-4">
                            <label for="email" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Email</label>
                            <input disabled type="email" name="email" value="<?= old('email', $result->email) ?>" class="<?= $validation->hasError('email') ? 'is-invalid' : '' ?> focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                            <div class="invalid-feedback">
                                <?= $validation->getError('email') ?>
                            </div>
                        </div>
                    </div>
                    <div class="w-full max-w-full px-3 shrink-0 md:flex-0">
                        <div class="mb-4">
                            <label for="email" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Role</label>
                            <input disabled type="email" name="email" value="<?= old('email', $result->email) ?>" class="<?= $validation->hasError('email') ? 'is-invalid' : '' ?> focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                            <div class="invalid-feedback">
                                <?= $validation->getError('email') ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <form action="/user/edit/<?= $result->id ?>" method="POST" enctype="multipart/form-data" class="mt-4">
                <?= csrf_field() ?>
                <input disabled type="text" name="id" value="<?= old('id', $result->id_user) ?>" class="hidden focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                <p class="leading-normal uppercase dark:text-white dark:opacity-60 text-sm">Informasi Pribadi</p>
                <div class="-mx-3 md:grid md:grid-cols-2 md:gap-3">
                    <div class="input-data">
                        <div class="w-full max-w-full px-3 shrink-0 md:flex-0">
                            <div class="mb-4">
                                <label for="nama_lengkap" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Nama Lengkap</label>
                                <input type="text" name="nama_lengkap" value="<?= old('nama_lengkap', $result->nama_lengkap) ?>" class="<?= $validation->hasError('nama_lengkap') ? 'is-invalid' : '' ?> focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nama_lengkap') ?>
                                </div>
                            </div>
                        </div>
                        <div class="w-full max-w-full px-3 shrink-0 md:flex-0">
                            <div class="mb-4">
                                <label for="tanggal_lahir" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" value="<?= old('tanggal_lahir', $result->tanggal_lahir) ?>" class="<?= $validation->hasError('tanggal_lahir') ? 'is-invalid' : '' ?> focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                <div class="invalid-feedback">
                                    <?= $validation->getError('tanggal_lahir') ?>
                                </div>
                            </div>
                        </div>
                        <div class="w-full max-w-full px-3 shrink-0 md:flex-0">
                            <div class="mb-4">
                                <label for="hp_user" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">No HP User</label>
                                <input type="text" name="hp_user" value="<?= old('hp_user', $result->hp_user) ?>" class="<?= $validation->hasError('hp_user') ? 'is-invalid' : '' ?> focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                <div class="invalid-feedback">
                                    <?= $validation->getError('hp_user') ?>
                                </div>
                            </div>
                        </div>
                        <div class="w-full max-w-full px-3 shrink-0 md:flex-0">
                            <div class="mb-4">
                                <label for="alamat_asal" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Alamat Asal</label>
                                <input type="text" name="alamat_asal" value="<?= old('alamat_asal', $result->alamat_asal) ?>" class="<?= $validation->hasError('alamat_asal') ? 'is-invalid' : '' ?> focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                <div class="invalid-feedback">
                                    <?= $validation->getError('alamat_asal') ?>
                                </div>
                            </div>
                        </div>
                        <div class="w-full max-w-full px-3 shrink-0 md:flex-0">
                            <div class="mb-4">
                                <label for="alamat_domisili" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Alamat Domisili</label>
                                <input type="text" name="alamat_domisili" value="<?= old('alamat_domisili', $result->alamat_domisili) ?>" class="<?= $validation->hasError('alamat_domisili') ? 'is-invalid' : '' ?> focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                <div class="invalid-feedback">
                                    <?= $validation->getError('alamat_domisili') ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="input-gambar px-3 w-full">
                        <div class="w-full mb-4">
                            <img src="<?= base_url() ?>/assets/img/user/<?= $result->foto_user == "" ? "default-img.jpg" : $result->foto_user ?>" alt="" class="max-h-full max-w-full rounded-lg img-thumbnail img-preview">
                        </div>
                        <input type="hidden" name="gambarLama" value="<?= $result->foto_user ?>">
                        <input type="file" id="gambar" name="foto_user" onchange="previewImage()" class="<?= $validation->hasError('foto_user') ? 'is-invalid' : '' ?> focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-8/12 appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                        <div class="invalid-feedback">
                            <?= $validation->getError('foto_user') ?>
                        </div>
                    </div>
                </div>
                <div class="mt-5">
                    <a href="/user" class="inline-block w-25 py-2 mb-4 ml-auto font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-blue-500 border-0 rounded-lg shadow-md cursor-pointer text-xs tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85">Cancel</a>
                    <button type="submit" class="inline-block w-25 py-2 mb-4 ml-3 font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-blue-500 border-0 rounded-lg shadow-md cursor-pointer text-xs tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85">Save Change</button>
                </div>
            </form>
            <hr class="h-px mx-0 my-4 bg-transparent border-0 opacity-25 bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent " />
        </div>
    </div>
</div>

<?= $this->endSection() ?>