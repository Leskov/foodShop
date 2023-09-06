<?php
/**@global CMain $APPLICATION */
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

global $APPLICATION;


$arComponentParameters = array(
    "GROUPS" => array(
        "DATA_SOURCE" => array(
            "NAME" => "Источник данных",
            "SORT" => 200
        ),
        "CACHE" => array(
            "NAME" => "Настройки кэширования",
            "SORT" => 900
        )
    )
);

$arComponentParameters["PARAMETERS"] = array(
    "IBLOCK_CODE" => array(
        "PARENT" => "DATA_SOURCE",
        "NAME" => "Код ИБ",
        "TYPE" => "STRING",
        "DEFAULT" => "",
        "REFRESH" => "N",
    ),
    "CACHE_TIME" => array(
        "DEFAULT" => 3600,
    ),
);