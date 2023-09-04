<?php

namespace Sprint\Migration;


class M20230903160511_CreateAgent extends Version
{
    protected $description = "Создание агента для удаления просроченных элементов";

    protected $moduleVersion = "4.2.4";

    /**
     * @throws Exceptions\HelperException
     * @return bool|void
     */
    public function up()
    {
        $helper = $this->getHelperManager();
        $helper->Agent()->saveAgent(array (
  'MODULE_ID' => '',
  'USER_ID' => NULL,
  'SORT' => '0',
  'NAME' => 'deleteExpiredElements();',
  'ACTIVE' => 'Y',
  'NEXT_EXEC' => '04.09.2023 16:00:00',
  'AGENT_INTERVAL' => '86400',
  'IS_PERIOD' => 'Y',
  'RETRY_COUNT' => '0',
));
    }

    public function down()
    {
        //your code ...
    }
}
