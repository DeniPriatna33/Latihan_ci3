<script>
    $(document).ajaxStart(function() {
        $("#ajax-wait").css({
            left: ($(window).width() - 32) / 2 + "px", // 32 = lebar gambar
            top: ($(window).height() - 32) / 2 + "px", // 32 = tinggi gambar
            display: "block"
        })
    }).ajaxComplete(function() {
        $("#ajax-wait").fadeOut();
        $('#myModal').modal("hide");
    });

    $(document).ready(function() {
        $.ajax({
            url: "<?= base_url('ajax/ajax_v1/tampil_mahasiswa'); ?>",
            type: "POST",
            dataType: "HTML",
            success: function(response) {
                $('#tampil').html(response)
                $('#myModal').modal("hide");
            }
        });
    });
</script>