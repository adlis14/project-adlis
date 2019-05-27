<body bgcolor="yellow">
<?php
//Curl untuk tambah data via api
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => "http://localhost/project-adlis/adlis_web/api/pribadi/tambah",
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
		echo "<script type=\"text/javascript\">alert('Data Berhasil ditambah...!!');window.location.href=\"http://localhost/project-adlis/adlis_web_client/pribadi.php\";</script>";
	}else{
		
		print_r($_POST);
		echo "Fafa";

		//echo $response_tambah['data'];
	}
} 
//Curl untuk menghapus data dari api ?>
<center><h3>Tambah Data Pribadi</h3>
<form class="form-horizontal" method="POST" action="http://localhost/project-adlis/adlis_web_client/pribadi_tambah.php">
	Nama <br/>
	<input type="text" placeholder="Nama Lengkap" name="nama" required/><br/>
	Jenis Kelamin <br/>
	<input type="text" placeholder="Jenis Kelamin" name="jenis_kelamin" required/><br/>
	Tanggal Lahir <br/>
	<input type="text" placeholder="TL" name="tanggal_lahir" required/><br/>
	Alamat <br/>
	<input type="text" placeholder="Alamat" name="alamat" required/><br/>
	Telepon <br/>
	<input type="text" placeholder="Telepon" name="telepon" required/><br/>
	<button type="submit" type="button"> 
		Submit
	</button>
</center>
</form>