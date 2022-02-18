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
<? if (!empty($arResult['ITEMS'])): ?>
	<?php
	$arAlphaBet = [];
	foreach ($arResult['ITEMS'] as $arItem)
		{
			$letter = mb_strtoupper(mb_substr($arItem['NAME'], 0, 1));
			$arAlphaBet[$letter][$arItem['NAME']] = $arItem['DETAIL_PAGE_URL'];
		}

	?>
    <div class="container-inner">
        <div class="alphabet">
            <div class="alphabet-content">
				<? foreach ($arAlphaBet as $letter => $arValues): ?>
                    <div class="alphabet-group">
                        <span class="alphabet-group__anch" id="sec-<?= $letter ?>"></span>
                        <div class="alphabet-group-head"><span><?= $letter ?></span></div>
                        <ul class="alphabet-group-body">
							<? foreach ($arValues as $name => $link): ?>
                                <li>
                                    <a href="<?= $link ?>" class="h-2 text-underline-a2"><?= $name ?></a>
                                </li>
							<? endforeach; ?>
                        </ul>
                    </div>
				<? endforeach; ?>
            </div>
            <div class="alphabet-nav">
                <ul class="alphabet-nav-list">
					<? foreach ($arAlphaBet as $letter => $arValues): ?>
                        <li>
                            <a data-anchor href="#sec-<?= $letter ?>"><?= $letter ?></a>
                        </li>
					<? endforeach; ?>

                </ul>
            </div>
        </div>
    </div>
<?php endif; ?>