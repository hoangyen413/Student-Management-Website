<?php
    include "connectdb.php";
    $act = $_GET["act"];
      

    // Edit Reulation
    if ($act == "editRegulation")
    {
        $mathamso = $_GET['mathamso'];
        $giatri = $_GET['giatri'];
        $sql = "update THAMSO set giatri = '$giatri' where mathamso = '$mathamso';" ;
        if($conn->query($sql)==TRUE)
        {echo "Sửa thành công";}
        else{echo "Sửa thất bại";}
        $conn->close();
    }
    // delete regulation
    elseif ($act == "deleteRegulation")
    {
        $mathamso = $_GET['mathamso'];
        $sql = "delete from THAMSO where mathamso ='$mathamso'";
            
            $conn->close();
    }
    // Increase Subject
    elseif ($act == "increaseSubject")
    {
        $tenmonhoc = $_GET['tenmonhoc'];
        $mamonhoc = $_GET['mamonhoc'];
        
        $sql = "insert into MONHOC values ('$mamonhoc', '$tenmonhoc')" ;
        
        if($conn->query($sql)==TRUE){ 
            echo "Thêm thành công";
        }else{ 
            echo "Error in ".$sql."<br>".$conn->error;
        }
        $conn->close();
    }

    // Edit Subject
    elseif ($act == "editSubject")
    {
        $mamonhoc = $_GET['mamonhoc'];
        $tenmonhoc = $_GET['tenmonhoc'];
        $sql = "update MONHOC set tenmonhoc = '$tenmonhoc' where mamonhoc = '$mamonhoc';" ;
        // echo "$sql";
        // die();
        if($conn->query($sql)==TRUE){ 
            echo "Sửa thành công";
        }else{ 
            echo "Error in ".$sql."<br>".$conn->error;
        }
        $conn->close();
    }

    // Delete Subject
    elseif ($act == "deleteSubject")
    {
        $mamonhoc = $_GET['mamonhoc'];
        if($mamonhoc==NULL){echo "Nhập mã môn học cần xóa";}else{
        $check="select * from PHIEUDIEM where mamonhoc ='$mamonhoc'";
        $result=$conn->query($check);
        if ($result->num_rows ==0) {
            $sql = "delete from MONHOC where mamonhoc ='$mamonhoc'";
            
            echo "Xóa thành công!";
            $conn->close();
        }else {
            echo "Không thể xóa!";
            $conn->close();
        }
    }
    }
      // Increase Class
      elseif ($act == "increaseClass")
      {
          $malop = $_GET['malop'];
          $tenlop = $_GET['tenlop'];
          $sql = "insert into lop(malop,tenlop) values ('$malop', '$tenlop')" ;
          if($conn->query($sql)==TRUE){ 
            echo "Thêm thành công";
        }else{ 
            echo "Error in ".$sql."<br>".$conn->error;
        }
        $conn->close();
      }
     // Edit Class
     elseif ($act == "editClass")
     {
         $malop = $_GET['malop'];
         $tenlop = $_GET['tenlop'];
         $sql = "update LOP set tenlop = '$tenlop' where malop = '$malop';" ;
         // echo "$sql";
         // die();
         if($conn->query($sql)==TRUE){ 
            echo "Sửa thành công";
        }else{ 
            echo "Error in ".$sql."<br>".$conn->error;
        }
        $conn->close();
     }
     else if($act == "moveclass"){ 
        $malop = $_GET['malop'];
        $malopk = $_GET['malopk'];
        
        $sql="select * from HOCSINH where malop='$malop' and NOT EXISTS(select * from PHIEUDIEM where HOCSINH.mahocsinh=PHIEUDIEM.mahocsinh and mahocky like 'hk2%')";
        $result=$conn->query($sql);
        if ($result->num_rows>0)
        {echo "Chưa nhập điểm học kỳ 2";
            $conn->close();
        }
        else{ 
            $sql4="select giatri from THAMSO where mathamso='HS15P'";
            $result4=$conn->query($sql4);
            $hs15p=$result4->fetch_assoc();
            $sql5="select giatri from THAMSO where mathamso='HS1T'";
            $result5=$conn->query($sql5);
            $hs1t=$result5->fetch_assoc();
            $sql6="select giatri from THAMSO where mathamso='HSHK'";
            $result6=$conn->query($sql6);
            $hshk=$result6->fetch_assoc();
            $mysql="select distinct hs.mahocsinh from HOCSINH hs, PHIEUDIEM pd where malop='$malop' and hs.mahocsinh=pd.mahocsinh 
            and (pd.diem15p * ".$hs15p["giatri"]." + pd.diem1t * ".$hs1t["giatri"]." + pd.diemcuoiky * ".$hshk["giatri"].")/".($hs15p["giatri"]+$hs1t["giatri"]+$hshk["giatri"])." < (
            select giatri
            from THAMSO
            where THAMSO.mathamso = 'ĐLL')";
            $results=$conn->query($mysql);
            $stt1=0;
            
            if ($results->num_rows>0){ 
               
                while($row=$results->fetch_assoc()){ 
                    $stt1++;
                    $sl = "update HOCSINH set malop ='".$malopk."' WHERE mahocsinh='".$row["mahocsinh"]."'; ";
                    $resultsl=$conn->query($sl);
                }
            }
            $sql1="select maloptt from LOP where malop='$malop'";
            $result1 = $conn->query($sql1);
            $gt=$result1->fetch_assoc();
            $sql2="update HOCSINH set malop ='".$gt["maloptt"]."' WHERE malop='$malop'";
            $sql3="update LOP set siso='".($gt["siso"]-$stt1)."' WHERE malop='".$gt["maloptt"]."'";
            $result3=$conn->query($sql3);
            if( $conn->query($sql2)==TRUE){ 
                echo"Lên lớp thành công!";
                $conn->close();
            }else{ 
                echo "thất bại";
                $conn->close();
            }
            
            
        }
        
        
     }
    // delete Class
    elseif ($act == "deleteClass")
    {
        
        $malop = $_GET['malop'];
        $check="select * from HOCSINH where malop='$malop' ";
        $result=$conn->query($check);
        if ($result->num_rows ==0) {
            $sql = "delete from LOP where malop='$malop'";
            
            echo "Xóa thành công";
            $conn->close();
        }else {
            echo "Không thể xóa";
            $conn->close();
        }
        
    }

   
?>
