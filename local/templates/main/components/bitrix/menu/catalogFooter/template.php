<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
	{
		die();
	} ?>

<? if (!empty($arResult)): ?>

    <div class="footer-block__title --sec footer-block__title-dropdown js-dropdown-toggler">
        <h2>
            Каталог
        </h2>
        <div class="footer-block__title-dropdown-caret dropdown__caret _light">

            <svg class="icon-svg icon-svg_s icon-svg_s-chevron-down ">
                <use xlink:href="/assets/images/sprite.svg#s-chevron-down"></use>
            </svg>

        </div>
    </div>
    <div class="footer-nav footer-block__dropdown">
        <div class="footer-nav__list">

			<?
			foreach ($arResult as $arItem)
				{
					if ($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1)
						{
							continue;
						}
					?>
                    <div class="footer-nav__list-item">
                        <a href="<?= $arItem["LINK"] ?>" class="footer-nav__list-link text-underline-a2">
                            <h3 class="text text-normal _fw-m">
								<?= $arItem["TEXT"] ?>
                            </h3>
                        </a>
                    </div>

				<? } ?>

        </div>
    </div>


<? endif ?>