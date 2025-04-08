<?php 

//Bobot
$W1 = isset($_POST['i_makanan']) ? $_POST['i_makanan'] : 0;
$W2 = isset($_POST['i_olahraga']) ? $_POST['i_olahraga'] : 0;
$W3 = isset($_POST['i_goldar']) ? $_POST['i_goldar'] : 0;
$W4 = isset($_POST['i_waktum']) ? $_POST['i_waktum'] : 0;
$W5 = isset($_POST['i_resiko']) ? $_POST['i_resiko'] : 0;


//Pembagi Normalisasi
function pembagiNM($matrik){
	for($i=0;$i<5;$i++){
		$pangkatdua[$i] = 0;
		for($j=0;$j<sizeof($matrik);$j++){
			$pangkatdua[$i] = $pangkatdua[$i] + pow($matrik[$j][$i],2);}
		$pembagi[$i] = sqrt($pangkatdua[$i]);
	}
	return $pembagi;
}

//Normalisasi
function Transpose($squareArray) {

    if ($squareArray == null) { return null; }
    $rotatedArray = array();
    $r = 0;

    foreach($squareArray as $row) {
        $c = 0;
        if (is_array($row)) {
            foreach($row as $cell) { 
                $rotatedArray[$c][$r] = $cell;
                ++$c;
            }
        }
        else $rotatedArray[$c][$r] = $row;
        ++$r;
    }
    return $rotatedArray;
}

function JarakIplus($aplus,$bob){
	for ($i=0;$i<sizeof($bob);$i++) {
		$dplus[$i] = 0;
		for($j=0;$j<sizeof($aplus);$j++){
			$dplus[$i] = $dplus[$i] + pow(($aplus[$j] - $bob[$i][$j]),2);
		}
		$dplus[$i] = round(sqrt($dplus[$i]),4);
	}
	return $dplus;
}

?>
<!DOCTYPE html>
<html>


<body>
	
	<!-- Body Start -->

	<!-- Daftar Laptop Start -->
	<div style="background-color: #efefef">
		<div class="container">
			<div class="section-card" style="padding: 20px 0px">
				<!--   Icon Section   -->


				<center>
					<h4 class="header" style="margin-left: 24px; margin-bottom: 0px; margin-top: 24px; color: #635c73;">HASIL REKOMENDASI DIET</h4>
				
				<ul>
					<li>
						<div class="row">
							<div class="card mb-4">
							<div class="card-header">
								<h4 class="text-center">Matriks Jenis Diet</h4>
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
											while ($data_diet=mysqli_fetch_array($query)) {
												$Matrik[$no-1]=array($data_diet['makanan_angka'],$data_diet['olahraga_angka'],$data_diet['goldar_angka'],$data_diet['waktum_angka'],$data_diet['resiko_angka'] );
												?>
												<tr>
													<td><center><?php echo "A",$no ?></center></td>
													<td><center><?php echo $data_diet['makanan_angka'] ?></center></td>
													<td><center><?php echo $data_diet['olahraga_angka'] ?></center></td>
													<td><center><?php echo $data_diet['goldar_angka'] ?></center></td>
													<td><center><?php echo $data_diet['waktum_angka'] ?></center></td>
													<td><center><?php echo $data_diet['resiko_angka'] ?></center></td>
												</tr>
												<?php
												$no++;
											}
											?>
										</tbody>
									</table>

									
						</li>
					</ul>
							

				<center>
					<h4 class="header" style="margin-left: 24px; margin-bottom: 0px; margin-top: 24px; color: #635c73;">Matriks ternormalisasi, R:</h4>
				</center>
				<ul>
					<li>
						<div class="row">
							<div class="card mb-4">
							<div class="card-header">
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
											$query = mysqli_query($koneksi, "SELECT * FROM data_diet");
											$no = 1;
											$pembagiNM = pembagiNM($Matrik);
											while ($data_diet = mysqli_fetch_array($query)) {
												$MatrikNormalisasi[$no-1] = array(
													$data_diet['makanan_angka'] / $pembagiNM[0],
													$data_diet['olahraga_angka'] / $pembagiNM[1],
													$data_diet['goldar_angka'] / $pembagiNM[2],
													$data_diet['waktum_angka'] / $pembagiNM[3],
													$data_diet['resiko_angka'] / $pembagiNM[4]
												);
												?>
												<tr>
													<td><center><?php echo "A", $no ?></center></td>
													<td><center><?php echo round($data_diet['makanan_angka'] / $pembagiNM[0], 6) ?></center></td>
													<td><center><?php echo round($data_diet['olahraga_angka'] / $pembagiNM[1], 6) ?></center></td>
													<td><center><?php echo round($data_diet['goldar_angka'] / $pembagiNM[2], 6) ?></center></td>
													<td><center><?php echo round($data_diet['waktum_angka'] / $pembagiNM[3], 6) ?></center></td>
													<td><center><?php echo round($data_diet['resiko_angka'] / $pembagiNM[4], 6) ?></center></td>
												</tr>
												<?php
												$no++;
											}
											?>
										</tbody>

									</table>
								
						</li>
					</ul>


					<center>
						<h4 class="header" style="margin-left: 24px; margin-bottom: 0px; margin-top: 24px; color: #635c73;">BOBOT (W)</h4>
					</center>
					<ul> 
						<li>
							<div class="row">
								<div class="card mb-4">
							<div class="card-header">
							</div>
							<div class="card-body">
								<table id="table_id" class="table table-striped table-bordered">
									<thead>
												<tr>
													<th><center>Value Kriteria Makanan</center></th>
													<th><center>Value Kriteria Aktifitas Harian</center></th>
													<th><center>Value Kriteria Asupan Kalori</center></th>
													<th><center>Value Kriteria Interval Makan</center></th>
													<th><center>Value Kriteria Intensitas Diet</center></th>
												</tr>
											</thead>
											<tbody>
												<!--count($W)-->
												<tr>
													<td><center><?php echo($W1);?></center></td>
													<td><center><?php echo($W2);?></center></td>
													<td><center><?php echo($W3);?></center></td>
													<td><center><?php echo($W4);?></center></td>
													<td><center><?php echo($W5);?></center></td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</li>
					</ul>


					<center>
						<h4 class="header" style="margin-left: 24px; margin-bottom: 0px; margin-top: 24px; color: #635c73;">Matriks ternormalisasi terbobot, Y:</h4>
					</center>
					<ul>
						<li>
							<div class="row">
								<div class="card mb-4">
							<div class="card-header">
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
												$pembagiNM=pembagiNM($Matrik);
												while ($data_diet=mysqli_fetch_array($query)) {
													
													$NormalisasiBobot[$no-1]=array(
														$MatrikNormalisasi[$no-1][0]*$W1,
														$MatrikNormalisasi[$no-1][1]*$W2,
														$MatrikNormalisasi[$no-1][2]*$W3,
														$MatrikNormalisasi[$no-1][3]*$W4,
														$MatrikNormalisasi[$no-1][4]*$W5 );

														?>
														<tr>
															<td><center><?php echo "A",$no ?></center></td>
															<td><center><?php echo round($MatrikNormalisasi[$no-1][0]*$W1,6) ?></center></td>
															<td><center><?php echo round($MatrikNormalisasi[$no-1][1]*$W2,6) ?></center></td>
															<td><center><?php echo round($MatrikNormalisasi[$no-1][2]*$W3,6) ?></center></td>
															<td><center><?php echo round($MatrikNormalisasi[$no-1][3]*$W4,6) ?></center></td>
															<td><center><?php echo round($MatrikNormalisasi[$no-1][4]*$W5,6) ?></center></td>
														</tr>
														<?php
														$no++;
													}
													?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</li>
						</ul>


						<center>
							<h4 class="header" style="margin-left: 24px; margin-bottom: 0px; margin-top: 24px; color: #635c73;">Matrik Solusi ideal positif dan negatif
							</h4>
						</center>
						<ul>
							<li>
								<div class="row">
									<div class="card mb-4">
							<div class="card-header">
							</div>
							<div class="card-body">
								<table id="table_id" class="table table-striped table-bordered">
									<thead>
													<tr>
														<th><center></center></th>
														<th><center>Y1 (Benefit)</center></th>
														<th><center>Y2 (Benefit)</center></th>
														<th><center>Y3 (Benefit)</center></th>
														<th><center>Y4 (Benefit)</center></th>
														<th><center>Y5 (Benefit)</center></th>
													</tr>
												</thead>
												<tbody>
													<?php
													$NormalisasiBobotTrans = Transpose($NormalisasiBobot);
													?>
													<tr>
														<?php  
														$idealpositif=array(max($NormalisasiBobotTrans[0]),max($NormalisasiBobotTrans[1]),max($NormalisasiBobotTrans[2]),max($NormalisasiBobotTrans[3]),max($NormalisasiBobotTrans[4]));
														?>
														<td><center><?php echo "Y+" ?> </center></td>
														<td><center><?php echo(round(max($NormalisasiBobotTrans[0]),6));?>&nbsp(max)</center></td>
														<td><center><?php echo(round(max($NormalisasiBobotTrans[1]),6));?>&nbsp(max)</center></td>
														<td><center><?php echo(round(max($NormalisasiBobotTrans[2]),6));?>&nbsp(max)</center></td>
														<td><center><?php echo(round(max($NormalisasiBobotTrans[3]),6));?>&nbsp(max)</center></td>
														<td><center><?php echo(round(max($NormalisasiBobotTrans[4]),6));?>&nbsp(max)</center></td>
													</tr>
													<tr>
														<?php  
														$idealnegatif=array(min($NormalisasiBobotTrans[0]),min($NormalisasiBobotTrans[1]),min($NormalisasiBobotTrans[2]),min($NormalisasiBobotTrans[3]),min($NormalisasiBobotTrans[4]));
														?>
														<td><center><?php echo "Y-" ?> </center></td>
														<td><center><?php echo(round(min($NormalisasiBobotTrans[0]),6));?>&nbsp(min)</center></td>
														<td><center><?php echo(round(min($NormalisasiBobotTrans[1]),6));?>&nbsp(min)</center></td>
														<td><center><?php echo(round(min($NormalisasiBobotTrans[2]),6));?>&nbsp(min)</center></td>
														<td><center><?php echo(round(min($NormalisasiBobotTrans[3]),6));?>&nbsp(min)</center></td>
														<td><center><?php echo(round(min($NormalisasiBobotTrans[4]),6));?>&nbsp(min)</center></td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</li>
						</ul>


						<center>
							<h4 class="header" style="margin-left: 24px; margin-bottom: 0px; margin-top: 24px; color: #635c73;">Jarak antara nilai terbobot setiap alternatif terhadap solusi ideal positif												
							</h4>
						</center>
						<ul>
							<li>
								<div class="row">
									<div class="card mb-4">
							<div class="card-header">
							</div>
							<div class="card-body">
								<table id="table_id" class="table table-striped table-bordered">
									<thead>
													<tr>
														<th><center>D+</center></th>
														<th><center></center></th>
														<th><center>D-</center></th>
														<th><center></center></th>
													</tr>
												</thead>
												<tbody>
													<?php
													$query=mysqli_query($koneksi,"SELECT * FROM data_diet");
													$no=1;
													$Dplus=JarakIplus($idealpositif,$NormalisasiBobot);
													$Dmin=JarakIplus($idealnegatif,$NormalisasiBobot);
													while ($data_diet=mysqli_fetch_array($query)) {

														?>
														<tr>
															<td><center><?php echo "D",$no ?></center></td>
															<td><center><?php echo round($Dplus[$no-1],6) ?></center></td>
															<td><center><?php echo "D",$no ?></center></td>
															<td><center><?php echo round($Dmin[$no-1],6) ?></center></td>
														</tr>
														<?php
														$no++;
													}
													?>
												</tbody>
											</table>

										</div>
									</div>
								</div>
							</li>
						</ul>


						<center>
							<h4 class="header" style="margin-left: 24px; margin-bottom: 0px; margin-top: 24px; color: #635c73;">Nilai Preferensi untuk Setiap alternatif (V)												
							</h4>
						</center>
						<ul>
							<li>
								<div class="row">
									<div class="card mb-4">
							<div class="card-header">
							</div>
							<div class="card-body">
								<table id="table_id" class="table table-striped table-bordered">
									<thead>
													<tr>
														<th><center>Nilai Preferensi "V"</center></th>
														<th><center>Nilai</center></th>
													</tr>
												</thead>
												<tbody>
													<?php
														$query=mysqli_query($koneksi,"SELECT * FROM data_diet");
														$no = 1;
														$nilaiV = array();
														while ($data_diet = mysqli_fetch_array($query)) {
															$DminValue = $Dmin[$no-1];
															$DplusValue = $Dplus[$no-1];
															
															// Pastikan tidak ada pembagian dengan nol
															if ($DminValue + $DplusValue != 0) {
																$nilaiVValue = $DminValue / ($DminValue + $DplusValue);
															} else {
																$nilaiVValue = 0; // Atau nilai lain yang sesuai untuk kasus ini
															}
															
															array_push($nilaiV, $nilaiVValue);
															?>
															<tr>
																<td><center><?php echo "V",$no ?></center></td>
																<td><center><?php echo $nilaiVValue; ?></center></td>
															</tr>
															<?php
															$no++;
														}
														?>

												</tbody>
											</table>
										</div>
									</div>
								</div>
							</li>
						</ul>


						<center>
							<h4 class="header" style="margin-left: 24px; margin-bottom: 0px; margin-top: 24px; color: #635c73;">Nilai Preferensi tertinggi
							</h4>
						</center>
						<ul>
							<li>
								<div class="row">
									<div class="card mb-4">
							<div class="card-header">
							</div>
							<div class="card-body">
								<table id="table_id" class="table table-striped table-bordered">
									<thead>
													<tr>
														<th><center>Nilai Preferensi tertinggi</center></th>
														<th></th>
														<th><center>Alternatif Jenis Diet terpilih</center></th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<?php
														$testmax = max($nilaiV);
														for ($i=0; $i < count($nilaiV); $i++) { 
															if ($nilaiV[$i] == $testmax) {
																$indexMax = array_search($testmax, $nilaiV);
															$query = mysqli_query($koneksi, "SELECT * FROM data_diet where id_diet = ".($indexMax+1));

																?>
																<td><center><?php echo "V".($i+1); ?></center></td>
																<td><center><?php echo $nilaiV[$i]; ?></center></td>
																<?php while ($user=mysqli_fetch_array($query)) { ?>
																<td><center><?php echo $user['nama_diet']; ?></center></td>
																<?php
															}
														}
													} ?>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</li>
					</ul>
					<div class="row center" \>
						<a href="./data-rekomendasi.php" id="download-button" class="waves-effect waves-light btn" style="margin-top: 0px">Hitung Rekomendasi Ulang</a>
					</div>
					<div class="row center" \>
						<a href="./profil.php" id="download-button" class="waves-effect waves-light btn" style="margin-top: 0px">RIWAYAT</a>
					</div>
				</div>
			</div>
		</div>

		

		<?php
// Menghubungkan ke database
include 'includes/koneksi.php';

// Memastikan koneksi berhasil
if (!$koneksi) {
    die("Connection failed: " . mysqli_connect_error());
}

// Cek apakah variabel session email sudah terdefinisi
if (!isset($_SESSION['email'])) {
    die("Email pengguna tidak ditemukan dalam sesi.");
}

$email = $_SESSION['email'];

// Dapatkan id_pengguna berdasarkan email atau no_telepon
$query_pengguna = "SELECT id_pengguna FROM tbl_pengguna WHERE email = '$email' OR no_telepon = '$email'";
$result_pengguna = mysqli_query($koneksi, $query_pengguna);

if ($result_pengguna && mysqli_num_rows($result_pengguna) > 0) {
    $row_pengguna = mysqli_fetch_assoc($result_pengguna);
    $id_pengguna = $row_pengguna['id_pengguna'];
} else {
    die("Pengguna tidak ditemukan.");
}

// Inisialisasi variabel untuk menyimpan nilai tertinggi
$nilai_tertinggi = 0;
$id_diet_tertinggi = null;

$query = mysqli_query($koneksi, "SELECT * FROM data_diet");
$no = 1;

while ($data_diet = mysqli_fetch_array($query)) {
    $DminValue = $Dmin[$no-1];
    $DplusValue = $Dplus[$no-1];

    // Pastikan tidak ada pembagian dengan nol
    if ($DminValue + $DplusValue != 0) {
        $nilaiVValue = $DminValue / ($DminValue + $DplusValue);
    } else {
        $nilaiVValue = 0;
    }

    // Cek apakah nilai ini adalah yang tertinggi
    if ($nilaiVValue > $nilai_tertinggi) {
        $nilai_tertinggi = $nilaiVValue;
        $id_diet_tertinggi = $data_diet['id_diet'];
    }

    $no++;
}

// Simpan nilai tertinggi ke database jika ada diet yang ditemukan
if ($id_diet_tertinggi !== null) {
    // Menggunakan prepared statement untuk keamanan tambahan
    $stmt = mysqli_prepare($koneksi, "INSERT INTO tbl_hasil_diet (id_diet, nilai_v, id_pengguna) VALUES (?, ?, ?)");
    
    // Cek apakah prepared statement berhasil dibuat
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'idi', $id_diet_tertinggi, $nilai_tertinggi, $id_pengguna);

        // Eksekusi statement dan cek apakah berhasil
        if (mysqli_stmt_execute($stmt)) {
            echo "Data berhasil disimpan.";
        } else {
            echo "Gagal menyimpan data: " . mysqli_stmt_error($stmt);
        }
        
        mysqli_stmt_close($stmt);
    } else {
        echo "Gagal menyiapkan statement: " . mysqli_error($koneksi);
    }
} else {
    echo "Tidak ada diet yang ditemukan dengan nilai tertinggi.";
}
?>










		<script type="text/javascript">
			$(document).ready(function(){
				$('.parallax').parallax();
				$('.modal').modal();
			});
		</script>
	</body>
	</html>