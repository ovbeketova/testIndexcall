<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Демонстрационная версия продукта «1С-Битрикс: Управление сайтом»");
$APPLICATION->SetPageProperty("NOT_SHOW_NAV_CHAIN", "Y");
$APPLICATION->SetTitle("Главная страница");
use App\Helper\ProductManager;
$size=ProductManager::GetInfoProperty(2);
?>
<form id='product'>
<div>
<select name="action">
	<option disabled>Выберите действие</option>
    <option value="Add">Add</option>
    <option value="Delete">Delete</option>
    <option value="Update">Update</option>
	<option value="GetInfo">GetInfo</option>
</select>
</div>
<div>
<input name="id" data-action="Delete,Update,GetInfo"  value="" placeholder="ID"/>
</div>
<div>
<input name="name" data-action="Add,Update" value="" placeholder="Название"/>
</div>
<div>
<input name="color" data-action="Add,Update" value="" placeholder="Цвет"/>
</div>
<div>
<?if(count($size)>0){?>
<select name="size" data-action="Add,Update">
	<option disabled>Размер</option>
<?foreach($size as $key=>$val){?>
    <option value="<?=$key?>"><?=$val?></option>
<?}?>
</select>
<?}?>
</div>
<input type="submit" value="Выполнить">
</form>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>