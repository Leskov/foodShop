<?php

namespace My_vendor\Hw3module\Orm;

Loc::LoadMessages(__FILE__);

use Bitrix\Main\Entity\DataManager;
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\ORM\Fields\BooleanField;
use Bitrix\Main\ORM\Fields\DatetimeField;
use Bitrix\Main\ORM\Fields\IntegerField;
use Bitrix\Main\ORM\Fields\StringField;
use Bitrix\Main\Type\DateTime;


class LectionTable extends DataManager
{
    public static function getTableName()
    {
        return "my_vendor_lections";
    }

    public static function getMap()
    {
        return [
            new IntegerField('ID', [
                'primary' => true,
                'autocomplete' => true
            ]),
//            'ACTIVE' => new BooleanField('ACTIVE', [
//                'values' => ['N', 'Y'],
//                'default_value' => 'Y',
//                'title' => Loc::getMessage('LECTION_TABLE_FIELD_ACTIVE'),
//            ]),
//            'SORT' => new IntegerField('SORT', [
//                'default_value' => 500,
//                'title' => Loc::getMessage('LECTION_TABLE_FIELD_SORT'),
//            ]),
//            'DATE' =>   new DatetimeField('DATE', [
//                'default_value' => function(){
//                    return new DateTime();
//                },
//                'title' => Loc::getMessage('LECTION_TABLE_FIELD_DATE'),
//            ]),
//            'LECTION_NUMBER' => new IntegerField('LECTION_NUMBER', [
//                'title' => Loc::getMessage('LECTION_TABLE_FIELD_LECTION_NUMBER'),
//            ]),
//            'LECTION_NAME' => new StringField('LECTION_NAME', [
//                'title' => Loc::getMessage('LECTION_TABLE_FIELD_LECTION_NAME'),
//            ]),
        ];
    }
}
