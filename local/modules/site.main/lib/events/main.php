<?php

namespace Site\Main\Events;
use \Bitrix\Main\Context;
use \Bitrix\Main\Page\Asset;


class Main
	{
		public static function beforeProlog()
			{
				$asset =  Asset::getInstance();
  				if(Context::getCurrent()->getRequest()->isAdminSection())
					{
 						$asset->addString('<link rel="stylesheet" href="/local/templates/main/css/admin.css">',true);
					}
			}
	}