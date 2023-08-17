<script type="text/javascript">
	$(document).ready(function() {
		table = $('#Datatables').DataTable({
			'processing': true,
			'serverSide': true,
			'serverMethod': 'post',
			// "lengthChange": false,
			"bDestroy": true,
			"ordering": false,
			"info": true,
			"responsive": true,
			'searching': false, // Remove default Search Control
			"language": {
				'processing': '<i class="fa fa-spinner fa-spin fa-3x fa-fw text-danger"></i><span class="sr-only text-danger">LOADING...</span> '
			},
			'ajax': {
				'url': '<?= base_url('serverside/Serverside_v2/ajax_list'); ?>',
				'data': function(data) {
					var search = $('#search').val();
					// Append to data
					data.search = search;
				}
			},
			'columns': [{
					data: 'no'
				},
				{
					data: 'nama'
				},
				{
					data: 'jurusan'
				},
				{
					data: 'aksi'
				}
			]
		});

		$('#search').keyup(function() {
			table.draw();
		});

	});

	function edit_n(id) {
		$('#editModal').modal('show');
		$.ajax({
			type: "POST",
			url: "<?= base_url('serverside/Serverside_v2/get_id'); ?>",
			data: {
				id: id
			},
			dataType: 'json',
			success: function(response) {
				$('input[name="id"]').val(response.id);
				$('input[name="nama"]').val(response.nama);
				$('select[name="jurusan"]').val(response.jurusan).change();
			}
		});
	}

	function btn_update_data() {
		var form_edit = $('#form_edit').serialize();
		$.ajax({
			type: "POST",
			url: "<?= base_url('ajax/ajax_v2/ubah_data'); ?>",
			data: form_edit,
			success: function(response) {
				Swal.fire({
					icon: 'success',
					title: 'Success',
					text: 'Data Berhasil Diupdate.',
					showConfirmButton: false,
					timer: 1500
				})
				$('input[name="nama"]').val("");
				$('input[name="jurusan"]').val("");
				$("#editModal").modal('hide');
				tampil_data();
			}
		});
	}

	function delete_n(id) {
		$.ajax({
			type: "POST",
			url: "<?= base_url('serverside/Serverside_v2/delete_data'); ?>",
			data: {
				id: id
			},
			beforeSend: function() {
				$("#imgSpinner1").show();
			},
			success: function(response) {
				setTimeout(function() { //Loading 3 detik
					$("#imgSpinner1").hide();
					table.ajax.reload();
				}, 500);
			}
		});
	}

	function btn_update_data() {
		var form_edit = $('#form_edit').serialize();
		$.ajax({
			type: "POST",
			url: "<?= base_url('serverside/Serverside_v2/updated_data'); ?>",
			data: form_edit,
			success: function(response) {
				Swal.fire({
					icon: 'success',
					title: 'Success',
					text: 'Data Berhasil Diupdate.',
					showConfirmButton: false,
					timer: 1500
				})
				$('input[name="nama"]').val("");
				$('input[name="jurusan"]').val("");
				$("#editModal").modal('hide');
				tampil_data();
			}
		});
	}
</script>
