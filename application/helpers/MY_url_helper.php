<?php


function asset_url() {
	return base_url () . '/';
}

function app_name(){
	echo 'Red Analytics';
}

function dd($var=false){
if(!$var){
	exit();
}else{
	var_dump($var);
	exit();
}


}
?>