<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Invoice Penyewaan</title>

		<style>
			body{margin-top:20px;
    color: #2e323c;
    background: #f5f6fa;
    position: relative;
    height: 100%;
}
.invoice-container {
    padding: 1rem;
}
.invoice-container .invoice-header .invoice-logo {
    margin: 0.8rem 0 0 0;
    display: inline-block;
    font-size: 1.6rem;
    font-weight: 700;
    color: #2e323c;
}
.invoice-container .invoice-header .invoice-logo img {
    max-width: 130px;
}
.invoice-container .invoice-header address {
    font-size: 0.8rem;
    color: #9fa8b9;
    margin: 0;
}
.invoice-container .invoice-details {
    margin: 1rem 0 0 0;
    padding: 1rem;
    line-height: 180%;
    background: #f5f6fa;
}
.invoice-container .invoice-details .invoice-num {
    text-align: right;
    font-size: 0.8rem;
}
.invoice-container .invoice-body {
    padding: 1rem 0 0 0;
}
.invoice-container .invoice-footer {
    text-align: center;
    font-size: 0.7rem;
    margin: 5px 0 0 0;
}

.invoice-status {
    text-align: center;
    padding: 1rem;
    background: #ffffff;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    border-radius: 4px;
    margin-bottom: 1rem;
}
.invoice-status h2.status {
    margin: 0 0 0.8rem 0;
}
.invoice-status h5.status-title {
    margin: 0 0 0.8rem 0;
    color: #9fa8b9;
}
.invoice-status p.status-type {
    margin: 0.5rem 0 0 0;
    padding: 0;
    line-height: 150%;
}
.invoice-status i {
    font-size: 1.5rem;
    margin: 0 0 1rem 0;
    display: inline-block;
    padding: 1rem;
    background: #f5f6fa;
    -webkit-border-radius: 50px;
    -moz-border-radius: 50px;
    border-radius: 50px;
}
.invoice-status .badge {
    text-transform: uppercase;
}

@media (max-width: 767px) {
    .invoice-container {
        padding: 1rem;
    }
}


.custom-table {
    border: 1px solid #e0e3ec;
}
.custom-table thead {
    background: #007ae1;
}
.custom-table thead th {
    border: 0;
    color: #ffffff;
}
.custom-table > tbody tr:hover {
    background: #fafafa;
}
.custom-table > tbody tr:nth-of-type(even) {
    background-color: #ffffff;
}
.custom-table > tbody td {
    border: 1px solid #e6e9f0;
}


.card {
    background: #ffffff;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    border: 0;
    margin-bottom: 1rem;
}

.text-success {
    color: #00bb42 !important;
}

.text-muted {
    color: #9fa8b9 !important;
}

.custom-actions-btns {
    margin: auto;
    display: flex;
    justify-content: flex-end;
}

.custom-actions-btns .btn {
    margin: .3rem 0 .3rem .3rem;
}	</style>
	</head>

	<div class="container">
<div class="row gutters">
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<div class="card">
				<div class="card-body p-0">
					<div class="invoice-container">
						<div class="invoice-header">
							<!-- Row start -->
							<div class="row gutters">
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
									<div class="custom-actions-btns mb-5">
										<a href="#" class="btn btn-primary">
											<i class="icon-download"></i> Download
										</a>
										<a href="#" class="btn btn-secondary">
											<i class="icon-printer"></i> Print
										</a>
									</div>
								</div>
							</div>
							<!-- Row end -->
							<!-- Row start -->
							<div class="row gutters">
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
									<a href="index.html" class="invoice-logo">
										SIABRM
									</a>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-6">
									<address class="text-right">
									JL. Babarsari, TB. 8 No. 5, Yogyakarta, Janti, Caturtunggal, Depok, Sleman, Yogyakarta
									</address>
								</div>
							</div>
							<!-- Row end -->
							<!-- Row start -->
							<div class="row gutters">
								<div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
									<div class="invoice-details">
										<address>
											Alex Maxwell<br>
											150-600 Church Street, Florida, USA
										</address>
									</div>
								</div>
								<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
									<div class="invoice-details">
										<div class="invoice-num">
											<div>No transaksi- <?= $result['id_transaksi_sewa'] . $result['id_motor'] . $result['id_penyewa'] . $result['id_pengembalian'] ?></div>
											<div><?= date('d F Y', strtotime($result['tanggal_transaksi_sewa'])) ?></div>
											<div><?= date('g : i A', strtotime($result['tanggal_transaksi_sewa'])) ?></div>
										</div>
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
							<!-- Row end -->
						</div>
						<div class="invoice-body">
							<!-- Row start -->
							<div class="row gutters">
								<div class="col-lg-12 col-md-12 col-sm-12">
									<div class="table-responsive">
										<table class="table custom-table m-0">
											<thead>
												<tr>
													<th>Motor</th>
													<th>Product ID</th>
													<th>Kuantitas</th>
													<th>Harga</th>
													<th>Subtotal</th>
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
							<!-- Row end -->
						</div>
						<div class="invoice-footer">
							Thank you for your Business.
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</html>