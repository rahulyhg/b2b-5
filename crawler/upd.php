<?php
require_once('config.php');

$infolist = $db->select('address,userid','enenewsmemberadd');

foreach($infolist as $key=>$val)
{
    $uarr = $db->select('userid,id','enecms_news',"userid=".$val['userid']);
    foreach($uarr as $uinfo)
    {
        $db->update(array('address1'=>$val['address']),"enecms_news_data_1","id=".$uinfo['id']);
    }
}
?>