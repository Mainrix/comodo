<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
	die();

$arSorts = [
	"name" => [
		'name' => 'По новизне',
		'sort' => 'DATE_CREATE',
		'order' => 'DESC'
	],
	"price" => [
		'name' => 'Сначал дешевые',
		'sort' => 'CATALOG_PRICE_1',
		'order' => 'ASC'
	],
	"priceDesc" => [
		'name' => 'Сначала дороже',
		'sort' => 'CATALOG_PRICE_1',
		'order' => 'DESC'
	],
];

$arResult['SORTS']=$arSorts;