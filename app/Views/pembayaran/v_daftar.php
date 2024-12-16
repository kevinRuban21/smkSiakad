<div class="col-md-12">
            <div class="card card-outline card-success">
              <div class="card-header">
                <h3 class="card-title"> 
                    Daftar Pembayaran
                </h3>

                <div class="card-tools">
                   
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <?php foreach($pemb as $key => $d){ ?>
                <table class="table table-borderless table-sm">
                        <tr>
                            <th  width='150px'>Nama Siswa</th>
                            <td>:</td>
                            <td><?= $d['nama_siswa'] ?></td>
                        </tr>
                        <tr>
                            <th width='150px'>NISN</th>
                            <td>:</td>
                            <td><?= $d['nisn'] ?></td>   
                        </tr>
                        <tr>
                            <th width='150px'>Jurusan</th>
                            <td>:</td>
                            <td><?= $d['jurusan'] ?></td>   
                        </tr> 
                    </table><br>
                <?php } ?>
                <?php

                                use CodeIgniter\Database\BaseUtils;

                    if(session()->get('insert')){
                        echo '<div class="alert alert-success">';
                        echo session()->get('insert');
                        echo '</div>';
                    }
                    if(session()->get('update')){
                        echo '<div class="alert alert-success">';
                        echo session()->get('update');
                        echo '</div>';
                    }
                    if(session()->get('delete')){
                        echo '<div class="alert alert-danger">';
                        echo session()->get('delete');
                        echo '</div>';
                    }
                ?>
                <?php foreach($pemb as $key => $d){ 
                    echo form_open_multipart('Pembayaran/Bayar/' . $d['id_pemb_siswa'] . '/' . $d['id_siswa'] .'/' . $d['id_jurusan']);

                    echo form_hidden($d['id_pemb_siswa'] . 'id_pemb_siswa', $d['id_pemb_siswa']);
                ?>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr class="text-center bg-success">
                            <th>Jenis Pembayaran</th>
                            <th>Jumlah Bayar</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <tr>
                            <td>SPP</td>
                            <td>
                                <a href="<?= base_url('Pembayaran/BayarSPP/' . $d['id_pemb_siswa'] . '/' . $d['id_siswa'] . '/' . $d['id_jurusan']) ?>" class="btn btn-warning btn-sm mr-2 ml-2"><i class="fas fa-table"></i> Daftar Pembayaran SPP</a>
                            </td>
                        </tr>
                        <tr>
                            <td>Raport</td>
                            <td>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Rp</div>
                                    </div>
                                    <input name="pemb_raport" value="<?= rupiah($d['pemb_raport']) ?>" class="form-control">
                                </div> 
                            </td>
                        </tr>
                        <tr>
                            <td>ID Card</td>
                            <td>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Rp</div>
                                    </div>
                                    <input name="pemb_card" value="<?= rupiah($d['pemb_card']) ?>" class="form-control">
                                </div> 
                            </td>
                        </tr>
                        <tr>
                            <td>Batik</td>
                            <td>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Rp</div>
                                    </div>
                                    <input name="pemb_batik" value="<?= rupiah($d['pemb_batik']) ?>" class="form-control">
                                </div> 
                            </td>
                        </tr>
                        <tr>
                            <td>Training</td>
                            <td>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Rp</div>
                                    </div>
                                    <input name="pemb_training" value="<?= rupiah($d['pemb_training']) ?>" class="form-control">
                                </div> 
                            </td>
                        </tr>
                        <tr>
                            <td>Pakaian Jurusan</td>
                            <td>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Rp</div>
                                    </div>
                                    <input name="pemb_jurusan" value="<?= rupiah($d['pemb_jurusan']) ?>" class="form-control">
                                </div> 
                            </td>
                        </tr>
                        <tr>
                            <td>UKK</td>
                            <td>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Rp</div>
                                    </div>
                                    <input name="pemb_ukk" value="<?= rupiah($d['pemb_ukk']) ?>" class="form-control">
                                </div> 
                            </td>
                        </tr>
                        <tr>
                            <td>ANBK</td>
                            <td>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Rp</div>
                                    </div>
                                    <input name="pemb_anbk" value="<?= rupiah($d['pemb_anbk']) ?>" class="form-control">
                                </div> 
                            </td>
                        </tr>
                        <tr>
                            <td>UAS</td>
                            <td>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Rp</div>
                                    </div>
                                    <input name="pemb_uas" value="<?= rupiah($d['pemb_uas']) ?>" class="form-control">
                                </div> 
                            </td>
                        </tr>
                        <tr>
                            <td>US</td>
                            <td>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Rp</div>
                                    </div>
                                    <input name="pemb_us" value="<?= rupiah($d['pemb_us']) ?>" class="form-control">
                                </div> 
                            </td>
                        </tr>
                    </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
              <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
            </div>
            <?php echo form_close() ?>
            <?php } ?>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->

            