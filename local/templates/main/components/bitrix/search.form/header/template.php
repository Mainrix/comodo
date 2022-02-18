<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
use Bitrix\Main\Application;
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
$request = Application::getInstance()->getContext()->getRequest();

$serchValue = $request->get('q');

?>

<form class="js-search-form" action="<?=$arResult["FORM_ACTION"]?>" method="get">
    <label class="form-input _round ">
        <input
                class=" form-input__field js-placeholder-animate _icon"
                autocomplete="on"
                type="text"

                name="q"
                placeholder="Найти"
                value="<?=$serchValue?>"
        >
        <svg onclick="$('.js-search-form').submit()"

                class="icon-svg icon-svg_s icon-svg_s-search form-input__icon">
            <use xlink:href="/assets/images/sprite.svg#s-search"></use>
        </svg>

    </label>
</form>
