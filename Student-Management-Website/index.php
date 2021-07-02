<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Học Sinh</title>
     <!-- bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>   
    <!-- fontawesome -->
    <script src="https://kit.fontawesome.com/c9801e10cc.js" crossorigin="anonymous"></script>
    <!-- font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <!-- css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php">Quản Lý Học Sinh <i class="fas fa-school text-secondary"></i></a>
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
            <a class="dropdown-item" href="controllers/addstudent.php">Tiếp nhận học sinh</a>
            <a class="dropdown-item" href="controllers/editstudent.php">Sửa thông tin học sinh</a>
            <a class="dropdown-item" href="controllers/deletestudent.php">Xóa học sinh</a>
            <a class="dropdown-item" href="controllers/addpoints.php">Nhập điểm học sinh</a>
            <!-- <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a> -->
          </div>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="controllers/showclass.php">Danh sách lớp</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="controllers/getthescoreboard.php">Nhận bảng điểm môn</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Báo cáo tổng kết
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="controllers/subjectreport.php">Báo cáo kết quả môn học</a>
            <a class="dropdown-item" href="controllers/termreport.php">Báo cáo kết quả tổng kết học kỳ</a>
            <!-- <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a> -->
          </div>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="controllers/regulation.php">Quy Định</a>
        </li>
        <?php
        session_start();
        if(isset($_SESSION['loggedin'])){ 
        echo "
          <li class='nav-item dropdown'>
          <a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>"
          .strtoupper($_SESSION['name']) ."
          </a>
          <div class='dropdown-menu' aria-labelledby='navbarDropdown'>
            <a class='dropdown-item' href='controllers/logout.php'>Đăng xuất <i class='fas fa-sign-out-alt'></i> </a>
            <div class='dropdown-divider'></div>
            <a class='dropdown-item' href='controllers/adduser.php'>Tạo người dùng mới</a>
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
      <form class="form-inline my-2 my-lg-0" action="controllers/searchstudent.php" method='POST'>
        <input class="form-control mr-sm-2" type="text" placeholder="Tên học sinh" aria-label="Search" name="searchstudent">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tra cứu</button>
      </form>
    </div>
  </nav>
  <!-- img in the index file -->
  <div class="container-fluid">
    <img src="images/img1.jpg" style="width:100%" alt="image of a class" class="img-fluid img-thumbnail">
  </div>
  <!-- footer copyright -->
  <footer class="text-center m-4">Copyright &copy 2021 University Of Information And Technology. </footer>
</body>
</html>