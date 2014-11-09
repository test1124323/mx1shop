<h1 style="color:rgba(255,0,0,0.7)">Mx1Shop</h1>
<h3>เรียน คุณ<?php echo $user->FullName;?></h3>
<h3>คุณได้ทำการสมัครสมาชิกกับทางร้าน Mx1Shop เรียบร้อยแล้ว</h3>
<h3>username ที่ใช้ในการเข้าสู่ระบบของคุณคือ</h3>
<h2><?php echo $user->UserName;?></h2> 
<h3>รหัสผ่าน</h3>
<span style="background:#444;color:#888;padding:10px;font-size:26px;"><?php echo $realpass?></span>
<h4>กรุณาใช้ Email ของท่านในการ login บนหน้าเว็ปในครั้งต่อ ๆ เพื่อตรวจสอบและสั่งซื้อสินค้าจากทางร้าน</h4>
<h4>คุณสามารถเข้าสู่ระบบเพื่อทำการสั่งซื้อสินค้ากับทางร้านของเราได้ที่ <a href="http://mx1shop.com/public/login">Mx1Shop</a></h4>