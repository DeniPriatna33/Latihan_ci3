<section class="content">
    <div class="container-fluid pt-3">

        <div class="card card-default color-palette-box">
            <div class="card-header">
                <h3 class="card-title"> <i class="fas fa-tag"></i> <?= $sub_judul1; ?> <?= $sub_judul; ?></h3>
            </div>
            <div class="card-body">
                <form id="form" method="post">
                    <table class="table table-bordered">
                        <thead class="table-success">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col" class="text-end">Jurusan</th>
                                <th scope="col" class="NoPrint">
                                    <button type="button" class="btn btn-sm btn-success" onclick="BtnAdd()">+</button>
                                </th>
                            </tr>
                        </thead>
                        <tbody id="tbody_1">
                            <tr id="trow_1" class="">
                                <th scope="row">1</th>
                                <td><input type="text" class="form-control" name="nama[]"></td>
                                <td>
                                    <select name="jurusan[]" id="jurusan" class="form-control" onchange="Calc(this);">
                                        <option value="TI">Teknik Informatika</option>
                                        <option value="SI">Sistem Informasi</option>
                                        <option value="TK">Teknik Komputer</option>
                                        <option value="MI">Manajemen Informatika</option>
                                    </select>
                                </td>
                                <td class="NoPrint"><button type="button" class="btn btn-sm btn-danger" onclick="BtnDel(this)">X</button></td>
                            </tr>
                        </tbody>
                    </table>
                    <button type="button" class="btn btn-info btn-sm" onclick="save_data()"><i class="fa fa-save"> Save</i></button>
                </form>

            </div>
            <!-- /.card-body -->
        </div>
    </div><!-- /.container-fluid -->
</section>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script>
    // $(document).ready(function() {
    //     BtnAdd();
    // });

    function save_data() {
        var data = $('#form').serialize();
        $.ajax({
            type: "POST",
            url: "<?= base_url('multiple/multiple_v1/store'); ?>",
            data: data,
            success: function(response) {
                console.log(response);
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Data Berhasil Disimpan.',
                    showConfirmButton: false,
                    timer: 1500
                });
                window.location.href = '<?= base_url('multiple/multiple_v1') ?>';
            }
        });
    }


    function BtnAdd() {
        /*Add Button*/
        var v = $("#trow_1").clone().appendTo("#tbody_1");
        $(v).find("input").val('');
        $(v).find("th").first().html($('#tbody_1 tr').length);
    }

    function BtnDel(v) {
        /*Delete Button*/
        var table = document.getElementById("tbody_1");
        if (table.rows.length == 1) {
            alert('Row Sudah tidak bisa kurang dari 1');
        } else {
            $(v).parent().parent().remove();
            $("#tbody_1").find("tr").each(
                function(index) {
                    $(this).find("th").first().html(index + 1);
                }
            );

        }
    }
</script>