<?php
    $sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
    $query_danhmuc = mysqli_query($mysqli,$sql_danhmuc);
    
?>
            <div class="sidebar" >
                <a  href="./index.php" class="header-slb"><img src="./assets/img/logo.png" alt="logo" height = auto width = 60%></a>
                <ul>
                    <li ><a href="index.php?quanly=shopall">Tất cả sp</a></li>
                    <li ><a href="index.php?quanly=sale">Khuyến mãi</a></li>
                    <?php
                        while($row_danhmuc = mysqli_fetch_array($query_danhmuc)){
                    ?>
                    <li><a href="index.php?quanly=danhmuc&id=<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></a></li>
                    
                    <?php
                        }
                    ?>



                    <div class="lienhe_tick">
                        <li ><a href="#"><i class=" ti-hand-point-right"></i>Liên hệ</a></li>
                        <ul class="lienhe">
                            <li><a href="https://www.facebook.com/hadesvietnam/">Facebook</a></li>
                            <li><a href="https://www.instagram.com/accounts/login/">Instagram</a></li>
                            
                        </ul>
                    </div>
                </ul>
            </div>