<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
	{
		die();
	} ?>

<? if (!empty($arResult)): ?>
    <div class="footer-nav">

		<? foreach ($arResult as $i => $arItem):
				if ($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1)
					{
						continue;
					}
				?>
                <a href="<?= $arItem["LINK"] ?>" class="footer-block__title text-underline-a2">
                    <h2>
						<?= $arItem["TEXT"] ?>
                    </h2>
                </a>
			<? endforeach ?>
    </div>
<? endif ?>