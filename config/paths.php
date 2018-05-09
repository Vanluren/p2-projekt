<?php
/**
 * HER BEGYNDER VI AT LAVE PATHS TIL ALT!
 * VI STARTER MED AT SÆTTE ROOT_PATH
 */
	//Vi finder request url'en
	$REQ_URI = $_SERVER['REQUEST_URI'];
	//deler hvert led ind i et array
	$REQ_URI_EXPL = explode('/', $REQ_URI);

    //Hvis src findes i array'et, så ved vi at pathen er til en subdir
    if(in_array('src',$REQ_URI_EXPL)){
        //Så finder vi hvor fra vi skal fjerne alle subir paths
        $src_index = array_search('src', $REQ_URI_EXPL);
        //så slicer du fra 0 til første subdir path
        $ROOT = array_slice($REQ_URI_EXPL,0, $src_index);
        //vi bygger stien igen
        $ROOT_DIR_PATH = implode('/',$ROOT);

        //og sætter ROOT_PATH som global variabel
        define('ROOT_PATH', $ROOT_DIR_PATH);

    }else{
        //hvis ikke src findes i arrayet, ved vi at vi er i root-folderen
        //så vi sætter globale variabler til den nuværende sti.
        define('ROOT_PATH', $REQ_URI);
    }

define('CONFIG_PATH', dirname(__FILE__));
define('PUBLIC_PATH', ROOT_PATH.'/public');

define('ASSETS_PATH', ROOT_PATH.'/src/assets');
define('ASSETS_IMAGES_PATH', ASSETS_PATH.'/images');


define('UPLOADS_IMAGES_PATH', $_SERVER['DOCUMENT_ROOT'].ROOT_PATH.'/uploads/images/' );

define('JS_PATH', PUBLIC_PATH.'/js');
define('STYLES_PATH',PUBLIC_PATH.'/styles');
define('PUBLIC_IMAGES_PATH', PUBLIC_PATH.'/images');
