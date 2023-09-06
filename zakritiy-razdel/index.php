<?php
/**@global CMain $APPLICATION */
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Закрытый раздел");

$APPLICATION->IncludeComponent(
	"my_vendor:elements.list", 
	"list", 
	array(
		"COMPONENT_TEMPLATE" => "list",
		"IBLOCK_CODE" => "access-to-hide-section",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "3600",
		"SHOW_ACTIVE" => "N",
		"SHOW_EXPIRED" => "N"
	),
	false
);


?><? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>