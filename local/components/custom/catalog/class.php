<?
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	{
		die();
	}

use Bitrix\Main\Page\Asset;

use Bitrix\Main;
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\Loader;
use Bitrix\Main\Error;
use Bitrix\Main\ErrorCollection;
use Bitrix\Highloadblock as HL;
use Bitrix\Sale;
use Bitrix\Iblock;
use Bitrix\Main\Entity\ReferenceField;
use \Bitrix\Main\Text;
use Bitrix\Main\Engine\Contract\Controllerable;
use Bitrix\Main\Engine\ActionFilter;
use Bitrix\Main\Entity\ExpressionField;

class Catalog extends CBitrixComponent
	{
		public $sectionId = 0;

		public function executeComponent()
			{
				Loader::includeModule('iblock');


				$request = \Bitrix\Main\Application::getInstance()->getContext()->getRequest();
				$this->arResult['CODE'] = $request->get('CODE');

				if (empty($this->arResult['CODE']))
					{
 						$this->includeComponentTemplate('section');
						return;
					}

				$params = [
					'filter' => [
						'CODE' => $this->arResult['CODE'],
						'IBLOCK_ID' => $this->arParams["IBLOCK_ID"]
					],
					'select'=>['ID','NAME',"CODE"],
					'cache'=>[
						'ttl' => 60,
						'cache_joins' => true,
					],
				];

				$arSection = \Bitrix\Iblock\SectionTable::getList($params)->fetch();

				if (empty($arSection) || $arSection['ACTIVE'] == "N")
					{
						Iblock\Component\Tools::process404(GetMessage("T_NEWS_DETAIL_NF"), true, "Y", "Y");
					}
 				$this->arResult['SECTION'] = $arSection;

				$parametrs = [
					"filter" => [
						"IBLOCK_SECTION_ID" =>$arSection['ID'],
					],
					'select' => [
						"ID",
						"NAME",
						"CODE"
					],
					'cache'=>[
						'ttl' => 60,
						'cache_joins' => true,
					],
				];
				$result = \Bitrix\Iblock\SectionTable::getList($parametrs);

				if($result->getSelectedRowsCount()>0)
					$this->includeComponentTemplate('section');
				else
					$this->includeComponentTemplate('list');


			}


	}