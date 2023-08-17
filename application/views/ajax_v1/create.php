<!-- <form action="</?= base_url('mahasiswa/simpan_mahasiswa'); ?>" method="POST"> -->
<form id="form" method="POST">
    <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukan Nama">
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

    <button type="submit" class="btn btn-primary" onclick="save_data()">Save</button>
</form>
<script>
    function save_data() {
        var data = $('#form').serialize();
        $.ajax({
            type: "POST",
            url: "<?= base_url('ajax/ajax_v1/simpan_mahasiswa'); ?>",
            data: data,
            success: function(response) {
                $('#tampil').load('<?= base_url('ajax/ajax_v1/tampil_mahasiswa'); ?>');
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Data Berhasil Disimpan.',
                    showConfirmButton: false,
                    timer: 1500
                });
                location.reload();
            }
        });
    }
</script>