<?php
function encrypt($plaintext, $key) { //untuk pembuatan function dari enkripsi
	for ($i=0, $j=0, $n=strlen($key); $i < strlen($plaintext); $i++) { ////Fungsi strlen() digunakan untuk mendapatkan panjang string.

		$key_n = $j % $n;

		if (ord($plaintext[$i]) >= 65 && ord($plaintext[$i]) <= 90) {
			$steb_1 = ord(strtolower($key[$key_n])) - 97; ////Fungsi strtolower() digunakan untuk mengkonversi string dengan format huruf kecil.
			$steb_2 = (ord($plaintext[$i]) - 65 + $steb_1) % 26;
			echo chr($steb_2 + 65);
			$j++;
		}
		elseif (ord($plaintext[$i]) >= 97 && ord($plaintext[$i]) <= 122) {
			$steb_1 = ord(strtolower($key[$key_n])) - 97; //Fungsi ord() digunakan untuk mengembalikan nilai ASCII suatu karakter.
			$steb_2 = (ord($plaintext[$i]) - 97 + $steb_1) % 26;
			echo chr($steb_2 + 97); //Fungsi chr() digunakan untuk mengembalikan karakter yang spesifik berdasarkan kode ASCII. 
			//Fungsi echo digunakan untuk menampilkan satu atau lebih string.
			$j++;
		}
		else {
			echo $plaintext[$i];
		}
	}
}
function decrypt($ciphertext, $key) { // untuk pembuatan dari deskripsinya
	for ($i=0, $j=0, $n=strlen($key); $i < strlen($ ciphertext); $i++) { //Fungsi strlen() digunakan untuk mendapatkan panjang string.
		$key_n = $j % $n;
		if (ord($ciphertext[$i]) >= 65 && ord($ciphertext[$i]) <= 90) {
			$steb_1 = ord(strtolower($key[$key_n])) - 97;
			$steb_2 = (ord($ciphertext[$i]) - 65 - $steb_1) % 26;
			$steb_3 = (($steb_2 < 0) ? 26+$steb_2 : $steb_2) % 26;
			echo chr($steb_3 + 65);
			$j++;
		}
		elseif (ord($ciphertext[$i]) >= 97 && ord($ciphertext) <= 122) {
			$steb_1 = ord(strtolower($key[$key_n])) - 97; //Fungsi strtolower() digunakan untuk mengkonversi string dengan format huruf kecil.
			$steb_2 = (ord($ciphertext[$i]) - 97 - $steb_1);
			$steb_3 = (($steb_2 < 0) ? 26+$steb_2 : $steb_2) % 26;
			echo chr($steb_3 + 97);
			$j++;
		}
		else {
			echo $ciphertext[$i];
		}
	}
}
//metode yang digunakan disini yakni post
$cipher = $_POST["cipher"]; 
$text = $_POST["text"];
$key = $_POST["key"];

//title untuk memberi nama halamannya
//method menggunakan POST
?>
<html>
<head>
	<title>Vigenere Cipher</title> 
</head>
<body>
	<form action="" method="POST">
		<h1>Vigenere Cipher</h1>
		<textarea name="text" rows="10" cols="50"></textarea><br />
		Key :<input type="text" name="key" />[A-Za-z]<br />
		<input type="radio" name="cipher" value="encrypt">Encrypt<br />
		<input type="radio" name="cipher" value="decrypt">Decrypt<br />
		<input type="submit" value="Submit" />
	</form>
	<?php
		if (isset($cipher) && ctype_alpha($key)) {
			if ($cipher == "encrypt") {
				encrypt($text, $key);
			}
			elseif($cipher == "decrypt") {
				decrypt($text, $key);
			}
		}
		else {
			echo '<p style="color:red ;">Please, complete the fields correctly</p>';
		}
	?>
</body>
</html>
