<?php 
                    if(isset($_POST["tambah_diet"])){
                        $nama      = $_POST["nama"];
                        $makanan     = $_POST["i_makanan"];
                        $olahraga       = $_POST["i_olahraga"];
                        $goldar    = $_POST["i_goldar"];
                        $waktum = $_POST["i_waktum"];
                        $resiko    = $_POST["i_resiko"];
                        
                        $makanan_angka = $olahraga_angka = $goldar_angka = $waktum_angka = $resiko_angka = 0;

                        if($makanan == "Sangat Tidak Penting"){
                            $makanan_angka = 1;
                        }
                        elseif($makanan == "Tidak Penting"){
                            $makanan_angka = 2;
                        }
                        elseif($makanan == "Cukup Penting"){
                            $makanan_angka = 3;
                        }
                        elseif($makanan == "Penting"){
                            $makanan_angka = 4;
                        }
                        elseif($makanan == "Sangat Penting"){
                            $makanan_angka = 5;
                        }

                        if($olahraga == "Sangat Tidak Penting"){
                            $olahraga_angka = 1;
                        }
                        elseif($olahraga == "Tidak Penting"){
                            $olahraga_angka = 2;
                        }
                        elseif($olahraga == "Cukup Penting"){
                            $olahraga_angka = 3;
                        }
                        elseif($olahraga == "Penting"){
                            $olahraga_angka = 4;
                        }
                        elseif($olahraga == "Sangat Penting"){
                            $olahraga_angka = 5;
                        }
                        if($goldar == "Sangat Tidak Penting"){
                            $goldar_angka = 1;
                        }
                        elseif($goldar == "Tidak Penting"){
                            $goldar_angka = 2;
                        }
                        elseif($goldar == "Cukup Penting"){
                            $goldar_angka = 3;
                        }
                        elseif($goldar == "Penting"){
                            $goldar_angka = 4;
                        }
                        elseif($goldar == "Sangat Penting"){
                            $goldar_angka = 5;
                        }

                        if($waktum == "Sangat Tidak Penting"){
                            $waktum_angka = 1;
                        }
                        elseif($waktum == "Tidak Penting"){
                            $waktum_angka = 2;
                        }
                        elseif($waktum == "Cukup Penting"){
                            $waktum_angka = 3;
                        }
                        elseif($waktum == "Penting"){
                            $waktum_angka = 4;
                        }
                        elseif($waktum == "Sangat Penting"){
                            $waktum_angka = 5;
                        }

                        if($resiko == "Sangat Tidak Penting"){
                            $resiko_angka = 1;
                        }
                        elseif($resiko == "Tidak Penting"){
                            $resiko_angka = 2;
                        }
                        elseif($resiko == "Cukup Penting"){
                            $resiko_angka = 3;
                        }
                        elseif($resiko == "Penting"){
                            $resiko_angka = 4;
                        }
                        elseif($resiko == "Sangat Penting"){
                            $resiko_angka = 5;
                        }

                         $sql = "INSERT INTO `data_diet` (`id_diet`, `nama_diet`, `makanan`, `olahraga`, `goldar`, `waktum`, `resiko`, `makanan_angka`, `olahraga_angka`, `goldar_angka`, `waktum_angka`, `resiko_angka`) 
                                VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                                $stmt = $koneksi->prepare($sql);
                                $stmt->bind_param("ssssssiiiii", $nama, $makanan, $olahraga, $goldar, $waktum, $resiko, $makanan_angka, $olahraga_angka, $goldar_angka, $waktum_angka, $resiko_angka);
                                $stmt->execute();
                    }


                        if(isset($_POST["hapus_diet"])){
                        $id_hapus_diet = $_POST['id_hapus_diet'];
                        $sql_delete = "DELETE FROM `data_diet` WHERE `id_diet` = ?";
                        $stmt_delete = $koneksi->prepare($sql_delete);
                        $stmt_delete->bind_param('i', $id_hapus_diet); // 'i' indicates the type of the variable (integer)
                        $stmt_delete->execute();
                        $query_reorder_id = mysqli_query($koneksi, "ALTER TABLE data_diet AUTO_INCREMENT = 1");
                    }

                    if(isset($_POST["update_diet"])){
                    $id_edit_diet = $_POST['id_edit_diet'];
                    $nama      = $_POST["nama"];
                    $makanan     = $_POST["i_makanan"];
                    $olahraga       = $_POST["i_olahraga"];
                    $goldar    = $_POST["i_goldar"];
                    $waktum = $_POST["i_waktum"];
                    $resiko    = $_POST["i_resiko"];

                    // Konversi kategori ke angka
                    $makanan_angka = $olahraga_angka = $goldar_angka = $waktum_angka = $resiko_angka = 0;

                    if($makanan == "Sangat Tidak Penting"){
                            $makanan_angka = 1;
                        }
                        elseif($makanan == "Tidak Penting"){
                            $makanan_angka = 2;
                        }
                        elseif($makanan == "Cukup Penting"){
                            $makanan_angka = 3;
                        }
                        elseif($makanan == "Penting"){
                            $makanan_angka = 4;
                        }
                        elseif($makanan == "Sangat Penting"){
                            $makanan_angka = 5;
                        }

                        if($olahraga == "Sangat Tidak Penting"){
                            $olahraga_angka = 1;
                        }
                        elseif($olahraga == "Tidak Penting"){
                            $olahraga_angka = 2;
                        }
                        elseif($olahraga == "Cukup Penting"){
                            $olahraga_angka = 3;
                        }
                        elseif($olahraga == "Penting"){
                            $olahraga_angka = 4;
                        }
                        elseif($olahraga == "Sangat Penting"){
                            $olahraga_angka = 5;
                        }
                        if($goldar == "Sangat Tidak Penting"){
                            $goldar_angka = 1;
                        }
                        elseif($goldar == "Tidak Penting"){
                            $goldar_angka = 2;
                        }
                        elseif($goldar == "Cukup Penting"){
                            $goldar_angka = 3;
                        }
                        elseif($goldar == "Penting"){
                            $goldar_angka = 4;
                        }
                        elseif($goldar == "Sangat Penting"){
                            $goldar_angka = 5;
                        }

                        if($waktum == "Sangat Tidak Penting"){
                            $waktum_angka = 1;
                        }
                        elseif($waktum == "Tidak Penting"){
                            $waktum_angka = 2;
                        }
                        elseif($waktum == "Cukup Penting"){
                            $waktum_angka = 3;
                        }
                        elseif($waktum == "Penting"){
                            $waktum_angka = 4;
                        }
                        elseif($waktum == "Sangat Penting"){
                            $waktum_angka = 5;
                        }

                        if($resiko == "Sangat Tidak Penting"){
                            $resiko_angka = 1;
                        }
                        elseif($resiko == "Tidak Penting"){
                            $resiko_angka = 2;
                        }
                        elseif($resiko == "Cukup Penting"){
                            $resiko_angka = 3;
                        }
                        elseif($resiko == "Penting"){
                            $resiko_angka = 4;
                        }
                        elseif($resiko == "Sangat Penting"){
                            $resiko_angka = 5;
                        }

                    // Update data ke database
                    $sql_update = "UPDATE `data_diet` 
                                SET `nama_diet` = ?, `makanan` = ?, `olahraga` = ?, `goldar` = ?, `waktum` = ?, `resiko` = ?, 
                                    `makanan_angka` = ?, `olahraga_angka` = ?, `goldar_angka` = ?, `waktum_angka` = ?, `resiko_angka` = ?
                                WHERE `id_diet` = ?";
                    $stmt_update = $koneksi->prepare($sql_update);
                    $stmt_update->bind_param("ssssssiiiiii", $nama, $makanan, $olahraga, $goldar, $waktum, $resiko, $makanan_angka, $olahraga_angka, $goldar_angka, $waktum_angka, $resiko_angka, $id_edit_diet);
                    $stmt_update->execute();
                }

                    

                    ?>

                    <div class="card mb-4">
                        <div class="card-header">
                            <h4 class="text-center">Daftar Jenis Diet</h4>
                        </div>
                        <div class="card-body">
                            <table id="table_id" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Diet</th>
                                        <th>Jenis Makanan</th>
                                        <th>Aktifitas Fisik</th>
                                        <th>Asupan Kalori</th>
                                        <th>Interval Makan</th>
                                        <th>Intensitas Diet</th>
                                        <th>Hapus</th>
                                        <th>Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = mysqli_query($koneksi, "SELECT * FROM data_diet");
                                    $no = 1;
                                    while ($data = mysqli_fetch_array($query)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $data['nama_diet'] ?></td>
                                            <td><?php echo $data['makanan'] ?></td>
                                            <td><?php echo $data['olahraga'] ?></td>
                                            <td><?php echo $data['goldar'] ?></td>
                                            <td><?php echo $data['waktum'] ?></td>
                                            <td><?php echo $data['resiko'] ?></td>
                                            <td>
                                                <form method="POST">
                                                    <input type="hidden" name="id_hapus_diet" value="<?php echo $data['id_diet'] ?>">
                                                    <button type="submit" name="hapus_diet" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                                </form>
                                            </td>
                                            <td>
                                                <!-- Tombol Edit -->
                                                <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit<?php echo $data['id_diet']; ?>"><i class="fa fa-edit"></i></button>
                                            </td>
                                        </tr>

                                        <!-- Modal Edit -->
                                        <div id="edit<?php echo $data['id_diet']; ?>" class="modal fade" tabindex="-1" role="dialog">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Edit Diet</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="POST" action="">
                                                            <!-- Form edit di sini -->
                                                            <div class="form-group">
                                                                <label for="nama">Nama Diet</label>
                                                                <input type="text" class="form-control" name="nama" value="<?php echo $data['nama_diet']; ?>" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="i_makanan">Makanan</label>
                                                                <select class="form-control" required name="i_makanan">
                                                                    <option value="Sangat Tidak Penting" <?php if($data['makanan'] == "Sangat Tidak Penting") echo 'selected'; ?>>Sangat Tidak Penting</option>
                                                                    <option value="Tidak Penting" <?php if($data['makanan'] == "Tidak Penting") echo 'selected'; ?>>Tidak Penting</option>
                                                                    <option value="Cukup Penting" <?php if($data['makanan'] == "Cukup Penting") echo 'selected'; ?>>Cukup Penting</option>
                                                                    <option value="Penting" <?php if($data['makanan'] == "Penting") echo 'selected'; ?>>Penting</option>
                                                                    <option value="Sangat Penting" <?php if($data['makanan'] == "Sangat Penting") echo 'selected'; ?>>Sangat Penting</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="i_olahraga">Kegiatan Fisik</label>
                                                                <select class="form-control" required name="i_olahraga">
                                                                    <option value="Sangat Tidak Penting" <?php if($data['olahraga'] == "Sangat Tidak Penting") echo 'selected'; ?>>Sangat Tidak Penting</option>
                                                                    <option value="Tidak Penting" <?php if($data['olahraga'] == "Tidak Penting") echo 'selected'; ?>>Tidak Penting</option>
                                                                    <option value="Cukup Penting" <?php if($data['olahraga'] == "Cukup Penting") echo 'selected'; ?>>Cukup Penting</option>
                                                                    <option value="Penting" <?php if($data['olahraga'] == "Penting") echo 'selected'; ?>>Penting</option>
                                                                    <option value="Sangat Penting" <?php if($data['olahraga'] == "Sangat Penting") echo 'selected'; ?>>Sangat Penting</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="i_goldar">Asupan Kalori</label>
                                                                <select class="form-control" required name="i_goldar">
                                                                    <option value="Sangat Tidak Penting" <?php if($data['goldar'] == "Sangat Tidak Penting") echo 'selected'; ?>>Sangat Tidak Penting</option>
                                                                    <option value="Tidak Penting" <?php if($data['goldar'] == "Tidak Penting") echo 'selected'; ?>>Tidak Penting</option>
                                                                    <option value="Cukup Penting" <?php if($data['goldar'] == "Cukup Penting") echo 'selected'; ?>>Cukup Penting</option>
                                                                    <option value="Penting" <?php if($data['goldar'] == "Penting") echo 'selected'; ?>>Penting</option>
                                                                    <option value="Sangat Penting" <?php if($data['goldar'] == "Sangat Penting") echo 'selected'; ?>>Sangat Penting</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="i_waktum">Interval Makan</label>
                                                                <select class="form-control" required name="i_waktum">
                                                                    <option value="Sangat Tidak Penting" <?php if($data['waktum'] == "Sangat Tidak Penting") echo 'selected'; ?>>Sangat Tidak Penting</option>
                                                                    <option value="Tidak Penting" <?php if($data['waktum'] == "Tidak Penting") echo 'selected'; ?>>Tidak Penting</option>
                                                                    <option value="Cukup Penting" <?php if($data['waktum'] == "Cukup Penting") echo 'selected'; ?>>Cukup Penting</option>
                                                                    <option value="Penting" <?php if($data['waktum'] == "Penting") echo 'selected'; ?>>Penting</option>
                                                                    <option value="Sangat Penting" <?php if($data['waktum'] == "Sangat Penting") echo 'selected'; ?>>Sangat Penting</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="i_resiko">Intensitas Diet</label>
                                                                <select class="form-control" required name="i_resiko">
                                                                    <option value="Sangat Tidak Penting" <?php if($data['resiko'] == "Sangat Tidak Penting") echo 'selected'; ?>>Sangat Tidak Penting</option>
                                                                    <option value="Tidak Penting" <?php if($data['resiko'] == "Tidak Penting") echo 'selected'; ?>>Tidak Penting</option>
                                                                    <option value="Cukup Penting" <?php if($data['resiko'] == "Cukup Penting") echo 'selected'; ?>>Cukup Penting</option>
                                                                    <option value="Penting" <?php if($data['resiko'] == "Penting") echo 'selected'; ?>>Penting</option>
                                                                    <option value="Sangat Penting" <?php if($data['resiko'] == "Sangat Penting") echo 'selected'; ?>>Sangat Penting</option>
                                                                </select>
                                                            </div>
                                                            <!-- Tambahkan input lainnya sesuai kebutuhan -->
                                                            <input type="hidden" name="id_edit_diet" value="<?php echo $data['id_diet']; ?>">
                                                            <button type="submit" class="btn btn-primary" name="update_diet">Simpan</button>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Akhir Modal Edit -->
                                    <?php
                                        $no++;
                                    }
                                    ?>
                                </tbody>
                            </table>

                        </div>
                    </div>

                    

                    <button class="btn btn-primary float-right" data-toggle="modal" data-target="#tambah">Tambah Data</button>
                    <br>
                    <br>
                    <!-- Daftar hp Start -->
	                <div class="card mb-4">
                        <div class="card-header">
                            <h4 class="text-center">Analisa Jenis Diet</h4>
                        </div>
                        <div class="card-body">
                            <table id="table_id" class="table table-striped table-bordered">
                                <thead>
												<tr>
													<th><center>Alternatif</center></th>
													<th><center>C1 (Benefit)</center></th>
													<th><center>C2 (Benefit)</center></th>
													<th><center>C3 (Benefit)</center></th>
													<th><center>C4 (Benefit)</center></th>
													<th><center>C5 (Benefit)</center></th>
												</tr>
											</thead>
											<tbody>
												<?php
												$query=mysqli_query($koneksi,"SELECT * FROM data_diet");
												$no=1;
												while ($data=mysqli_fetch_array($query)) {
												?>
												<tr>
													<td><center><?php echo "A",$no ?></center></td>
													<td><center><?php echo $data['makanan_angka'] ?></center></td>
													<td><center><?php echo $data['olahraga_angka'] ?></center></td>
													<td><center><?php echo $data['goldar_angka'] ?></center></td>
													<td><center><?php echo $data['waktum_angka'] ?></center></td>
													<td><center><?php echo $data['resiko_angka'] ?></center></td>
												</tr>
												<?php
														$no++;}
												?>
											</tbody>
									</table>
									</div>
							</div>
						
                        <!-- Modal Start -->
                        <div id="tambah" class="modal fade" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Masukan Jenis Diet</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="">
                                            <div class="form-group">
                                                <label for="nama">Nama Diet</label>
                                                <input type="text" class="form-control" required name="nama">
                                            </div>
                                            <div class="form-group">
                                                <label for="i_makanan">Makanan</label>
                                                <select class="form-control" required name="i_makanan">
                                                    <option value="Sangat Tidak Penting">Sangat Tidak Penting</option>
                                                    <option value="Tidak Penting">Tidak Penting</option>
                                                    <option value="Cukup Penting">Cukup Penting</option>
                                                    <option value="Penting">Penting</option>
                                                    <option value="Sangat Penting">Sangat Penting</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="i_olahraga">Kegiatan Fisik</label>
                                                <select class="form-control" required name="i_olahraga">
                                                    <option value="Sangat Tidak Penting">Sangat Tidak Penting</option>
                                                    <option value="Tidak Penting">Tidak Penting</option>
                                                    <option value="Cukup Penting">Cukup Penting</option>
                                                    <option value="Penting">Penting</option>
                                                    <option value="Sangat Penting">Sangat Penting</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="i_goldar">Asupan Kalori</label>
                                                <select class="form-control" required name="i_goldar">
                                                    <option value="Sangat Tidak Penting">Sangat Tidak Penting</option>
                                                    <option value="Tidak Penting">Tidak Penting</option>
                                                    <option value="Cukup Penting">Cukup Penting</option>
                                                    <option value="Penting">Penting</option>
                                                    <option value="Sangat Penting">Sangat Penting</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="i_waktum">Interval Makan</label>
                                                <select class="form-control" required name="i_waktum">
                                                   <option value="Sangat Tidak Penting">Sangat Tidak Penting</option>
                                                    <option value="Tidak Penting">Tidak Penting</option>
                                                    <option value="Cukup Penting">Cukup Penting</option>
                                                    <option value="Penting">Penting</option>
                                                    <option value="Sangat Penting">Sangat Penting</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="i_resiko">Intensitas Diet</label>
                                                <select class="form-control" required name="i_resiko">
                                                    <option value="Sangat Tidak Penting">Sangat Tidak Penting</option>
                                                    <option value="Tidak Penting">Tidak Penting</option>
                                                    <option value="Cukup Penting">Cukup Penting</option>
                                                    <option value="Penting">Penting</option>
                                                    <option value="Sangat Penting">Sangat Penting</option>
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-primary" name="tambah_diet">Tambah</button>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal End -->
                        

                        
                    
                    

                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->