<?php

namespace Site\Main\Controller;

use \Bitrix\Main\Engine\Controller;
use Bitrix\Main\Engine\Contract\Controllerable;
use Bitrix\Main\Engine\ActionFilter;
use Bitrix\Main\Loader;

Loader::includeModule('catalog');
Loader::includeModule('sale');

class User extends Controller
	{

	/**
	 * @return array
	 */
		public function configureActions()
			{
				return [
					'auth' => [
						'prefilters' => [
							new ActionFilter\Csrf(),
						]
					],
					'register' => [
						'prefilters' => [
							new ActionFilter\Csrf(),
						]
					]
				];
			}

		public static function getUserInfo()
			{
				$data = [
					'auth' => false,
					'name' => ''
				];
				global $USER;
				if ($USER->IsAuthorized())
					{
						$data = [
							'auth' => true,
							'name' => $USER->GetFullName()
						];
					}

				return $data;

			}

		public static function authAction($login, $password)
			{
				global $USER;
				if (!is_object($USER))
					$USER = new \CUser;
				$arAuthResult = $USER->Login($login, $password, "Y", "Y");
				$arReturn = [];
				if (isset($arAuthResult["TYPE"]) && $arAuthResult["TYPE"] == "ERROR")
					{
						$arReturn["status"] = "error";
						$arReturn["errors"] = ["login" => $arAuthResult["MESSAGE"]];
					}
				else
					{
						$arReturn["status"] = "success";
						$arReturn["id"] = $USER->GetID();
					}

				return $arReturn;
			}

		public static function registerAction($name, $surname, $phone, $email, $password, $confirm)
			{
				global $USER;
				if (!is_object($USER))
					$USER = new \CUser;

				$vowels = array(
					")",
					"(",
					" ",
					"+",
					"-"
				);
				$phone = str_replace($vowels, "", $phone);

				$arReturn = [];
				$user = new \CUser();
				$arFields = Array(
					"NAME" => $name,
					"LAST_NAME" => $surname,
					"EMAIL" => $email,
					"LOGIN" => $phone,
					"LID" => "s1",
					"ACTIVE" => "Y",
					"PASSWORD" => $password,
					"CONFIRM_PASSWORD" => $confirm,
					"PERSONAL_PHONE" => $phone,
					"PERSONAL_MOBILE" => $phone,
				);

				$ID = $user->Add($arFields);
				if (intval($ID) > 0)
					{

						$USER->Authorize($ID);

						$arReturn["status"] = "success";
						$arReturn["id"] = $ID;
					}
				else
					{
						$arReturn["status"] = "error";
						$arReturn["data"] = $user->LAST_ERROR;
						$arError = explode("<br>", $user->LAST_ERROR);
						foreach ($arError as $errorText)
							{
								$text = strtolower($errorText);
								if (strpos($text, "пароль") !== false)
									{
										$arReturn['errors']['password'] = $errorText;
									}
								if (strpos($text, "email") !== false)
									{
										$arReturn['errors']['email'] = $errorText;
									}
								if (strpos($text, "логин") !== false)
									{
										$arReturn['errors']['email'] = $errorText;
									}
								if (strpos($text, "пароля") !== false)
									{
										$arReturn['errors']['confirm'] = $errorText;
									}
							}

					}

				return $arReturn;
			}
	}

