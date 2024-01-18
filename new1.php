<?php
class TestPoint{
 public $link='';
 function __construct($potensial){
  $this->connect();
  $this->storeInDB($pontensial);
 }
 
 function connect(){
  $this->link = mysqli_connect('localhost','root','') or die('Cannot connect to the DB');
  mysqli_select_db($this->link,'voltage') or die('Cannot select the DB');
 }
 
 function storeInDB($potensial){
  $query = "insert into dht_data set potensial='".$potensial."'";
  $result = mysqli_query($this->link,$query) or die('Errant query:  '.$query);
  if($result === TRUE){echo "Data Tersimpan";}else{echo "Gagal Menyimpan data";}
 }
 
}
if($_GET['dataPotensial'] != ''){
 $TestPoint=new TestPoint($_GET['dataPotensial']);
}

?>