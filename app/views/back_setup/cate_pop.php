<input type="hidden" name="_method" id="_method" value="<?php echo $_POST['_method'];?>">
<input type="hidden" name="parent" value="<?php echo $_POST['parent'];?>">
<input type="hidden" name="level" value="<?php echo $_POST['level'];?>">
<input type="hidden" name="CategoryID" id="CategoryID" value="<?php echo $_POST['CategoryID'];?>">
<div class="row">
	<div class="col-lg-3">
		ชื่อหมวดสินค้า
	</div>
	<div class="col-lg-6">
		<input class="form-control" placeholder="ชื่อหมวดสินค้า" name="CategoryName" 
		id="CategoryName" value="<?php echo $_POST['CategoryName'];?>">
	</div>
</div>