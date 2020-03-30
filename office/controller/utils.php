<?php 
class Utils {
	public function upload_image($lock_dir, $file, $file_tmp, $file_size){
		$lock_file = $lock_dir . basename($file);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($lock_file,PATHINFO_EXTENSION));

		if ($file_size > 5000000) {
		    echo "Sorry, your file is too large.";
		    $uploadOk = 0;
		}
		
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		    echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
		    if (move_uploaded_file($file_tmp, $lock_file)) {
		    	copy ($lock_dir . $file, "../" . $lock_dir . $file);
		    	return true;
		    } else {
		        return false;
		    }
		}
	}
}
?>
