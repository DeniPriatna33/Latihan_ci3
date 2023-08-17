<section class="content">
    <div class="container-fluid pt-3">

        <!-- Buat Alert -->
        <?php if ($this->session->flashdata('message')) : ?>
            <div class="alert alert-success">
                <?php echo $this->session->flashdata('message'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>
        <!-- End Alert -->

        <div class="card card-default color-palette-box">
            <div class="card-header">
                <h3 class="card-title"> <i class="fas fa-tag"></i> <?= $sub_judul1; ?> <?= $sub_judul; ?></h3>
            </div>
            <div class="card-body">
                <a href="<?= base_url('multiple/multiple_v1/add'); ?>" class="btn btn-info btn-sm">Tambah Data</a>
                <!-- Table List -->
                <div class="table-responsive mt-3">
                    <form method="post" action="<?= base_url('multiple/multiple_v1/delete_all') ?>" id="form-delete">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th>Nama</th>
                                    <th>Jurusan</th>
                                    <th style="width: 100px;">Action</th>
                                    <th><input type="checkbox" onchange="checkAll(this)" name="chk[]"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($query as $dt) { ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $dt->nama; ?></td>
                                        <td><?= $dt->jurusan; ?></td>
                                        <td>
                                            <button class="btn btn-warning btn-sm" onclick="edit_data('<?= $dt->id ?>','<?= $dt->nama ?>','<?= $dt->jurusan ?>')"><i class="fa fa-edit"></i></button>
                                            <button class="btn btn-danger btn-sm" onclick="delete_data('<?= $dt->id ?>')"><i class="fa fa-trash"></i></button>
                                        </td>
                                        <td><input type="checkbox" name="id[]" value="<?= $dt->id; ?>"></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                            <button type="button" class="btn btn-danger btn-xs mb-1" onclick="delete_all()" style="float: right;"><i class="fa fa-trash-alt"> DELETE All</i></button>
                        </table>
                    </form>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Modal Edit -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah <?= $sub_judul; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="<?= base_url('crud/crud_v2/update'); ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" name="nama" id="nama_edit">
                        <input type="hidden" class="form-control" name="id" id="id_edit">
                    </div>
                    <div class="form-group">
                        <label for="jurusan">Jurusan</label>
                        <select name="jurusan" id="jurusan_edit" class="form-control">
                            <option value="TI">Teknik Informatika</option>
                            <option value="SI">Sistem Informasi</option>
                            <option value="TK">Teknik Komputer</option>
                            <option value="MI">Manajemen Informatika</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"> Update</i></button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function checkAll(ele) {
        var checkboxes = document.getElementsByTagName('input');
        if (ele.checked) {
            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i].type == 'checkbox') {
                    checkboxes[i].checked = true;
                }
            }
        } else {
            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i].type == 'checkbox') {
                    checkboxes[i].checked = false;
                }
            }
        }
    }


    function delete_data($id) {
        Swal.fire({
            title: 'Apakah Kamu Yakin?',
            text: "Anda tidak akan dapat memulihkan item ini!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                if (result.isConfirmed) {
                    // Redirect to delete controller method or perform your delete logic here
                    window.location.href = '<?= base_url("crud/crud_v1/delete_data/") ?>' + $id; // Buat Manggil Controller Javascript
                }
            } else {
                return false; // Cancel the deletion
            }
        });
    }


    function delete_all() {
        Swal.fire({
            title: 'Apakah Kamu Yakin?',
            text: "Anda tidak akan dapat memulihkan item ini!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                if (result.isConfirmed) {
                    // Redirect to delete controller method or perform your delete logic here
                    $("#form-delete").submit(); // Submit form
                }
            } else {
                return false; // Cancel the deletion
            }
        });
    }


    function edit_data(id, nama, jurusan) {
        $('#editModal').modal('show');
        $('#id_edit').val(id);
        $('#nama_edit').val(nama);
        $('#jurusan_edit').val(jurusan);
    }
</script>