<section class="content">
	<div class="container-fluid pt-3">
		<!-- COLOR PALETTE -->
		<div class="card card-default color-palette-box">
			<div class="card-header">
				<h3 class="card-title">
					<i class="fas fa-tag"></i>
					Upload File CI V2
				</h3>
			</div>
			<div class="card-body">
				<button onclick="tambah_data()" class="btn btn-info btn-sm"><i class="fa fa-plus"> Tambah Data</i></button>
				<div class="table-responsive mt-3">
					<table class="table table-striped table-bordered table-hover">
						<thead>
							<tr>
								<th>No</th>
								<th>Gambar</th>
								<th>Jurusan</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody id="tbl_data">

						</tbody>
					</table>
				</div>
			</div>
			<!-- /.card-body -->
		</div>
	</div><!-- /.container-fluid -->
</section>

<!-- Modal Tambah-->
<div id="addModal" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Tambah Data</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" id="submit">
					<div class="form-group">
						<label for="nama_file">Nama File</label>
						<input type="file" name="nama_file" id="nama_file" class="form-control"></input>
					</div>
					<div class="form-group">
						<label for="keterangan">Keterangan</label>
						<textarea name="keterangan" id="keterangan" class="form-control" rows="5"></textarea>
					</div>
					<button type="submit" id="btn_upload" class="btn btn-success">Save</button>
				</form>
			</div>
		</div>

	</div>
</div>

<!-- Modal Edit-->
<div id="editModal" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Edit Data</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
				<div class="modal-body">
					<form class="form-horizontal" id="submit_update">
						<div class="form-group">
							<label for="nama_file">Nama File</label>
							<input type="file" name="nama_file_edit" id="nama_file_edit" class="form-control"></input>
						</div>
						<div class="form-group">
							<label for="keterangan">Keterangan</label>
							<textarea name="keterangan_edit" id="keterangan_edit" class="form-control" rows="5"></textarea>
						</div>
						<input type="hidden" name="id" id="id" class="form-control"></input>
						<button type="submit" id="btn_update" class="btn btn-success">Save</button>
					</form>
				</div>
		</div>

	</div>
</div>
