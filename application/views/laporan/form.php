<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow-sm border-bottom-danger">
            <div class="card-header bg-white py-3">
                <h4 class="h5 align-middle m-0 font-weight-bold text-danger">
                    Form Neraca Pick-Up
                </h4>
            </div>
            <div class="card-body">
                <?= $this->session->flashdata('pesan'); ?>
                <?= form_open(); ?>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="transaksi">REKAP DATA</label>
                    <div class="col-md-9">
                        <div class="custom-control custom-radio">
                            <input value="mandor_koreksi" type="radio" id="mandor_koreksi" name="transaksi" class="custom-control-input">
                            <label class="custom-control-label" for="mandor_koreksi">REKAP DATA KOREKSI DALAM NEGERI</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input value="mandor_koreksiln" type="radio" id="mandor_koreksiln" name="transaksi" class="custom-control-input">
                            <label class="custom-control-label" for="mandor_koreksiln">REKAP DATA KOREKSI LUAR NEGERI</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input value="pu_dn" type="radio" id="pu_dn" name="transaksi" class="custom-control-input">
                            <label class="custom-control-label" for="pu_dn">REKAP PICK-UP DALAM NEGERI</label>
                        </div>
						<div class="custom-control custom-radio">
                            <input value="pu_ln" type="radio" id="pu_ln" name="transaksi" class="custom-control-input">
                            <label class="custom-control-label" for="pu_ln">REKAP PICK-UP LUAR NEGERI</label>
                        </div>
                        <?= form_error('transaksi', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="nippos">Nippos</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('nippos'); ?>" name="nippos" id="nippos" type="text" class="form-control" placeholder="Nippos...">
                        <?= form_error('nippos', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-lg-3 text-lg-right" for="tanggal">Tanggal</label>
                    <div class="col-lg-9">
                        <div class="input-group">
                            <input value="<?= set_value('tanggal'); ?>" name="tanggal" id="tanggal" type="text" class="form-control" placeholder="Periode Tanggal">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fa fa-fw fa-calendar"></i></span>
                            </div>
                        </div>
                        <?= form_error('tanggal', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-9 offset-lg-3">
                        <button type="submit" class="btn btn-danger btn-icon-split">
                            <span class="icon">
                                <i class="fa fa-print"></i>
                            </span>
                            <span class="text">
                                Lihat Data
                            </span>
                        </button>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>