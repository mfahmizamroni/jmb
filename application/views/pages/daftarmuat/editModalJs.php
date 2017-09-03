<script>
var i = <?= $i; ?>;
function tambahkanBaru(s) {
    if (i < s) { i = s;}
	buatRow();
	noPadding();

    document.getElementById("idtd"+i).innerHTML = document.getElementById("idModal"+s).innerHTML ;
    document.getElementById("id"+i).value = document.getElementById("idModal"+s).innerHTML ;

    document.getElementById("nosmtd"+i).innerHTML = document.getElementById("nosmModal"+s).innerHTML ;
    document.getElementById("nosm"+i).value = document.getElementById("nosmModal"+s).innerHTML ;

    document.getElementById("pengirimtd"+i).innerHTML = document.getElementById("pengirimModal"+s).innerHTML ;
    document.getElementById("pengirim"+i).value = document.getElementById("pengirimModal"+s).innerHTML ;

    document.getElementById("penerimatd"+i).innerHTML = document.getElementById("penerimaModal"+s).innerHTML ;
    document.getElementById("penerima"+i).value = document.getElementById("penerimaModal"+s).innerHTML ;

    document.getElementById("totaltd"+i).innerHTML = document.getElementById("totalModal"+s).innerHTML ;
    document.getElementById("total"+i).value = document.getElementById("totalModal"+s).innerHTML ;

    // document.getElementById("tujuantd"+i).innerHTML = document.getElementById("tujuanModal"+s).innerHTML ;
    // document.getElementById("tujuan"+i).value = document.getElementById("tujuanModal"+s).innerHTML ;

    i++;
}

function edit(s) {
	noPadding();
	// console.log(document.getElementById("nosmEdit").value);

    document.getElementById("idtd"+s).innerHTML = document.getElementById("idEdit").value ;
    document.getElementById("id"+s).value = document.getElementById("idEdit").value ;

    document.getElementById("nosmtd"+s).innerHTML = document.getElementById("nosmEdit").value ;
    document.getElementById("nosm"+s).value = document.getElementById("nosmEdit").value ;

    document.getElementById("pengirimtd"+s).innerHTML = document.getElementById("pengirimEdit").value ;
    document.getElementById("pengirim"+s).value = document.getElementById("pengirimEdit").value ;

    document.getElementById("penerimatd"+s).innerHTML = document.getElementById("penerimaEdit").value ;
    document.getElementById("penerima"+s).value = document.getElementById("penerimaEdit").value ;

    document.getElementById("totaltd"+s).innerHTML = document.getElementById("totalEdit").value ;
    document.getElementById("total"+s).value = document.getElementById("totalEdit").value ;

    // document.getElementById("tujuantd"+s).innerHTML = document.getElementById("tujuanEdit").value ;
    // document.getElementById("tujuan"+s).value = document.getElementById("tujuanEdit").value ;
}

function buatRow() {
	noPadding();
	$("#table").append("<tr id=item"+i+"></tr>");
    $("#item"+i).append("<td id=idtd"+i+" style=display:none;></td>");
	$("#item"+i).append("<td id=nosmtd"+i+"></td>");
	$("#item"+i).append("<td id=pengirimtd"+i+"></td>");
	$("#item"+i).append("<td id=penerimatd"+i+"></td>");
    $("#item"+i).append("<td id=totaltd"+i+"></td>");
	$("#item"+i).append("<td><div class='checkbox' style='margin: 0px; display: inline-block;'><label><input type='checkbox' name='lunas"+i+"' value='1'>Lunas</label></div></td>");
    $("#item"+i).append("<td><input type='text' class='form-control' id='potongan' name='potongan"+i+"'><br></td>");
    $("#item"+i).append("<td><select name='status_kirim"+i+"' class='form-control'><option selected='selected' disabled>Select Option</option><?php foreach ($status_kirim->result() as $status_kirims) {?><option value='<?= $status_kirims->kode_sk ?>'><?= $status_kirims->nama_sk; ?></option><?php } ?></select></td>'");
	$("#item"+i).append("<td id=editid"+i+"></td>");
	// $("#editid"+i).append("<input type=hidden name=nosm"+i+" id=nosm"+i+"><input type=hidden name=pengirim"+i+" id=pengirim"+i+"><input type=hidden name=penerima"+i+" id=penerima"+i+"><input type=hidden name=total"+i+" id=total"+i+"><input type=hidden name=tujuan"+i+" id=tujuan"+i+"><a href='' class='btn btn-default' data-toggle=modal data-target=#edit-modal onclick=appEdit("+i+")><i class='fa fa-pencil'></i></a><a href='' class='btn btn-default' data-toggle=modal data-target=#hapus-modal onclick=appDelete("+i+")><i class='fa fa-trash-o'></i></a>");
    $("#editid"+i).append("<input type=hidden name=id"+i+" id=id"+i+"><input type=hidden name=nosm"+i+" id=nosm"+i+"><input type=hidden name=pengirim"+i+" id=pengirim"+i+"><input type=hidden name=penerima"+i+" id=penerima"+i+"><input type=hidden name=total"+i+" id=total"+i+"></i></a><a href='' class='btn btn-default' data-toggle=modal data-target=#hapus-modal onclick=appDelete("+i+")><i class='fa fa-trash-o'></i></a>");
}

function appEdit(s) {
	console.log(s);
    document.getElementById("idEdit").value = document.getElementById("idtd"+s).innerHTML;
	document.getElementById("nosmEdit").value = document.getElementById("nosmtd"+s).innerHTML;
	document.getElementById("pengirimEdit").value = document.getElementById("pengirimtd"+s).innerHTML;
	document.getElementById("penerimaEdit").value = document.getElementById("penerimatd"+s).innerHTML;
    document.getElementById("totalEdit").value = document.getElementById("totaltd"+s).innerHTML;
	document.getElementById("tujuanEdit").value = document.getElementById("tujuantd"+s).innerHTML;
	document.getElementById('editButton').onclick = function() { edit(s); };
}

function deleteItem(s) {
	document.getElementById("item"+s).remove();
}

function appDelete(s) {
	document.getElementById('deleteButton').onclick = function() { deleteItem(s); };
}

function noPadding() {
	// console.log('asd');
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
    $(function () {
        $("#example1").DataTable({
            dom: 'Bfrtip',
            buttons: [
            {
                extend: 'print', 
                exportOptions:{
                    columns: ':not(.notPrintable)'
                }
            }
            ]
        });
        var z = document.getElementsByClassName("buttons-print");
        z[0].classList.add('btn');
        z[0].classList.add('btn-primary');
    });
</script>
    <script>
      $('#confirm-delete').on('show.bs.modal', function(e) {
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
      });
    </script>