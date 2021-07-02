<?php

include 'connectdb.php';

$sql1="SELECT giatri FROM thamso WHERE mathamso='SSTĐ'";
$result1 = $conn->query($sql1);
$gt=$result1->fetch_assoc();

$sql="SELECT malop FROM lop WHERE siso <".$gt["giatri"];
$result=$conn->query($sql);
if ($result){
if ($result->num_rows > 0) {
  // output data of each row
  while($row=$result->fetch_assoc()) {
    echo "&nbsp&nbsp <input type='radio' id='" .$row['malop'] ."' name='malop' onchange='choseClass(this.value)' value='" .$row['malop'] ."'/> <label for='" .$row['malop'] ."'>" .$row['malop'] ."</label> <br/>";
  }
} else {
  echo "0 results";
}
}else{ 
  echo "Error in ".$sql."<br>".$conn->error;
}
$conn->close();
?>