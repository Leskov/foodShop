<?php

namespace My_vendor\Hw3module;

use My_vendor\Hw3module\Orm\LectionTable;

class Lection
{
    public static function HelloWorld()
    {
        echo "Hello world!";
    }

    public static function fillDemoLections()
    {
        $lectionsData = [
            [
                "LECTION_NAME" => "Установка Битрикс",
                "DATE" => (new \Bitrix\Main\Type\DateTime())->setDate('2023', '8', '23'),
            ],
            [
                "LECTION_NAME" => "Компоненты. События. Агенты",
                "DATE" => (new \Bitrix\Main\Type\DateTime())->setDate('2023', '8', '30'),
            ],
            [
                "LECTION_NAME" => "Модули. ОРМ",
                "DATE" => (new \Bitrix\Main\Type\DateTime())->setDate('2023', '9', '06'),
            ],
            [
                "LECTION_NAME" => "Гриды. Контроллеры. AJAX",
                "DATE" => (new \Bitrix\Main\Type\DateTime())->setDate('2023', '9', '13'),
            ],
        ];
        foreach ($lectionsData as $number => $lectionData){
            $lectionObject = LectionTable::getEntity()->createObject();
            $lectionObject['LECTION_NUMBER'] = $number + 1;
            $lectionObject['LECTION_NAME'] = $lectionData['LECTION_NAME'];

            $saveResult = $lectionObject->save();
            if (!$saveResult->isSuccess()){
                throw new \Exception(implode(', ', $saveResult->getErrorMessages()));
            }
        }
    }
}