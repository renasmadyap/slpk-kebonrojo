<?= $this->session->flashdata('pesan'); ?>
<div class="card shadow-sm border-bottom-danger">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
                <h4 class="h5 align-middle m-0 font-weight-bold text-danger">
                    Data Mitra
                </h4>
            </div>
            <div class="col-auto">
                <a href="<?= base_url('mitra/add') ?>" class="btn btn-sm btn-danger btn-icon-split">
                    <span class="icon">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">
                        Tambah Mitra
                    </span>
                </a>
            </div>
            <div class="col-auto">
                <a href="<?= base_url('mitra/create') ?>" class="btn btn-sm btn-danger btn-icon-split">
                    <span class="icon">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">
                        Import Excel
                    </span>
                </a>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped w-100 dt-responsive nowrap" id="dataTable">
            <thead>
                <tr>
                    <th>No. </th>
                    <th>ID Mitra</th>
                    <th>Nama Mitra</th>
                    <th>Wilayah</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                if ($mitra) :
                    foreach ($mitra as $m) :
                        ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $m['id_mitra']; ?></td>
                            <td><?= $m['nama_mitra']; ?></td>
                            <td><?= $m['wilayah']; ?></td>
                            <td><?= $m['alamat']; ?></td>
                            <td>
                                <a href="<?= base_url('mitra/edit/') . $m['id_mitra'] ?>" class="btn btn-warning btn-circle btn-sm"><i class="fa fa-edit"></i></a>
                                <a onclick="return confirm('Yakin ingin hapus?')" href="<?= base_url('mitra/delete/') . $m['id_mitra'] ?>" class="btn btn-danger btn-circle btn-sm"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="2" class="text-center">
                            Data Kosong
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>