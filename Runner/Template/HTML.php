<?php

class Template_HTML {

	public function url($url, $return = false){
		$url = Path::resolve(HTACCESS ? BASE_PATH : SCRIPT_NAME, $url);
		if ($return) return $url;
		echo $url;
	}

}