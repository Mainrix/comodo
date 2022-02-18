<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
	{
		die();
	} ?>

<? if (!empty($arResult)): ?>
    <div class="block mx-a header__navbar header-visible-sm-block">
        <div class="navbar">
            <ul class="navbar-nav">
				<? foreach ($arResult as $i=>$arItem):
						if ($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1)
							{
								continue;
							}
                          if($i>2)
                              break;

						?>
                        <li class="navbar-nav__item">
                            <a class="navbar-nav__link "
                               href="<?= $arItem["LINK"] ?>">
                                <span><?= $arItem["TEXT"] ?></span>
                            </a>
                        </li>
					<? endforeach ?>
            </ul>
        </div>

    </div>
	<?php $this->SetViewTarget('contactMenuBlock'); ?>
    <a href="<?= $arResult[3]["LINK"] ?>" class="navbar-nav__link ">
        <span><?= $arResult[3]["TEXT"] ?></span>
    </a>
	<?php $this->EndViewTarget(); ?>

	<?php $this->SetViewTarget('mobileMenuBlock'); ?>
    <div class="navbar">
        <ul class="navbar-nav">

			<? foreach ($arResult as $arItem):
					if ($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1)
						{
							continue;
						}
					?>
                    <li class="navbar-nav__item">
                        <a href="<?= $arItem["LINK"] ?>" class="navbar-nav__link  --big">
                            <span><?= $arItem["TEXT"] ?></span>
                        </a>

                    </li>
				<? endforeach ?>

        </ul>
    </div>
	<?php $this->EndViewTarget(); ?>
<? endif ?>