<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Каталог продуктов");
?><table border="1" cellpadding="1" cellspacing="1" style="display: flex; justify-content: center; align-items: center;">
<tbody>
<tr>
	<td>
		<h2><span style="font-family: Verdana; font-size: 16pt;">Каталог продуктов</span></h2>
 <span style="font-family: Verdana; font-size: 26pt;"> </span>
	</td>
</tr>
<tr>
	<td>
 <span style="font-family: Verdana; font-size: 16pt;">
		&nbsp;</span><?$APPLICATION->IncludeComponent(
	"bitrix:catalog.sections.top",
	"",
	Array(
		"ACTION_VARIABLE" => "action",
		"BASKET_URL" => "/personal/basket.php",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CONVERT_CURRENCY" => "N",
		"DETAIL_URL" => "",
		"DISPLAY_COMPARE" => "N",
		"ELEMENT_COUNT" => "9",
		"ELEMENT_SORT_FIELD" => "sort",
		"ELEMENT_SORT_FIELD2" => "id",
		"ELEMENT_SORT_ORDER" => "asc",
		"ELEMENT_SORT_ORDER2" => "desc",
		"FILTER_NAME" => "arrFilter",
		"HIDE_NOT_AVAILABLE" => "N",
		"IBLOCK_ID" => "8",
		"IBLOCK_TYPE" => "products_type",
		"LINE_ELEMENT_COUNT" => "3",
		"PRICE_CODE" => array(),
		"PRICE_VAT_INCLUDE" => "Y",
		"PRODUCT_ID_VARIABLE" => "id",
		"PRODUCT_PROPERTIES" => array(),
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"PRODUCT_QUANTITY_VARIABLE" => "quantity",
		"PROPERTY_CODE" => array("WEIGHT","MEASURMENT",""),
		"SECTION_COUNT" => "20",
		"SECTION_FIELDS" => array("PICTURE",""),
		"SECTION_ID_VARIABLE" => "SECTION_ID",
		"SECTION_SORT_FIELD" => "sort",
		"SECTION_SORT_ORDER" => "asc",
		"SECTION_URL" => "",
		"SECTION_USER_FIELDS" => array("",""),
		"SHOW_PRICE_COUNT" => "1",
		"USE_MAIN_ELEMENT_SECTION" => "N",
		"USE_PRICE_COUNT" => "N",
		"USE_PRODUCT_QUANTITY" => "N"
	)
);?><span style="font-family: Verdana; font-size: 16pt;"> </span>
	</td>
</tr>
</tbody>
</table>
 <span style="font-family: Verdana; font-size: 16pt;"> </span>
<h3><a href="/">Вернуться на главную &gt;&gt;&gt;</a></h3><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>