<?php
function stripUnicode($str){ 
  if(!$str) return false; 
   $unicode = array( 
    'a'=>'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ', 
    'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ', 
    'd'=>'đ', 
    'D'=>'Đ', 
    'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ', 
    'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ', 
    'i'=>'í|ì|ỉ|ĩ|ị',       
    'I'=>'Í|Ì|Ỉ|Ĩ|Ị', 
    'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ', 
    'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ', 
    'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự', 
    'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự', 
    'y'=>'ý|ỳ|ỷ|ỹ|ỵ', 
    'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ' 
   ); 
    foreach($unicode as $khongdau=>$codau) { 
        $arr=explode("|",$codau); 
        $str = str_replace($arr,$khongdau,$str); 
    } 
return $str; 
} 
function changeTitle($str){ 
    $str=trim($str); 
    if ($str=="") return ""; 
    $str =str_replace('"','',$str); 
    $str =str_replace("'",'',$str); 
    $str = stripUnicode($str); 
    $str = mb_convert_case($str,MB_CASE_LOWER,'utf-8'); 
     
    // MB_CASE_UPPER / MB_CASE_TITLE / MB_CASE_LOWER 
    $str = str_replace(' ','-',$str); 
    return $str; 
}
function cate_parent($data, $parent=0,$str="--", $select=0){
    foreach ($data as $val) {
        $id = $val["id"];
        $category_name = $val["category_name"];
        if($val["prarent_id"] == $parent){
        if($select != 0 && $id == $select){
            echo "<option value='$id' selected='selected'>$str $category_name</option>";
        }else{
            echo "<option value='$id'>$str $category_name</option>";
        }
                cate_parent($data, $id, $str."---", $select);
        }  
    }
}

function menu_cha($menu_category, $parent=0){
    foreach ($menu_category as $val) {
        $id = $val["id"];
        $category_name = $val["category_name"];
        $alias = $val["alias"];
        if($val["prarent_id"] == $parent){
            echo "<li>";
            echo "<a href='danh-muc/$alias'>";
            echo "<span class='cat-thumb hidden-md hidden-sm hidden-xs'></span>$category_name";
            echo "</a>";
            echo "</li>";
        }
    }
}

function menu_category($menu_category, $namecate, $parent=0){
    foreach ($menu_category as $val) {
        $id = $val["id"];
        $category_name = $val["category_name"];
        $alias = $val["alias"];
        if($val["prarent_id"] == $parent){
            if ($namecate->alias === $alias) {
                echo "<li class='active'>";
            }
            else {
                echo "<li>";
            }
            echo "<a href='$alias'>";
            echo "<span class='cat-thumb hidden-md hidden-sm hidden-xs'></span>$category_name";
            echo "</a>";
            echo "</li>";
            
        }
    }
}
