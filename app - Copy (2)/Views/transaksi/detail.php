<?= $this->extend('template/template') ?>
<?= $this->section('content') ?>

<div class="w-full max-w-full px-3 shrink-0 md:flex-0">
    <div class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
        <div class="border-black/12.5 rounded-t-2xl border-b-0 border-solid p-6 pb-0">
            <div class="flex items-center">
                <p class="mb-0 font-bold text-slate-700 text-xl dark:text-white/80">Detail Transaksi</p>
                <?php if ($result['tanggal_kembali'] != '0000-00-00 00:00:00' && $result['tanggal_kembali'] != null) : ?>
                    <a href="/pengembalian/nota/<?= $result['id_pengembalian'] ?>" class="px-8 py-2 mb-4 ml-auto font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-blue-500 border-0 rounded-lg shadow-md cursor-pointer text-xs tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85">Cetak</a>
                <?php else : ?>
                    <a href="/transaksi/nota/<?= $result['id_transaksi_sewa'] ?>" class="px-8 py-2 mb-4 ml-auto font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-blue-500 border-0 rounded-lg shadow-md cursor-pointer text-xs tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85">Cetak</a>
                <?php endif; ?>
            </div>
        </div>
        <div class="flex-auto p-6">
            <div class="-mx-3 md:grid md:grid-cols-2 md:gap-3 mb-4">
                <div class="input-data">
                    <div class="w-full max-w-full px-3 shrink-0 md:flex">
                        <p class="m-0 leading-normal uppercase dark:text-white dark:opacity-60 text-sm">Informasi Motor</p>
                        <!-- <button type="button" id="motor-modal" data-modal-toggle="motor-modal" class="inline-block px-6 py-1 mb-4 ml-6 font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-blue-500 border-0 rounded-lg shadow-md cursor-pointer text-xs tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85">Pilih</button> -->
                    </div>
                    <div class="w-full max-w-full px-3 shrink-0 md:flex-0">
                        <div class="mb-4">
                            <label for="nama_motor" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Nama Motor</label>
                            <input disabled type="text" name="nama_motor" value="<?= old('nama_motor', $result['nama_motor']) ?>" class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                        </div>
                    </div>
                    <div class="w-full max-w-full px-3 shrink-0 md:flex-0">
                        <div class="mb-4">
                            <label for="no_polisi" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">No Polisi</label>
                            <input disabled type="text" name="no_polisi" value="<?= old('no_polisi', $result['no_polisi']) ?>" class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                        </div>
                    </div>
                    <div class="w-full max-w-full px-3 shrink-0 md:flex-0">
                        <div class="mb-4">
                            <label for="merk" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Merk</label>
                            <input disabled type="text" name="merk" value="<?= old('merk', $result['merk']) ?>" class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                        </div>
                    </div>
                    <div class="w-full max-w-full px-3 shrink-0 md:flex-0">
                        <div class="mb-4">
                            <label for="harga_sewa" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Harga Sewa</label>
                            <input disabled type="text" name="harga_sewa" value="<?= old('harga_sewa', $result['harga_sewa']) ?>" class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                        </div>
                    </div>
                </div>
                <div class="input-data">
                    <div class="w-full max-w-full px-3 shrink-0 md:flex">
                        <p class="leading-normal uppercase dark:text-white dark:opacity-60 text-sm">Informasi Penyewa</p>
                    </div>
                    <div class="w-full max-w-full px-3 shrink-0 md:flex-0">
                        <div class="mb-4">
                            <label for="nama_penyewa" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Nama Penyewa</label>
                            <input disabled type="text" name="nama_penyewa" value="<?= old('nama_penyewa', $result['nama_penyewa']) ?>" class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                        </div>
                    </div>
                    <div class="w-full max-w-full px-3 shrink-0 md:flex-0">
                        <div class="mb-4">
                            <label for="alamat_domisili" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Alamat Domisili</label>
                            <input disabled type="text" name="alamat_domisili" value="<?= old('alamat_domisili', $result['alamat_domisili']) ?>" class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                        </div>
                    </div>
                    <div class="w-full max-w-full px-3 shrink-0 md:flex-0">
                        <div class="mb-4">
                            <label for="hp_penyewa" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">No HP Penyewa</label>
                            <input disabled type="text" name="hp_penyewa" value="<?= old('hp_penyewa', $result['hp_penyewa']) ?>" class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                        </div>
                    </div>
                    <div class="w-full max-w-full px-3 shrink-0 md:flex-0">
                        <div class="mb-4">
                            <label for="universitas" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Universitas</label>
                            <input disabled type="text" name="universitas" value="<?= old('universitas', $result['universitas']) ?>" class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                        </div>
                    </div>


                </div>
            </div>

            <hr class="h-px mx-0 my-4 bg-transparent border-0 opacity-25 bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent " />
            <form>
                <input disabled type="text" name="id" value="<?= old('id', $result['id_user']) ?>" class="hidden focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                <p class="leading-normal uppercase dark:text-white dark:opacity-60 text-sm">Informasi Sewa</p>
                <div class="-mx-3 md:grid md:grid-cols-2 md:gap-3">
                    <div class="input-data">
                        <div class="w-full max-w-full px-3 shrink-0 md:flex-0 md:grid md:grid-cols-2 md:gap-3">
                            <div class="mb-4">
                                <label for="tanggal_mulai_sewa" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Tanggal Mulai Sewa</label>
                                <input disabled type="datetime-local" name="tanggal_mulai_sewa" value="<?= old('tanggal_mulai_sewa', $result['tanggal_mulai_sewa']) ?>" class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                            </div>
                            <div class="mb-4">
                                <label for="tanggal_akhir_sewa" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Tanggal Akhir Sewa</label>
                                <input disabled type="datetime-local" name="tanggal_akhir_sewa" value="<?= old('tanggal_akhir_sewa', $result['tanggal_akhir_sewa']) ?>" class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                            </div>
                        </div>
                        <div class="w-full max-w-full px-3 shrink-0 md:flex-0">
                            <div class="mb-4">
                                <label for="keterangan" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Keterangan</label>
                                <textarea disabled name="keterangan" cols="30" rows="5" class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"><?= old('keterangan', $result['keterangan']) ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="input-data">
                        <div class="w-full max-w-full px-3 shrink-0 md:flex-0 md:grid md:grid-cols-2 md:gap-3">
                            <div class="mb-4">
                                <label for="jaminan" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Jaminan</label>
                                <select disabled id="countries" class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                                    <option selected><?= old('jaminan', $result['jaminan']) ?></option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="jumlah_hari" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Jumlah Hari</label>
                                <input disabled type="text" name="jumlah_hari" value="<?= old('jumlah_hari', $jumlah_hari) ?>" class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                            </div>
                        </div>
                        <div class="w-full max-w-full px-3 shrink-0 md:flex-0">
                            <label for="total_harga" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Total Harga</label>
                            <h1><span><?= number_to_currency($total_harga, 'IDR', 'id_ID', 2) ?></span></h1>
                        </div>
                    </div>
                </div>
                <div class="mt-5">
                    <a href="/transaksi" class="inline-block w-25 py-2 mb-4 ml-auto font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-blue-500 border-0 rounded-lg shadow-md cursor-pointer text-xs tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85">Cancel</a>
                    <!-- <button type="submit" class="inline-block w-25 py-2 mb-4 ml-3 font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-blue-500 border-0 rounded-lg shadow-md cursor-pointer text-xs tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85">Buat Transaksi</button> -->
                </div>
            </form>
            <hr class="h-px mx-0 my-4 bg-transparent border-0 opacity-25 bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent " />
            <!-- < ?= $this->include('transaksi/motor-modal') ?> -->
        </div>
    </div>
</div>

<script>

</script>


<?= $this->endSection() ?>