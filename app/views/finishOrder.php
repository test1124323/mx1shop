<?php
include("webHead.php");

?>
<script>
window.location.href="#list";
</script>
<!-- content  -->
<div class="headtag col-lg-4"><h4 class="textwhite headtext" style="color:#888;">รถเข็น</h4></div>
<div style="border:2px solid #F22; margin:40px 0px 0 8px; border-radius:0px; width:98%; border-top-left-radius:5px;border-top-right-radius:5px;"></div>
<div style="padding-left:20px;"><h2 class="title-text-x">รายการสินค้าในรถเข็น</h2></div>
<div style="padding-left:0px;"><br/>
<?php
echo "<pre>";
 // [detail] => Array
 //                (
 //                    [ProductID] => 4
 //                    [ProductName] => ไฟหน้า
 //                    [ProductLastCost] => 
 //                    [ProductSalePrice] => 2200
 //                    [ProductAmount] => 1
 //                    [ProductShortDESC] => 
 //                    [ProductDESC] => 
 //                    [ProductDate] => 2014-10-10
 //                    [ProductStatus] => 1
 //                    [ProductCode] => 
 //                    [product_img] => Array
 //                        (
 //                            [0] => Array
 //                                (
 //                                    [ProductImgID] => 24
 //                                    [ProductID] => 4
 //                                    [ProductIMG] => 2014101602124800.jpg
 //                                    [ProductThumb] => 
 //                                    [StatusFirst] => 2
 //                                )

print_r($productInCart);
?>

<div class="col-sm-12" style="height:200px;"></div>
<!-- /content -->


<?php
include("webFoot.php");
?>