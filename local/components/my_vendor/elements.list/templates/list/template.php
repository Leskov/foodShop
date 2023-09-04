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

    <? foreach ($arResult["ITEMS"] as $arItem): ?>

        <p class="news-item" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">

            <?
            //определяем текущие дату и время
            $currentDT = date("d.m.Y H:i:s");
            //если текущие дата и время меньше, чем дата и время, до которых доступ активен
            //то выводим элементы
            if ($currentDT < $arItem["ACTIVE_TO"]) {
                echo "<h3>" . $arItem["NAME"] . "</h3>";
                echo "<span>" . "Доступ ативен до: " . $arItem["ACTIVE_TO"] . "</span><br/>";
                echo "<span>" . "Сейчас : " . $currentDT . "</span><br/>";
            }
            ?>
        </p>
    <? endforeach; ?>
</div>



