<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: ../login.html');
	exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nhập Điểm Học Sinh</title>
     <!-- bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>  
    <!-- fontawesome -->
    <script src="https://kit.fontawesome.com/c9801e10cc.js" crossorigin="anonymous"></script>
    <!-- css -->
    <link rel="stylesheet" href="../css/style.css">
    <!-- javascript -->
    <script src="../js/javascript.js"></script>
    
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="../index.php">Quản Lý Học Sinh <i class="fas fa-school text-secondary"></i></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Học Sinh
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="../controllers/addstudent.php">Tiếp nhận học sinh</a>
            <a class="dropdown-item" href="../controllers/editstudent.php">Sửa thông tin học sinh</a>
            <a class="dropdown-item" href="../controllers/deletestudent.php">Xóa học sinh</a>
            <a class="dropdown-item" href="../controllers/addpoints.php">Nhập điểm học sinh</a>
            <!-- <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a> -->
          </div>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="../controllers/showclass.php">Danh sách lớp</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="../controllers/getthescoreboard.php">Nhận bảng điểm môn</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Báo cáo tổng kết
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="../controllers/subjectreport.php">Báo cáo kết quả môn học</a>
            <a class="dropdown-item" href="../controllers/termreport.php">Báo cáo kết quả tổng kết học kỳ</a>
            <!-- <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a> -->
          </div>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="../controllers/regulation.php">Quy Định</a>
        </li>
        <?php
        if(isset($_SESSION['loggedin'])){ 
        echo "
          <li class='nav-item dropdown'>
          <a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>"
          .strtoupper($_SESSION['name']) ."
          </a>
          <div class='dropdown-menu' aria-labelledby='navbarDropdown'>
            <a class='dropdown-item' href='../controllers/logout.php'>Đăng xuất <i class='fas fa-sign-out-alt'></i> </a>
            <div class='dropdown-divider'></div>
            <a class='dropdown-item' href='../controllers/adduser.php'>Tạo người dùng mới</a>
          </div>
      ";
        }
        else{
          echo "
            <li class='nav-item'>
              <a class='nav-link' href='login.html'>Đăng nhập</a>
            </li>
        ";
        }
        ?>
      </ul>
      <a href="../index.php" class="btn btn-outline-success my-2 my-sm-0">Về màn hình chính</a>
    </div>
  </nav>
  <div class="container mt-2">
        <h2 class="p-3 d-inline-block mb-2">Nhập Bảng Điểm Môn Học</h2> <br>
        <form action="addpoints.php" method="GET" style="display: flex;">
            <div class="dropdown ml-3" style="margin-right: 1%">
                <button type="button" id="class" class="btn btn-light border-secondary dropdown-toggle" data-toggle="dropdown">
                    Danh Sách Các Lớp
                </button>
                <div class="dropdown-menu">
                    <?php include'generateclass.php'?>
                </div>
            </div>
            <br>
            <div class="dropdown" style="margin-right: 1%">
                <button type="button" id="subject" class="btn btn-light border-secondary dropdown-toggle" data-toggle="dropdown">
                    Danh Sách Môn Học
                </button>
                <div class="dropdown-menu">
                    <?php include'generatesubject.php'?>
                </div>
            </div>
            <br>
            <div class="dropdown" style="margin-right: 1%">
                <button type="button" id="term" class="btn btn-light border-secondary dropdown-toggle" data-toggle="dropdown">
                    Danh Sách Học Kỳ
                </button>
                <div class="dropdown-menu">
                    <?php include'generateterm.php'?>
                </div>
            </div>
            <br>
            <button type="submit" class="btn btn-primary" style="margin-right: 1%">Xem</button>
        </form> 
  <div id="txtStatus" class="m-3 p-3 alert alert-success"></div>
  <div id="div-inform-success" class="m-3 p-3 alert alert-success" style="display: none"><i class="fas fa-times" style="line-height: 2; float: right" onclick="closeDivInform()"></i></div>
  <div id="div-inform-danger" class="m-3 p-3 alert alert-danger" style="display: none"><i class="fas fa-times" style="line-height: 2; float: right" onclick="closeDivInform()"></i></div>
  
<footer class="text-center m-4">Copyright &copy 2021 University Of Information And Technology. </footer>
</body>
</html>
<?php
 if ( isset($_GET['malop']))
 {
   include 'connectdb.php';
   $malop = $_GET['malop'];
   $tenmonhoc =$_GET['tenmonhoc'];
   $mahocky = $_GET['mahocky'];

   $sql ="select hs.mahocsinh, hs.hoten,hs.mahocsinh,mh.mamonhoc
   from HOCSINH hs, LOP l,  HOCKY hk, MONHOC mh
   where  hs.malop = l.malop
   and l.malop = '$malop'
   and mh.tenmonhoc = '$tenmonhoc'
   and hk.mahocky = '$mahocky'
   and hs.mahocsinh not in( select pd.mahocsinh from PHIEUDIEM pd where pd.mahocky='$mahocky' and pd.mamonhoc=mh.mamonhoc) 
   ";
   
   $result = $conn->query($sql);
  $sql2="select hs.mahocsinh, hs.hoten, pd.diem15p, pd.diem1t, pd.diemcuoiky,mh.mamonhoc
  from HOCSINH hs, LOP l, PHIEUDIEM pd, HOCKY hk, MONHOC mh
  where hs.mahocsinh = pd.mahocsinh
  and pd.mahocky = hk.mahocky
  and hs.malop = l.malop
  and mh.mamonhoc = pd.mamonhoc
  and l.malop = '$malop'
  and mh.tenmonhoc = '$tenmonhoc'
  and hk.mahocky = '$mahocky'";
  $result2= $conn->query($sql2);
 
  echo"
   <table class='table table-bordered table-hover'>
   <thead>
   <tr class='table-secondary'>
       <th>MSHS</th>
       <th>Họ tên</th>
       <th>Điểm 15 phút</th>
       <th>Điểm 1 tiết</th>
       <th>Điểm thi cuối học kỳ</th>
   </tr>
   </thead>
   <tbody>
   
   ";
// output data of each row
   if ($result->num_rows > 0) {
   $stt = 0;
   while($row = $result->fetch_assoc()) {
       $stt++;
       echo "<tr>";
       echo "<td>" .$row['mahocsinh']."</td>";
       echo "<td>" .$row['hoten'] ."</td>";
       echo "<input type='hidden' id='mamonhoc' value='".$row['mamonhoc']."'>
       <input type='hidden' id='malop' name='malop' value='".$malop."'>
       <input type='hidden' id='mahocky' name='mahocky' value='".$mahocky."'>
       <input type='hidden' id='mahocsinh".$stt."' name='mahocsinh' value='".$row['mahocsinh']."'>
       <td><input type='number' step='0.001' class='form-control' placeholder='Điền điểm 15 phút' id='diem15p".$stt."' name='diem15p' max='10' min='0' required></td>
       
       <td><input type='number' step='0.001' class='form-control' placeholder='Điền điểm 1 tiết' id='diem1t".$stt."' name='diem1t' max='10' min='0' required></td>
       <td><input type='number' step='0.001' class='form-control' placeholder='Điền điểm cuối kỳ' id='diemcuoiky".$stt."' name='diemcuoiky' max='10' min='0' required></td>
       <td><button type='submit' class='btn btn-primary' onclick='addpoint" .$stt ."()'>Thêm</button></td>";
       echo "</tr>";
       echo "<script>
     
        function addpoint" .$stt ."(){ 
          xhttp=new XMLHttpRequest();
          xhttp.onreadystatechange=function(){ 
            if (this.readyState == 4 && this.status==200){ 
               document.getElementById('txtStatus').innerHTML=this.responseText;
            }
           };
           var mamonhoc=document.getElementById('mamonhoc').value;
           
           var mahocky=document.getElementById('mahocky').value;
           var mahocsinh=document.getElementById('mahocsinh" .$stt ."').value;
           var diem15p=document.getElementById('diem15p" .$stt ."').value;
           var diem1t=document.getElementById('diem1t" .$stt ."').value;
           var diemcuoiky=document.getElementById('diemcuoiky" .$stt ."').value;
           var url='http://localhost/Student-Management-Website/controllers/formaddpoint.php?&mamonhoc='+mamonhoc+'&mahocky='+mahocky+'&mahocsinh='+mahocsinh+'&diem15p='+diem15p+'&diem1t='+diem1t+'&diemcuoiky='+diemcuoiky;
           
           xhttp.open('GET',url,true);
           xhttp.send();
        };
       
       </script>";
   }
   
   } 
   if ($result2->num_rows > 0){
    $stt1 = 0;
    while($row1 = $result2->fetch_assoc()) {
        $stt1++;
        echo "<tr>";
        echo "<td>" .$row1['mahocsinh']."</td>";
        echo "<td>" .$row1['hoten'] ."</td>";
        echo "<input type='hidden' id='mamonhoc' value='".$row1['mamonhoc']."'>
       <input type='hidden' id='malop' name='malop' value='".$malop."'>
       <input type='hidden' id='mahocky' name='mahocky' value='".$mahocky."'>
       <input type='hidden' id='smahocsinh".$stt1."' name='mahocsinh' value='".$row1['mahocsinh']."'>";
        echo "<td><input type='number' value='".$row1['diem15p']."' id='sdiem15p".$stt1."' class='form-control'  name='diem15p' max='10' min='0' required></td>";
        
        echo "<td><input type='number' value='".$row1['diem1t']."' id='sdiem1t".$stt1."' class='form-control'  name='diem1t' max='10' min='0' required></td>";
        echo "<td><input type='number' value='".$row1['diemcuoiky']."' id='sdiemcuoiky".$stt1."'  class='form-control'  name='diemcuoiky' max='10' min='0' required></td>";
        echo "<td><button type='submit' class='btn btn-primary' onclick='update".$stt1."()'>Sửa</button></td>";
        echo "</tr>";
        echo "<script>
     
        function update".$stt1."(){ 
          xhttp=new XMLHttpRequest();
          xhttp.onreadystatechange=function(){ 
            if (this.readyState == 4 && this.status==200){ 
               document.getElementById('txtStatus').innerHTML=this.responseText;
            }
           };
           var mamonhoc=document.getElementById('mamonhoc').value;
           
           var mahocky=document.getElementById('mahocky').value;
           var mahocsinh=document.getElementById('smahocsinh".$stt1."').value;
           var diem15p=document.getElementById('sdiem15p".$stt1."').value;

           var diem1t=document.getElementById('sdiem1t".$stt1."').value;
           var diemcuoiky=document.getElementById('sdiemcuoiky".$stt1."').value;
           var url='http://localhost/Student-Management-Website/controllers/updatepoint.php?&mamonhoc='+mamonhoc+'&mahocky='+mahocky+'&mahocsinh='+mahocsinh+'&diem15p='+diem15p+'&diem1t='+diem1t+'&diemcuoiky='+diemcuoiky;
           
           xhttp.open('GET',url,true);
           xhttp.send();
        };
       
       </script>";
    }
  }
  
   echo "
   </tbody>
   </table>
   </div>
   <footer class='text-center'>Copyright &copy 2021 University Of Information And Technology. </footer>
   <br>
   ";
   $conn->close();
}
  // if form has submited then ...
  
?>