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
				<p>Surabaya, <?= $tagihan->tanggal_tagihan;?></p>
				<p>Kepada</p>
				<p>YTH. PT. MASPION</p>
				<p>Di Tempat</p>
			</address>
			<div class="desc">
				<h2><?= $tagihan->no_tagihan; ?></h2>
			</div>
			<!-- <div class="desc"><h2>Jaya Mulya Malang</h2><p>Margomulyo Permai Blok B - 14 - SBY</p></div> -->
		</header>
		<article>
			
            
			<table class="">
				<thead>
					<tr>
						<th style="width: 10px"><span>No.</span></th>
						<th><span>Surat Muat</span></th>
						<th><span>Tanggal</span></th>
						<th><span>Penerima</span></th>
						<th style="width: 30px"><span>Koli</span></th>
						<th><span>Harga</span></th>
					</tr>
				</thead>
				<?php $i = 1;
				
				foreach ($fakturtagihan->result() as $fakturtagihans) {?>
				<tbody>
					<tr>
						<td><?= $i ?></td>
						<td><span><?= $fakturtagihans->kode_faktur ?></span></td>
						<td><span><?= $fakturtagihans->created_at ?></span></td>
						<td><span><?= $fakturtagihans->id_faktur_penerima ?></span></td>
						<td><span><?= $fakturtagihans->total_qty ?></span></td>
						<td><span><?= $fakturtagihans->total ?></span></td>
					</tr>
				</tbody>
				<?php $i++; } ?>
			</table>
			<table class="balance">
				<tr>
					<th><span>Total Qty</span></th>
					<td><span><?= $fakturtagihans->total_qty; ?></span></td>
				</tr>
				<tr>
					<th><span>Total Ongkos</span></th>
					<td><span data-prefix>Rp.</span><span><?= $fakturtagihans->total; ?></span></td>
				</tr>
				
			</table>
			<br><br><br>
		</article>
		<!-- <div>
			<h3><b>Notes:</b></h2>
			<p><i><?= $murid->note; ?></i></p>
		</div> -->
	</body>
</html>