<section class="content">
    <div class="container-fluid pt-3">
        <div class="card card-primary color-palette-box">
            <div class="card-header" style="padding: 5px !important;">
                <h3 class="card-title">
                    <?= $sub_judul1; ?> <?= $sub_judul; ?>
                </h3>
                <a href="<?= base_url('crud/crud_v1'); ?>" class="btn btn-secondary btn-sm mb-1 float-sm-right"><i class="fa fa-arrow-left"></i></a>
            </div>
            <div class="card-body">
                <!-- Manggil ID cara 1 -->
                <form method="POST" action="<?= base_url('crud/crud_v1/update/') . $get_edit->id ?>">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" name="nama" id="nama" value="<?= $get_edit->nama; ?>">
                        <!-- Manggil ID cara 2 -->
                        <!-- <input type="hidden" class="form-control" name="id" id="id" value="<?= $get_edit->id; ?>"> -->
                    </div>
                    <div class="form-group">
                        <label for="jurusan">Jurusan</label>
                        <select name="jurusan" id="jurusan" class="form-control">
                            <option value="TI" <?php if ($get_edit->jurusan == 'TI') {
                                                    echo "selected";
                                                } ?>>Teknik Informatika</option>
                            <option value="SI" <?php if ($get_edit->jurusan == 'SI') {
                                                    echo "selected";
                                                } ?>>Sistem Informasi</option>
                            <option value="TK" <?php if ($get_edit->jurusan == 'TK') {
                                                    echo "selected";
                                                } ?>>Teknik Komputer</option>
                            <option value="MI" <?php if ($get_edit->jurusan == 'MI') {
                                                    echo "selected";
                                                } ?>>Manajemen Informatika</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"> Update</i></button>
                </form>
            </div>
        </div>
    </div>
</section>