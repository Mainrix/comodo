<?
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');

CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetTitle("Страница не найдена");?>

<p class="caption">Страница не найдена</p>
<div class="icon404">
    <span>404</span>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>