<?php

namespace My_vendor\Hw3module;

use Bitrix\Main\Security\Random;
use CIBlock;
use CIBlockElement;
use CModule;

class ClearAccess
{
// удаление просроченных элементов инфоблока
    public function deleteExpiredElements()
    {
        $iblock_code = "access-to-hide-section";
        $iblock_id = (new Helper\Iblock)->getIblockIdByIblockCode($iblock_code);
        $currentDT = date("d.m.Y H:i:s");
        if (CModule::IncludeModule("iblock")):
            # забираем элеменеты по фильтру и сортируем
            $my_elements = CIBlockElement::GetList(
                array("ID" => "ASC"),
                array("IBLOCK_ID" => $iblock_id, "<DATE_ACTIVE_TO" => $currentDT),
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

    public function UpdateSymbolCode(&$arFields)
    {
        $iblock_code = "access-to-hide-section";

        $res = CIBlock::GetByID($arFields['IBLOCK_ID']);
        if ($ar_res = $res->GetNext()) $get_code = $ar_res['CODE'];

        if (CModule::IncludeModule("iblock")):
            if ($get_code == $iblock_code):
                if ($arFields['CODE'] == ''):
                    $arFields['CODE'] = Random::getString(8, false);
                endif;
            endif;
        endif;
    }
}