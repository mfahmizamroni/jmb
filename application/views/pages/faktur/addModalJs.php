<script>
var i = 1;
function tambahkanBaru() {
	buatRow();
	noPadding();

	console.log("jumlahBarangtd"+i);
    document.getElementById("jumlahBarangtd"+i).innerHTML = document.getElementById("jumlahBarang").value ;
    document.getElementById("jumlahBarang"+i).value = document.getElementById("jumlahBarang").value ;

    document.getElementById("jenistd"+i).innerHTML = document.getElementById("jenis").value ;
    document.getElementById("jenis"+i).value = document.getElementById("jenis").value ;

    document.getElementById("hargatd"+i).innerHTML = document.getElementById("harga").value ;
    document.getElementById("harga"+i).value = document.getElementById("harga").value ;

    document.getElementById("jumlahUangtd"+i).innerHTML = document.getElementById("jumlahUang").value ;
    document.getElementById("jumlahUang"+i).value = document.getElementById("jumlahUang").value ;

    i++;
}

function edit(s) {
	noPadding();
	console.log(document.getElementById("jumlahBarangEdit").value);

    document.getElementById("jumlahBarangtd"+s).innerHTML = document.getElementById("jumlahBarangEdit").value ;
    document.getElementById("jumlahBarang"+s).value = document.getElementById("jumlahBarangEdit").value ;

    document.getElementById("jenistd"+s).innerHTML = document.getElementById("jenisEdit").value ;
    document.getElementById("jenis"+s).value = document.getElementById("jenisEdit").value ;

    document.getElementById("hargatd"+s).innerHTML = document.getElementById("hargaEdit").value ;
    document.getElementById("harga"+s).value = document.getElementById("hargaEdit").value ;

    document.getElementById("jumlahUangtd"+s).innerHTML = document.getElementById("jumlahUangEdit").value ;
    document.getElementById("jumlahUang"+s).value = document.getElementById("jumlahUangEdit").value ;
}

function buatRow() {
	noPadding();
	$("#table").append("<tr id=item"+i+"></tr>");
	$("#item"+i).append("<td id=jumlahBarangtd"+i+"></td>");
	$("#item"+i).append("<td id=jenistd"+i+"></td>");
	$("#item"+i).append("<td id=hargatd"+i+"></td>");
	$("#item"+i).append("<td id=jumlahUangtd"+i+"></td>");
	$("#item"+i).append("<td id=editid"+i+"></td>");
	$("#editid"+i).append("<input type=hidden name=jumlahBarang"+i+" id=jumlahBarang"+i+"><input type=hidden name=jenis"+i+" id=jenis"+i+"><input type=hidden name=harga"+i+" id=harga"+i+"><input type=hidden name=jumlahUang"+i+" id=jumlahUang"+i+"><a href='' class='btn btn-default' data-toggle=modal data-target=#edit-modal onclick=appEdit("+i+")><i class='fa fa-pencil'></i></a><a href='' class='btn btn-default' data-toggle=modal data-target=#hapus-modal onclick=appDelete("+i+")><i class='fa fa-trash-o'></i></a>");
}

function appEdit(s) {
	console.log(s);
	document.getElementById("jumlahBarangEdit").value = document.getElementById("jumlahBarangtd"+s).innerHTML;
	document.getElementById("jenisEdit").value = document.getElementById("jenistd"+s).innerHTML;
	document.getElementById("hargaEdit").value = document.getElementById("hargatd"+s).innerHTML;
	document.getElementById("jumlahUangEdit").value = document.getElementById("jumlahUangtd"+s).innerHTML;
	document.getElementById('editButton').onclick = function() { edit(s); };
}

function deleteItem(s) {
	document.getElementById("item"+s).remove();
}

function appDelete(s) {
	document.getElementById('deleteButton').onclick = function() { deleteItem(s); };
}

function noPadding() {
	console.log('asd');
	setTimeout(function() {
		$("#no-padding").css({"padding-right":"0px"})
	}, 500);
}
</script>
<!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url(); ?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.buttons.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables/buttons.flash.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables/jszip.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables/vfs_fonts.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables/buttons.html5.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables/buttons.colVis.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables/buttons.print.min.js"></script>
    <!-- SlimScroll -->
    <script src="<?php echo base_url(); ?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url(); ?>assets/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url(); ?>assets/dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>
    <!-- InputMask -->
    <script src="<?php echo base_url(); ?>assets/plugins/input-mask/jquery.inputmask.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/input-mask/jquery.inputmask.extensions.js"></script>
    <script>
      $(function() {
        //Datemask dd/mm/yyyy
        $("#datemask").inputmask("yyyy-mm-dd", {"placeholder": "yyyy-mm-dd"});
        //Money Euro
        $("[data-mask]").inputmask();
      })
    </script>
    <script>
      $('#confirm-delete').on('show.bs.modal', function(e) {
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
      });
    </script>