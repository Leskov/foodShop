<?php
/**@GLOBAL cmAIN $application */

use Bitrix\Main\Loader;

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

class ElementsList extends \CBitrixComponent
{
    public function onPrepareComponentParams($arParams)
    {
        return $arParams;
    }

    public function executeComponent()
    {
        $arParams = &$this->arParams;
        $arResult = &$this->arResult;
        $arResult = [
            "ITEMS" => [],
        ];

        Loader::includeModule('iblock');

        if($this->startResultCache()){
            $currentDT = date("d.m.Y H:i:s");
            //prefix "<>" - больше или меньше текущей даты, "<" - меньше т.д., ">" - больше т.д.
            if ($arParams["SHOW_ACTIVE"] == "Y" && $arParams["SHOW_EXPIRED"] == "Y"){
                $prefix = '<>';
            }else if (($arParams["SHOW_ACTIVE"] == "Y" && $arParams["SHOW_EXPIRED"] == "N")){
                $prefix = '>';
            }
            else if (($arParams["SHOW_ACTIVE"] == "N" && $arParams["SHOW_EXPIRED"] == "Y")){
                $prefix = '<';
            }


            $dbItems = CIBlockElement:: GetList(
                [],
                [
                    "IBLOCK_CODE" => $arParams["IBLOCK_CODE"],
                    "ACTIVE" => "Y",
                    $prefix . "DATE_ACTIVE_TO" => $currentDT,
                ],
                false,
                false,
                [
                    "IBLOCK_ID",
                    "ID",
                    "NAME",
                    "PREVIEW_PICTURE",
                    "ACTIVE",
                    "ACTIVE_TO"
                ]
            );
            $arResult = [];
            while ($arItem = $dbItems->Fetch()){
                $arResult["ITEMS"][] = $arItem;
            }
            $this->includeComponentTemplate();
        }else{
            $this->abortResultCache();
        }
    }
}