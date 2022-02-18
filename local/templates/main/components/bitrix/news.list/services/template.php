<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
	die();
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
<div class="catalog-services">
    <div class="row _padded-v ">

		<? foreach ($arResult["ITEMS"] as $key =>$arItem): ?>
			<?
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
			?>
            <div class="col-xxs-12 <?=($key>3)?'col-sm-4':'col-sm-6' ?>">
                <a class="d-block js-modal-toggle" data-target="#modalRequest" data-type="sidebar"
                   href="/#">
                    <div class="card card-service">
                        <div class="card-service__head">
                            <? if($arItem["PREVIEW_PICTURE"]["ID"]): ?>
                            <?
                                $picture = \Site\Main\Helper::resizeImageSrc($arItem["PREVIEW_PICTURE"]["ID"],702,432)
                                ?>
                            <picture>
                                <source media="(min-width: 1025px)"
                                        srcset="<?=$picture?>" sizes="100vw">
                                <source media="(min-width: 768px)"
                                        srcset="<?=$picture?>" sizes="100vw">
                                <img
                                        src="<?=$picture?>"
                                        sizes="100vw"
                                >
                            </picture>
                            <? endif; ?>
                        </div>
                        <div class="card-service__inner">
                            <h2 class="card-service__title">
                                <?=$arItem['NAME']?>
                            </h2>
                            <? if($arItem['PREVIEW_TEXT']): ?>
                            <div class="card-service__descr">
                               <?=$arItem['PREVIEW_TEXT']?>
                            </div>
                            <? endif;?>
                            <div class="card-service__action">

                                <button
                                        type="button"
                                        aria-label="button"
                                        class="btn _icon _round _flat"
                                >


                                    <svg class="icon-svg icon-svg_chevron-right btn__icon">
                                        <use xlink:href="/assets/images/sprite.svg#chevron-right"></use>
                                    </svg>


                                </button>


                            </div>
                        </div>
                    </div>

                </a>
            </div>

		<? endforeach; ?>

    </div>
</div>
