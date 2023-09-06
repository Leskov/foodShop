<?php
/**@global CMain $APPLICATION */
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

global $APPLICATION;
$arResult['INFO_MESSAGE'] = 'Просмотр элементов';
if ($arParams["SHOW_ACTIVE"] == "N" && $arParams["SHOW_EXPIRED"] == "N") {
    $arResult['INFO_MESSAGE'] = 'К сожалению, ничего не выбрано для показа :(';
}