<?= $this->extend('template/template') ?>
<?= $this->section('content') ?>

<div class="w-full max-w-full px-3 shrink-0 md:flex-0">
    <div class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
        <div class="border-black/12.5 rounded-t-2xl border-b-0 border-solid p-6 pb-0">
            <div class="flex items-center">
                <p class="mb-0 font-bold text-slate-700 text-xl dark:text-white/80">Tambah Transaksi</p>
                <button id="reset" type="reset" class="inline-block px-8 py-2 mb-4 ml-auto font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-blue-500 border-0 rounded-lg shadow-md cursor-pointer text-xs tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85">Reset</button>
            </div>
        </div>
        <div class="flex-auto p-6">
            <div class="-mx-3 md:grid md:grid-cols-2 md:gap-3 mb-4">
                <div class="input-data">
                    <div class="w-full max-w-full px-3 shrink-0 md:flex">
                        <p class="mx-0 mt-0 mb-4 leading-normal uppercase dark:text-white dark:opacity-60 text-sm">Informasi Motor</p>
                        <div class="relative">
                            <button type="button" id="showMotor-button" data-modal-toggle="motor-modal" class="relative inline-block px-6 py-1 ml-6 font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-blue-500 border-0 rounded-lg shadow-md cursor-pointer text-xs tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85">
                                Pilih
                            </button>
                            <?= $this->include('transaksi/motor-modal') ?>
                        </div>
                    </div>
                    <div class="w-full max-w-full px-3 shrink-0 md:flex-0">
                        <div class="mb-4">
                            <label for="nama_motor" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Nama Motor</label>

                            <input disabled id="nama_motor" type="text" name="nama_motor" class="<?= $validation->hasError('nama_motor') ? 'is-invalid' : '' ?> focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                            <div class="invalid-feedback">
                                <?= $validation->getError('nama_motor') ?>
                            </div>
                        </div>
                    </div>
                    <div class="w-full max-w-full px-3 shrink-0 md:flex-0">
                        <div class="mb-4">
                            <label for="no_polisi" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">No Polisi</label>
                            <input disabled id="no_polisi" type="text" name="no_polisi" class="<?= $validation->hasError('no_polisi') ? 'is-invalid' : '' ?> focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                            <div class="invalid-feedback">
                                <?= $validation->getError('no_polisi') ?>
                            </div>
                        </div>
                    </div>
                    <div class="w-full max-w-full px-3 shrink-0 md:flex-0">
                        <div class="mb-4">
                            <label for="merk" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Merk</label>
                            <input disabled id="merk" type="text" name="merk" class="<?= $validation->hasError('merk') ? 'is-invalid' : '' ?> focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                            <div class="invalid-feedback">
                                <?= $validation->getError('merk') ?>
                            </div>
                        </div>
                    </div>
                    <div class="w-full max-w-full px-3 shrink-0 md:flex-0">
                        <div class="mb-4">
                            <label for="harga_sewa" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Harga Sewa</label>
                            <input disabled id="harga_sewa" type="text" name="harga_sewa" class="<?= $validation->hasError('harga_sewa') ? 'is-invalid' : '' ?> focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                            <div class="invalid-feedback">
                                <?= $validation->getError('harga_sewa') ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="input-data">
                    <div class="w-full max-w-full px-3 shrink-0 md:flex">
                        <p class="leading-normal uppercase dark:text-white dark:opacity-60 text-sm">Informasi Penyewa</p>
                        <div class="relative">
                            <button type="button" id="showPen-button" data-modal-toggle="motor-modal" class="relative inline-block px-6 py-1 ml-6 font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-blue-500 border-0 rounded-lg shadow-md cursor-pointer text-xs tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85">
                                Pilih
                            </button>
                            <?= $this->include('transaksi/penyewa-modal') ?>
                        </div>
                    </div>
                    <div class="w-full max-w-full px-3 shrink-0 md:flex-0">
                        <div class="mb-4">
                            <label for="nama_penyewa" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Nama Penyewa</label>

                            <input disabled id="nama_penyewa" type="text" name="nama_penyewa" class="< ?= $validation->hasError('nama_penyewa') ? 'is-invalid' : '' ?> focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                            <div class="invalid-feedback">
                                <!-- < ?=$validation->getError('nama_penyewa') ?> -->
                            </div>
                        </div>
                    </div>
                    <div class="w-full max-w-full px-3 shrink-0 md:flex-0">
                        <div class="mb-4">
                            <label for="alamat_domisili" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Alamat Domisili</label>
                            <input disabled id="alamat_domisili" type="text" name="alamat_domisili" class="< ?= $validation->hasError('alamat_domisili') ? 'is-invalid' : '' ?> focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                            <div class="invalid-feedback">
                                <!-- < ?=$validation->getError('alamat_domisili') ?> -->
                            </div>
                        </div>
                    </div>
                    <div class="w-full max-w-full px-3 shrink-0 md:flex-0">
                        <div class="mb-4">
                            <label for="hp_penyewa" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">No HP Penyewa</label>
                            <input disabled id="hp_penyewa" type="text" name="hp_penyewa" class="< ?= $validation->hasError('hp_penyewa') ? 'is-invalid' : '' ?> focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                            <div class="invalid-feedback">
                                <!-- < ?=$validation->getError('hp_penyewa') ?> -->
                            </div>
                        </div>
                    </div>
                    <div class="w-full max-w-full px-3 shrink-0 md:flex-0">
                        <div class="mb-4">
                            <label for="universitas" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Universitas</label>
                            <input disabled id="universitas" type="text" name="universitas" class="< ?= $validation->hasError('universitas') ? 'is-invalid' : '' ?> focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                            <div class="invalid-feedback">
                                <!-- < ?=$validation->getError('universitas') ?> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="h-px mx-0 my-4 bg-transparent border-0 opacity-25 bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent " />
            <!-- <div class="-mx-3 md:grid md:grid-cols-2 md:gap-3 mb-4">
                <div class="input-data">
                </div>
                <div class="input-data">
                </div>
            </div> -->
            <form action="/transaksi/entry" method="POST" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <input disabled type="text" name="id" value="< ?= old('id', $result->id_user) ?>" class="hidden focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                <p class="leading-normal uppercase dark:text-white dark:opacity-60 text-sm">Informasi Sewa</p>
                <div class="-mx-3 md:grid md:grid-cols-2 md:gap-3">
                    <div class="input-data">
                        <div class="w-full max-w-full px-3 shrink-0 md:flex-0 md:grid md:grid-cols-2 md:gap-3">
                            <input type="text" id="id_motor" name="id_motor" class="hidden">
                            <input type="text" name="id_penyewa" id="id_penyewa" class="hidden">
                            <input type="text" name="id_user" value="<?= user()->id ?>" class="hidden">
                            <div class="mb-4">
                                <label for="tanggal_mulai_sewa" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Tanggal Mulai Sewa</label>
                                <input id="tgl-mulai" type="datetime-local" name="tanggal_mulai_sewa" value="< ?= old('tanggal_mulai_sewa', $result->tanggal_mulai_sewa) ?>" class="< ?= $validation->hasError('tanggal_mulai_sewa') ? 'is-invalid' : '' ?> focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                <div class="invalid-feedback">
                                    <?= $validation->getError('tanggal_mulai_sewa') ?>
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="tanggal_akhir_sewa" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Tanggal Akhir Sewa</label>
                                <input id="tgl-akhir" onchange="jumlahHari()" type="datetime-local" name="tanggal_akhir_sewa" value="< ?= old('tanggal_akhir_sewa', $result->tanggal_akhir_sewa) ?>" class="< ?= $validation->hasError('tanggal_akhir_sewa') ? 'is-invalid' : '' ?> focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                <div class="invalid-feedback">
                                    <?= $validation->getError('tanggal_akhir_sewa') ?>
                                </div>
                            </div>
                        </div>
                        <div class="w-full max-w-full px-3 shrink-0 md:flex-0">
                            <div class="mb-4">
                                <label for="keterangan" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Keterangan</label>
                                <textarea name="keterangan" cols="30" rows="5" value="< ?= old('keterangan', $result->keterangan) ?>" class="< ?= $validation->hasError('keterangan') ? 'is-invalid' : '' ?> focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"></textarea>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('keterangan') ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="input-data">
                        <div class="w-full max-w-full px-3 shrink-0 md:flex-0 md:grid md:grid-cols-2 md:gap-3">
                            <div class="mb-4">
                                <label for="jaminan" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Jaminan</label>
                                <select id="jaminan" name="jaminan" class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                                    <option value="123" selected>Pilih Jaminan</option>
                                    <option value="KTP Pribadi, KTM">KTP Pribadi, KTM</option>
                                    <option value="KTP Pribadi, KTP Kenalan, KTM">KTP Pribadi, KTP Kenalan, KTM</option>
                                </select>
                                <!-- <input type="text" name="jaminan" value="< ?= old('jaminan', $result->jaminan) ?>" class="< ?= $validation->hasError('jaminan') ? 'is-invalid' : '' ?> focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" /> -->
                                <div class="invalid-feedback">
                                    <?= $validation->getError('jaminan') ?>
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="jumlah_hari" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Jumlah Hari</label>
                                <input disabled type="text" id="jumlah_hari" name="jumlah_hari" value="" class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                <div class="invalid-feedback">
                                    <?= $validation->getError('jumlah_hari') ?>
                                </div>
                            </div>
                        </div>
                        <div class="w-full max-w-full px-3 shrink-0 md:flex-0">
                            <label for="jaminan" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Total Harga</label>
                            <h1><span id="total_harga">0</span></h1>
                        </div>
                    </div>
                </div>
                <div class="mt-5">
                    <a href="/transaksi" class="inline-block w-25 py-2 mb-4 ml-auto font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-blue-500 border-0 rounded-lg shadow-md cursor-pointer text-xs tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85">Cancel</a>
                    <button type="submit" class="inline-block w-25 py-2 mb-4 ml-3 font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-blue-500 border-0 rounded-lg shadow-md cursor-pointer text-xs tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85">Buat Transaksi</button>
                </div>
            </form>
            <hr class="h-px mx-0 my-4 bg-transparent border-0 opacity-25 bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent " />
        </div>
    </div>
</div>

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
</script>

<script>
    const showPen_butt = document.getElementById('showPen-button');
    const penyewaModal = document.getElementById('penyewa-modal');
    const closePen_butt = document.getElementById('closePen-button');
    showPen_butt.addEventListener('click', function() {
        penyewaModal.classList.remove('hidden');
    });
    closePen_butt.addEventListener('click', function() {
        penyewaModal.classList.add('hidden');
    })
</script>

<script>
    function jumlahHari() {
        var tglMulai = document.getElementById('tgl-mulai').value;
        var tglAkhir = document.getElementById('tgl-akhir').value;
        const d1 = new Date(tglMulai);
        const d2 = new Date(tglAkhir);
        const time = Math.abs(d2 - d1);
        const days = Math.ceil(time / (1000 * 60 * 60 * 24));
        console.log(days);
        document.getElementById('jumlah_hari').value = days;

        var harga = document.getElementById('harga_sewa').value;
        console.log(harga);
        const total_harga = Math.abs(harga * days);

        const rupiah = (number) => {
            return new Intl.NumberFormat("id-ID", {
                style: "currency",
                currency: "IDR"
            }).format(number);
        }

        console.log(total_harga);
        document.getElementById('total_harga').innerHTML = rupiah(total_harga);

    }
</script>


<?= $this->endSection() ?>