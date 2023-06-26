<?= $this->extend('template/template') ?>
<?= $this->section('content') ?>

<div class="w-full max-w-full px-3 shrink-0 md:flex-0">
    <div class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
        <form action="/motor/entry" method="POST" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <div class="border-black/12.5 rounded-t-2xl border-b-0 border-solid p-6 pb-0">
                <div class="flex items-center">
                    <p class="mb-0 font-bold text-slate-700 text-xl dark:text-white/80">Tambah Motor</p>
                    <button id="reset" type="reset" class="inline-block px-8 py-2 mb-4 ml-auto font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-blue-500 border-0 rounded-lg shadow-md cursor-pointer text-xs tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85">Reset</button>
                </div>
            </div>
            <div class="flex-auto p-6">
                <div class="-mx-3 md:grid md:grid-cols-2 md:gap-3">
                    <div class="input-data">
                        <div class="w-full max-w-full px-3 shrink-0 md:flex-0">
                            <div class="mb-4">
                                <label for="nama_motor" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Nama Motor</label>
                                <input type="text" name="nama_motor" value="<?= old('nama_motor') ?>" class="<?= $validation->hasError('nama_motor') ? 'is-invalid' : '' ?> focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nama_motor') ?>
                                </div>
                            </div>
                        </div>
                        <div class="w-full max-w-full px-3 shrink-0 md:flex-0">
                            <div class="mb-4">
                                <label for="merk" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Merk Motor</label>
                                <input type="text" name="merk" value="<?= old('merk') ?>" class="<?= $validation->hasError('merk') ? 'is-invalid' : '' ?> focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                <div class="invalid-feedback">
                                    <?= $validation->getError('merk') ?>
                                </div>
                            </div>
                        </div>
                        <div class="w-full max-w-full px-3 shrink-0 md:flex-0">
                            <div class="mb-4">
                                <label for="warna" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Warna</label>
                                <input type="text" name="warna" value="<?= old('warna') ?>" class="<?= $validation->hasError('warna') ? 'is-invalid' : '' ?> focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                <div class="invalid-feedback">
                                    <?= $validation->getError('warna') ?>
                                </div>
                            </div>
                        </div>
                        <div class="w-full max-w-full px-3 shrink-0 md:flex-0">
                            <div class="mb-4">
                                <label for="no_polisi" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">No Polisi</label>
                                <input type="text" name="no_polisi" value="<?= old('no_polisi') ?>" class="<?= $validation->hasError('no_polisi') ? 'is-invalid' : '' ?> focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                <div class="invalid-feedback">
                                    <?= $validation->getError('no_polisi') ?>
                                </div>
                            </div>
                        </div>
                        <div class="w-full max-w-full px-3 shrink-0 md:flex-0">
                            <div class="mb-4">
                                <label for="harga_sewa" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Harga Sewa</label>
                                <input type="text" name="harga_sewa" value="<?= old('harga_sewa') ?>" class="<?= $validation->hasError('harga_sewa') ? 'is-invalid' : '' ?> focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                <div class="invalid-feedback">
                                    <?= $validation->getError('harga_sewa') ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="input-gambar px-3 w-full">
                        <div class="my-3 w-full">
                            <img src="<?= base_url() ?>/assets/img/default-img.jpg" alt="" class="max-h-full max-w-full rounded-lg img-thumbnail img-preview">
                        </div>
                        <input type="file" id="gambar" name="gambar" onchange="previewImage()" class="<?= $validation->hasError('gambar') ? 'is-invalid' : '' ?> focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-8/12 appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                        <div class="invalid-feedback">
                            <?= $validation->getError('gambar') ?>
                        </div>
                    </div>
                </div>
                <div class="mt-5">
                    <a href="/motor" class="inline-block w-25 py-2 mb-4 ml-auto font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-blue-500 border-0 rounded-lg shadow-md cursor-pointer text-xs tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85">Cancel</a>
                    <button type="submit" class="inline-block w-25 py-2 mb-4 ml-3 font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-blue-500 border-0 rounded-lg shadow-md cursor-pointer text-xs tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85">Save</button>
                </div>
                <hr class="h-px mx-0 my-4 bg-transparent border-0 opacity-25 bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent " />
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>