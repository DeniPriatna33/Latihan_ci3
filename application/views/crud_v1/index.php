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
                <a href="<?= base_url('crud/crud_v1/create'); ?>" class="btn btn-info btn-sm">Tambah Data</a>
                <!-- Table List -->
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
                        <tbody>
                            <?php $no = 1;
                            foreach ($query as $dt) { ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $dt->nama; ?></td>
                                    <td><?= $dt->jurusan; ?></td>
                                    <td>
                                        <a href="<?= base_url('crud/crud_v1/edit_data/') . $dt->id ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                        <button class="btn btn-danger btn-sm" onclick="delete_data('<?= $dt->id ?>')"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
    </div><!-- /.container-fluid -->
</section>

<script>
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
</script>