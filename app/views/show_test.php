<?php
include("webHead.php");
?>

<!-- content  -->
<div class="col-lg-12">
<pre>
<?php 
foreach ($data as $key => $value) {
  echo @$value['category_id'].'----';
  echo @$value['category_name'];
}

echo $aa;
echo "\n";
echo $inpt;
?>


</pre>
<div>

<?php
include("webFoot.php");
?>