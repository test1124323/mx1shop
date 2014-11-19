<input type="hidden" name="_method" id="_method" value="<?php echo $_POST['_method'];?>">
<input type="hidden" name="ModelCarID" id="ModelCarID" value="<?php echo @$_POST['ModelCarID'];?>">
<div class="row">
	<div class="col-lg-3">
		ชื่อยี่ห้อรถ
	</div>
	<div class="col-lg-6">
		<?php echo Form::select('BrandCarID',$result,@$_POST['BrandCarID'],array('class'=>'form-control','id'=>'BrandCarID'));?>
	</div>
</div>
<div class="row" style="margin-top:10px;">
	<div class="col-lg-3">
		รุ่นรถ
	</div>
	<div class="col-lg-6">
		<input class="form-control" placeholder="รุ่นรถ" name="ModelCarName" 
		id="ModelCarName" value="<?php echo @$_POST['ModelCarName'];?>">
	</div>
</div>