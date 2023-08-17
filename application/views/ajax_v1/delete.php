<form method="post_delete" id="form">
    <p>Yakin ingin menghapus mahasiswa <?= $get_edit->id; ?> - <?= $get_edit->nama; ?> </p>
    <input type="hidden" name="id" value="<?= $get_edit->id; ?>">
    <button type="button" class="btn btn-danger" onclick="tombol_hapus('<?= $get_edit->id; ?>')">Hapus</button>
</form>
<script>
    function tombol_hapus(id) {
        $.ajax({
            type: "POST",
            url: "<?= base_url('ajax/ajax_v1/delete_data'); ?>",
            data: {
                id: id
            },
            success: function(data) {
                $('#tampil').load('<?= base_url('ajax/ajax_v1/tampil_mahasiswa'); ?>')
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Data Berhasil Didelete.',
                    showConfirmButton: false,
                    timer: 1500
                })
                location.reload()
            }
        });
    }
</script>