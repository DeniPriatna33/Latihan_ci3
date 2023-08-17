<script>
	$(document).ready(function() {
		tampil_data();
	});

	function tampil_data() {
		$.ajax({
			type: "POST",
			url: "<?= base_url('upload_file/upload_file/list_data') ?>",
			dataType: "json",
			success: function(data) {
				let html = '';
				data.forEach((val, no) => { // forEach (looping Data)
					no++;
					html += '<tr>' +
						'	<td>' + no + '</td>' +
						'	<td>' + val.nama_file + '</td>' +
						'	<td>' + val.keterangan + '</td>' +
						'	<td>Aksi</td>' +
						'</tr>';
				});

				if (data.length <= 0) { // Bila data kosong
					html = '<td>Data Tidak Ada</td>';
				}

				$("#tbl_data").html(html);
			}
		});

		$('#submit').submit(function(e) {
			e.preventDefault();
			$.ajax({
				url: '<?= base_url('upload_file/upload_file/tambah_data') ?>',
				type: "post",
				data: new FormData(this),
				processData: false,
				contentType: false,
				cache: false,
				async: false,
				success: function(data) {
					$('input[name="nama_file"]').val("");
					$('textarea[name="keterangan"]').val("");
					$('#addModal').modal('hide');
					tampil_data()
					Swal.fire({
						icon: 'success',
						title: 'Success',
						text: 'Data Berhasil Disimpan.',
						showConfirmButton: false,
						timer: 1500
					})
				},
				error: function(data) {
					alert("fail");
				}
			});
		});

	}

	function tambah_data() {
		$('#addModal').modal('show');
	}
</script>
