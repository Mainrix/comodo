<?

namespace Site\Main;


class Helper
    {
        static function numbersWithWords($number, $word_type)
            {
                $words = Array(
                    "bonus" => Array(
                        "бонус",
                        "бонуса",
                        "бонусов"
                    ),
                    "product" => Array(
                        "товар",
                        "товара",
                        "товаров"
                    ),
                    "day" => Array(
                        "день",
                        "дня",
                        "дней"
                    ),
                    "delivery_day" => Array(
                        "дня",
                        "дней",
                        "дней"
                    ),
                    "result" => Array(
                        "результат",
                        "результата",
                        "результатов"
                    ),
                    "reviews" => Array(
                        "Отзыв",
                        "Отзыва",
                        "Отзывов"
                    ),
                );

                if (is_array($word_type))
                    {
                        $words["temp"] = $word_type;
                        $word_type = "temp";
                    }

                $word = "";
                $firstnum = substr($number, -1);

                if (($number > 9 && $number < 20) || (substr($number, -2, 1) == 1 && $number >= 10))
                    {
                        $word = $words[$word_type]["2"];
                    }
                else
                    {
                        if ($firstnum == 1)
                            {
                                $word = $words[$word_type]["0"];
                            }
                        else if ($firstnum > 1 && $firstnum < 5)
                            {
                                $word = $words[$word_type]["1"];
                            }
                        else if (($firstnum >= 5 && $firstnum <= 9) || $firstnum == 0)
                            {
                                $word = $words[$word_type]["2"];
                            }
                    }

                return $word;

            }

        static function getPhotoArray($arItem, $code = "PHOTO")
            {
                $arPhoto = array();
                if ($arItem["~DETAIL_PICTURE"])
                    {
                        $arPhoto[] = $arItem["~DETAIL_PICTURE"];
                    }
                if (!empty($arItem["PROPERTIES"][$code]["~VALUE"]))
                    {
                        $arPhoto = array_merge($arPhoto, $arItem["PROPERTIES"][$code]["~VALUE"]);
                    }
                /*	if (count($arPhoto) >= 5)
                        {
                            $arPhoto = array_slice($arPhoto, 0, 5);
                        }*/
                return $arPhoto;
            }

        static function resizeImageSrc($id, $width, $height, $resizeType = BX_RESIZE_IMAGE_PROPORTIONAL, $upl = false)
            {
                $file = self::resizeImage($id, $width, $height, $resizeType, $upl);
                return $file['src'];
            }

        static function resizeImage($id, $width, $height, $resizeType = BX_RESIZE_IMAGE_PROPORTIONAL, $upl = false)
            {
                $file = \CFile::ResizeImageGet($id, array(
                    "width" => $width,
                    "height" => $height
                ), $resizeType);

                return $file;
            }

        static function priceFormat($price)
            {
                if (is_numeric($price))
                    {
                        return number_format($price, 0, ".", " ") . " <i>₽</i>";
                    }
                else
                    {
                        return $price;
                    }

            }

        static function clearUrlParams($url)
            {
                $arClearParams = [
                    "action",
                    "view",
                    "view",
                ];

                $arUrl = parse_url($url);
                parse_str($arUrl["query"], $arUrlParams);
                foreach ($arClearParams as $value)
                    {
                        unset($arUrlParams[$value]);
                    }

                $url = $arUrl["path"] . "?" . http_build_query($arUrlParams);
                return $url;
            }

        public static function menuTree(array $items)
            {
                if (count($items) === 0)
                    {
                        return [];
                    }

                $menu = [];
                $first = current($items);
                $level = (int)$first['DEPTH_LEVEL'];
                $levels = [
                    $level => &$menu,
                ];

                foreach ($items as $item)
                    {
                        $current = (int)$item['DEPTH_LEVEL'];

                        $item['CHILDREN'] = [];

                        if ($current > $level)
                            {
                                $levels[$current] = &$levels[$level][count($levels[$level]) - 1]['CHILDREN'];
                            }

                        $levels[$current][] = $item;

                        $level = $current;
                    }

                unset($level, $levels, $current);

                return $menu;
            }


        public static function clearPhone($phone)
            {

                //8 (900) 320-22-40
                $vowels = array(
                    ")",
                    "(",
                    " ",
                    "+",
                    "-"
                );
                $phone = str_replace($vowels, "", $phone);


                return $phone;
            }

        public static function getSvg($svg)
            {
                include $_SERVER["DOCUMENT_ROOT"] . SITE_TEMPLATE_PATH . "/svg/" . $svg . ".svg";
            }

        public static function getInc($inc)
            {
                include $_SERVER["DOCUMENT_ROOT"] . SITE_TEMPLATE_PATH . "/inc/" . $inc . ".php";
            }

        public static function getTextPage($currPage)
            {
                $arPages = [
                    '#^/services/([A-Za-z0-9_-]+)/#',
                    '#^/services/#',
                    '#^/stock/#',
                ];
                foreach ($arPages as $page)
                    {
                        if (preg_match($page, $currPage))
                            {
                                return true;
                            }
                    }
                return false;
            }

 		public static function isFooterPage($currPage)
            {
                $arPages = [
                     '#^/register/#',
                    '#^/personal/#',
                ];
                foreach ($arPages as $page)
                    {
                        if (preg_match($page, $currPage))
                            {
                                return false;
                            }
                    }
                return true;
            }

        public static function parseYoutube($url)
            {
                $videoId = false;
                if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/\s]{11})%i', $url, $match))
                    {
                        $videoId = $match[1];
                    }
                return $videoId;
            }

        public static function getUserPhone($userId)
            {
                $phone = '';
                $arUser = \CUser::GetByID($userId)->Fetch();

                if ($arUser['PERSONAL_PHONE'])
                    {
                        return $arUser['PERSONAL_PHONE'];
                    }
                if ($arUser['PERSONAL_MOBILE'])
                    {
                        return $arUser['PERSONAL_MOBILE'];
                    }

            }

        public static function trimLow($str)
            {
                return mb_strtolower(trim($str));
            }

        public static function roundCeil($num) {
            return ceil($num / 10) * 10;
        }

        public static function getPopularProduct()
            {
                \Bitrix\Main\Loader::includeModule("sale");

                $arIds = [];
                $obCache = new \CPHPCache();
                if ($obCache->InitCache(0, md5('getPopularProductForMainS'), "/iblock/menu"))
                    {
                        $arIds = $obCache->GetVars();
                    }
                elseif ($obCache->StartDataCache())
                    {

                        $arFilter = [
                            "IBLOCK_ID" => 35,
                            "ACTIVE" => "Y",
                            "ACTIVE_DATE" => "Y",
                            "!PROPERTY_PRODUCT" => false,
                        ];
                        $arSelect = [
                            "ID",
                            "IBLOCK_ID",
                            "PROPERTY_PRODUCT",
                            "PROPERTY_BEST"
                        ];
                        $arIds = [];
                        $result = \CIBlockElement::GetList(false, $arFilter, false, false, $arSelect);
                        while ($arItem = $result->Fetch())
                            {
                                if ($arItem["PROPERTY_BEST_VALUE"])
                                    {
                                        if (!$arIds['BEST'])
                                            {
                                                $arIds['BEST'] = $arItem['PROPERTY_PRODUCT_VALUE'];
                                            }
                                    }
                                else
                                    {
                                        $arIds['POPULAR'][] = $arItem['PROPERTY_PRODUCT_VALUE'];
                                    }
                            }

                        $obCache->EndDataCache($arIds);
                    }

                return $arIds;
            }

        static function getPriceItem($priceCode, $arItem)
            {
                if (!empty($arItem["OFFERS"]))
                    {
                        $minKey = 0;
                        $minOffersPrice = $arItem["OFFERS"][$minKey]["PRICES"][$priceCode]["DISCOUNT_VALUE_NOVAT"];
                        foreach ($arItem["OFFERS"] as $key => $offer)
                            {
                                if ($offer["PRICES"][$priceCode]["DISCOUNT_VALUE_NOVAT"] < $minOffersPrice)
                                    {
                                        $minKey = $key;
                                        $minOffersPrice = $offer["PRICES"][$priceCode]["DISCOUNT_VALUE_NOVAT"];
                                    }
                            }

                        $prodId = $arItem["OFFERS"][$minKey]["ID"];
                        $arPrice = $arItem["OFFERS"][$minKey]["PRICES"][$priceCode];

                    }
                else
                    {
                        $prodId = $arItem["ID"];
                        $arPrice = $arItem["PRICES"][$priceCode];
                    }

                return $arPrice;
            }

    }