<?= $this->session->flashdata('pesan');?>
<div class="card shadow-sm border-bottom-danger">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
                <h4 class="h5 align-middle m-0 font-weight-bold text-danger">
                    Data P.U
                </h4>
            </div>
            <div class="col-auto">
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
					<th>No. P.O.</th>
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
				if ($pu_dn):
                    foreach ($pu_dn as $dn) :
                        ?>
                        <tr>
                            <td><?= $no++; ?></td>
							<td><?= $dn['nippos']; ?></td>
							<td><?= $dn['nama_petugas']; ?></td>
                            <td><?= $dn['nama_mitra']. ' | '. $dn['wilayah']; ?></td>
							<td><?= $dn['no_po']; ?></td>
							<td><?= $dn['tgl_masuk'];?></td>
							<td><?= $dn['jam_input'];?></td>
							<td>
								<a href="<?= base_url('admindn/detail/') . $dn['id_pu_dn'] ?>" class="btn btn-warning btn-circle btn-sm"><i class="fa fa-search"></i></a>
                            </td>
                            <td><?= $dn['jml_doc']; ?></td>
							<td><?= $dn['jml_brg']; ?></td>
							<td><?= $dn['total']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="7" class="text-center">
                            Data Kosong
                        </td>
                    </tr>
                <?php endif;  ?>
            </tbody>
        </table>
    </div>
</div>