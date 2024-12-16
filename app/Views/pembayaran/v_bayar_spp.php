<div class="col-md-12">
    <div class="card card-outline card-success">
        <div class="card-header">
            <h3 class="card-title">
                Pembayaran
            </h3>
        </div>
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
        </div>
    </div>
</div>

<div class="col-md-6">
          <div class="card card-outline card-success">
            <div class="card-header">
              <h3 class="card-title">
                <b>Semester 1</b>
              </h3>
            </div>

            <?php
                session();
                $validasi = \Config\Services::validation(); 
            ?>

            <div class="card-body">

            <?php foreach($pemb as $key => $d){ 
                echo form_open_multipart('Pembayaran/PembSPP1/' . $d['id_pemb_siswa'] . '/' . $d['id_siswa'] . '/' . $d['id_jurusan'])
            ?>
            <!-- /.card-header -->
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Bulan 1</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Rp</div>
                                </div>
                                <input name="sem1_bulan1" value="<?= rupiah($d['sem1_bulan1']) ?>" class="form-control">
                            </div>   
                        </div>
                        <div class="form-group">
                            <label>Bulan 2</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Rp</div>
                                </div>
                                <input name="sem1_bulan2" value="<?= rupiah($d['sem1_bulan2']) ?>" class="form-control">
                            </div>
                            
                        </div>
                        <div class="form-group">
                            <label>Bulan 3</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Rp</div>
                                </div>
                                <input name="sem1_bulan3" value="<?= rupiah($d['sem1_bulan3']) ?>" class="form-control">
                            </div>
                            
                        </div>
                        <div class="form-group">
                            <label>Bulan 4</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Rp</div>
                                </div>
                                <input name="sem1_bulan4" value="<?= rupiah($d['sem1_bulan4']) ?>" class="form-control">
                            </div>
                        
                        </div>
                        <div class="form-group">
                            <label>Bulan 5</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Rp</div>
                                </div>
                                <input name="sem1_bulan5" value="<?= rupiah($d['sem1_bulan5']) ?>" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Bulan 6</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Rp</div>
                                </div>
                                <input name="sem1_bulan6" value="<?= rupiah($d['sem1_bulan6']) ?>" class="form-control">
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


        <div class="col-md-6">
          <div class="card card-outline card-success">
            <div class="card-header">
              <h3 class="card-title">
                <b>Semester 2</b>
              </h3>
            </div>

            <?php
                session();
                $validasi = \Config\Services::validation(); 
            ?>

            <div class="card-body">

            <?php foreach($pemb as $key => $d){ 
                echo form_open_multipart('Pembayaran/PembSPP2/' . $d['id_pemb_siswa'] . '/' . $d['id_siswa'] . '/' . $d['id_jurusan'])
            ?>
            <!-- /.card-header -->
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Bulan 1</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Rp</div>
                                </div>
                                <input name="sem2_bulan1" value="<?= rupiah($d['sem2_bulan1']) ?>" class="form-control">
                            </div>   
                        </div>
                        <div class="form-group">
                            <label>Bulan 2</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Rp</div>
                                </div>
                                <input name="sem2_bulan2" value="<?= rupiah($d['sem2_bulan2']) ?>" class="form-control">
                            </div>
                            
                        </div>
                        <div class="form-group">
                            <label>Bulan 3</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Rp</div>
                                </div>
                                <input name="sem2_bulan3" value="<?= rupiah($d['sem2_bulan3']) ?>" class="form-control">
                            </div>
                            
                        </div>
                        <div class="form-group">
                            <label>Bulan 4</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Rp</div>
                                </div>
                                <input name="sem2_bulan4" value="<?= rupiah($d['sem2_bulan4']) ?>" class="form-control">
                            </div>
                        
                        </div>
                        <div class="form-group">
                            <label>Bulan 5</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Rp</div>
                                </div>
                                <input name="sem2_bulan5" value="<?= rupiah($d['sem2_bulan5']) ?>" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Bulan 6</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Rp</div>
                                </div>
                                <input name="sem2_bulan6" value="<?= rupiah($d['sem2_bulan6']) ?>" class="form-control">
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


        <div class="col-md-6">
          <div class="card card-outline card-success">
            <div class="card-header">
              <h3 class="card-title">
                <b>Semester 3</b>
              </h3>
            </div>

            <?php
                session();
                $validasi = \Config\Services::validation(); 
            ?>

            <div class="card-body">

            <?php foreach($pemb as $key => $d){ 
                echo form_open_multipart('Pembayaran/PembSPP3/' . $d['id_pemb_siswa'] . '/' . $d['id_siswa'] . '/' . $d['id_jurusan'])
            ?>
            <!-- /.card-header -->
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Bulan 1</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Rp</div>
                                </div>
                                <input name="sem3_bulan1" value="<?= rupiah($d['sem3_bulan1']) ?>" class="form-control">
                            </div>   
                        </div>
                        <div class="form-group">
                            <label>Bulan 2</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Rp</div>
                                </div>
                                <input name="sem3_bulan2" value="<?= rupiah($d['sem3_bulan2']) ?>" class="form-control">
                            </div>
                            
                        </div>
                        <div class="form-group">
                            <label>Bulan 3</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Rp</div>
                                </div>
                                <input name="sem3_bulan3" value="<?= rupiah($d['sem3_bulan3']) ?>" class="form-control">
                            </div>
                            
                        </div>
                        <div class="form-group">
                            <label>Bulan 4</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Rp</div>
                                </div>
                                <input name="sem3_bulan4" value="<?= rupiah($d['sem3_bulan4']) ?>" class="form-control">
                            </div>
                        
                        </div>
                        <div class="form-group">
                            <label>Bulan 5</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Rp</div>
                                </div>
                                <input name="sem3_bulan5" value="<?= rupiah($d['sem3_bulan5']) ?>" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Bulan 6</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Rp</div>
                                </div>
                                <input name="sem3_bulan6" value="<?= rupiah($d['sem3_bulan6']) ?>" class="form-control">
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

        <div class="col-md-6">
          <div class="card card-outline card-success">
            <div class="card-header">
              <h3 class="card-title">
                <b>Semester 4</b>
              </h3>
            </div>

            <?php
                session();
                $validasi = \Config\Services::validation(); 
            ?>

            <div class="card-body">

            <?php foreach($pemb as $key => $d){ 
                echo form_open_multipart('Pembayaran/PembSPP4/' . $d['id_pemb_siswa'] . '/' . $d['id_siswa'] . '/' . $d['id_jurusan'])
            ?>
            <!-- /.card-header -->
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Bulan 1</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Rp</div>
                                </div>
                                <input name="sem4_bulan1" value="<?= rupiah($d['sem4_bulan1']) ?>" class="form-control">
                            </div>   
                        </div>
                        <div class="form-group">
                            <label>Bulan 2</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Rp</div>
                                </div>
                                <input name="sem4_bulan2" value="<?= rupiah($d['sem4_bulan2']) ?>" class="form-control">
                            </div>
                            
                        </div>
                        <div class="form-group">
                            <label>Bulan 3</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Rp</div>
                                </div>
                                <input name="sem4_bulan3" value="<?= rupiah($d['sem4_bulan3']) ?>" class="form-control">
                            </div>
                            
                        </div>
                        <div class="form-group">
                            <label>Bulan 4</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Rp</div>
                                </div>
                                <input name="sem4_bulan4" value="<?= rupiah($d['sem4_bulan4']) ?>" class="form-control">
                            </div>
                        
                        </div>
                        <div class="form-group">
                            <label>Bulan 5</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Rp</div>
                                </div>
                                <input name="sem4_bulan5" value="<?= rupiah($d['sem4_bulan5']) ?>" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Bulan 6</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Rp</div>
                                </div>
                                <input name="sem4_bulan6" value="<?= rupiah($d['sem4_bulan6']) ?>" class="form-control">
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

        <div class="col-md-6">
          <div class="card card-outline card-success">
            <div class="card-header">
              <h3 class="card-title">
                <b>Semester 5</b>
              </h3>
            </div>

            <?php
                session();
                $validasi = \Config\Services::validation(); 
            ?>

            <div class="card-body">

            <?php foreach($pemb as $key => $d){ 
                echo form_open_multipart('Pembayaran/PembSPP5/' . $d['id_pemb_siswa'] . '/' . $d['id_siswa'] . '/' . $d['id_jurusan'])
            ?>
            <!-- /.card-header -->
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Bulan 1</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Rp</div>
                                </div>
                                <input name="sem5_bulan1" value="<?= rupiah($d['sem5_bulan1']) ?>" class="form-control">
                            </div>   
                        </div>
                        <div class="form-group">
                            <label>Bulan 2</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Rp</div>
                                </div>
                                <input name="sem5_bulan2" value="<?= rupiah($d['sem5_bulan2']) ?>" class="form-control">
                            </div>
                            
                        </div>
                        <div class="form-group">
                            <label>Bulan 3</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Rp</div>
                                </div>
                                <input name="sem5_bulan3" value="<?= rupiah($d['sem5_bulan3']) ?>" class="form-control">
                            </div>
                            
                        </div>
                        <div class="form-group">
                            <label>Bulan 4</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Rp</div>
                                </div>
                                <input name="sem5_bulan4" value="<?= rupiah($d['sem5_bulan4']) ?>" class="form-control">
                            </div>
                        
                        </div>
                        <div class="form-group">
                            <label>Bulan 5</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Rp</div>
                                </div>
                                <input name="sem5_bulan5" value="<?= rupiah($d['sem5_bulan5']) ?>" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Bulan 6</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Rp</div>
                                </div>
                                <input name="sem5_bulan6" value="<?= rupiah($d['sem5_bulan6']) ?>" class="form-control">
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


        <div class="col-md-6">
          <div class="card card-outline card-success">
            <div class="card-header">
              <h3 class="card-title">
                <b>Semester 6</b>
              </h3>
            </div>

            <?php
                session();
                $validasi = \Config\Services::validation(); 
            ?>

            <div class="card-body">

            <?php foreach($pemb as $key => $d){ 
                echo form_open_multipart('Pembayaran/PembSPP6/' . $d['id_pemb_siswa'] . '/' . $d['id_siswa'] . '/' . $d['id_jurusan'])
            ?>
            <!-- /.card-header -->
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Bulan 1</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Rp</div>
                                </div>
                                <input name="sem6_bulan1" value="<?= rupiah($d['sem6_bulan1']) ?>" class="form-control">
                            </div>   
                        </div>
                        <div class="form-group">
                            <label>Bulan 2</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Rp</div>
                                </div>
                                <input name="sem6_bulan2" value="<?= rupiah($d['sem6_bulan2']) ?>" class="form-control">
                            </div>
                            
                        </div>
                        <div class="form-group">
                            <label>Bulan 3</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Rp</div>
                                </div>
                                <input name="sem6_bulan3" value="<?= rupiah($d['sem6_bulan3']) ?>" class="form-control">
                            </div>
                            
                        </div>
                        <div class="form-group">
                            <label>Bulan 4</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Rp</div>
                                </div>
                                <input name="sem6_bulan4" value="<?= rupiah($d['sem6_bulan4']) ?>" class="form-control">
                            </div>
                        
                        </div>
                        <div class="form-group">
                            <label>Bulan 5</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Rp</div>
                                </div>
                                <input name="sem6_bulan5" value="<?= rupiah($d['sem6_bulan5']) ?>" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Bulan 6</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Rp</div>
                                </div>
                                <input name="sem6_bulan6" value="<?= rupiah($d['sem6_bulan6']) ?>" class="form-control">
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


        


        


        


        


        