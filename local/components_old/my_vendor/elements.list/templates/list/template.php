<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<div class="news-list">
    <?echo "<h2>" . $arResult['INFO_MESSAGE'] . "</h2>";?>
    <? foreach ($arResult["ITEMS"] as $arItem): ?>

        <p class="news-item" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">

            <?
            //выводим элементы по фильтру
            $currentDT = date("d.m.Y H:i:s");
            echo "<h3>" . $arItem["NAME"] . "</h3>";
            echo "<span>" . "Доступ активен до: " . $arItem["ACTIVE_TO"] . "</span><br/>";
            echo "<span>" . "Сейчас : " . $currentDT . "</span><br/>";
            if ($arItem["ACTIVE_TO"] > $currentDT){
                echo "<span>Статус : <b>действует</b></span><br/>";
            } else{
                echo "<span>Статус : <b>просрочен</b></span><br/>";
            }

            ?>
        </p>
    <? endforeach; ?>
</div>



