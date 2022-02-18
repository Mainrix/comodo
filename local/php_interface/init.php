<?php
\Bitrix\Main\Loader::includeModule('site.main');
$eventManager = \Bitrix\Main\EventManager::getInstance();
$eventManager->addEventHandler('search', 'BeforeIndex', array('MySearch', 'BeforeIndex'));

class MySearch {
		private static $catalogIblockId = 1;
		private static $docsIblockId = 3;
		const PROPERTY_DOCUMENTS = 'PROPERTY_BRAND';

		public static function BeforeIndex($arFields) {
			if(intval($arFields['PARAM2']) == self::$catalogIblockId && intval($arFields['ITEM_ID']) > 0 && isset($arFields['BODY'])) {
				\Bitrix\Main\Loader::includeModule('iblock');

				$arDocsId = array();

				$dbRes = CIBlockElement::GetList(array(), array('IBLOCK_ID' => $arFields['PARAM2'], 'ID' => $arFields['ITEM_ID']), false, false, array(self::PROPERTY_DOCUMENTS));
				while($arRes = $dbRes->Fetch()) {
					if($arRes[self::PROPERTY_DOCUMENTS.'_VALUE'])
						$arDocsId[] = $arRes[self::PROPERTY_DOCUMENTS.'_VALUE'];
				}

				if($arDocsId) {
					$dbRes = CIBlockElement::GetList(array(), array('IBLOCK_ID' => self::$docsIblockId, 'ID' => $arDocsId), false, false, array('NAME'));
					while($arRes = $dbRes->Fetch()) {
						$arFields['BODY'] .= PHP_EOL.$arRes['NAME'];
					}
				}

				return $arFields;
			}
		}
	}
