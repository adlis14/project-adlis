<body bgcolor="yellow">
<?php
//Curl untuk tambah data via api
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => "http://localhost/project-adlis/adlis_web/api/pribadi/ubah",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => $_POST,
		CURLOPT_HTTPHEADER => array(
			"cache-control: no-cache"
		),
	));
	$response_tambah = curl_exec($curl);
	$err = curl_error($curl);
	$response_tambah = json_decode($response_tambah, true);
	if(isset($response_tambah['code']) == 200){
		echo "<script type=\"text/javascript\">alert('Data Berhasil diubah...!!');window.location.href=\"http://localhost/project-adlis/adlis_web_client/pribadi.php\";</script>";
	}else{
		echo $response_tambah['data'];
	}
} 
//Curl untuk menghapus data dari api

//Curl untuk mengambil detail data makul dari ednpoint api
if(isset($_GET['id'])){
	$curl = curl_init();
	curl_setopt_array($curl, array(
	  CURLOPT_URL => "http://localhost/project-adlis/adlis_web/api/pribadi?id=$_GET[id]",
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
	if(isset($response['data'])){ 
		foreach ($response['data'] as $value); ?>
		<center><h3>Tambah Data Pribadi</h3>
		<form class="form-horizontal" method="POST" action="http://localhost/project-adlis/adlis_web_client/pribadi_edit.php">
			<input type="hidden" name="id" value="<?php echo $value['id']; ?>"/>
			Nama <br/>
			<input type="text" placeholder="Nama" name="nama" value="<?php echo $value['nama']; ?>" required/><br/>
			Jenis Kelamin <br/>
			<input type="text" placeholder="Jenis Kelamin" name="jenis_kelamin" value="<?php echo $value['jenis_kelamin']; ?>" required/><br/>
			Tanggal Lahir <br/>
			<input type="text" placeholder="Tanggal Lahir" name="tanggal_lahir" value="<?php echo $value['tanggal_lahir']; ?>" required/><br/>
			Alamat <br/>
			<input type="text" placeholder="Alamat" name="alamat" value="<?php echo $value['alamat']; ?>" required/><br/>
			Telepon <br/>
			<input type="text" placeholder="Telepon" name="telepon" value="<?php echo $value['telepon']; ?>" required/><br/>
			<button type="submit" type="button">
				Submit
			</button>
		</center>
		</form> <?php
	}
}else{
	echo "Data tidak dikenali";
} ?>