/*
Nusantara Global
Team : Nans, M. Rifki
*/

$(document).ready(function() {

	//autohide
	$('.AutoHide').delay(3000).fadeOut();

	//alert
	$('.alert').alert();

	//tooltip
	$('[data-toggle="tooltip"]').tooltip();

	//icheck
	$("input[type=checkbox]").iCheck({
		checkboxClass: 'icheckbox_square-blue',
		radioClass: 'iradio_square-blue',
		increaseArea: '20%' // optional
	});

	$("input[type=radio]").iCheck({
		checkboxClass: 'icheckbox_square-blue',
		radioClass: 'iradio_square-blue',
		increaseArea: '20%' // optional
	});
	
	//select2
	$(".select2").select2();

	$("#Date").inputmask("dd-mm-yyyy");
	$("#Year").inputmask("9999");
	$("#Month").inputmask("mm");

	$('#TableFull').DataTable({
		"language": {
			"info": "Halaman _START_ - _END_ dari _TOTAL_ data",
			"emptyTable": "belum ada data",
			"infoEmpty": "",
			"paginate": 
				{
					"previous": "Sebelumnya",
					"next": "Selanjutnya"
				},
			"lengthMenu": 
				'Tampilkan: <select style="padding:5px">'+
				 '<option value="10">10</option>'+
				 '<option value="25">25</option>'+
				 '<option value="50">50</option>'+
				 '<option value="100">100</option>'+
				 '<option value="-1">All</option>'+
				 '</select> Data',
			 "loadingRecords": "Tunggu dulu...",
			 "search": "Cari: ",
			 "zeroRecords": "Data tidak ada",
			 "infoFiltered": "Hasil pencarian dari _MAX_ data",
			 "processing": "sedang dalam proses...",
			 "aria": 
				{
					"sortAscending": "",
					"sortDescending": ""
				},
			"first": "Pertama",
			"last": "Terakhir"
		},
		"scrollX": true,
	 });

	//cekpassword
	$('#CekPassword').click(function(){
		if($(this).is(':checked'))
		{
			$('.form-control').attr('type','text');
		}
		else
		{
			$('.form-control').attr('type','password');
		}
	});

			
});

CKEDITOR.replace('text1',{
		 toolbar:    
		[   { name: 'document', groups: [ 'document', 'doctools' ], items: [ 'Preview', 'Print', '-', 'Templates' ] },
		    { name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
		    { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl' ] },
		    { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat' ] },
		    { name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] }, { name: 'editing', groups: [ 'find', 'selection' ], items: [ 'Find', 'Replace', '-', 'SelectAll', '-', 'Scayt' ] },
		    { name: 'insert', items: [ 'Table', 'HorizontalRule', 'SpecialChar', 'PageBreak', 'Syntaxhighlight' ] },
		    { name: 'styles', items: [ 'Format', 'Font', 'FontSize' ] },
		    { name: 'colors', items: [ 'TextColor', 'BGColor' ] },
		    { name: 'others', groups: [ 'mode' ], items: [ 'Source', 'searchCode', 'autoFormat', 'CommentSelectedRange', 'UncommentSelectedRange', 'AutoComplete', '-', 'ShowBlocks' ] },
		    { name: 'tools', items: [ 'Maximize' ] }
		]}	
	);

//popup
function popup(lebar,tinggi,detik)
{
	var tampil=screen.width;
	var tampil2=screen.height;
	var posisi=(tampil-lebar)/2;
	var posisi2=(tampil2-tinggi)/4;

	var a=window.open('blank','popup','width='+lebar+',height='+tinggi+' ,left='+posisi+',top='+posisi2);
	if(detik!=0)
	{
		setTimeout(function(){a.close()},(detik*1000));
	}
}
