<?php


function insert_image($inputName,$destinationFolder,$outsite) {
$valid_extension = array("jpg","jpeg","png","gif","PNG",".pdf");
$filename = $_FILES[$inputName]['name'];
$file_size = $_FILES[$inputName]['size'];
if(!empty($filename)){
$file_tmp = $_FILES[$inputName]['tmp_name'];
$file_ext = pathinfo($filename,PATHINFO_EXTENSION);
$filename = pathinfo($filename,PATHINFO_FILENAME);
$filename = $filename."_".date('mjYHis').".".$file_ext;
$filename = $destinationFolder.'/'.$filename;
if(isset($outsite) AND $outsite  == 'outside'){
 $destinationFolder = $filename;
}else{
$destinationFolder = '../'.$filename;
}
if($file_size <= (400*1024)){
 if (in_array($file_ext,$valid_extension)) {
    move_uploaded_file($file_tmp,$destinationFolder);
 }
}else{
    if (in_array($file_ext,$valid_extension)) {
    compressedImage($file_tmp,$destinationFolder,50);
    }
}
}else{
 $filename = '';
}
return array(
'name' => $filename,
);
}

function update_image($inputName,$destinationFolder,$outsite) {
$valid_extension = array("jpg","jpeg","png","gif","PNG",".pdf");
$filename = $_FILES[$inputName]['name'];
$file_size = $_FILES[$inputName]['size'];
if(!empty($filename)){
$file_tmp = $_FILES[$inputName]['tmp_name'];
$file_ext = pathinfo($filename,PATHINFO_EXTENSION);
$filename = pathinfo($filename,PATHINFO_FILENAME);
$filename = $filename."_".date('mjYHis').".".$file_ext;
$filename = $destinationFolder.'/'.$filename;
if(isset($outsite) AND $outsite  == 'outside'){
  $destinationFolder = $filename;
}else{
$destinationFolder = '../'.$filename;
}
$unlink_img = '../'.$_POST[$inputName.'_txt'];
if($file_size <= (400*1024)){
 if (in_array($file_ext,$valid_extension)) {
    move_uploaded_file($file_tmp,$destinationFolder);
    unlink($unlink_img);
 }
}else{
    if (in_array($file_ext,$valid_extension)) {
    compressedImage($file_tmp,$destinationFolder,50);
    unlink('../'.$_POST[$inputName.'_txt']);
    }
}
}else{
 $filename = $_POST[$inputName.'_txt'];
}
return array(
'name' => $filename,
);
}
function compressedImage($source, $path, $quality) {

            @$info = getimagesize(@$source);

            if (@$info['mime'] == 'image/jpeg')
                @$image = imagecreatefromjpeg(@$source);

            elseif (@$info['mime'] == 'image/gif')
                @$image = imagecreatefromgif(@$source);

            elseif (@$info['mime'] == 'image/png')
                @$image = imagecreatefrompng(@$source);

            @imagejpeg(@$image, @$path, @$quality);

    }
?>
