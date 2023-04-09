<?php
    
	if(isset($_POST['dangky'])) {
		$tenkhachhang = $_POST['hoten'];
		$diachi = $_POST['diachi'];
		$dienthoai = $_POST['dienthoai'];
		$email = $_POST['email'];
		// $matkhau = md5($_POST['matkhau']);
		$matkhau = md5($_POST['matkhau']);
		$id_role = $_POST['role_id'];
		
		// Validate input fields
		if(empty($tenkhachhang) || empty($diachi) || empty($dienthoai) || empty($email) || empty($_POST['matkhau'])) {
			echo '<h3>Vui lòng điền đầy đủ thông tin</h3>';
		} elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			echo '<h3>Vui lòng nhập email hợp lệ</h3>';
		} elseif (strlen($_POST['matkhau']) < 6) {
			echo '<h3>Mật khẩu phải có ít nhất 6 ký tự</h3>';
		} else {
			// Insert data into database
			$sql_dangky = mysqli_query($mysqli,"INSERT INTO tbl_khackhang(tenkhachhang,diachi,dienthoai,email,matkhau,role_id) VALUE('".$tenkhachhang."','".$diachi."','".$dienthoai."','".$email."','".$matkhau."',4)");
			
			if($sql_dangky){
				$_SESSION['dangky'] = $tenkhachhang; 
				$_SESSION['id_khachhang'] = mysqli_insert_id($mysqli); // luu id khach hang de thanh toan
				
				header('Location:index.php?quanly=chitiet&idsanpham=');
			} else {
				echo '<h3>Có lỗi xảy ra khi đăng ký. Vui lòng thử lại sau.</h3>';
			}
		}
	}
	
	
?>

<form action="#" method="POST" > 
    <div class="login-dkdn">
        <h2> Đăng kí  </h2>
        <input type="text" placeholder="Họ tên " name="hoten" ><br>
        <input type="text" placeholder="Địa chỉ nhận hàng " name="diachi" ><br>
        <input type="text" placeholder="Số điện thoại " name="dienthoai"><br>
       
        <input type="text" placeholder="Email" name="email"><br>
        <input type="password" placeholder="Mật Khẩu" name="matkhau"><br>
        <button name="dangky" >Đăng kí </button>
        <div  ><a href="./index.php"><p > ←  Quay lại trang chủ</p> </a></div>
    </div>
</form>