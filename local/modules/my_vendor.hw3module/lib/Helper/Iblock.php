<?php

namespace My_vendor\Hw3module\Helper;

use Bitrix\Iblock\IblockTable;


class Iblock
{
    public function getIblockIdByIblockCode($code): ?int
    {
        static $codes;
        if (!isset($codes)) {
            $arIblocks = IblockTable::query()
                ->setSelect(['ID', 'CODE'])
                ->setFilter(['ACTIVE' => 'Y'])
                ->fetchAll();
            $codes = array_column($arIblocks, 'ID', 'CODE');
        }
        return $codes[$code] ?? null;
    }
}