<?php

namespace Sprint\Migration;


class product_createCat_20230829131621 extends Version
{
    protected $description = "создание категорий инфоблока";

    protected $moduleVersion = "4.2.4";

    /**
     * @throws Exceptions\HelperException
     * @return bool|void
     */
    public function up()
    {
        $helper = $this->getHelperManager();

        $iblockId = $helper->Iblock()->getIblockIdIfExists(
            'products',
            'products_type'
        );

        $helper->Iblock()->addSectionsFromTree(
            $iblockId,
            array (
  0 => 
  array (
    'NAME' => 'Хлебобулочные изделия',
    'CODE' => 'hleb_izdeliya',
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => NULL,
    'DESCRIPTION' => '',
    'DESCRIPTION_TYPE' => 'text',
  ),
  1 => 
  array (
    'NAME' => 'Молочная продукция',
    'CODE' => 'moloko_produkcia',
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => NULL,
    'DESCRIPTION' => '',
    'DESCRIPTION_TYPE' => 'text',
  ),
  2 => 
  array (
    'NAME' => 'Сыпучие продукты',
    'CODE' => 'sipuchie_produkty',
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => NULL,
    'DESCRIPTION' => '',
    'DESCRIPTION_TYPE' => 'text',
  ),
)        );
    }

    public function down()
    {
        {
            $helper = $this->getHelperManager();

            $ok1 = $helper->Iblock()->deleteSection('1');
            $ok2 = $helper->Iblock()->deleteSection('2');
            $ok3 = $helper->Iblock()->deleteSection('3');

            if ($ok1 and $ok2 and $ok3  ) {
                $this->outSuccess('Разделы 1-3 удалены');
            } else {
                $this->outError('Ошибка удаления разделов');
            }
        }
    }
}
