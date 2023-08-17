<style>
	.ring_n {
		position: absolute;
		top: 50%;
		left: 50%;
		transform: translate(-50%, -50%);
		width: 150px;
		height: 150px;
		background: transparent;
		border: 3px solid #3c3c3c;
		border-radius: 50%;
		text-align: center;
		line-height: 150px;
		font-family: sans-serif;
		font-size: 20px;
		color: #fff000;
		letter-spacing: 4px;
		text-transform: uppercase;
		text-shadow: 0 0 10px #fff000;
		box-shadow: 0 0 20px rgba(0, 0, 0, .5);
	}

	.ring_n:before {
		content: '';
		position: absolute;
		top: -3px;
		left: -3px;
		width: 100%;
		height: 100%;
		border: 3px solid transparent;
		border-top: 3px solid #fff000;
		border-right: 3px solid #fff000;
		border-radius: 50%;
		animation: animateC 2s linear infinite;
	}

	@keyframes animateC {
		0% {
			transform: rotate(0deg);
		}

		100% {
			transform: rotate(360deg);
		}
	}
</style>


<section class="content">
	<div class="container-fluid pt-3">

		<div class="card card-default color-palette-box">
			<div class="card-header">
				<h3 class="card-title"> <i class="fas fa-tag"></i> <?= $sub_judul1; ?> <?= $sub_judul; ?></h3>
			</div>
			<div class="card-body">
				<!-- Table List -->
				<div class="table-responsive mt-3">
					<div class="col-sm-6">
						<div class="form-group">
							<input type="text" id="search" placeholder="Cari" class="form-control">
						</div>
					</div>
					<!-- Loading -->
					<div id="imgSpinner1" class="ring_n" style="display: none;">Loading<span></span></div>
					<table class="table table-striped table-bordered table-hover" id="Datatables" style="width:100%">
						<thead>
							<tr>
								<th class="text-center">No</th>
								<th>Nama</th>
								<th>Jurusan</th>
								<th style="width: 100px;">Action</th>
							</tr>
						</thead>
						<tbody>
						</tbody>
					</table>
				</div>
			</div>
			<!-- /.card-body -->
		</div>
	</div><!-- /.container-fluid -->
</section>

<!-- Modal Edit-->
<div id="editModal" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Edit Data</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<form id="form_edit">
				<div class="modal-body">
					<div class="form-group">
						<label for="nama">Nama</label>
						<input type="hidden" name="id" class="form-control" id="id">
						<input type="text" name="nama" class="form-control" id="nama">
					</div>
					<div class="form-group">
						<label for="nama">Jurusan</label>
						<select name="jurusan" id="jurusan" class="form-control">
							<option value="TI">Teknik Informatika</option>
							<option value="SI">Sistem Informasi</option>
							<option value="TK">Teknik Komputer</option>
							<option value="MI">Manajemen Informatika</option>
						</select>
					</div>

				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-success" onclick="btn_update_data()">Update</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</form>
		</div>

	</div>
</div>
<script>
	$(document).ready(function() {
		dataTable = function(search) {
			var parameter = {
				search: search
			};
			$('table#listMR').DataTable({
				'processing': true,
				'serverSide': true,
				'serverMethod': 'post',
				"lengthChange": false,
				"bDestroy": true,
				"ordering": false,
				"info": true,
				"responsive": true,
				'searching': false, // Remove default Search Control
				"language": {
					'processing': '<i class="fa fa-spinner fa-spin fa-3x fa-fw text-danger"></i><span class="sr-only text-danger">LOADING...</span> '
				},
				'ajax': {
					'url': '<?= base_url('mytask/pengajuan_sponsor/datatable'); ?>',
					'data': parameter
				},
				'columns': [{
						data: 'no'
					},
					{
						data: 'no_pengajuan'
					},
					{
						data: 'tanggal_pengajuan'
					},
					{
						data: 'periode_omset'
					},
					{
						data: 'grup_omset'
					},
					{
						data: 'nominal'
					},
					{
						data: 'kode_cust'
					},
					{
						data: 'last_status'
					},
					{
						data: 'aksi'
					}
				]
			});
		};
		dataTable($('#search').val());

		$('#search').keyup(function() {
			dataTable($('#search').val());
		});
	});
</script>
