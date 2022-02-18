<?php

namespace Site\Main\Controller;

use \Bitrix\Main\Engine\Controller;
use Bitrix\Main\Engine\Contract\Controllerable;
use Bitrix\Main\Engine\ActionFilter;
use Bitrix\Main\Loader;
use Bitrix\Sale\Fuser;
use \Site\Main\Entity\Favorites\FavoritesTable;

Loader::includeModule('catalog');
Loader::includeModule('sale');

class Favorites extends Controller
	{

	/**
	 * @return array
	 */
		public function configureActions()
			{
				return [
					'add' => [
						'prefilters' => [
							new ActionFilter\Csrf(),
						]
					],
					'get' => [
						'prefilters' => [
							new ActionFilter\Csrf(),
						]
					],
					'delete' => [
						'prefilters' => [
							new ActionFilter\Csrf(),
						]
					]
				];
			}

		public static function getUserId()
			{
				return Fuser::getId();
			}

		public static function addAction($productId)
			{
				FavoritesTable::add([
					"GUEST_ID" => self::getUserId(),
					"ELEMENT_ID" => $productId
				]);

				return [
					'elements' => self::getElements()
				];
			}

		public static function deleteAction($productId)
			{
				$primary = [
					"GUEST_ID" => self::getUserId(),
					"ELEMENT_ID" => $productId
				];
				FavoritesTable::delete($primary);

				return [
					'elements' => self::getElements()
				];
			}

		public static function getAction()
			{
				return [
					'elements' => self::getElements()
				];
			}

		public static function getElements()
			{
				$arElements = FavoritesTable::getByUserId(self::getUserId());
				return $arElements;
			}
	}

