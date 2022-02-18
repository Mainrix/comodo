<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();

use \Bitrix\Main\Localization\Loc;
use \Site\Main\Helper;
use \Bitrix\Main;

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $item
 * @var array $actualItem
 * @var array $minOffer
 * @var array $itemIds
 * @var array $price
 * @var array $measureRatio
 * @var bool $haveOffers
 * @var bool $showSubscribe
 * @var array $morePhoto
 * @var bool $showSlider
 * @var bool $itemHasDetailUrl
 * @var string $imgTitle
 * @var string $productTitle
 * @var string $buttonSizeClass
 * @var CatalogSectionComponent $component
 */
$props = $item['DISPLAY_PROPERTIES'];
$arPrice = $item["PRICES"]['base'];
?>
<div class="card-product__head block-placeholder">
	<?
	$pict = Helper::resizeImageSrc($item['DETAIL_PICTURE']['ID'], 312, 312)
	?>
    <img
            data-src="<?= $pict ?>"
            data-srcset="<?= $item['DETAIL_PICTURE']['SRC'] ?>"
            alt="Журнальный стол"
    />

	<? if ($arPrice['DISCOUNT_DIFF_PERCENT'] > 0): ?>
        <div class="card-product__label">
            <div class="card-label _discount">
                -<?= $arPrice['DISCOUNT_DIFF_PERCENT'] ?>%
            </div>
        </div>
	<? endif; ?>

	<? if ($props['NEW']['VALUE']): ?>
        <div class="card-product__label">
            <div class="card-label _new">
                New
            </div>
        </div>
	<? endif; ?>

    <div class="card-product__favorite">

        <favorites id="<?=$item['ID']?>"></favorites>


    </div>
</div>
<div class="card-product__info">
    <h3 class="card-product__title text-underline__animate">
        <div class="text-placeholder">
            <span><?= $item['NAME'] ?></span>
			<? if ($props['BRAND']['VALUE']): ?>
                <span><?= strip_tags($props['BRAND']['DISPLAY_VALUE']) ?></span>
			<? endif; ?>
        </div>
    </h3>
    <div class="card-product__descr text _c-grey text-placeholder --small">
        <span>от </span>
		<? if ($arPrice['DISCOUNT_DIFF_PERCENT'] > 0): ?>
            <span class="text _crossed"> <?= $arPrice['PRINT_VALUE'] ?></span>&nbsp;
		<? endif; ?>
        <span class="text _fw-m _c-black"><?= $arPrice['PRINT_DISCOUNT_VALUE'] ?> <span
                    class="card-product__val"> ₽</span>
                </span>
    </div>
</div>
