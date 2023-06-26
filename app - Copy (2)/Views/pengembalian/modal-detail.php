<div id="modalDetail" class="hidden fixed top-0 left-0 w-screen h-screen flex items-center z-sticky bg-black/50">
    <div class=" w-4/6 h-4/5 mx-auto">

        <div class="flex flex-wrap -mx-3">
            <div class="flex-none w-full max-w-full px-3">
                <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                    <div class="flex items-center p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                        <h6 class="font-bold text-slate-700 text-xl dark:text-white">Daftar Motor</h6>
                        <button id="closeD-button" type="button" class="inline-block px-8 py-2 mb-4 ml-auto font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-blue-500 border-0 rounded-lg shadow-md cursor-pointer text-xs tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85">Tutup</button>
                    </div>
                    <div class="flex-auto px-4 pt-0 pb-2 mt-4">
                        <div class="p-0 overflow-x-auto">

                            <div class="w-full max-w-full px-3 shrink-0 md:flex-0">
                                <div class="mb-4">
                                    <label for="nama_kerusakan" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Nama kerusakan</label>
                                    <input type="text" id="nama" name="nama" class="<?= $validation->hasError('nama_kerusakan') ? 'is-invalid' : '' ?> focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nama_kerusakan') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full max-w-full px-3 shrink-0 md:flex-0">
                                <div class="mb-4">
                                    <label for="denda" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Denda</label>
                                    <input type="text" id="denda" name="denda" value="<?= old('denda') ?>" class="<?= $validation->hasError('denda') ? 'is-invalid' : '' ?> focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('denda') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full max-w-full px-3 shrink-0 md:flex-0">
                                <div class="mb-4">
                                    <label for="keterangan" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Keterangan</label>
                                    <textarea id="ket" class="
                                focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" name="ket" rows="keterangan"></textarea>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('keterangan') ?>
                                    </div>
                                </div>
                            </div>

                            <button role="button" onclick=" select(<?= old('id_pengembalian', $result['id_pengembalian']) ?>,document.getElementById('nama').value,document.getElementById('denda').value,document.getElementById('ket').value)" class="inline-block px-8 py-2 mb-4 ml-4 mt-3 font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-blue-500 border-0 rounded-lg shadow-md cursor-pointer text-xs tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85"><i class="w-8 h-8 text-cool-gray-800 dark:text-cool-gray-200 group-hover:text-purple-600 group-focus:text-purple-600 dark:group-hover:text-purple-50 dark:group-focus:text-purple-50"></i>Tambah</button>

                            <div class="mt-4 mb-6 mx-6 flex items-center">
                                <!-- <div class="ml-auto">
                                    <button id="closeMotor-button" type="button" class="inline-block px-8 py-2 mb-4 ml-auto font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-blue-500 border-0 rounded-lg shadow-md cursor-pointer text-xs tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85">Tutup</button>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
    function select(id, nama, denda, ket) {

        $.ajax({
            url: "/pengembalian",
            method: "POST",
            data: {
                id: id,
                nama: nama,
                denda: denda,
                ket: ket,


            },
            success: function(data) {
                load();
                // $('#modalDetail').modal('hide');
                detailModal.classList.add('hidden');
                document.getElementById('nama').value = "";
                document.getElementById('denda').value = "";
                document.getElementById('keterangan').value = "";

            }
        });

        $(document).on('click', '.hapus_detail', function() {
            var row_id = $(this).val();
            // console.log(row_id);
            $.ajax({

                url: "/pengembalian/" + row_id,
                method: "delete",
                // dataType: "JSON",
                success: function(data) {
                    load();
                }
            });
        });
    }
</script>