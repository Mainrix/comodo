<?php
namespace Site\Main\Entity\Favorites;

use Bitrix\Main\Entity;

class FavoritesTable extends Entity\DataManager
	{

		public static function getFilePath()
			{
				return __FILE__;
			}

		public static function getTableName()
			{
				return 'b_custom_favorites';
			}

		public static function getByUserId($id)
			{
				$arResult=[];
				$result =
					self::getList([
						'filter' => [
							"GUEST_ID" => $id,
						]
					]);
				while($arItem=$result->fetch())
					{
						$arResult[]=$arItem["ELEMENT_ID"];
					}
				return $arResult;
			}

		public static function getMap()
			{
				return array(
					'ELEMENT_ID' => array(
						'data_type' => 'integer',
						'primary' => true,
						'title' => "ELEMENT_ID",
					),
					'GUEST_ID' => array(
						'data_type' => 'integer',
						'primary' => true,
						'title' => "GUEST_ID",
					),
				);
			}
	}
