<?php
$act = '1';
include("backHeader.php");
include("function.php");
?>
<script type="text/javascript">
  function ProductPic(){
    $('#form-input').attr('action','ProductPic').submit();
  }
</script>
<ol class="breadcrumb" style="margin-top:-15px;">
  <li><a href="#">หน้าแรก</a></li>
  <li class="active">รายการสินค้า</li>
</ol>
<div class="panel panel-default" style="margin-top:-20px;">
  <div class="panel-body">

<div class="panel panel-primary" style="width:100%;">
	<div class="panel-heading">
		<h3 class="panel-title"><i class='glyphicon glyphicon-cog'></i> รายการสินค้า</h3>
	</div>
	<div class="panel-body">
  <div >
  <a href="ProductForm">
  	<button class="btn btn-success btn-xs" data-toggle="modal" 
  	data-target=".bs-example-modal-lg" >
  	<i class='glyphicon glyphicon-plus'></i> เพิ่มข้อมูล</button>
  	</a>
    
    <button type="button" onclick="ProductPic();" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-picture"></i> จัดการภาพ</button>
    
  </div>
  <div class="table-responsive" style="margin-top:10px;">
  <form method="post" action="#" id="form-input">
        <table class="table table-hover table-bordered" >
      <thead class="bg_tb">
        <tr>
          <th width="5%"><div style=" text-align: center;">
          <input type="checkbox" name="chk_all"  > ลำดับ</div></th>
          <th width="20%"><div style=" text-align: center;">ชื่อรายการสินค้า</div></th>
          <th width="15%"><div style=" text-align: center;">หมวดสินค้า</div></th>           
          <th width="5%"><div style=" text-align: center;">จำนวน</div></th>
          <th width="8%"><div style=" text-align: center;">ราคาขาย/หน่วย</div></th>
          <th width="30%"><div style=" text-align: center;">รายละเอียด</div></th>
          <th width="20%"><div style=" text-align: center;">จัดการ</div></th>
        </tr>
      </thead>
      <tbody>
      <?php 
      if($product){
        $to = $product->getTo();
        $i=$product->getFrom()-1;
        foreach ($product as $key => $value) {
          # code...
          ?>
          <tr>
              <td style=" text-align: center;" >
              <input type="checkbox" name="chk_productID[]" value="<?php echo $value['ProductID'];?>" > <?php echo ++$i.".";?>
              </td>
              <td><?php echo $value['ProductName'];?></td>
              <td><?php
                $ProCate = DB::table('tbl_productcate')
                ->join('tbl_category', 'tbl_productcate.CategoryID', '=', 'tbl_category.CategoryID')
                ->where('tbl_productcate.ProductID','=',$value['ProductID'])->get();
                //print_r($ProCate);
                $ProCate = objectToArray($ProCate);
                if($ProCate){
                  foreach ($ProCate as $key2 => $value2) {
                    echo "<li>".$value2['CategoryName']."</li>";
                  }
                }
              ?></td>
              <td style="text-align:right;"><?php echo number_format($value['ProductAmount']);?></td>
              <td style="text-align:right;"><?php echo number_format($value['ProductSalePrice'],2);?></td>
              <td>
      <div class="panel-group" id="accordion">
      <div class="panel panel-info">
        <div class="panel-heading">
          <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
             รายละเอียดแบบย่อ
            </a>
          </h4>
        </div>
        <div id="collapseOne" class="panel-collapse collapse in">
          <div class="panel-body">
            <?php echo $value['ProductShortDESC'];?>
        </div>
      </div>
      <div class="panel panel-info">
        <div class="panel-heading">
          <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
             รายละเอียดแบบเต็ม
            </a>
          </h4>
        </div>
        <div id="collapseTwo" class="panel-collapse collapse">
          <div class="panel-body">
          <?php echo $value['ProductDESC'];?>
          </div>
        </div>
      </div>
     </td>
     <td style=" text-align: center;">
       <button type="button" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-picture"></i> จัดการภาพ</button>
       <button type="button" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-pencil"></i> แก้ไข</button>
       <button type="button" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> ลบ</button>
     </td>
        </tr>
          <?php
        }
      }
      ?>

      </tbody>
    </table>
  </form>
   </div>
<!--start page-->
   <div style="text-align:right;" ><?php echo $product->links(); ?></div>
<!--end page-->
</div>
</div>

</div><!--panel-body-->
</div><!--panel panel-default-->
<?php 
include("backFoot.php");
?>