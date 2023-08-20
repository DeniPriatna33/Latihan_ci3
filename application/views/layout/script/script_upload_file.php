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
						'<td>' + no + '</td>' +
						'<td><img src="<?= base_url('assets/upload/') ?>' + val.nama_file + '"width="100px"> </td>' +
						'<td>' + val.keterangan + '</td>' +
						'<td><button onclick="edit_data(&apos;' + val.id + '&apos;)" class="btn btn-primary btn-sm btn_edit"><i class="fa fa-edit"> Edit</i></button>' +
						'<button onclick="hapus_data(&apos;' + val.id + '&apos;,&apos;' + val.nama_file + '&apos;)" style="margin-left: 5px;"  class="btn btn-danger btn-sm btn_hapus"><i class="fa fa-trash"> Hapus</i></button></td>' +
						+
						'</tr>';
				});

				if (data.length <= 0) { // Bila data kosong
					html = '<td colspan="5" class="text-center">Data Tidak Ada</td>';
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

	function edit_data(id) {
		$('#editModal').modal('show');
		$.ajax({
			type: "POST",
			url: "<?= base_url('upload_file/upload_file/tampil_data_id'); ?>",
			data: {
				id: id
			},
			dataType: 'json',
			success: function(response) {
				console.log(response);
				$('input[name="id"]').val(response.id);
				// $('input[name="nama_file_edit"]').val(response.nama_file);
				$('textarea[name="keterangan_edit"]').val(response.keterangan);
			}
		});
	}

	function hapus_data(id, nama_file) {
		$.ajax({
			type: "POST",
			url: "<?= base_url('upload_file/upload_file/delete_data') ?>",
			data: {
				id: id,
				nama_file: nama_file,
			},
			success: function(response) {
				tampil_data();
			}
		});
	}
</script>
