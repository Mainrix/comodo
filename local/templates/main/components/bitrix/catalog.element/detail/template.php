<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	{
		die();
	}

use \Site\Main\Helper;

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var CatalogSectionComponent $component
 * @var CBitrixComponentTemplate $this
 * @var string $templateName
 * @var string $componentPath
 * @var string $templateFolder
 */

$this->setFrameMode(true);
$arProps = $arResult['DISPLAY_PROPERTIES'];
$arPhotos = Helper::getPhotoArray($arResult);
$arPrice = $arResult["PRICES"]['base'];
 ?>

<div class="section-product__inner row-flex _wrap">
    <div class="col-xxs-12 col-md-7 col-lg-6">
        <div class="section-product__slider">
			<? if (!empty($arPhotos)): ?>
                <div class="card-product-slider js-slider-custom slider">
                    <div class="card-product-slider__wrapper">
                        <div class="card-product-slider__box js-slider-for slider-wrapper slider-nav-center">

							<? foreach ($arPhotos as $photoId): ?>
								<?
								$bigPhoto = Helper::resizeImageSrc($photoId, 1000, 1000);
								$smallPhoto = Helper::resizeImageSrc($photoId, 1500, 1500);

								?>
                                <a href="<?= $bigPhoto ?>"
                                   class="card-product-slider__slide card-lazy block-placeholder">
                                    <img
                                            data-src="<?= $smallPhoto ?>"
                                            data-srcset="<?= $bigPhoto ?>"
                                            alt="Alt"
                                    />
                                </a>
							<? endforeach; ?>

                        </div>
                    </div>
                    <? if(count($arPhotos)>1): ?>
                        <div class="card-product-slider__nav js-slider-nav slider-wrapper slider-nav-custom">
                            <? foreach ($arPhotos as $photoId): ?>
                                <?
                                $smallPhoto = Helper::resizeImageSrc($photoId, 88, 88);
                                ?>
                                <div>
                                    <div class="card-product-slider__preview card-lazy block-placeholder">
                                        <img
                                                data-src="<?=$smallPhoto?>"
                                         />
                                    </div>
                                </div>
                            <? endforeach; ?>
                        </div>
                    <? endif; ?>
                </div>
			<? endif; ?>
        </div>
    </div>
    <div class="col-xxs-12 col-md-5">
        <div class="section-product__info">
            <div class="card _border card-product-info _descr">
                <div class="card-product-info__inner">
                    <div class="card-product-info__head">
                        <? if($arResult['PROPERTIES']['BRAND']['DISPLAY_VALUE']): ?>
                        <h2 class="card-product-info__title"><?=strip_tags($arResult['PROPERTIES']['BRAND']['DISPLAY_VALUE'])?></h2>
                        <? endif; ?>
						<? if($arPrice['DISCOUNT_DIFF_PERCENT']>0): ?>
                            <div class="card-product-info__label">
                                <div class="card-label _discount">
                                    -<?=$arPrice['DISCOUNT_DIFF_PERCENT']?>%
                                </div>
                            </div>
						<? endif; ?>

						<? if($arResult['PROPERTIES']['NEW']['VALUE']): ?>
                            <div class="card-product-info__label">
                                <div class="card-label _new">
                                    New
                                </div>
                            </div>
						<? endif; ?>

                    </div>
                    <div class="card-product-info__price">
						<? if($arPrice['DISCOUNT_DIFF_PERCENT']>0): ?>
                           <span class="_old"> от <span class="text _crossed"><?=$arPrice['PRINT_VALUE']?></span>&nbsp;</span>&nbsp;
                        <? else: ?>
                        <span class="_old">от</span>
						<? endif; ?>
                         <span class="_new"><?=$arPrice['PRINT_DISCOUNT_VALUE']?> ₽</span>
                    </div>
                    <div class="card-product-info__actions">
                        <button
                                type="button"
                                aria-label="button"
                                class="btn _round _animate js-modal-toggle"
                                data-type="sidebar"
                                data-target="#modalRequest"
                        >
                            <span class="btn__text">Оформить заявку</span>
                        </button>

                       <favorites id="<?=$arResult["ID"]?>"></favorites>


                    </div>
					<? if (!empty($arProps)): ?>
                        <div class="card-product-info__list">
                            <ul class="card-list">
								<? foreach ($arProps as $code => $arProp): ?>
                                    <li class="card-list-item">
                                        <div><?= $arProp['NAME'] ?></div>
                                        <div><?= $arProp['DISPLAY_VALUE'] ?></div>
                                    </li>
								<? endforeach; ?>

                            </ul>
                        </div>
					<? endif; ?>

					<? if ($arResult['DETAIL_TEXT']): ?>
                        <div class="card-product-info__description js-show-more">
                            <p class="js-show-more-text">
								<?= $arResult['DETAIL_TEXT'] ?>
                            </p>
                            <a class="js-show-more-toggler card-product-info__description-toggle">Читать
                                еще</a>
                        </div>
					<? endif; ?>
                </div>
            </div>

        </div>
    </div>
</div>
