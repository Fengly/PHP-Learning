<?php
function unhtml($content)
 {
    $content=htmlspecialchars($content,ENT_QUOTES,"gb2312");
    $content=str_replace(chr(13),"<br>",$content);
    $content=str_replace(chr(32),"&nbsp;",$content);
/*    $content=str_replace("[_[","<",$content);
    $content=str_replace("]_]",">",$content);
    $content=str_replace("|_|"," ",$content);*/
   return trim($content);
 }
 function msubstr($str,$start,$len) { 
 	$tmpstr='';
    $strlen=$start+$len; 
    for($i=0;$i<$strlen;$i++) { 
        if(ord(substr($str,$i,1))>0xa0) { 
            $tmpstr.=substr($str,$i,2); 
            $i++; 
        } else 
            $tmpstr.=substr($str,$i,1); 
    } 
    return $tmpstr; 
}
?>
