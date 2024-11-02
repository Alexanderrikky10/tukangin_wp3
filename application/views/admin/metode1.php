<main id="main" class="main">

    <div class="row">
        <div class="col-lg-6">


            <?= $this->session->flashdata('message'); ?>

            <a class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahMetodeBayarModel">
                Metode Bayar Baru
            </a>



            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">metode</th>
                        <th scope="col">Rekening</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($metode as $m) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $m['m_bayar']; ?></td>
                            <td><?= $m['rekening']; ?></td>
                            <td>
                                <a data-bs-toggle="modal" data-bs-target="#editMetodeModal<?= $m['id'] ?>" class="btn btn-outline-info">edit</a>
                                <a href="<?= base_url('admin/hapuspembayaran/') . $m['id'] ?>" onclick="return confirm('Kamu yakin akan menghapus <?= $title . ' ' . $m['m_bayar']; ?> ?');" class="btn btn-outline-danger"><i class="fas fa-trash"></i> hapus</a>
                            </td>
                        </tr>
                        <?php $i++ ?>

                        <!-- edit Metode Bayar  -->

                        <div class="modal fade" id="editMetodeModal<?= $m['id'] ?>" tabindex="-1" aria-labelledby="editMetodeModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="editMetodeModalLabel">Edit Metode Bayar</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="<?= base_url('admin/editMetode'); ?>" method="post" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <input type="hidden" name="id" id="id" value="<?= $m['id'] ?>">
                                            <div class="form-group pt-3">
                                                <input type="text" class="form-control" id="m_bayar" name="m_bayar" placeholder="Nama metode baru" value="<?= $m['m_bayar'] ?>">
                                            </div>
                                            <div class="form-group pt-3">
                                                <input type="text" class="form-control" id="rekening" name="rekening" placeholder="Rekening baru" value="<?= $m['rekening'] ?>">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Tambah</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>




</main>



<!-- Modal tambah bayar  -->
<div class="modal fade" id="tambahMetodeBayarModel" tabindex="-1" aria-labelledby="tambahMetodeBayarModelLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="tambahMetodeBayarModelLabel">Tambah Metode Bayar</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('admin/metodebayar'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group pt-3">
                        <input type="text" class="form-control" id="m_bayar" name="m_bayar" placeholder="Nama metode baru">
                    </div>
                    <div class="form-group pt-3">
                        <input type="text" class="form-control" id="rekening" name="rekengin" placeholder="Rekening baru">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>