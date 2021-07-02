<?php
 include 'connectdb.php';
    $mamonhoc = $_GET['mamonhoc'];
    $mahocky = $_GET['mahocky'];
    $mahocsinh = $_GET['mahocsinh'];
    $diem15p = $_GET['diem15p'];
    $diem1t = $_GET['diem1t'];
    $diemcuoiky = $_GET['diemcuoiky'];
  

    $sql = "UPDATE PHIEUDIEM 
    SET  diem15p='$diem15p', diem1t='$diem1t', diemcuoiky='$diemcuoiky'
    WHERE mamonhoc='$mamonhoc'and mahocsinh='$mahocsinh' and mahocky='$mahocky'";
    
    if ($conn->query($sql) === TRUE) {
      echo "Cap nhat thanh cong";
     } else {
      echo "Error in ".$sql."<br>".$conn->error;;
     }
    
    $conn->close();
    ?>