<?php
namespace App\Helper;

use Bitrix\Main\Loader,
	CIBlockElement; 
Loader::includeModule("iblock");

class ProductManager{
    
    public static function Add($fields)
    {
		if(is_array($fields) && count($fields)>0){
		  /* $result = \Bitrix\Iblock\ElementTable::add(
				$fields
			);
			if($result->isSuccess())
			{
				$ID = $result->getId();
				return array('status'=>'success','ID'=>$ID);
			}
			else
			{
				$error = $result->getErrorMessages();
				return array('status'=>'error','error'=>$error);
			}*/
			
			$el = new CIBlockElement;
			if($ID = $el->Add($fields))
				return array('status'=>'success','res'=>'Новый элемент id '.$ID);
			else
				return array('status'=>'error','error'=>$el->LAST_ERROR);		
		}else{
			return array('status'=>'error','error'=>'Не верно переданные данные');
		}
    }
	 public static function Delete($id)
    {
		if($id>0){
			/*$result = \Bitrix\Iblock\ElementTable::delete($id);
			if($result->isSuccess())
			{
				return array('status'=>'success');
			}
			else
			{
				$error = $result->getErrorMessages();
				return array('status'=>'error','error'=>$error);
			} */
			
			$el = new CIBlockElement;
			if($ID = $el->Delete($id))
				return array('status'=>'success','res'=>'Элемент '.$id.' удален');
			else
				return array('status'=>'error','error'=>$el->LAST_ERROR);			
		}else{
			return array('status'=>'error','error'=>'Введите верный id');
		}
       
    }
	
	 public static function Update($id, $fields)
    {
		if(is_array($fields) && count($fields)>0 && $id>0){
			/*$result = \Bitrix\Iblock\ElementTable::update(
				$id,
				$fields
			);
			if($result->isSuccess())
			{
				return array('status'=>'success');
			}
			else
			{
				$error = $result->getErrorMessages();
				return array('status'=>'error','error'=>$error);  
			} */
			
			$el = new CIBlockElement;
			if($ID = $el->Update($id, $fields))
				return array('status'=>'success','res'=>'Элемент '.$id.' обнавлен');
			else
				return array('status'=>'error','error'=>$el->LAST_ERROR);		
			
        }else{
			return array('status'=>'error','error'=>'Не верно переданные данные');
		}
    }
	
	 public static function GetInfo($id)
    {
		if($id>0){
			$result = \Bitrix\Iblock\ElementTable::getList(array('select' => array('ID', 'NAME', 'IBLOCK_ID'),'filter' => array('ID' => $id)));
			$res='';
			if ($arItem = $result->fetch()){  
				$dbProperty = \CIBlockElement::getProperty(
					$arItem['IBLOCK_ID'],
					$arItem['ID']
				);
				$res .='NAME: '.$arItem['NAME'].' ';
				while($arProperty = $dbProperty->Fetch()){ 
					if($arProperty['PROPERTY_TYPE']=='L'){
						$prop=ProductManager::GetInfoProperty($arProperty['ID']);
						$res .=$arProperty['NAME'].': '.$prop[$arProperty['VALUE']].' ';
					}else{
						$res .=$arProperty['NAME'].': '.$arProperty['VALUE'].' ';
					}
				}
			}
			return array('status'=>'success','res'=>$res); 
		}else{
			return array('status'=>'error','error'=>'Введите верный id');
		}		
    }
	
	 public static function GetInfoProperty($id)
    {
		$result =\Bitrix\Iblock\PropertyEnumerationTable::getList(array(
				'filter' => array('PROPERTY_ID'=>$id),
			));

			while($arEnum=$result->fetch())
			{
				$arEnumID[$arEnum["ID"]] = $arEnum["VALUE"];
			}

		return $arEnumID; 
    }
}
