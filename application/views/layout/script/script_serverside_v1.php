<script type="text/javascript">
	$(document).ready(function() {
		table = $('#Datatables').DataTable({
			"language": {
				"url": "//cdn.datatables.net/plug-ins/1.10.24/i18n/Indonesian.json"
			},
			"processing": true,
			"serverSide": true,
			"order": [],
			"ajax": {
				//panggil method ajax list dengan ajax
				"url": '<?= base_url("serverside/Serverside_v1/ajax_list") ?>',
				"type": "POST"
			}
		});
	});
	
	function edit_n(id) {
		$('#editModal').modal('show');
		$.ajax({
			type: "POST",
			url: "<?= base_url('serverside/Serverside_v1/get_id'); ?>",
			data: {
				id: id
			},
			dataType: 'json',
			success: function(response) {
				console.log(response);
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
			url: "<?= base_url('serverside/Serverside_v1/delete_data'); ?>",
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
			url: "<?= base_url('serverside/Serverside_v1/updated_data'); ?>",
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
