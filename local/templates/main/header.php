<?

use Bitrix\Main\Page\Asset;
use Site\Main\Helper;

?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
	<?
	$assest = Asset::getInstance();
	$assest->addCss( '/css/bundle.css', true);
	$assest->addJs( '/js/app.js');
	$assest->addJs( '/js/bundle.js');
	global $currPage, $isMain, $isTextPage, $isPersonal, $mainUrl, $isFooterPage;
	$currPage = $APPLICATION->GetCurPage(false);
	$isMain = ($currPage == "/") ? true : false;
	$mainUrl = ($isMain) ? "#" : "/";
	?>
	<? $APPLICATION->ShowHead() ?>
    <title><? $APPLICATION->ShowTitle() ?></title>
</head>
<body class="<?$APPLICATION->ShowProperty('bodyclass')?>">
<? $APPLICATION->ShowPanel(); ?>
<div class="page-wrapper" >
    <header class="header" id="headerApp">
        <div class="container">
            <div class="header__inner">
                <div class="navbar__toggle --left header-visible-sm-max mr-a">
                    <button
                            type="button"
                            class="btn _icon _white js-navbar-toggle"
                            aria-expanded="false"
                            data-toggle="collapse"
                            data-target="#navbarMenu"
                    >
                        <svg class="icon-svg icon-svg_burger btn__icon">
                            <use xlink:href="/assets/images/sprite.svg#burger"></use>
                        </svg>

                    </button>
                </div>
                <div class="block header__logo">
                    <a href="<?= $mainUrl ?>" aria-label="logo" class="logo-brand _dark">
                        <? Helper::getSvg('logo')?>
                    </a>
                </div>
                <div class="navbar__toggle --right header-visible-sm-max ml-a">
                    <button
                            type="button"
                            class="btn _icon _white js-search-toggle"
                            data-target="#serachModal"
                    >

                        <svg class="icon-svg icon-svg_s icon-svg_s-search btn__icon">
                            <use xlink:href="/assets/images/sprite.svg#s-search"></use>
                        </svg>

                    </button>
                </div>

				<?$APPLICATION->IncludeComponent("bitrix:menu", "top", Array(
					"ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
					"CHILD_MENU_TYPE" => "left",	// Тип меню для остальных уровней
					"DELAY" => "N",	// Откладывать выполнение шаблона меню
					"MAX_LEVEL" => "1",	// Уровень вложенности меню
					"MENU_CACHE_GET_VARS" => array(	// Значимые переменные запроса
													   0 => "",
					),
					"MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
					"MENU_CACHE_TYPE" => "Y",	// Тип кеширования
					"MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
					"ROOT_MENU_TYPE" => "top",	// Тип меню для первого уровня
					"USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
				),
					false
				);?>



                <div class="block header-visible-md ml-a">
                    <button
                            type="button"
                            class="btn _icon _flat js-search-toggle"
                            data-target="#serachModal"
                    >

                        <svg class="icon-svg icon-svg_search btn__icon">
                            <use xlink:href="/assets/images/sprite.svg#search"></use>
                        </svg>

                    </button>
                </div>

                <div class="block _fluid header__search js-header-search">
                    <div class="header-search">
                        <div class="header-search__title h-2">Поиск</div>
                        <? $APPLICATION->IncludeComponent(
                            "bitrix:search.form",
                            "header",
                            array(
                                "COMPONENT_TEMPLATE" => "header",
                                "PAGE" => "#SITE_DIR#search/",
                                "USE_SUGGEST" => "N"
                            ),
                            false
                        );?>
                        <div class="header__search-close">
                            <div class="navbar__toggle">
                                <button
                                        type="button"
                                        class="js-search-toggle navbar-toggle btn _icon _white"
                                        aria-expanded="false"
                                        data-toggle="collapse"
                                        data-target="#serachModal"
                                >

                                    <svg class="icon-svg icon-svg_close btn__icon">
                                        <use xlink:href="/assets/images/sprite.svg#close"></use>
                                    </svg>

                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <? $APPLICATION->ShowViewContent('favoritesBlockDesktop'); ?>

                <div class="block --hide-custom header-visible-sm-block">
                  <? $APPLICATION->ShowViewContent('contactMenuBlock'); ?>
                </div>

                <div class="block header-visible-sm-block">
                    <button
                            type="button"
                            class="btn _acsent _round _animate js-modal-toggle"
                            data-target="#modalRequest"
                            data-type="sidebar"
                    >
                        <span class="btn__text">Заказать звонок</span>
                    </button>
                </div>

            </div>
        </div>


        <div class="header__menu js-header-menu">


            <div class="header-menu">
                <div class="container _fh">
                    <div class="header-menu__inner">
						<?$APPLICATION->IncludeComponent("bitrix:menu", "catalog", Array(
							"ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
							"CHILD_MENU_TYPE" => "catalog",	// Тип меню для остальных уровней
							"DELAY" => "N",	// Откладывать выполнение шаблона меню
							"MAX_LEVEL" => "1",	// Уровень вложенности меню
							"MENU_CACHE_GET_VARS" => "",	// Значимые переменные запроса
							"MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
							"MENU_CACHE_TYPE" => "Y",	// Тип кеширования
							"MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
							"ROOT_MENU_TYPE" => "catalog",	// Тип меню для первого уровня
							"USE_EXT" => "Y",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
							"COMPONENT_TEMPLATE" => ".default"
						),
							false
						);?>
                        <? $APPLICATION->IncludeComponent("custom:favorites","",[

                        ]) ?>
                        <div class="navbar-nav__item --show-md">
                            <? $APPLICATION->ShowViewContent('mobileMenuBlock'); ?>
                        </div>
                        <div class="header-menu__footer">
                            <button
                                    type="button"
                                    class="btn _acsent _round _full js-modal-toggle"
                                    data-target="#modalRequest"
                                    data-type="sidebar"
                            >
                                <span class="btn__text">Заказать звонок</span>
                            </button>
                        </div>
                    </div>
                    <div class="header-menu__close">
                        <div class="navbar__toggle">
                            <button type="button" class="js-navbar-toggle navbar-toggle btn _icon _white">
                                <svg class="icon-svg icon-svg_close btn__icon">
                                    <use xlink:href="/assets/images/sprite.svg#close"></use>
                                </svg>

                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </header>

    <main class="page-content" id="pageContentApp">
        <? if(!$isMain): ?>
        <div class="section _offset-small <? $APPLICATION->ShowProperty('classContanier')?>">
            <div class="container<? $APPLICATION->ShowProperty('classContanierSub');?>">
                <div class="section-heading --offset-big">
                    <h2 class="section-heading__title">
                        <? $APPLICATION->ShowTitle(false); ?> <?$APPLICATION->ShowProperty('nametobrand')?>
                    </h2>
                    <div class="section-heading__sub d-flex jc-c">
                        <? $APPLICATION->IncludeComponent("bitrix:breadcrumb", "top", Array(

                            ),
                            false
                        );?>
                    </div>
                </div>
        <? endif; ?>
