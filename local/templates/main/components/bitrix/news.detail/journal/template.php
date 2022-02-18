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
$arProp = $arResult['DISPLAY_PROPERTIES'];
$arDisplayProps = [];

if($arProp['AUTOR']['DISPLAY_VALUE'])
    $arDisplayProps[]="<span>".$arProp['AUTOR']['DISPLAY_VALUE']."</span>";
if($arProp['TAGS']['DISPLAY_VALUE'])
    $arDisplayProps[]="<span>".$arProp['TAGS']['DISPLAY_VALUE']."</span>";

if($arResult['DISPLAY_ACTIVE_FROM'])
    $arDisplayProps[]=$arResult['DISPLAY_ACTIVE_FROM'];

?>

<div class="article-block">
    <div class="container">
        <div class="article-banner">
            <? if($arResult["DETAIL_PICTURE"]):?>
            <picture>
                <? $picture = \Site\Main\Helper::resizeImageSrc( $arResult["DETAIL_PICTURE"],1952,850) ?>
                <source media="(min-width: 1025px)"
                        srcset="<?=$picture?>" sizes="100vw">
                <source media="(min-width: 768px)"
                        srcset="<?=$picture?>" sizes="100vw">
                <img
                        src="<?=$picture?>"
                        sizes="100vw"
                        alt="<?=$arResult['NAME']?>"
                />
            </picture>
            <? endif; ?>
        </div>
    </div>
</div>

<div class="container-inner">
    <section class="article">
        <div class="article-block _center">
            <div class="article-data">
                <?=implode(" / ",$arDisplayProps)?>
             </div>
        </div>

        <? if($arProp['QUOTE']['DISPLAY_VALUE']): ?>
        <div class="article-block _center">
            <div class="article-acsent">
                <h2 class="h-2 text _ff-s">
                   <?=$arProp['QUOTE']['DISPLAY_VALUE']?>
                </h2>
            </div>
        </div>
        <? endif; ?>

         <?=$arResult["DETAIL_TEXT"]?>
    </section>
</div>
