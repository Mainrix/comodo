<?php

namespace Site\Main\Entity;

use Site\Main\Helper;

\Bitrix\Iblock\Iblock::wakeUp(IBLOCK_NEWS_ID);

class NewsTable extends \Bitrix\Iblock\Elements\ElementNewsTable
	{
		static $lang = [
			'rus',
			'dol',
			'nga',
			'nen',
			'eve',
			'ene',
		];



		static public function getElements($props)
			{
				$limit = 3;
				$params = ['count_total' => true];
				$params['filter'] = ['ACTIVE' => 'Y'];
				if (!empty($props['filter']))
					{
						$params['filter'] = array_merge($params['filter'], $props['filter']);
					}
				$page = $props['page'] ? $props['page'] : 1;

				$params['select'] = [
					'ID',
					'NAME',
					'CODE',
					'DATE_CREATE',
					'TAGS',
					'video',
				];
				$params['order'] = $props['order'] ? $props['order'] : ['DATE_CREATE' => 'DESC'];
				$offset = ($page - 1) * $limit;
				$params['limit'] = $limit;
				$params['offset'] = $offset;
				$params['select'] = array_merge($params['select'], self::$lang);
				$items = [];
				$result = self::getList($params);
				$ids = [];
				$pages = ceil($result->getCount() / $limit);

				/** @var \Bitrix\Iblock\Elements\ElementNewsTable $item */

				if (\Bitrix\Main\Loader::includeModule('landing'))
					{
						$url =  \Bitrix\Landing\Domain::getHostUrl();
					}

				while ($item = $result->fetchObject())
					{
						$dateCreate = $item->getDateCreate();
						$arItem = [
							'id' => $item->getId(),
							'name' => $item->getName(),
							'code' => $item->getCode(),
							'year' => $dateCreate->format('Y'),
							'date' => FormatDate('d F', $dateCreate),
							'time' => $dateCreate->format('H:i'),
							'tags' => self::tags($item),
							'video' => self::video($item),
							'langs' => self::langs($item),
							'text' => self::text($item),
							'url' => $url.'/news/#lang#/'.$item->getCode().'/',
						];
						$ids[] = $item->getId();
						$arItem['lang'] = current($arItem['langs']);
						$items[$item->getId()] = $arItem;
					}

				self::photos($ids, $items);
				$items = array_values($items);

				return [
					'items' => $items,
					'pages' => $pages
				];
			}

		static public function text($item)
			{
				$text = [];
				foreach (self::$lang as $lang)
					{
						if ($item->get($lang))
							{
								$arValue = unserialize($item->get($lang)->getValue());
								$text[$lang] = [
									'html' => $arValue['TEXT'],
									'url' => '/' . $lang . '/' . $item->getCode() . '/',
								];
							}
					}
				return $text;
			}

		static public function langs($item)
			{
				$langs = [];
				foreach (self::$lang as $lang)
					{
						if ($item->get($lang))
							{
								$langs[] = $lang;
							}
					}

				return $langs;
			}

		static public function photos($ids, &$items)
			{
				$params = [];
				$params['select'] = [
					'ID',
					'photos',
				];
				$params['filter'] = ['ID' => $ids];
				$result = self::getList($params);

				/** @var \Bitrix\Iblock\Elements\ElementNewsTable $item */
				while ($item = $result->fetchObject())
					{
						$items[$item->getId()]['photos'] = self::photosItem($item);
					}

			}

		static public function photosItem($item)
			{
				$photos = [];
				foreach ($item->getPhotos() as $photo)
					{
						$photoId = $photo->getValue();
						$photo = [
							'small' => Helper::resizeImageSrc($photoId, 182, 182),
							'big' => Helper::resizeImageSrc($photoId, 1000, 1000),
						];
						$photos[] = $photo;
					}

				return $photos;
			}

		static public function video($item)
			{
				if ($item->getVideo())
					{
						return Helper::parseYoutube($item->getVideo()->getValue());
					}

				return false;

			}


		static public function tags($item)
			{

				return array_map('trim', explode(",", $item->getTags()));
			}

	}