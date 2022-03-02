<?= $this->session->flashdata('pesan'); ?>
<div class="card shadow-sm border-bottom-danger">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
                <h4 class="h5 align-middle m-0 font-weight-bold text-danger">
                    Data Kiriman (Koreksi) Dalam Negeri
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
                if ($mandor_koreksi) :
                    foreach ($mandor_koreksi as $km) :
                        ?>
                        <tr>
                            <td><?= $no++; ?></td>
							<td><?= $km['nippos']; ?></td>
							<td><?= $km['nama_petugas']; ?></td>
                            <td><?= $km['nama_mitra']. ' | '. $km['wilayah']; ?></td>
                            <td><?= $km['jadwal_pu'];?></td>
							<td><?= $km['tgl_masuk'];?></td>
							<td><?= $km['jam_input'];?></td>
							<td>
								<a href="<?= base_url('mkoreksi/detail/') . $km['id_koreksi'] ?>" class="btn btn-warning btn-circle btn-sm"><i class="fa fa-search"></i></a>
                            </td>
                            <td><?= $km['jml_doc']; ?></td>
							<td><?= $km['jml_brg']; ?></td>
							<td><?= $km['total']; ?></td>
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