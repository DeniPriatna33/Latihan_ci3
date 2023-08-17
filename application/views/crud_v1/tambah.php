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
                <form method="POST" action="<?= base_url('crud/crud_v1/store'); ?>">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukan Nama">
                    </div>
                    <div class="form-group">
                        <label for="jurusan">Jurusan</label>
                        <select name="jurusan" id="jurusan" class="form-control">
                            <option value="TI">Teknik Informatika</option>
                            <option value="SI">Sistem Informasi</option>
                            <option value="TK">Teknik Komputer</option>
                            <option value="MI">Manajemen Informatika</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"> Save</i></button>
                </form>
            </div>
        </div>
    </div>
</section>