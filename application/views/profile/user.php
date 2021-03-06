<div class="card p-2 shadow-sm border-bottom-danger">
    <div class="card-header bg-white">
        <h4 class="h5 align-middle m-0 font-weight-bold text-danger">
            <?= userdata('nama'); ?>
        </h4>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-10">
                <table class="table">
                    <tr>
                        <th width="200">Nippos</th>
                        <td><?= userdata('nippos'); ?></td>
                    </tr>
                    <tr>
                        <th>Nomor Telepon</th>
                        <td><?= userdata('no_telp'); ?></td>
                    </tr>
                    <tr>
                        <th>Role</th>
                        <td class="text-capitalize"><?= userdata('role'); ?></td>
                    </tr>
                </table>
            </div>
            <div class="col-md-2 mb-4 mb-md-0">
                <a href="<?= base_url('profile/setting'); ?>" class="btn btn-sm btn-block btn-danger"><i class="fa fa-edit"></i> Edit Profile</a>
                <a href="<?= base_url('profile/ubahpassword'); ?>" class="btn btn-sm btn-block btn-danger"><i class="fa fa-lock"></i> Ubah Password</a>
            </div>
        </div>
    </div>
</div>