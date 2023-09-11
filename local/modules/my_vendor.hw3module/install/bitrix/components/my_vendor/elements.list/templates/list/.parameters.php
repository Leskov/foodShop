<?php
/**@global CMain $APPLICATION */
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

global $APPLICATION;

$arTemplateParameters = array(
    "SHOW_ACTIVE" => array(
        "NAME" => "Показывать действующие",
        "TYPE" => "CHECKBOX",
        "DEFAULT" => "Y",
        "SORT" => 210
    ),
    "SHOW_EXPIRED" => array(
        "NAME" => "Показывать просроченные",
        "TYPE" => "CHECKBOX",
        "DEFAULT" => "N",
        "SORT" => 220
    )
);