<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
	{
		die();
	}
use Site\Main\Helper;

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
/** @var Bitrix\Main\UI\PageNavigation $tesgt */
$this->setFrameMode(true);
?>
<div class="navbar-nav__item --show-md" id="favoritesBlockElement">
	<a href="/favorites/" class="d-flex ai-c navbar-nav__link --big ">
		<span>Избранное</span>
		<span class="label-count ml-6" v-html="elements.length">0</span>
	</a>
</div>

<?php $this->SetViewTarget('favoritesBlockDesktop'); ?>

<div class="block header__favorits header-visible-sm-block">
    <div class="label-wrapper">
        <div class="label-count" v-if="elements.length>0" v-html="elements.length">0</div>
        <a
                aria-label="link"
                :class="{'btn btn-favorite _icon _round _flat':1,'_disabled':elements.length==0}"
                href="/favorites/"
        >
			<? Helper::getSvg('favorites'); ?>
        </a>
    </div>
</div>

<?php $this->EndViewTarget(); ?>