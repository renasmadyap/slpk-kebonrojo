<?= $this->session->flashdata('pesan'); ?>
<div class="card shadow-sm border-bottom-danger">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
                <h4 class="h5 align-middle m-0 font-weight-bold text-danger">
                    Data Kiriman P.U Luar Negeri (Koreksi)
                </h4>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped w-100 dt-responsive nowrap" id="dataTable">
            <thead>
                <tr>
                    <th>No. </th>
					<th>Nippos</th>
					<th>Nama Petugas</th>
                    <th>Nama Mitra</th>
                    <th>Jadwal P.U KE</th>
					<th>Tanggal Entry</th>
                    <th>Jam Entry</th>
					<th>Aksi</th>
					<th>JUMLAH Dokumen</th>
					<th>JUMLAH Barang</th>
					<th>TOTAL</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                if ($mandor_koreksiln) :
                    foreach ($mandor_koreksiln as $kml) :
                        ?>
                        <tr>
                            <td><?= $no++; ?></td>
							<td><?= $kml['nippos']; ?></td>
							<td><?= $kml['nama_petugas']; ?></td>
                            <td><?= $kml['nama_mitra']. ' | '. $kml['wilayah']; ?></td>
                            <td><?= $kml['jadwal_pu'];?></td>
							<td><?= $kml['tgl_masuk'];?></td>
							<td><?= $kml['jam_input'];?></td>
							<td>
								<a href="<?= base_url('mkoreksiln/detail/') . $kml['id_koreksiln'] ?>" class="btn btn-warning btn-circle btn-sm"><i class="fa fa-search"></i></a>
                            </td>
                            <td><?= $kml['jml_doc']; ?></td>
							<td><?= $kml['jml_brg']; ?></td>
							<td><?= $kml['total']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="7" class="text-center">
                            Data Kosong
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>