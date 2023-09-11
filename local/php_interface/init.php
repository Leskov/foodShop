<?php

use Bitrix\Main\Loader;
use Bitrix\Main\Security\Random;

Loader::requireModule('iblock');

AddEventHandler("iblock", "OnBeforeIBlockElementAdd", "UpdateSymbolCode");
AddEventHandler("iblock", "OnBeforeIBlockElementUpdate", "UpdateSymbolCode");

//function UpdateSymbolCode(&$arFields)
//{
//    $iblock_code = "access-to-hide-section";
//
//    $res = CIBlock::GetByID($arFields['IBLOCK_ID']);
//    if ($ar_res = $res->GetNext()) $get_code = $ar_res['CODE'];
//
//    if (CModule::IncludeModule("iblock")):
//        if ($get_code == $iblock_code):
//            if ($arFields['CODE'] == ''):
//                $arFields['CODE'] = Random::getString(8, false);
//            endif;
//        endif;
//    endif;
//}
//
//// функция определяет ID инфоблока по его символьному коду (нашел на просторах...)
//function GetIBlockIDByCode($code, $type = '')
//{
//    CModule::IncludeModule("iblock");
//    $arrFilter = array(
//        'ACTIVE' => 'Y',
//        'CODE' => $code,
//        'SITE_ID' => "s1",
//    );
//
//    if ($type) {
//        $arrFilter['TYPE'] = $type;
//    }
//    $res = CIBlock::GetList(array("SORT" => "ASC"), $arrFilter, false);
//    $arIBlockId = "";
//
//    if ($ar_res = $res->Fetch()) {
//        $arIBlockId = $ar_res["ID"];
//    }
//
//    return $arIBlockId;
//}
//
//
//
//// удаление просроченных элементов инфоблока
//function deleteExpiredElements()
//{
//    $iblock_code = "access-to-hide-section";
//    $iblock_id = GetIBlockIDByCode($iblock_code);
//    $currentDT = date("d.m.Y H:i:s");
//    if (CModule::IncludeModule("iblock")):
//        # забираем элеменеты по фильтру и сортируем
//        $my_elements = CIBlockElement::GetList(
//            array("ID" => "ASC"),
//            array("IBLOCK_ID" => $iblock_id, "<DATE_ACTIVE_TO" => $currentDT),
//            false,
//            false,
//            array('ID', 'NAME', 'ACTIVE_FROM', 'ACTIVE_TO')
//        );
//        # удаляем просроченные элементы
//        while ($ar_fields = $my_elements->GetNext()) {
//            CIBlockElement::Delete($ar_fields['ID']);
//        }
//    endif;
//
//    return __METHOD__ . '();';
//}

?>


