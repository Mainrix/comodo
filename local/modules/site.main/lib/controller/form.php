<?php

namespace Site\Main\Controller;

use \Bitrix\Main\Engine\Controller;
use Bitrix\Main\Engine\Contract\Controllerable;
use Bitrix\Main\Engine\ActionFilter;
use Bitrix\Main\Loader;
use Bitrix\Sale\Fuser;
use \Site\Main\Entity\Favorites\FavoritesTable;

Loader::includeModule('iblock');
Loader::includeModule('sale');

class Form extends Controller
	{

	/**
	 * @return array
	 */
		public function configureActions()
			{
				return [
					'request' => [
						'prefilters' => []
					],
					'quiz' => [
						'prefilters' => []
					],
				];
			}

		public static function send($template)
			{
				$request = \Bitrix\Main\Application::getInstance()->getContext()->getRequest();
				$request->addFilter(new \Bitrix\Main\Web\PostDecodeFilter);
				$post= $request->getPostList()->toArray();
				$arEventFields = [];
				foreach ($post as $key=>$value)
					{
						$arEventFields[strtoupper($key)]=$value;
					}
				\CEvent::SendImmediate($template,'s1',$arEventFields);
			}


		public static function requestAction()
			{
				self::send('REQUEST_APP_FORM');

			}

		public static function quizAction()
			{
				self::send('QUIZ_APP_FORM');
			}

	}

