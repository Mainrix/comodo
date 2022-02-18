<?php

namespace Site\Main\Events;

use \Bitrix\Main\EventManager;

class Load
	{
		static $moduleId = 'site.main';

		static $arEventsList = [
			"iblock|OnBeforeIBlockElementAdd|\\Site\\Main\\Events\\News|beforeAdd",
			"main|OnBeforeProlog|\\Site\\Main\\Events\\Main|beforeProlog",
		];

		static function init()
			{
				if (!empty(self::$arEventsList))
					{
						$eventManager = EventManager::getInstance();
						foreach (self::$arEventsList as $event)
							{
								$arEvent = explode("|", $event);
								$eventManager->registerEventHandlerCompatible($arEvent[0], $arEvent[1], self::$moduleId, $arEvent[2], $arEvent[3]);
							}
					}
			}
	}