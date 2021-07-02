 <?php
 include 'connectdb.php';
    $mamonhoc = $_GET['mamonhoc'];
    $mahocky = $_GET['mahocky'];
    $mahocsinh = $_GET['mahocsinh'];
    $diem15p = $_GET['diem15p'];
    $diem1t = $_GET['diem1t'];
    $diemcuoiky = $_GET['diemcuoiky'];
  

    $sql = "INSERT INTO PHIEUDIEM(mamonhoc, mahocsinh, mahocky, diem15p, diem1t, diemcuoiky)
    VALUES ('$mamonhoc', '$mahocsinh', '$mahocky', $diem15p, $diem1t, $diemcuoiky)";
    
    if ($conn->query($sql) === TRUE) {
      echo "Nhap diem thanh cong" ;
     } else {
      echo "Nhap diem that bai";
     }
    
    $conn->close();
    ?>