<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card mt-3">
                    <div class="card-header">
                        <h3 class="card-title"><?= $sub_judul; ?></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <button class="btn btn-primary btn-sm" onclick="tambah_data()"><i class="fa fa-plus"> Tambah</i></button>
                        <table class="table table-bordered mt-3">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Jurusan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($mahasiswa as $dt) { ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $dt->nama; ?></td>
                                        <td><?= $dt->jurusan; ?></td>
                                        <td>
                                            <button class="btn btn-warning btn-sm" onclick="edit_data('<?= $dt->id; ?>')"><i class="fa fa-edit"> Edit</i></button>
                                            <button class="btn btn-danger btn-sm" onclick="delete_data('<?= $dt->id; ?>')"><i class="fa fa-trash"> Delete</i></button>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.card -->

            </div>
        </div>
</section>


<!-- The Modal -->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="judul"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="tampil_modal">
                    <!-- Data akan di tampilkan disini-->
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function tambah_data() {

        var aksi = 'Tambah Mahasiswa';
        $.ajax({
            url: '<?= base_url('ajax/ajax_v1/create'); ?>',
            method: 'post',
            data: {
                aksi: aksi
            },
            success: function(data) {
                $('#myModal').modal("show");
                $('#tampil_modal').html(data);
                document.getElementById("judul").innerHTML = 'Tambah Data';

            }
        });
    }

    function edit_data(id) {
        $.ajax({
            type: "POST",
            url: "<?= base_url('ajax/ajax_v1/edit'); ?>",
            data: {
                id: id,
            },
            success: function(data) {
                $('#myModal').modal("show");
                $('#tampil_modal').html(data);
                document.getElementById("judul").innerHTML = 'Edit Data';
            }
        });
    }

    function delete_data(id) {
        $.ajax({
            type: "POST",
            url: "<?= base_url('ajax/ajax_v1/delete'); ?>",
            data: {
                id: id
            },
            success: function(data) {
                $('#myModal').modal("show");
                $('#tampil_modal').html(data);
                document.getElementById("judul").innerHTML = 'Hapus Data';
            }
        });
    }
</script>