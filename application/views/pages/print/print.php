<?php date_default_timezone_set('Asia/Jakarta'); ?>
<html>
	<head>
		<meta charset="utf-8">
		<title>Invoice</title>
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/printCss.css">
		<link rel="license" href="http://www.opensource.org/licenses/mit-license/">
	</head>
	<body onload="print()">
		<header>
			<address>
				<p>No. Polisi: <?= $daftarmuat->truk; ?></p>
				<p>Sopir: <?= $daftarmuat->sopir; ?></p>
				<p>Tanggal Berangkat: <?= $daftarmuat->created_at; ?></p>
				<p>Tujuan:</p>
			</address>
			<div class="desc"><h2>Jaya Mulya Malang</h2><p>Margomulyo Permai Blok B - 14 - SBY</p></div>
		</header>
		<article>
			
            
			<table class="inventory">
				<thead>
					<tr>
						<th style="width: 10px"><span>No.</span></th>
						<th><span>Surat Muat</span></th>
						<th><span>Pengirim</span></th>
						<th><span>Penerima</span></th>
						<th><span>Qty</span></th>
						<th><span>Harga</span></th>
						<th><span>Potongan</span></th>
					</tr>
				</thead>
				<?php $i = 1;
				foreach ($faktursj->result() as $faktursjs) {?>
				<tbody>
					<tr>
						<td><?= $i ?></td>
						<td><span><?= $faktursjs->kode_faktur ?></span></td>
						<td><span><?= $faktursjs->id_faktur_pengirim ?></span></td>
						<td><span><?= $faktursjs->id_faktur_penerima ?></span></td>
						<td><span><?= $faktursjs->total_qty ?></span></td>
						<td><span><?= $faktursjs->total ?></span></td>
						<td><span><?= $faktursjs->potongan ?></span></td>
					</tr>
				</tbody>
				<?php $i++; } ?>
			</table>
			<table class="balance">
				<tr>
					<th><span>Total Qty</span></th>
					<td><span><?= $daftarmuat->total_qty; ?></span></td>
				</tr>
				<tr>
					<th><span>Total Ongkos</span></th>
					<td><span data-prefix>Rp.</span><span><?= $daftarmuat->total_ongkos; ?></span></td>
				</tr>
				
			</table>
			<br><br><br>

			<table class="inventory">
				<tr>
					<th style="width: 50px"><span>Transaksi</span></th>
					<td style="width: 100px"><span>C: 30</span></td>
					<td style="width: 100px"><span>F: 30</span></td>
					<td style="width: 100px"><span>FL: 30</span></td>
				</tr>
				<tr>
					<th><span>Transaksi</span></th>
					<td><span>Ongkos C: 30.000</span></td>
					<td><span>Ongkos F: 30.000</span></td>
					<td><span>Ongkos FL: 30.000</span></td>
				</tr>
				
			</table>
		</article>
		<!-- <div>
			<h3><b>Notes:</b></h2>
			<p><i><?= $murid->note; ?></i></p>
		</div> -->
		<hr style="border-width: 1px; border-style: inset;"><br><br>
	</body>
</html>