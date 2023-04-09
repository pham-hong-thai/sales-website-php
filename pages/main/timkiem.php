<?php
    

	if(isset($_POST['timkiem'])){
		$tukhoa = $_POST['tukhoa'];
        
	}
	$sql_pro = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc AND tbl_sanpham.tensanpham LIKE '%".$tukhoa."%'  ";
	$query_pro = mysqli_query($mysqli,$sql_pro);
	
?>
<div class="headline">
    <?php
        if(mysqli_num_rows($query_pro) > 0){
            echo '<h3>Tìm kiếm : '.$_POST['tukhoa'].'</h3>';
        } else {
            echo '<h3>Không tìm thấy sản phẩm nào phù hợp</h3>';
        }
    ?>
</div>

<div class="maincontent">
    <?php
    
        while($row_pro = mysqli_fetch_array($query_pro)){
            $discountedPrice = $row_pro['giasp'] - ($row_pro['giasp'] * ($row_pro['km'] / 100));
    ?>
        <ul>
            <div class="maincontent-item">
                <div class="maincontent-top">
                    <?php if($row_pro['km'] > 0): ?>
                        <div class="khuyenmai"><?php echo number_format($row_pro['km']) . '%' ?></div>
                    <?php endif; ?>
                    <div class="maiconten-top1">
                        <a href="index.php?quanly=chitiet&idsanpham=<?php echo $row_pro['id_sanpham'] ?>" class="maincontent-img">
                            <img src="./admincp/modules/quanlysp/uploads/<?php echo $row_pro['hinhanh'] ?>">
                        </a>
                        <button type="button" title="chi tiết" class="muangay">
                            <a href="index.php?quanly=chitiet&idsanpham=<?php echo $row_pro['id_sanpham'] ?>">Chi tiết</a>
                        </button>
                        <form method="POST" action="./pages/main/themgiohang.php?idsanpham=<?php echo $row_pro['id_sanpham'] ?>">
                            <button type="submit" title="thêm vào giỏ" name="themgiohang" class="giohang">
                                <a>thêm vào giỏ</a>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="maincontent-info">
                    <a href="index.php?quanly=sanpham&id=<?php echo $row_pro['id_sanpham'] ?>" class="maincontent-name">
                        <?php echo $row_pro['tensanpham'] ?>
                    </a>
                    <a href="index.php?quanly=sanpham&id=<?php echo $row_pro['id_sanpham'] ?>" class="maincontent-gia">
                        <?php if($row_pro['km'] > 0): ?>
                            <?php echo number_format($discountedPrice) . 'vnd' ?>
                            <span><?php echo number_format($row_pro['giasp']) . 'vnd' ?></span>
                        <?php else: ?>
                            <?php echo number_format($row_pro['giasp']) . 'vnd' ?>
                        <?php endif; ?>
                    </a>
                </div>
            </div>
        </ul>
    <?php } ?>
</div>
        