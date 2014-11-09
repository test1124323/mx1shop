<?php
$path   = Request::root()."/";
include("funcHead.php");

// echo $stat;
?>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="author" content="mx1shop">
  <meta name="type" content="website">
  <title>MX1 Shop::</title>
  <meta name="description" content="ศูนย์รวมประดับยนต์ เครื่องเสียง กล้องบันทึกภาพ กล้องถอย ไฟซีนอน ไฟเดย์ไลท์ ไฟแฟลช ไฟหรี่ เซนเซอร์กันขโมย ปลายท่อ กันสาด กันแมลง โครเมี่ยมตกแต่งรถยนต์ หน้ากากวิทยุ สอบถามข้อมูลเพิ่มเติมได้นะครับ
แม็กซ์
โทร : 081-7009767, 083-0208068
ไลน์ : oxymaxy
อีเมลล์ : lee.pradubyon@gmail.com">

<style type="text/css">
  body{
    background:#F1F1F1 !important;
  }
 
</style>
<!-- content  -->
<div class="col-sm-12 " style="padding-bottom:100px;">
  <div class="col-sm-1 "></div>


  <div class="col-sm-9 login"> 
  <div class="col-sm-12">
    <div class="col-sm-1 login"></div>
    <div class="col-sm-11">

    <?php
    if(Input::has('E')&&Input::get('E')=='success'){ ?>
      <h4>
      <div class="alert alert-success" role="alert" align="center">ลงทะเบียนเรียบร้อยกรุณารับรหัสผ่านจากอีเมล์ที่ใช้ลงทะเบียน</div>
      </h4>
    <?php }elseif(!empty($E)){
      if($E=='1'||$E=='2'){
      ?>
      <h4>
      <div class="alert alert-danger" role="alert" align="center">ชื่อผู้ใช้ หรือ รหัสผ่านไม่ถูกต้อง</div>
      </h4>
      <?php
      }
    }

    ?>

    </div>
  </div>

    <div class="col-sm-1 login"></div>
    
    <div class="col-sm-5" style="background:#FFF;padding:0px;">

      <div class="col-sm-12 login-head">
         ล็อกอิน
      </div>
      <form method="post" name='loginform' action = "<?php echo Request::root()?>/login">
      <div class="col-sm-12 form-row" style="padding:40px;">
        <input type="text" class="form-control square" placeholder="Username or Email" name="loguser" />
        <div class="col-sm-12" style="padding:15px"></div>
        <input type="password" class="form-control square" placeholder="Password" name="logpass" />
        <div class="col-sm-12" style="padding:15px"></div>
        <div class="col-sm-12">
            <button class="btn btn-danger col-sm-12" style="padding:5px;font-size:18px;" type="submit"><b>เข้าสู่ระบบ</b></button>          
        </div>
        
        <div class="col-sm-12" style="padding:5px"></div>
        <div class="col-sm-12">
            <a href="<?php echo Request::root()?>/main"><button class="btn btn-default col-sm-12" type="button">กลับสู่หน้าหลัก</button></a>
        </div>


        <div class="col-sm-12" style="color:#999999;padding:40px 15px 55px 15px;">
          
        กรุณาสมัครสมาชิกเพื่อความสดวกในการสั่งซื้อและติดตามสินค้าของท่าน <br/> 
        </div>
        <h1 style="text-align:center;color:#EFEFEF;" >Mx1shop</h1>

        


      </div>
      </form>
    </div>
    <div class="col-sm-6" style="background:#F9F9F9;padding:0 0 20px 0;">
    <style type="text/css">
    input{
      background:#F9F9F9 !important;
      padding: 5px !important;
    }
    </style>
      <div class="col-sm-12 login-head" style="background:rgba(220,0,20,0.8);">
        สมัครสมาชิก
      </div>
      <form method="post" name="registerform" action = "<?php echo Request::root()?>/registeration">
          <div class="col-sm-12" style="padding:20px;">
          
          <div class="col-sm-11">
            <h3> </h3>
            <!-- <h4 class="h3-label">ชื่อ <span class="text-color-red">*</span></h4> -->
            <input type="text" class="form-control square" placeholder="ชื่อ" name="fname" required />
          </div>
          <div class="col-sm-11">
            <h3> </h3>
            <!-- <h4 class="h3-label">สกุล <span class="text-color-red">*</span></h4> -->
            <input type="text" class="form-control square" placeholder="สกุล" name="lname"  required />
          </div>
          
          <!-- !row -->
          <!-- row -->
          <div class="col-sm-11">
          <h3> </h3>
            <!-- <h4 class="h3-label">ที่อยู่ <span class="text-color-red">*</span></h4> -->
            <input type="text" class="form-control square" name="address" placeholder="ที่อยู่ในการจัดส่งสินค้า" required />
          </div>
          
          <!-- !row -->
          <!-- row -->
          <div class="col-sm-11">
          <h3> </h3>
            <!-- <h4 class="h3-label">รหัสไปรษณีย์ <span class="text-color-red">*</span></h4> -->
            <input type="tel" class="form-control square" name="postcode" placeholder="รหัสไปรษณีย์" required />
          </div>
          <div class="col-sm-11">
          <h3> </h3>
            <!-- <h4 class="h3-label">เบอร์โทรศัพท์ <span class="text-color-red">*</span></h4> -->
            <input type="tel" class="form-control square" name="telnumber" placeholder="เบอร์โทรศัพท์" required />
          </div>
          
          <!-- !row -->
          <!-- row -->
          <div class="col-sm-11">
          <h3> </h3>
            <!-- <h4 class="h3-label">E-mail <span class="text-color-red">*</span></h4> -->
            <input type="email" class="form-control square" name="email" placeholder="example@email.com" required />
          </div>
          </div>
          <div class="col-sm-12" style="padding:20px;">
            <button class="btn btn-danger col-sm-12" style="padding:10px;font-size:18px;" type="submit"><b>ลงทะเบียน</b></button>          
        </div>
      </form>
    </div>

    

  </div>
</div>

<!-- /content -->


<?php
// include("webFoot.php");
?>