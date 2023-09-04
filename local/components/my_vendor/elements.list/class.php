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
            $dbItems = CIBlockElement:: GetList(
                [],
                [
                    "IBLOCK_CODE" => $arParams["IBLOCK_CODE"],
                    "ACTIVE" => "Y",
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