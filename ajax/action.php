<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

use App\Helper\ProductManager;

if(count($_REQUEST)>0 && in_array($_REQUEST['action'],array('Add','Delete','Update','GetInfo'))){
	
	switch ($_REQUEST['action']) {
    case 'Add':
        $result=ProductManager::Add(array('IBLOCK_ID'=>IBLOCK_ID_CATALOG,'NAME'=>$_REQUEST['name'],'PROPERTY_VALUES'=>array('COLOR'=>$_REQUEST['color'],'SIZE'=>$_REQUEST['size'])));
        break;
    case 'Delete':
        $result=ProductManager::Delete($_REQUEST['id']);
        break;
    case 'Update':
        $result=ProductManager::Update($_REQUEST['id'],array('NAME'=>$_REQUEST['name'],'PROPERTY_VALUES'=>array('COLOR'=>$_REQUEST['color'],'SIZE'=>$_REQUEST['size'])));
        break;
	case 'GetInfo':
        $result=ProductManager::GetInfo($_REQUEST['id']);
        break;
	}
	
	echo json_encode($result);
}
?>