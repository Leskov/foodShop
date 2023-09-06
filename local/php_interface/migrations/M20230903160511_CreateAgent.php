<?php

namespace Sprint\Migration;


use Bitrix\Main\Application;
use CAgent;

class M20230903160511_CreateAgent extends Version
{
    protected $description = "Создание агента для удаления просроченных элементов";

    protected $moduleVersion = "4.2.4";

    public  $agentFunctionName = 'deleteExpiredElements();';


    /**
     * @return bool|void
     * @throws Exceptions\HelperException
     */
    public function up()
    {
        $helper = $this->getHelperManager();
        $helper->Agent()->saveAgent(array(
            'MODULE_ID' => 'main',
            'USER_ID' => NULL,
            'SORT' => '0',
            'NAME' => 'deleteExpiredElements();',
            'ACTIVE' => 'Y',
            'NEXT_EXEC' => '',
            'AGENT_INTERVAL' => '86400',
            'IS_PERIOD' => 'Y',
            'RETRY_COUNT' => '0',
        ));
    }

    public function down()
    {
        {
            //получаем из БД id агента по имени функции
            $agentFunctionName = $this->agentFunctionName;
            $connection = Application::getConnection();
            $agentId = $connection->queryScalar("SELECT ID FROM b_agent WHERE NAME = '$agentFunctionName'");

            if (CAgent::Delete($agentId)){
                echo "Агент успешно удален";
            } else{
                echo "Ошибка удаления агента";
            }
        }
    }
}
