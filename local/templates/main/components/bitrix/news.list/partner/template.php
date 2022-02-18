<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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

<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	//echo "<pre>" . print_r($arItem["PROPERTIES"], 1) . "</pre>";
	?>
    <div class="col-xxs-6 col-xs-3">
        <a class="d-block" target="_blank" href="<?=$arItem["PROPERTIES"]["LINK"]["VALUE"]?>">
            <div class="partners-logo card-lazy block-placeholder">
                <img
                        class="_transp"
                        data-src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
                        alt="logos"
                        width="150"
                        height="150"
                />
            </div>

        </a>
    </div>

<?endforeach;?>

