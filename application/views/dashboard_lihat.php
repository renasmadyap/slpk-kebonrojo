<div class="row">
	<?php if (is_mandor() || is_admin() || is_superuser()) : ?>
        <div class="col-auto">
                        <a href="<?= base_url('dashboard') ?>" class="btn btn-sm btn-secondary btn-icon-split">
                            <span class="icon">
                                <i class="fa fa-arrow-left"></i>
                            </span>
                            <span class="text">
                                Kembali
                            </span>
                        </a>
                    </div>
    </div>
<div class="row">
    <div class="col-xl-3 col-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Data Pickup Dalam Negeri</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $mandor_koreksi; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-folder fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<div class="col-xl-3 col-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Data Pickup Luar Negeri</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $mandor_koreksiln; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-folder fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- Pie Chart -->
    <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header bg-primary py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-white">Dashboard Pickup Dalam Negeri</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-pie pt-4 pb-2">
                    <div class="chartjs-size-monitor">
                        <div class="chartjs-size-monitor-expand">
                            <div class=""></div>
                        </div>
                        <div class="chartjs-size-monitor-shrink">
                            <div class=""></div>
                        </div>
                    </div>
                    <canvas id="myPieChart" width="302" height="245" class="chartjs-render-monitor" style="display: block; width: 302px; height: 245px;"></canvas>
                </div>
                <div class="mt-4 text-center small">
                    <span class="mr-2">
                        <i class="fas fa-circle text-primary"></i> INSTAN
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-circle text-danger"></i> POS EXPRESS
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-circle text-secondary"></i> PKH
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-circle text-success"></i> PERLAKSUS
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-circle text-info"></i> LOGISTIK
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-circle text-warning"></i> LAINNYA
                    </span>
                </div>
            </div>
        </div>
    </div>	
    <!-- Pie Chart1 -->
    <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header bg-primary py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-white">Dashboard Pickup Luar Negeri</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-pie pt-4 pb-2">
                    <div class="chartjs-size-monitor">
                        <div class="chartjs-size-monitor-expand">
                            <div class=""></div>
                        </div>
                        <div class="chartjs-size-monitor-shrink">
                            <div class=""></div>
                        </div>
                    </div>
                    <canvas id="myPieChart1" width="302" height="245" class="chartjs-render-monitor" style="display: block; width: 302px; height: 245px;"></canvas>
                </div>
                <div class="mt-4 text-center small">
                    <span class="mr-2">
                        <i class="fas fa-circle text-primary"></i> EMS
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-circle text-danger"></i> POS EXPORT
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-circle text-secondary"></i> PP CEPAT
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-circle text-success"></i> PP LAUT
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-circle text-info"></i> R - LN
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-circle text-dark"></i> E - PACK
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-circle text-warning"></i> LAINNYA
                    </span>
                </div>
            </div>
        </div>
    </div>	
    <div class="col-auto"></div><div class="col-auto"></div><div class="col-auto"></div>
	<?php endif; ?>
	<?php if (is_pickup()) : ?>
    <div class="col-md-4">
        <div class="card shadow mb-4">
            <div class="card-header bg-success py-3">
                <h6 class="m-0 font-weight-bold text-white text-center">5 Entry terakhir Pickup Dalam Negeri</h6>
            </div>
            <div class="table-responsive">
                <table class="table mb-0 table-sm table-striped text-center">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Nama Petugas</th>
							<th>Mitra</th>
                            <th>Total Pickup</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($transaksi['Pu_dn'] as $tb) : ?>
                            <tr>
                                <td><strong><?= $tb['tgl_masuk']; ?></strong></td>
                                <td><?= $tb['nama_petugas']; ?></td>
								<td><?= $tb['nama_mitra']; ?></td>
                                <td><span class="badge badge-danger"><?= $tb['total']; ?></span></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card shadow mb-4">
            <div class="card-header bg-danger py-3">
                <h6 class="m-0 font-weight-bold text-white text-center">5 Entry terakhir Pickup Luar Negeri</h6>
            </div>
            <div class="table-responsive">
                <table class="table mb-0 table-sm table-striped text-center">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Nama Petugas</th>
							<th>Mitra</th>
                            <th>Total Pickup</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($transaksi['Pu_ln'] as $tbk) : ?>
                            <tr>
                                <td><strong><?= $tbk['tgl_masuk']; ?></strong></td>
                                <td><?= $tbk['nama_petugas']; ?></td>
								<td><?= $tbk['nama_mitra']; ?></td>
                                <td><span class="badge badge-danger"><?= $tbk['total']; ?></span></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
	<?php endif; ?>
</div>