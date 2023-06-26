<?= $this->extend('template/template') ?>
<?= $this->section('content') ?>

<!-- table 1 -->

<div class="flex flex-wrap -mx-3">
    <div class="flex-none w-full max-w-full px-3">
        <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
            <div class="flex items-center p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                <h6 class="font-bold text-slate-700 text-xl dark:text-white">Pengembalian</h6>
                <form class="ml-auto">
                    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-gray-300">Search</label>
                    <div class="relative">
                        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <input name="cari" type="search" id="default-search" class="block p-2 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search..." required>
                        <!-- <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button> -->
                    </div>
                </form>
                <!-- <div>
                    <a href="/motor/entry" class="px-8 py-2 mb-4 ml-5 font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-blue-500 border-0 rounded-lg shadow-md cursor-pointer text-xs tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85">Tambah</a>
                </div> -->
            </div>
            <div class="flex-auto px-0 pt-0 pb-2 mt-4">
                <div class="p-0 overflow-x-auto">
                    <table class="items-center w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
                        <thead class="align-bottom">
                            <tr>
                                <th class="cursor-pointer px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70 leading-0">No <br> Nota
                                    <span class="material-symbols-outlined text-5 translate-y-1.5">unfold_more</span>
                                </th>
                                <!-- <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Function</th> -->
                                <th class="cursor-pointer px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70 leading-0">Nama Penyewa
                                    <span class="material-symbols-outlined text-5 translate-y-1.5">unfold_more</span>
                                </th>
                                <th class="cursor-pointer px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70 leading-0">Motor
                                    <span class="material-symbols-outlined text-5 translate-y-1.5">unfold_more</span>
                                </th>
                                <th class="cursor-pointer px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70 leading-0">Tanggal <br> Mulai Sewa
                                    <span class="material-symbols-outlined text-5 translate-y-1.5">unfold_more</span>
                                </th>
                                <th class="cursor-pointer px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70 leading-0">Tanggal <br> Akhir Sewa
                                    <span class="material-symbols-outlined text-5 translate-y-1.5">unfold_more</span>
                                </th>
                                <th class="cursor-pointer px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70 leading-0">Tanggal <br> Kembali
                                    <span class="material-symbols-outlined text-5 translate-y-1.5">unfold_more</span>
                                </th>
                                <th class="cursor-pointer px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70 leading-0">Denda
                                    <span class="material-symbols-outlined text-5 translate-y-1.5">unfold_more</span>
                                </th>
                                <th class="px-6 py-3 font-semibold capitalize align-middle bg-transparent border-b border-collapse border-solid shadow-none dark:border-white/40 dark:text-white tracking-none whitespace-nowrap opacity-70 text-white leading-0">Tanggal</th>
                            </tr>
                        </thead>
                        <tbody class="card-content">
                            <?php foreach ($result as $value) : ?>
                                <tr class="card">
                                    <td class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                        <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80"><?= $value['id_transaksi_sewa'] . $value['id_motor'] . $value['id_penyewa'] . $value['id_pengembalian'] ?></p>
                                    </td>
                                    <td class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                        <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80"><?= $value['nama_penyewa'] ?></p>
                                    </td>
                                    <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                        <div class="flex px-2 py-1 justify-center">
                                            <div class="flex flex-col justify-center">
                                                <h6 class="text-center mb-0 text-sm leading-normal dark:text-white"><?= $value['nama_motor'] ?></h6>
                                                <p class="text-center mb-0 text-xs leading-tight dark:text-white dark:opacity-80 text-slate-400"><?= $value['no_polisi'] ?></p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                        <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80"><?= date('d M Y', strtotime($value['tanggal_mulai_sewa'])) ?></p>
                                        <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80"><?= date('g : i A', strtotime($value['tanggal_mulai_sewa'])) ?></p>
                                    </td>
                                    <td class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                        <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80"><?= date('d M Y', strtotime($value['tanggal_akhir_sewa'])) ?></p>
                                        <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80"><?= date('g : i A', strtotime($value['tanggal_akhir_sewa'])) ?></p>

                                    </td>
                                    <td class="p-2 text-sm leading-normal text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                        <?php if ($value['tanggal_kembali'] != null && $value['tanggal_kembali'] != '0000-00-00 00:00:00') : ?>
                                            <span class="bg-gradient-to-tl from-emerald-500 to-teal-400 px-2.5 text-xs rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">
                                                <?= date('d M Y', strtotime($value['tanggal_kembali'])) ?>
                                                <br>
                                                <?= date('g : i A', strtotime($value['tanggal_kembali'])) ?>
                                            </span>
                                        <?php elseif ($value['tanggal_kembali'] == null || $value['tanggal_kembali'] == '0000-00-00 00:00:00') : ?>
                                            <form action="/pengembalian/kembalikan/<?= $value['id_pengembalian'] ?>">
                                                <button type="submit" class="bg-gradient-to-tl from-orange-500 to-yellow-500 rounded-lg px-3 py-2 text-white text-xs font-semibold leading-tight dark:text-white dark:opacity-80 transition-all ease-in hover:shadow-xs hover:-translate-y-px active:opacity-85" role="button">
                                                    KEMBALIKAN
                                                </button>
                                            </form>
                                        <?php endif; ?>
                                    </td>
                                    <td class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                        <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80"><?= $value['denda'] != null ? number_to_currency($value['denda'], 'IDR', 'id_ID', 2) : number_to_currency(0, 'IDR', 'id_ID', 2) ?></p>
                                    </td>
                                    <td class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent flex items-center">
                                        <a href="/pengembalian/detail/<?= $value['id_pengembalian'] ?>" class="px-4 py-2  font-bold leading-normal text-center text-slate-600 align-middle transition-all ease-in cursor-pointer text-sm tracking-tight-rem  active:opacity-85">
                                            <i class="fas fa-eye leading-11"></i>
                                        </a>
                                        <!-- <a href="/pengembalian/edit/< ?= $value['id_pengembalian'] ?>" class="px-4 py-2  font-bold leading-normal text-center text-slate-600 align-middle transition-all ease-in cursor-pointer text-sm tracking-tight-rem  active:opacity-85">
                                            <i class="fas fa-user-edit leading-11"></i>
                                        </a> -->
                                        <form action="/pengembalian/delete/<?= $value['id_pengembalian'] ?>" method="post" class="">
                                            <?= csrf_field() ?>
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="px-4 py-2  font-bold leading-normal text-center text-slate-600 align-middle transition-all ease-in cursor-pointer text-sm tracking-tight-rem  active:opacity-85" role="button" onclick="return confirm('Apakah anda yakin?')">
                                                <i class="fas fa-trash leading-11"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <div class="mt-4 mb-6 mx-6 flex items-center">
                        <div class="text-slate-700 text-4 items-center">
                            Page Info
                        </div>
                        <!-- < ?= $pager->Links('pengembalian', 'paging') ?> -->
                        <?= $this->include('pagination/my-pagination') ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- px-8 py-2 mb-4 ml-auto font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-blue-500 border-0 rounded-lg shadow-md cursor-pointer text-xs tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85 -->
<!-- <a href="/motor/entry" class="fixed px-8 py-2 font-bold leading-normal text-center text-xs align-middle tracking-tight-rem transition-all ease-in bg-blue-500 shadow-lg cursor-pointer bottom-8 right-8 z-990 rounded-lg text-white hover:shadow-xs hover:-translate-y-px active:opacity-85">
    Tambah
</a> -->

<!-- card 2 -->

<?= $this->endSection() ?>

<script>
    const motor = document.getElementById('status_motor');
    console.log(motor.contains("Disewa"));
</script>