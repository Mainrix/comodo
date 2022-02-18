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

class Favorites extends CBitrixComponent
	{

		public function executeComponent()
			{

				$this->includeComponentTemplate();
			}


	}