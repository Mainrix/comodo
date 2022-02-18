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
 $showLazyLoad = false;
 if (!empty($arResult['NAV_RESULT']))
	{
		$navParams =  array(
			'NavPageCount' => $arResult['NAV_RESULT']->NavPageCount,
			'NavPageNomer' => $arResult['NAV_RESULT']->NavPageNomer,
			'NavNum' => $arResult['NAV_RESULT']->NavNum
		);
	}
else
	{
		$navParams = array(
			'NavPageCount' => 1,
			'NavPageNomer' => 1,
			'NavNum' => $this->randString()
		);
	}

if ($arParams['NEWS_COUNT'] > 0 && $navParams['NavPageCount'] > 1)
	{
		$showTopPager = $arParams['DISPLAY_TOP_PAGER'];
		$showBottomPager = $arParams['DISPLAY_BOTTOM_PAGER'];
		$showLazyLoad =   $navParams['NavPageNomer'] != $navParams['NavPageCount'];
	}
?>
<div class="row" id="js-journalitems-block">
    <!-- items-container -->

    <? foreach ($arResult["ITEMS"] as $arItem): ?>
		<?
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
		$arProp = $arItem["DISPLAY_PROPERTIES"];

		?>

        <div class="col-xxs-12 col-sm-6 col-md-4 mb-40 pb-24">
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
        </div>


	<? endforeach; ?>
    <!-- items-container -->

</div>

<?php if($showLazyLoad):   ?>
<div class="pagenBlock">
<div class="d-flex jc-c" >
    <button
            type="button"
            aria-label="button"
            class="btn _border _round _animate js-load-journal"
            data-navnum="<?=$navParams['NavNum'];?>"
            data-pagecount="<?=$navParams['NavPageCount'];?>"
            data-page="<?=$navParams['NavPageNomer'];?>"
    >
        <span class="btn__text">Показать еще</span>
    </button>
</div>
</div>
<?php endif; ?>
