<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();

use \Bitrix\Main\Localization\Loc;
use \Site\Main\Helper;
use \Bitrix\Main;

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $item
 * @var array $actualItem
 * @var array $minOffer
 * @var array $itemIds
 * @var array $price
 * @var array $measureRatio
 * @var bool $haveOffers
 * @var bool $showSubscribe
 * @var array $morePhoto
 * @var bool $showSlider
 * @var bool $itemHasDetailUrl
 * @var string $imgTitle
 * @var string $productTitle
 * @var string $buttonSizeClass
 * @var CatalogSectionComponent $component
 */

?>

<a class="d-block" href="<?= $item['DETAIL_PAGE_URL'] ?>">
	<div class="card-product card-lazy text-underline">
		<?
		$documentRoot = Main\Application::getDocumentRoot();
		$templatePath =  'item/template.php';
		$file = new Main\IO\File($documentRoot . $templateFolder . '/' . $templatePath);
		if ($file->isExists())
			{
				include($file->getPath());
			}
		?>
	</div>
</a>

