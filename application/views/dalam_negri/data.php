<?= $this->session->flashdata('pesan');?>
<div class="card shadow-sm border-bottom-danger">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
                <h4 class="h5 align-middle m-0 font-weight-bold text-danger">
                    Data P.U Dalam Negeri
                </h4>
                <h3 class="h5 align-middle m-0 font-weight-bold text-danger">
                    <?=Date('d-m-Y');?>
                </h3>
                <div class="col-auto">
                <a href="<?= base_url('pudn/add') ?>" class="btn btn-sm btn-danger btn-icon-split">
                    <span class="icon">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">
                        Entry Data
                    </span>
                </a>
                </div>
            </div> 
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped w-100 dt-responsive nowrap" id="dataTable">
            <thead>
                <tr>
                    <th>No. </th>
                    <th>Nama Mitra</th>
					<th>No. P.O.</th>
                    <th>Jadwal P.U KE</th>
					<th>Tujuan Kiriman</th>
					<th>Tanggal Input</th>
					<th>Jam Input</th>
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
                            <td><?= $dn['nama_mitra']. ' | '. $dn['wilayah']; ?></td>
							<td><?= $dn['no_po']; ?></td>
                            <td><?= $dn['jadwal_pu'];?></td>
							<td><?= $dn['tujuan_krm'];?></td>
							<td><?= $dn['tgl_masuk'];?></td>
							<td><?= $dn['jam_input'];?></td>
							<td>
								<a href="<?= base_url('pudn/detail/') . $dn['id_pu_dn'] ?>" class="btn btn-warning btn-circle btn-sm"><i class="fa fa-search"></i></a>
                                <a href="<?= base_url('pudn/edit/') . $dn['id_pu_dn'] ?>" class="btn btn-warning btn-circle btn-sm"><i class="fa fa-edit"></i></a>
                                <a onclick="return confirm('Yakin ingin hapus?')" href="<?= base_url('pudn/delete/') . $dn['id_pu_dn'] ?>" class="btn btn-danger btn-circle btn-sm"><i class="fa fa-trash"></i></a>
                            </td>
                            <td><?= $dn['jml_doc']; ?></td>
							<td><?= $dn['jml_brg']; ?></td>
							<td><?= $dn['total']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="11" class="text-center">
                            Data Kosong
                        </td>
                    </tr>
                <?php endif;  ?>
            </tbody>
        </table>
    </div>
</div>