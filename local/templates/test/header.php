<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
use Bitrix\Main\Page\Asset; 
?>
<html>
<head>
<?$APPLICATION->ShowHead();?>
<?
Asset::getInstance()->addJs('https://code.jquery.com/jquery-3.0.0.min.js');
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/main.js");  ?>
<title><?$APPLICATION->ShowTitle()?></title>
</head>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" bgcolor="#FFFFFF">

<?$APPLICATION->ShowPanel()?>

