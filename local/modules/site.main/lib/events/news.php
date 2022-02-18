<?php


namespace Site\Main\Events;


class News
	{
		public static function beforeAdd(&$arFields)
			{
				if($arFields['CODE']=='')
					{
						$arFields['CODE']=md5($arFields['NAME'].time());
					}

			}
	}