<body bgcolor="yellow">
<?php
//Curl untuk mengambil data dari api
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "http://localhost/project-adlis/adlis_web/api/pribadi",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache"
  ),
));
$response = curl_exec($curl);
$err = curl_error($curl);
$response = json_decode($response, true);
//Curl untuk mengambil data dari api

//Curl untuk menghapus data dari api
if(isset($_GET['hapus']) && $_GET['hapus'] != ''){
	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => "http://localhost/project-adlis/adlis_web/api/pribadi/hapus/$_GET[hapus]",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "GET",
		CURLOPT_HTTPHEADER => array(
			"cache-control: no-cache"
		),
	));
	$response_hapus = curl_exec($curl);
	$err = curl_error($curl);
	$response_hapus = json_decode($response_hapus, true);
	if(isset($response_hapus['code']) == 200){
		echo "<script type=\"text/javascript\">alert('Data Berhasil dihapus...!!');window.location.href=\"./pribadi.php\";</script>";
	}else{
		echo $response_hapus['data'];
	}
} 
//Curl untuk menghapus data dari api?>
<center><h3>Ini Adalah Data Dari Endpoin API Pribadi</h3>
<p><a href="http://localhost/project-adlis/adlis_web_client/pribadi_tambah.php">Tambah</a></p>
<table border="1" cellspacing="0" cellpadding="5" style='border-collapse:collapse;'>
	<tr>
		<td>Nama</td>
		<td>Jenis Kelamin</td>
		<td>Tanggal Lahir</td>
		<td>Alamat</td>
		<td>Telepon</td>
		<td>Aksi</td>
		<?php 
	if(isset($response['data'])){ 
		foreach($response['data'] as $value){ ?>
			<tr>
					<td><strong><?php echo $value['nama']; ?></strong></td>
					<td><?php echo $value['jenis_kelamin']; ?></td>
					<td><?php echo $value['tanggal_lahir']; ?></td>
					<td><?php echo $value['alamat']; ?></td>
					<td><?php echo $value['telepon']; ?></td>
					<td>
						<a href="http://localhost/project-adlis/adlis_web_client/pribadi_edit.php?id=<?php echo $value['id']; ?>">edit | 
						<a href="http://localhost/project-adlis/adlis_web_client/pribadi.php?hapus=<?php echo $value['id']; ?>">hapus</a>
					</td>
			</tr>
			</center>
			<?php 
		} 
	} ?>
</table>