<div class="col-md-12">
          <div class="card card-outline card-success">
            <div class="card-header">
              <h3 class="card-title">
                <?= $subjudul ?>
              </h3>
            </div>

            <?php
                session();
                $validasi = \Config\Services::validation(); 
            ?>

            <div class="card-body">
                <?php

                    use CodeIgniter\Database\BaseUtils;

                    if(session()->get('pesan')){
                    echo '<div class="alert alert-success">';
                    echo session()->get('pesan');
                    echo '</div>';
                    }

                ?>

            <?php foreach($keuangan as $key => $d){ 
                echo form_open_multipart('Keuangan/Edit/' . $d['id_keuangan'])
            ?>
            <!-- /.card-header -->
            
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>SPP</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Rp</div>
                                </div>
                                <input name="spp" value="<?= rupiah($d['spp']) ?>" class="form-control">
                            </div>   
                        </div>
                        <div class="form-group">
                            <label>UKK</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Rp</div>
                                </div>
                                <input name="ukk" value="<?= rupiah($d['ukk']) ?>" class="form-control">
                            </div>
                            
                        </div>
                        <div class="form-group">
                            <label>ANBK</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Rp</div>
                                </div>
                                <input name="anbk" value="<?= rupiah($d['anbk']) ?>" class="form-control">
                            </div>
                            
                        </div>
                        <div class="form-group">
                            <label>UAS</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Rp</div>
                                </div>
                                <input name="uas" value="<?= rupiah($d['uas']) ?>" class="form-control">
                            </div>
                        
                        </div>
                        <div class="form-group">
                            <label>US</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Rp</div>
                                </div>
                                <input name="us" value="<?= rupiah($d['us']) ?>" class="form-control">
                            </div>
                        
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label>Raport</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Rp</div>
                                </div>
                                <input name="raport" value="<?= rupiah($d['raport']) ?>" class="form-control">
                            </div>   
                        </div>
                        <div class="form-group">
                            <label>ID Card</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Rp</div>
                                </div>
                                <input name="card" value="<?= rupiah($d['card']) ?>" class="form-control">
                            </div>   
                        </div>
                        <div class="form-group">
                            <label>Batik</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Rp</div>
                                </div>
                                <input name="batik" value="<?= rupiah($d['batik']) ?>" class="form-control">
                            </div>   
                        </div>
                        <div class="form-group">
                            <label>Training</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Rp</div>
                                </div>
                                <input name="training" value="<?= rupiah($d['training']) ?>" class="form-control">
                            </div>   
                        </div>
                        <div class="form-group">
                            <label>Pakaian Jurusan</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Rp</div>
                                </div>
                                <input name="pj" value="<?= rupiah($d['pj']) ?>" class="form-control">
                            </div>   
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
            </div>
            <?php echo form_close() ?>
            <?php } ?>
          </div>
        </div>
        <!-- /.col-->



       