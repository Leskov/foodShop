<?php

use Bitrix\Main\Security\Random;

AddEventHandler("iblock", "OnBeforeIBlockElementAdd", "UpdateSymbolCode");
AddEventHandler("iblock", "OnBeforeIBlockElementUpdate", "UpdateSymbolCode");

function UpdateSymbolCode(&$arFields)
{
    $iblock_id = 11;
    if ($arFields['IBLOCK_ID'] == $iblock_id):
        $arFields['CODE'] = Random::getString(8, false);
    endif;

}


// удаление просроченных элементов инфоблока
function deleteExpiredElements()
{
    $iblock_id = 11;
    if (CModule::IncludeModule("iblock")):
        # забираем элеменеты по фильтру и сортируем
        $my_elements = CIBlockElement::GetList(
            array("ID" => "ASC"),
            array("IBLOCK_ID" => $iblock_id, "!ACTIVE_DATE" => "Y"),
            false,
            false,
            array('ID', 'NAME', 'ACTIVE_FROM', 'ACTIVE_TO')
        );
        # удаляем просроченные элементы
        while ($ar_fields = $my_elements->GetNext()) {
            CIBlockElement::Delete($ar_fields['ID']);
        }
    endif;

    return __METHOD__ . '();';
}

?>


