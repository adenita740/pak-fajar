<?php
//buat koneksi dengan database mysql
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$link = mysqli_connect($dbhost, $dbuser, $dbpass);

//periksa koneksi,tampilkan pesan kesalahan jika gagal
if (!$link) {
    die("Koneksi dengan database gagal: " . mysqli_connect_errno() 
    . " - " . mysqli_connect_error());
}

//buat database kampusku database jika belum ada
$query = "CREATE DATABASE IF NOT EXISTS kampusku";
$result = mysqli_query($link, $query);

    if (!$result) {
        die("Query gagal: " . mysqli_errno($link).
        " - " . mysqli_error($link));
    }
    else {
        echo "Database <b>'kampusku'</b> berhasil dibuat...<br>";
    }
    //pilih database kampusku
    $result = mysqli_select_db($link, "kampusku");

    if (!$result) {
        die("Query gagal: " . mysqli_errno($link).
        " - " . mysqli_error($link));
    }
    else {
        echo "Database <b>'kampusku'</b> berhasil dipilih...<br>";
    }
    
    //cek apakah tabel mahasiswa sudah ada,jika ada hapus tabel
    $query = "DROP TABLE IF EXISTS mahasiswa";
    $result = mysqli_query($link, $query);

    if (!$result) {
        die("Query gagal: " . mysqli_errno($link).
        " - " . mysqli_error($link));
    }
    else {
        echo "Tabel <b>'mahasiswa'</b> berhasil dihapus...<br>";
    }

    //buat queri untuk membuat tabel mahasiswa
    $query ="create table mahasiswa (nim char(8),nama varchar(100),";
    $query .="tempat_lahir varchar(50),tanggal_lahir date,";
    $query .="fakultas varchar(50),jurusan varchar(50),";
    $query .="ipk Decimal(3,2),primary key(nim)),";

    $hasil_query = mysqli_query($link, $query);

    if (!$hasil_query) {
        die("Query gagal: " . mysqli_errno($link).
        " - " . mysqli_error($link));
    }
    else {
        echo "Tabel <b>'mahasiswa'</b> berhasil dibuat...<br>";
    }

    //buat query untuk INSERT data ke tabel mahasiswa
    $query="INSERY INTO mahasiswa VALUES";
    $query.="('14005011','Riana Putria','Padang','1996-11-23','FMIPA','Kimia',3.1),";
    $query.="('15021044','Rudi Permana','Bandung','1994-8-22','FASILKOM','Ilmu Komputer',2.9),";
    $query.="('15003036','Sari Citra Lestari','Jakarta','1997-12-31','Ekonomi','Manajemen',3.5),";
    $query.="('15002032','Riana Kumala Sari','Jakarta','1997-06-28','Ekonomi','Akuntansi',3.4),";
    $quary.="('13012012','James Situmorang','Medan','1995-04-02','Kedokteran','Kedokteran Gigi',2.7)";

    $hasil_query=mysql_query($link,$query);

    if (!$hasil_query){
        die("Query gagal:".mysql_errno($link)
        ."-".mysql_error($link));
    }
    else{
        echo"database berhasil dimasukan...<br>";
    }

    //cek apakah tabel admin sudah ada,jika ada hapus tabel
    $query="DROP TABLE IF EXISTS admin";
    $hasil_query=mysqli_query($link,$query);

    if (!$hasil_query){
        die("query error:".mysqli_erorno($link).
        "-".mysqli_error($link));
    }
    else{
        echo"Tabel <b>'admin'</b>berhasil dihapus...<br>";
    }

    //buat query untu CREATE tabel admin
    $query="CREATE TABLE admin(username VARCHAR(50),password VARCHAR(40))";
    $hasil_query=mysql_query($link,$query);

    if(!$hasil_query){
        die("Query error:".mysqli_errono($link).
        "-".mysqli_errno($linl));
    }
    else{
        echo"Tabel<b>'admin'</b>berhasil dibuat...<br>";
    }
    //buat username dan password un admin
    $username ="admin123";
    $password =sha1("rahasia");

    //buat queryuntuk INSERT data ke tabel admin
    $query="INSERT INTO admin VALUES('$username','$password')";

$hasil_query =mysqli_query($link,$query);

if(!$hasil_query){
    die("Query error:".mysqli_error($link).
    "-".mysql_error($link));
}
else{
    echo"Tabel<b>'admin'</b>berhasil diisi...<br>";
}

//tutup koneksi dengan database mysql
mysqli_close($link);
?> 