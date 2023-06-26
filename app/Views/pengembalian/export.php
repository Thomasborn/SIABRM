<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url() ?>/assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="<?= base_url() ?>/assets/img/favicon.png" />
    <!-- <title>< ?= $title ?></title> -->
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/e4db830f1e.js" crossorigin="anonymous"></script>
    <!-- Nucleo Icons -->
    <link href="<?= base_url() ?>/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="<?= base_url() ?>/assets/css/nucleo-svg.css" rel="stylesheet" />

    <!-- Main Styling -->
    <!-- <link href="/assets/css/argon-dashboard-tailwind.css?v=1.0.1" rel="stylesheet" /> -->
    <link href="<?= base_url() ?>/assets/css/argon-dashboard-tailwind.css" rel="stylesheet" />
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" /> -->
    <!-- ajax -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/plugins/chartjs.min.js" async></script>
<script src="<?= base_url() ?>/assets/js/charts.js" ></script>
<!-- plugin for scrollbar  -->
<script src="<?= base_url() ?>/assets/js/plugins/perfect-scrollbar.min.js" async></script>
<!-- main script file  -->
<script src="<?= base_url() ?>/assets/js/argon-dashboard-tailwind.js?v=1.0.1" async></script>
</head>


<div id="GFG" class="flex flex-wrap -mx-3">
    <div class="w-full max-w-full px-3 mx-auto sm:flex-0 shrink-0 sm:w-10/12 md:w-8/12">
        <form action="index.html" method="post">
            <div class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border sm:my-12">
                <div class="border-black/12.5 rounded-t-2xl border-b-0 border-solid p-6 text-center">
                    <div class="flex flex-wrap justify-between -mx-3">
                        <div class="w-full max-w-full px-3 text-left md:flex-0 shrink-0 md:w-4/12">
                            <img class="block w-1/4 p-2 mb-2 dark:hidden" src="../../../assets/img/logo-ct-dark.png" alt="Logo" />
                            <img class="hidden w-1/4 p-2 mb-2 dark:block" src="../../../assets/img/logo-ct.png" alt="Logo" />
                            <h6 class="dark:text-white">JL. Babarsari, TB. 8 No. 5, Yogyakarta, Janti, Caturtunggal, Depok, Sleman, Yogyakarta</h6>
                            <p class="block text-slate-400 dark:text-white dark:opacity-80">Telp: 0812-2525-7752</p>
                        </div>
                        <div class="w-full max-w-full px-3 mt-12 text-left md:flex-0 shrink-0 md:w-7/12 md:text-right lg:w-3/10 ">
                            <h6 class="block mt-2 mb-0 dark:text-white">Penyewa: <?= $result['nama_penyewa'] ?></h6>
                            <p class="text-slate-400 dark:text-white dark:opacity-80">
                                <?= $result['alamat_domisili'] ?>
                                <br />
                                <?= $result['hp_penyewa'] ?>
                                <br />
                                <?= $result['hp_ortu'] ?>
                            </p>
                        </div>
                    </div>
                    <br />
                    <div class="flex flex-wrap -mx-3 justify-between">
                        <div class="w-full max-w-full px-3 mt-auto md:flex-0 shrink-0 md:w-5/12">
                            <h6 class="mb-0 text-left text-slate-400 dark:text-white dark:opacity-80">No transaksi</h6>
                            <h5 class="mb-0 text-left dark:text-white"><?= $result['id_transaksi_sewa'] . $result['id_motor'] . $result['id_penyewa'] . $result['id_pengembalian'] ?></h5>
                            <h6 class="mb-0 mt-2 text-left text-slate-400 dark:text-white dark:opacity-80">Tanggal Transaksi: </h6>
                            <h6 class="mb-0 text-left text-slate-700 dark:text-white"><?= date('d F Y', strtotime($result['tanggal_transaksi_sewa'])) ?></h6>
                            <h6 class="mb-0 text-left text-slate-700 dark:text-white"><?= date('g : i A', strtotime($result['tanggal_transaksi_sewa'])) ?></h6>
                        </div>
                        <div class="w-full max-w-full px-3 mt-auto md:flex-0 shrink-0 md:w-7/12 lg:w-5/12">
                            <div class="flex flex-wrap mt-6 -mx-3 text-left md:mt-12 md:text-right">
                                <div class="w-full max-w-full px-3 md:flex-0 shrink-0 md:w-6/12">
                                    <h6 class="mb-0 text-slate-400 dark:text-white dark:opacity-80">Mulai Sewa :</h6>
                                </div>
                                <div class="w-full max-w-full pr-3 md:flex-0 shrink-0 md:w-6/12">
                                    <h6 class="mb-0 text-slate-700 dark:text-white"><?= date('d F Y', strtotime($result['tanggal_mulai_sewa'])) ?></h6>
                                    <h6 class="mb-0 text-slate-700 dark:text-white"><?= date('g : i A', strtotime($result['tanggal_mulai_sewa'])) ?></h6>
                                    <h6 id="tgl-mulai" class="hidden"><?= $result['tanggal_mulai_sewa'] ?></h6>
                                </div>
                            </div>
                            <div class="flex flex-wrap -mx-3 text-left md:text-right">
                                <div class="w-full max-w-full px-3 md:flex-0 shrink-0 md:w-6/12">
                                    <h6 class="mb-0 text-slate-400 dark:text-white dark:opacity-80">Akhir Sewa :</h6>
                                </div>
                                <div class="w-full max-w-full pr-3 md:flex-0 shrink-0 md:w-6/12">
                                    <h6 class="mb-0 text-slate-700 dark:text-white"><?= date('d F Y', strtotime($result['tanggal_akhir_sewa'])) ?></h6>
                                    <h6 class="mb-0 text-slate-700 dark:text-white"><?= date('g : i A', strtotime($result['tanggal_akhir_sewa'])) ?></h6>
                                    <h6 id="tgl-akhir" class="hidden"><?= $result['tanggal_akhir_sewa'] ?></h6>
                                </div>
                            </div>
                            <div class="flex flex-wrap -mx-3 text-left md:text-right">
                                <div class="w-full max-w-full px-3 md:flex-0 shrink-0 md:w-6/12">
                                    <h6 class="mb-0 text-slate-400 dark:text-white dark:opacity-80">Kembali :</h6>
                                </div>
                                <div class="w-full max-w-full pr-3 md:flex-0 shrink-0 md:w-6/12">
                                    <h6 class="mb-0 text-slate-700 dark:text-white"><?= $result['tanggal_kembali'] != null && $result['tanggal_kembali'] != '0000-00-00 00:00:00' ? date('d F Y', strtotime($result['tanggal_kembali'])) : 'Belum Kembali' ?></h6>
                                    <h6 class="mb-0 text-slate-700 dark:text-white"><?= $result['tanggal_kembali'] != null && $result['tanggal_kembali'] != '0000-00-00 00:00:00' ? date('g : i A', strtotime($result['tanggal_kembali'])) : '' ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex-auto p-6">
                    <div class="flex flex-wrap -mx-3">
                        <div class="w-full max-w-full px-3 flex-0">
                            <div class="overflow-x-auto rounded-t-xl">
                                <table class="w-full mb-4 align-top border-collapse border-gray-200 text-slate-500 dark:border-white/40">
                                    <thead class="text-white align-bottom bg-slate-700 dark:bg-slate-700">
                                        <tr>
                                            <th scope="col" class="px-2 py-3 font-semibold text-left capitalize bg-transparent border-b border-solid shadow-none tracking-none whitespace-nowrap border-b-gray-200 dark:border-white/40 dark:text-white">Motor</th>
                                            <th scope="col" class="px-2 py-3 pl-6 font-semibold capitalize bg-transparent border-b border-solid shadow-none tracking-none whitespace-nowrap border-b-gray-200 dark:border-white/40 dark:text-white">Kuantitas</th>
                                            <th scope="col" class="px-2 py-3 pl-6 font-semibold capitalize bg-transparent border-b border-solid shadow-none tracking-none whitespace-nowrap border-b-gray-200 dark:border-white/40 dark:text-white" colspan="2">Harga</th>
                                            <th scope="col" class="px-2 py-3 pl-6 font-semibold capitalize bg-transparent border-b border-solid shadow-none tracking-none whitespace-nowrap border-b-gray-200 dark:border-white/40 dark:text-white">Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody class="border-t-2">
                                        <tr>
                                            <td class="p-2 text-left border-b whitespace-nowrap dark:border-white/40 dark:text-white/60">
                                                <div>
                                                    <?= $result['nama_motor'] ?>
                                                </div>
                                                <div>
                                                    <?= $result['no_polisi'] ?>
                                                </div>
                                            </td>
                                            <td id="jumlah_hari" class="p-2 pl-6 text-center border-b whitespace-nowrap dark:border-white/40 dark:text-white/60"></td>
                                            <td class="p-2 pl-6 text-right border-b whitespace-nowrap dark:border-white/40 dark:text-white/60" colspan="2"><?= number_to_currency($result['harga_sewa'], 'IDR', 'id_ID', 2) ?></td>
                                            <td id="harga_sewa" class="hidden"><?= $result['harga_sewa'] ?></td>
                                            <td class="p-2 pl-6 text-right border-b whitespace-nowrap dark:border-white/40 dark:text-white/60"><?= number_to_currency($result['harga_sewa'], 'IDR', 'id_ID', 2) ?></td>
                                        </tr>
                                        <!-- < ?php foreach ($detail as $value) : ?>
                                            <tr>
                                                <td class="p-2 text-left border-b whitespace-nowrap dark:border-white/40 dark:text-white/60">< ?= $value['nama_kerusakan'] ?></td>
                                                <td class="p-2 pl-6 border-b whitespace-nowrap dark:border-white/40 dark:text-white/60">1</td>
                                                <td class="p-2 pl-6 border-b whitespace-nowrap dark:border-white/40 dark:text-white/60" colspan="2">< ?= $value['denda'] ?></td>
                                                <td class="p-2 pl-6 border-b whitespace-nowrap dark:border-white/40 dark:text-white/60">< ?= $value['denda'] ?></td>
                                            </tr>
                                        < ?php endforeach; ?> -->
                                    </tbody>
                                    <tfoot class="border-t border-solid">
                                        <tr>
                                            <th class="p-2 font-semibold bg-transparent border-b shadow-none whitespace-nowrap dark:border-white/40 dark:text-white/60"></th>
                                            <th class="p-2 font-semibold bg-transparent border-b shadow-none whitespace-nowrap dark:border-white/40 dark:text-white/60"></th>
                                            <th class="p-2 pl-6 mt-0 mb-2 text-xl text-right font-semibold leading-snug bg-transparent border-b shadow-none whitespace-nowrap text-slate-700 dark:border-white/40 dark:text-white/60" colspan="2">Total</th>
                                            <th id="total_harga" class="p-2 pl-6 mt-0 mb-2 text-xl text-right font-semibold leading-snug bg-transparent border-b shadow-none whitespace-nowrap text-slate-700 dark:border-white/40 dark:text-white/60" colspan="1"></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="border-black/12.5 mt-6 rounded-b-2xl border-t-0 border-solid p-6 md:mt-12">
                    <div class="flex flex-wrap -mx-3">
                        <div class="w-full max-w-full px-3 text-left lg:flex-0 shrink-0 lg:w-5/12">
                            <h5 class="dark:text-white">Terimakasih!</h5>
                            <p class="text-sm leading-normal text-slate-400 dark:text-white dark:opacity-80">Selamat berkendara, hati - hati di jalan. Jika ada keluhan silahkan hubungi kontak dibawa.</p>
                            <h6 class="mb-0 text-slate-400 dark:text-white dark:opacity-80">
                                telp:
                                <span class="text-slate-700 dark:text-white"><a href="/cdn-cgi/l/email-protection">0812-2525-7752</a></span>
                            </h6>
                        </div>
                        <div class="w-full max-w-full px-3 mt-4 lg:flex-0 shrink-0 md:mt-0 md:text-right lg:w-7/12">
                        <!-- <button onclick="hapus(),window.print()" id="print"type="button" value="click" class="inline-block px-5 py-2.5 mb-0 text-sm font-bold leading-normal text-right text-white align-middle transition-all ease-in bg-blue-500 border-0 rounded-lg shadow-md cursor-pointer hover:-translate-y-px active:opacity-85 hover:shadow-xs tracking-tight-rem bg-150 bg-x-25 lg:mt-24">Print</button> -->
                       </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    $(document).ready(function() {
        // load();
        window.print()
    });
    function hapus(){
        const element = document.getElementById("print");
        element.remove()
    }
    var tglMulai = document.getElementById('tgl-mulai').innerHTML;
    var tglAkhir = document.getElementById('tgl-akhir').innerHTML;
    const d1 = new Date(tglMulai);
    const d2 = new Date(tglAkhir);
    const time = Math.abs(d2 - d1);
    const days = Math.ceil(time / (1000 * 60 * 60 * 24));
    console.log(days);
    document.getElementById('jumlah_hari').innerHTML = days + ' hari';

    var harga = document.getElementById('harga_sewa').innerHTML;
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

    // var total_denda = document.getElementById('total_denda').innerHTML;
</script>

<script>
    function printDiv() {

    }
</script>

