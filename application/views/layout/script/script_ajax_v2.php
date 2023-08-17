<script>
    $(document).ready(function() {
        // alert('haha');
        tampil_data()
    });

    function tambah_data() {
        $('#addModal').modal('show');
    }

    function tampil_data() {
        $.ajax({
            type: "POST",
            url: "<?= base_url('ajax/ajax_v2/tampil_data'); ?>",
            dataType: "json",
            success: function(response) {
                let html = '';
                var key = 1;
                response.forEach((val) => {
                    html += '<tr>' +
                        '<td>' + key++ + '</td>' +
                        '<td>' + val.nama + '</td>' +
                        '<td>' + val.jurusan + '</td>' +
                        '<td style="width: 16.66%;">' +
                        '<span>' +
                        '<button onclick="edit_data(&apos;' + val.id + '&apos;)" class="btn btn-primary btn-sm btn_edit"><i class="fa fa-edit"> Edit</i></button>' +
                        '<button onclick="hapus_data(&apos;' + val.id + '&apos;)" style="margin-left: 5px;"  class="btn btn-danger btn-sm btn_hapus"><i class="fa fa-trash"> Hapus</i></button>' +
                        '</span>' + '</td>' +
                        +'</tr>';
                });

                if (response.length <= 0) {
                    html = "<td>Data Tidak Ada</td>";
                }
                $("#tbl_data").html(html);
            }
        });
    }

    function btn_add_data() {
        var nama = $('input[name="nama"]').val();
        var jurusan = $('select[name="jurusan"]').val();
        $.ajax({
            type: "POST",
            url: "<?= base_url('ajax/ajax_v2/tambah_data'); ?>",
            data: {
                nama: nama,
                jurusan: jurusan,
            },
            success: function(response) {
                $('input[name="nama"]').val("");
                $('select[name="jurusan"]').val("");
                $('#addModal').modal('hide');
                tampil_data()

                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Data Berhasil Disimpan.',
                    showConfirmButton: false,
                    timer: 1500
                })
            }
        });
    }

    function hapus_data(id) {
        var status = confirm('Yakin Menghapus Data!');
        if (status) {
            $.ajax({
                type: "POST",
                url: "<?= base_url('ajax/ajax_v2/hapus_data'); ?>",
                data: {
                    id: id
                },
                success: function(response) {
                    tampil_data()
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Data Berhasil Didelete.',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            });
        }
    }

    function edit_data(id) {
        $('#editModal').modal('show');
        $.ajax({
            type: "POST",
            url: "<?= base_url('ajax/ajax_v2/tampil_data_id'); ?>",
            data: {
                id: id
            },
            dataType: 'json',
            success: function(response) {
                $('input[name="id"]').val(response.id);
                $('input[name="nama"]').val(response.nama);
                // $("#jurusan").val(response.jurusan).change();
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
</script>