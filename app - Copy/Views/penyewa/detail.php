<?= $this->extend('template/template') ?>
<?= $this->section('content') ?>

<div class="w-full max-w-full px-3 shrink-0 md:flex-0">
    <div class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
        <form action="/penyewa/entry" method="POST" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <div class="border-black/12.5 rounded-t-2xl border-b-0 border-solid p-6 pb-0">
                <div class="flex items-center">
                    <p class="mb-0 font-bold text-slate-700 text-xl dark:text-white/80">Detail Penyewa</p>
                    <a href="/penyewa/edit/<?= $result['id_penyewa'] ?>" class="inline-block w-25 py-2 mb-4 ml-auto font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-blue-500 border-0 rounded-lg shadow-md cursor-pointer text-xs tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85">Go Edit</a>
                </div>
            </div>
            <div class="flex-auto p-6">
                <div class="-mx-3 md:grid md:grid-cols-2 md:gap-3">
                    <div class="input-data">
                        <div class="w-full max-w-full px-3 shrink-0 md:flex-0">
                            <div class="mb-4">
                                <input disabled type="text" name="id_penyewa" value="<?= old('id_penyewa', $result['id_penyewa']) ?>" class="hidden focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                <label for="nama_penyewa" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Nama penyewa</label>
                                <input disabled type="text" name="nama_penyewa" value="<?= old('nama_penyewa', $result['nama_penyewa']) ?>" class="<?= $validation->hasError('nama_penyewa') ? 'is-invalid' : '' ?> focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nama_penyewa') ?>
                                </div>
                            </div>
                        </div>
                        <div class="w-full max-w-full px-3 shrink-0 md:flex-0">
                            <div class="mb-4">
                                <label for="alamat_domisili" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Alamat_domisili</label>
                                <input disabled type="text" name="alamat_domisili" value="<?= old('alamat_domisili', $result['alamat_domisili']) ?>" class="<?= $validation->hasError('alamat_domisili') ? 'is-invalid' : '' ?> focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                <div class="invalid-feedback">
                                    <?= $validation->getError('alamat_domisili') ?>
                                </div>
                            </div>
                        </div>
                        <div class="w-full max-w-full px-3 shrink-0 md:flex-0">
                            <div class="mb-4">
                                <label for="alamat_asal" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Alamat_asal</label>
                                <input disabled type="text" name="alamat_asal" value="<?= old('alamat_asal', $result['alamat_asal']) ?>" class="<?= $validation->hasError('alamat_asal') ? 'is-invalid' : '' ?> focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                <div class="invalid-feedback">
                                    <?= $validation->getError('alamat_asal') ?>
                                </div>
                            </div>
                        </div>
                        <div class="w-full max-w-full px-3 shrink-0 md:flex-0">
                            <div class="mb-4">
                                <label for="hp_pnyewa" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Nomor Handphone Penyewa</label>
                                <input disabled type="text" name="hp_penyewa" value="<?= old('hp_penyewa', $result['hp_penyewa']) ?>" class="<?= $validation->hasError('hp_pnyewa') ? 'is-invalid' : '' ?> focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                <div class="invalid-feedback">
                                    <?= $validation->getError('hp_pnyewa') ?>
                                </div>
                            </div>
                        </div>
                        <div class="w-full max-w-full px-3 shrink-0 md:flex-0">
                            <div class="mb-4">
                                <label for="hp_ortu" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Nomor HP Orangtua</label>
                                <input disabled type="text" name="hp_ortu" value="<?= old('hp_ortu', $result['hp_ortu']) ?>" class="<?= $validation->hasError('hp_ortu') ? 'is-invalid' : '' ?> focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                <div class="invalid-feedback">
                                    <?= $validation->getError('hp_ortu') ?>
                                </div>
                            </div>
                        </div>
                        <div class="w-full max-w-full px-3 shrink-0 md:flex-0">
                            <div class="mb-4">
                                <label for="hp_ortu" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Universitas </label>
                                <input disabled type="text" name="universitas" value="<?= old('universitas', $result['universitas']) ?>" class="<?= $validation->hasError('universitas') ? 'is-invalid' : '' ?> focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                <div class="invalid-feedback">
                                    <?= $validation->getError('universitas') ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="input-foto_penyewa px-3 w-full">
                        <div class="my-3 w-full">
                            <!-- > -->
                            <img src="<?= base_url() ?>/assets/img/penyewa/<?= $result['foto_penyewa'] == "" ? "default-img.jpg" : $result['foto_penyewa'] ?>" alt="" class="max-h-full max-w-full rounded-lg img-thumbnail img-preview">
                        </div>
                        <input type="hidden" name="gambarLama" value="<?= $result['foto_penyewa'] ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('foto_penyewa') ?>
                        </div>
                    </div>
                </div>
                <div class="mt-5">
                    <a href="/penyewa" class="inline-block w-25 py-2 mb-4 ml-auto font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-blue-500 border-0 rounded-lg shadow-md cursor-pointer text-xs tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85">Back</a>
                </div>
                <hr class="h-px mx-0 my-4 bg-transparent border-0 opacity-25 bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent " />
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>