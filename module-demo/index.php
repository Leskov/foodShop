<?php
/**@global CMain $APPLICATION */

use Bitrix\Iblock\ElementTable;
use Bitrix\Main\Loader;

require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');

$APPLICATION->SetTitle('Демо модуля');

//Loader::requireModule('my_vendor.hw3module');

$items = ElementTable::query()
    ->setSelect([
        'ID',
        'NAME',
        'CODE'
    ])
->fetchCollection();
$code = $items->getCodeList();

?>$code:<br/><?
?><pre><?var_dump($code)?></pre>

<?php
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');