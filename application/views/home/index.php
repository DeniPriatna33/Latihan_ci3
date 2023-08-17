<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Title</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive mt-3">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Jurusan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($query as $dt) { ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $dt->nama; ?></td>
                                <td><?= $dt->jurusan; ?></td>
                                <td>
                                    <a href="<?= base_url('home/edit_data/') . $dt->id ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            Footer
        </div>
        <!-- /.card-footer-->
    </div>
    <!-- /.card -->

</section>
<!-- /.content -->