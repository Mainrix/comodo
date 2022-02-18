<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
	die(); ?>

<? if (!empty($arResult)): ?>
    <div class="navbar-nav__item header-menu__dropdown">
        <a href="/#catalog-dropdown"
           class="header-menu__dropdown-title navbar-nav__link --big js-dropdown-toggler dropdown__title">
            <span>Каталог</span>
            <span class="dropdown__caret">

                               <svg class="icon-svg icon-svg_s icon-svg_s-chevron-down ">
                                  <use xlink:href="/assets/images/sprite.svg#s-chevron-down"></use>
                               </svg>

                    </span>
        </a>
        <div class="header-menu__nav dropdown__menu">


            <div class="catalog-nav">
                <ul class="navbar-nav _y-offset">


                <?
					foreach ($arResult as $arItem):
							if ($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1)
								{
									continue;
								}
							?>
                            <li class="navbar-nav__item">
                                <a href="<?= $arItem["LINK"] ?>"
                                   class="navbar-nav__link <?=$arItem['SELECTED']?'--active':''?> --mob">
                                    <span><?= $arItem["TEXT"] ?></span>
                                </a>

                            </li>
						<? endforeach ?>

                </ul>
            </div>
        </div>
    </div>

<? endif ?>