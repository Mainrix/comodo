<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
	{
		die();
	}
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
<?php $this->SetViewTarget('detailSliderSimilar'); ?>

<section class="section section-journal-last  _sm-p-top">
    <div class="container">
        <div class="section-heading --offset-big">
            <h2 class="section-heading__title">
                Последнее из журнала
            </h2>
        </div>

        <div class="slider _overflow-off offset-bottom-big js-slider" data-slider-layout="3">
            <div class="slider-nav slider-nav-journal js-slider-nav">
                <div class="js-slider-prev slick-prev">
                    <button
                            type="button"
                            aria-label="button"
                            class="btn _icon _round _flat"
                    >
                        <svg class="icon-svg icon-svg_chevron-left btn__icon">
                            <use xlink:href="/assets/images/sprite.svg#chevron-left"></use>
                        </svg>
                    </button>
                </div>
                <div class="js-slider-next slick-next">
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
            <div class="js-slider-container slider-wrapper">
				<? foreach ($arResult["ITEMS"] as $arItem): ?>
					<?
					$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
					$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
					$arProp = $arItem["DISPLAY_PROPERTIES"];

					?>
                    <a class="d-block" href="<?= $arItem["DETAIL_PAGE_URL"] ?>">
                        <div class="card-journal card-lazy">
                            <div class="card-journal__head block-placeholder">
								<? if ($arItem["PREVIEW_PICTURE"]): ?>
									<? $picture = \Site\Main\Helper::resizeImageSrc($arItem['PREVIEW_PICTURE'], 425, 380); ?>
                                    <img
                                            data-src="<?= $picture ?>"
                                            data-srcset="<?= $picture ?>"
                                            alt="Как оформить интерьер в стиле хай-тек — принципы"
                                    />
								<? endif; ?>
                            </div>
                            <div class="card-journal__info">
                                <h3 class="card-journal__title text-placeholder --small --fat">
                                    <div class="js-truncate">
										<?= $arItem["NAME"] ?>
                                    </div>
                                </h3>
                                <div class="card-journal__descr text-placeholder --xs --med">
									<? if ($arProp['TAGS']["DISPLAY_VALUE"]): ?>
                                        <span class="text"><?= $arProp['TAGS']["DISPLAY_VALUE"] ?></span>&nbsp;
									<? endif; ?>
                                    <span class="text _c-grey"><?= ($arProp['TAGS']["DISPLAY_VALUE"]) ? "/ " :
											"" ?><? echo $arItem["DISPLAY_ACTIVE_FROM"] ?></span>
                                </div>
                            </div>
                        </div>

                    </a>
				<? endforeach; ?>
            </div>
        </div>

        <div class="d-flex jc-c">
            <a
                    aria-label="link"
                    class="btn _border _round _animate"
                    href="/journal/"
            >
                <span class="btn__text">Смотреть все статьи</span>
            </a>
        </div>
    </div>
</section>

<?php $this->EndViewTarget(); ?>