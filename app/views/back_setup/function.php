<?php 
function showModal($id='myModal',$showdisp='showdisp1',$title){
echo '<form method="post" id="frm_pop">
<div class="modal fade" id="'.$id.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" width="200px">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
        <span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">'.$title.'</h4>
      </div>
      <div class="modal-body" id="'.$showdisp.'">
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-primary">บันทึกข้อมูล</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
        
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</form>';
}
?>