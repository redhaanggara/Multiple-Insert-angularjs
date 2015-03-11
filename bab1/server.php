<?php
/**
 * Created by PhpStorm.
 * User: ucup_aw
 * Date: 11/03/15
 * Time: 23:12
 */

$hostname = "localhost";
$user = "root";
$pass = "";
$database = "bab1";

$conn = mysql_connect($hostname, $user, $pass);
if(!$conn) die ("gagal melakukan koneksi");
mysql_select_db($database, $conn) or die ("database tidak ditemukan");

switch($_GET['action']){
    case 'insert':
        $data = json_decode(file_get_contents("php://input"));
        $i = 0;
        foreach($data as $key => $v){
            $query = "insert into siswa (nama, kelas) values ('".$v->nama."','".$v->kelas."')";
            mysql_query($query);
            $i++;
        };
        echo $i;
        break;
}