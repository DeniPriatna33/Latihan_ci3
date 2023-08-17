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
								<th>Nama</th>
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
			<!-- <div class="modal-footer">
				<button type="button" class="btn btn-success" onclick="btn_add_data()">Simpan</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div> -->
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
