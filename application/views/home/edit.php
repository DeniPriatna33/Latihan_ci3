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
                <select id="mySelectionBox">
                    <option value="hello">Foo</option>
                    <option value="hello1">Foo1</option>
                    <option value="hello2">Foo2</option>
                    <option value="hello3">Foo3</option>
                </select>
            </div>
        </div>
    </div>
</section>