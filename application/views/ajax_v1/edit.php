<!-- <form action="</?= base_url('mahasiswa/simpan_mahasiswa'); ?>" method="POST"> -->
<form id="form_edit" method="POST">
    <div class="form-group">
        <label for="nama">Nama</label>
        <input type="hidden" name="id" class="form-control" id="id" value="<?= $get_edit->id; ?>">
        <input type="text" name="nama" class="form-control" id="nama" value="<?= $get_edit->nama; ?>">
    </div>
    <div class="form-group">
        <label for="nama">Jurusan</label>
        <select name="jurusan" id="jurusan" class="form-control">
            <option value="TI" <?php if ($get_edit->jurusan == 'TI') {
                                    echo 'selected';
                                } ?>>Teknik Informatika</option>
            <option value="SI" <?php if ($get_edit->jurusan == 'SI') {
                                    echo 'selected';
                                } ?>>Sistem Informasi</option>
            <option value="TK" <?php if ($get_edit->jurusan == 'TK') {
                                    echo 'selected';
                                } ?>>Teknik Komputer</option>
            <option value="MI" <?php if ($get_edit->jurusan == 'MI') {
                                    echo 'selected';
                                } ?>>Manajemen Informatika</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary" onclick="update_data()">Update</button>
</form>
<script>
    function update_data() {
        var form_edit = $('#form_edit').serialize();
        $.ajax({
            type: "POST",
            url: "<?= base_url('ajax/ajax_v1/update_mahasiswa'); ?>",
            data: form_edit,
            success: function(data) {
                $('#tampil').load('<?= base_url('ajax/ajax_v1/tampil_mahasiswa'); ?>')
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Data Berhasil Diupdate.',
                    showConfirmButton: false,
                    timer: 1500
                });
                window.location.reload()
            }
        });
    }
</script>