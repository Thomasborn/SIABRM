<?= $this->extend('template/template') ?>
<?= $this->section('content') ?>

<div class="w-full max-w-full px-3 shrink-0 md:flex-0">
    <div class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">

        <div class="border-black/12.5 rounded-t-2xl border-b-0 border-solid p-6 pb-0">
            <div class="flex items-center">
                <p class="mb-0 font-bold text-slate-700 text-xl dark:text-white/80">Servis</p>
                <button id="reset" type="reset" class="inline-block px-8 py-2 mb-4 ml-auto font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-blue-500 border-0 rounded-lg shadow-md cursor-pointer text-xs tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85">Reset</button>
            </div>
            <div class="w-full max-w-full px-3 shrink-0 md:flex">
                <p class="m-0 leading-normal uppercase dark:text-white dark:opacity-60 text-sm">Pilih Motor</p>
                <div class="relative">
                    <button id="showMotor-button" class="relative inline-block px-6 py-1 ml-4 font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-blue-500 border-0 rounded-lg shadow-md cursor-pointer text-xs tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85">Pilih</button>
                    <?= $this->include('servis/motor-modal') ?>
                   
                </div>
                <p class="ml-2 leading-normal uppercase dark:text-white dark:opacity-60 text-sm">Tambah Servis</p>
                <div class="relative">
                    <button id="showdetail-button" class="relative inline-block px-6 py-1 ml-4 font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-blue-500 border-0 rounded-lg shadow-md cursor-pointer text-xs tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85">Pilih</button>
                    <?= $this->include('servis/modal-detail') ?>
            </div>
        </div>
        <div class="flex-auto p-6">
            <form action="/servis/entrys/<?= $result[0]['max(id_servis)']+1 ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="-mx-3 md:grid md:grid-cols-2 md:gap-3">
                    <div class="input-kiri">
                        <div class="w-full max-w-full px-3 shrink-0 md:flex-0">
                            <div class="mb-3">
                                <label for="nama_bengkel" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Nama Bengkel</label>
                                <input type="text" name="nama_bengkel" value="<?= old('nama_bengkel') ?>" class="<?= $validation->hasError('nama_bengkel') ? 'is-invalid' : '' ?> focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nama_bengkel') ?>
                                </div>
                            </div>
                        </div>
                        <div class="w-full max-w-full px-3 shrink-0 md:flex-0">
                            <div class="mb-3">
                                <label for="alamat" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Alamat</label>
                                <input type="text" name="alamat" value="<?= old('alamat') ?>" class="<?= $validation->hasError('alamat') ? 'is-invalid' : '' ?> focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                <div class="invalid-feedback">
                                    <?= $validation->getError('alamat') ?>
                                </div>
                            </div>
                        </div>
                        <div class="w-full max-w-full px-3 shrink-0 md:flex-0">
                            <div class="mb-3">
                                <div class="flex items-center mb-2">
                                    <label for="nama_motor" class="inline-block ml-1 font-bold text-xs text-slate-700 dark:text-white/80">
                                        Motor
                                    </label>
                                </div>
                                <input type="hidden" name="id_motor" id="id_motor"> <!-- ini id dapat dari modal -->
                                <div class="">
                                    <input disabled type="text" name="nama_nopol" id="nama_nopol" class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="input-kanan">
                        <div class="w-full max-w-full px-3 shrink-0 md:flex-0">
                            <div class="mb-3">
                                <label for="telp" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Telp</label>
                                <input type="text" name="telp" class="<?= $validation->hasError('telp') ? 'is-invalid' : '' ?> focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                <div class="invalid-feedback">
                                    <?= $validation->getError('telp') ?>
                                </div>
                            </div>
                        </div>
                        <div class="w-full max-w-full px-3 shrink-0 md:flex-0">
                            <div class="mb-3">
                                <label for="lama" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Durasi</label>
                                <div class="grid grid-cols-2 gap-2">
                                    <div>
                                        <input type="datetime-local" name="tanggal_servis" class="<?= $validation->hasError('tanggal_servis') ? 'is-invalid' : '' ?> focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('tanggal_servis') ?>
                                        </div>
                                    </div>
                                    <div>
                                        <input type="datetime-local" name="tanggal_selesai" class="<?= $validation->hasError('tanggal_selesai') ? 'is-invalid' : '' ?> focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('tanggal_selesai') ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>

        <div class="flex-auto px-12">
            <div class="-mx-3">
                <table class="items-center w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
                    <thead class="align-bottom">
                        <tr>
                            <th class="cursor-pointer px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">No
                                <span class="material-symbols-outlined text-5 translate-y-1.5">unfold_more</span>
                            </th>
                            <th class="cursor-pointer px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Nama Servis
                                <span class="material-symbols-outlined text-5 translate-y-1.5">unfold_more</span>
                            </th>
                            <th class="cursor-pointer px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Harga
                                <span class="material-symbols-outlined text-5 translate-y-1.5">unfold_more</span>
                            </th>
                            <th class="cursor-pointer px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Keterangan
                                <span class="material-symbols-outlined text-5 translate-y-1.5">unfold_more</span>
                            </th>
                            <th class="px-6 py-3 font-semibold capitalize align-middle bg-transparent border-b border-collapse border-solid shadow-none dark:border-white/40 dark:text-white tracking-none whitespace-nowrap text-slate-400 opacity-70"></th>
                        </tr>
                    </thead>
                    <tbody id="detail_servis">

                    </tbody>
                </table>
            </div>
        </div>

        <div class="mt-12">
            <a href="/servis" class="inline-block w-25 py-2 mb-4 ml-5 font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-blue-500 border-0 rounded-lg shadow-md cursor-pointer text-xs tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85">Cancel</a>
            <button type="submit" class="inline-block w-25 py-2 mb-4 ml-3 font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-blue-500 border-0 rounded-lg shadow-md cursor-pointer text-xs tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85">Save</button>
            </form>
        </div>
        <hr class="h-px mx-0 my-4 bg-transparent border-0 opacity-25 bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent " />
    </div>
</div>
</div>

<script>
    function load() {
        $('#detail_servis').load('/servis/load');
        // $('#spanTotal').load('/pengembelian/gettotal');

    }
    $(document).ready(function() {
        load();

    });
</script>

<script>
    const show_butt = document.getElementById('showMotor-button');
    const motorModal = document.getElementById('motor-modal');
    const close_butt = document.getElementById('closeMotor-button');
    show_butt.addEventListener('click', function() {
        motorModal.classList.remove('hidden');
    });
    close_butt.addEventListener('click', function() {
        motorModal.classList.add('hidden');
    })

    const show_buttdetail = document.getElementById('showdetail-button');
    const detailModal = document.getElementById('modalDetail');
    const close_buttdetail = document.getElementById('closeD-button');
    show_buttdetail.addEventListener('click', function() {
        detailModal.classList.remove('hidden');
    });
    close_buttdetail.addEventListener('click', function() {
        detailModal.classList.add('hidden');
    })
</script>

<?= $this->endSection() ?>