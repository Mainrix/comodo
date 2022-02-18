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

<?php if($arResult['DETAIL_TEXT']): ?>
<?php $this->SetViewTarget('seoTextBoottomSection'); ?>
	<section class="section section-text ">
		<div class="container-inner --md-small">
			<p class="text text-seo _c-grey">
				 <?=$arResult['DETAIL_TEXT']?>
			</p>
		</div>
	</section>
<?php $this->EndViewTarget(); ?>
<?php endif; ?>
