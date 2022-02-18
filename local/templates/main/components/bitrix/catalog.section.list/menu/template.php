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
$arCols= [
        1=>'col-md-4',
        2=>'col-md-5',
        3=>'col-md-7',
        4=>'col-md-12',
        ''=>'col-md-12',
];
  ?>
<?php if (!empty($arResult['SECTIONS'])): ?>
    <div class="catalog-menu">
        <div class="row _padded-v ">
			<? foreach ($arResult['SECTIONS'] as $key => $arSection): ?>
				<?
//echo "<pre>" . print_r($arSection, 1) . "</pre>";
				?>
                <div class="<?=$arCols[$arSection['UF_TYPE']]?>">
                    <a class="d-block" href="<?= $arSection['SECTION_PAGE_URL'] ?>">
                        <div class="card card-lazy card-menu">
							<? if ($arSection['PICTURE']['ID']): ?>
                                <div class="card-menu__head block-placeholder">
									<? $pict =
										\Site\Main\Helper::resizeImageSrc($arSection['PICTURE']['ID'], 1290, 338) ?>
                                    <img data-src="<?= $pict ?>" alt="<?= $arSection['NAME'] ?>">
                                </div>
							<? endif; ?>
                            <div class="card-menu__inner">
                                <h2 class="card-menu__title">
									<?= $arSection['NAME'] ?>
                                </h2>
								<? if ($arSection['UF_TEXT_PARAMS']): ?>
                                    <div class="card-menu__descr">
										<?= $arSection['UF_TEXT_PARAMS'] ?>
                                    </div>
								<? endif; ?>
                                <div class="card-menu__action">

                                    <button
                                            type="button"
                                            aria-label="button"
                                            class="btn _icon _round _flat">
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

<?php if($arResult["SECTION"]['DESCRIPTION']): ?>
    <? $this->SetViewTarget('seoTextBoottomSectionFooter');?>
        <?=$arResult["SECTION"]['DESCRIPTION']?>
    <? $this->EndViewTarget(); ?>
<?php endif; ?>
<?php endif; ?>
