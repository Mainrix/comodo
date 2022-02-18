<?php

use Site\Main\Helper;

global $currPage, $isMain, $isTextPage, $isPersonal, $mainUrl, $isFooterPage; ?>
<? if (!$isMain): ?>
    </div>
    </div>
<?//echo "<pre>" . print_r($_SERVER, 1) . "</pre>";
  $str = $_SERVER["REQUEST_URI"];
  $pos = strpos($str, 'catalog');
//echo "posi_".$pos;

?>
<?if($pos!= 0 OR ($_REQUEST["CODE"]=='' && $_REQUEST["q"]=='')){?>
    <section class="section section-text  pt-0">
        <div class="container-inner --md-small">
			<? $APPLICATION->IncludeComponent("bitrix:main.include", ".default", array(
				"COMPONENT_TEMPLATE" => ".default",
				"AREA_FILE_SHOW" => "page",
				"AREA_FILE_SUFFIX" => "inc",
				"AREA_FILE_RECURSIVE" => "Y",
				"EDIT_TEMPLATE" => ""
			), false); ?>
			<? $APPLICATION->ShowViewContent('seoTextBoottomSectionFooter'); ?>
        </div>
    </section>
<?}?>
<?php endif; ?>
<? $APPLICATION->ShowViewContent('detailSliderSimilar'); ?>

<?
if ($isMain || strpos($currPage, '/partnership/') !== false || strpos($currPage, '/about/') !== false)
	{
		$APPLICATION->IncludeComponent("bitrix:main.include", ".default", array(
			"COMPONENT_TEMPLATE" => ".default",
			"AREA_FILE_SHOW" => "file",
			"PATH" => SITE_TEMPLATE_PATH . "/inc/instaBlock.php",
			"EDIT_TEMPLATE" => ""
		), false);
	} ?>
</main>
<footer class="footer ">
    <div class="container">
        <div class="footer__top">
            <div class="row-flex --wrap">
                <div class="col-xxs-12 col-sm-4 col-lg-5">
                    <div class="footer-block">
						<? $APPLICATION->IncludeComponent(
	"bitrix:menu", 
	"footer", 
	array(
		"ALLOW_MULTI_SELECT" => "N",
		"CHILD_MENU_TYPE" => "left",
		"DELAY" => "N",
		"MAX_LEVEL" => "1",
		"MENU_CACHE_GET_VARS" => array(
		),
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_TYPE" => "Y",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"ROOT_MENU_TYPE" => "top2",
		"USE_EXT" => "N",
		"COMPONENT_TEMPLATE" => "footer"
	),
	false
); ?>

                    </div>
                </div>
                <div class="col-xxs-12 col-sm-4 col-lg-3">
                    <div class="footer-block">
						<? $APPLICATION->IncludeComponent("bitrix:menu", "catalogFooter", Array(
							"ALLOW_MULTI_SELECT" => "N",
							// Разрешить несколько активных пунктов одновременно
							"CHILD_MENU_TYPE" => "catalog",
							// Тип меню для остальных уровней
							"DELAY" => "N",
							// Откладывать выполнение шаблона меню
							"MAX_LEVEL" => "1",
							// Уровень вложенности меню
							"MENU_CACHE_GET_VARS" => "",
							// Значимые переменные запроса
							"MENU_CACHE_TIME" => "3600",
							// Время кеширования (сек.)
							"MENU_CACHE_TYPE" => "Y",
							// Тип кеширования
							"MENU_CACHE_USE_GROUPS" => "Y",
							// Учитывать права доступа
							"ROOT_MENU_TYPE" => "catalog",
							// Тип меню для первого уровня
							"USE_EXT" => "Y",
							// Подключать файлы с именами вида .тип_меню.menu_ext.php
							"COMPONENT_TEMPLATE" => ".default"
						), false); ?>

                    </div>
                </div>
                <div class="col-xxs-12 col-sm-4">
                    <div class="footer-block">
                        <div class="footer-block__title --sec footer-block__title-dropdown js-dropdown-toggler">
                            <h2>
                                Контакты
                            </h2>
                            <div class="footer-block__title-dropdown-caret">

                                <svg class="icon-svg icon-svg_s icon-svg_s-chevron-down ">
                                    <use xlink:href="/assets/images/sprite.svg#s-chevron-down"></use>
                                </svg>

                            </div>
                        </div>
                        <div class="footer-contacts footer-block__dropdown">
							<? $APPLICATION->IncludeComponent("bitrix:main.include", ".default", array(
								"COMPONENT_TEMPLATE" => ".default",
								"AREA_FILE_SHOW" => "file",
								"PATH" => SITE_TEMPLATE_PATH . "/inc/footerContact.php",
								"EDIT_TEMPLATE" => ""
							), false); ?>
                        </div>
                    </div>
                </div>
                <div class="col footer__logo">
                    <a href="<?= $mainUrl ?>" aria-label="logo" class="logo-brand _light">
						<? Helper::getSvg('flogo'); ?>
                    </a>
                </div>
            </div>
        </div>

        <div class="footer__bottom">
            <div class="row-flex --wrap footer-politic">
				<? $APPLICATION->IncludeComponent("bitrix:main.include", ".default", array(
					"COMPONENT_TEMPLATE" => ".default",
					"AREA_FILE_SHOW" => "file",
					"PATH" => SITE_TEMPLATE_PATH . "/inc/copyright.php",
					"EDIT_TEMPLATE" => ""
				), false); ?>
            </div>
        </div>
    </div>
</footer>

</div>
<? $APPLICATION->IncludeComponent("bitrix:main.include", ".default", array(
	"COMPONENT_TEMPLATE" => ".default",
	"AREA_FILE_SHOW" => "file",
	"PATH" => SITE_TEMPLATE_PATH . "/inc/modalPopap.php",
	"EDIT_TEMPLATE" => ""
), false); ?>
</body>
</html>