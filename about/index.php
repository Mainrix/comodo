<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("classContanierSub", "-inner");
$APPLICATION->SetTitle("О бренде");

?>
	<div class="wrapper-b">
		<p class="text text-medium _fw-l _lh-b">
					<?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	".default",
	array(
		"COMPONENT_TEMPLATE" => ".default",
		"AREA_FILE_SHOW" => "file",
		"PATH" => "/local/templates/main/inc/textAbout.php",
		"EDIT_TEMPLATE" => ""
	),
	false
);?>
		</p>
	</div>
	<div class="card card-address card-lazy">
		<div class="card-address__img card-placeholder img-rounded">
					<?$APPLICATION->IncludeComponent(
						"bitrix:main.include",
						".default",
						array(
							"COMPONENT_TEMPLATE" => ".default",
							"AREA_FILE_SHOW" => "file",
							"PATH" => "/local/templates/main/inc/image1About.php",
							"EDIT_TEMPLATE" => ""
						),
						false
					);?>
		</div>
		<div class="card-address__body">
					<?$APPLICATION->IncludeComponent(
						"bitrix:main.include",
						".default",
						array(
							"COMPONENT_TEMPLATE" => ".default",
							"AREA_FILE_SHOW" => "file",
							"PATH" => "/local/templates/main/inc/adres1About.php",
							"EDIT_TEMPLATE" => ""
						),
						false
					);?>
		</div>
	</div>
	<div class="card card-address card-lazy">
		<div class="card-address__img card-placeholder img-rounded">
					<?$APPLICATION->IncludeComponent(
						"bitrix:main.include",
						".default",
						array(
							"COMPONENT_TEMPLATE" => ".default",
							"AREA_FILE_SHOW" => "file",
							"PATH" => "/local/templates/main/inc/image2About.php",
							"EDIT_TEMPLATE" => ""
						),
						false
					);?>

		</div>
		<div class="card-address__body">
					<?$APPLICATION->IncludeComponent(
						"bitrix:main.include",
						".default",
						array(
							"COMPONENT_TEMPLATE" => ".default",
							"AREA_FILE_SHOW" => "file",
							"PATH" => "/local/templates/main/inc/adres2About.php",
							"EDIT_TEMPLATE" => ""
						),
						false
					);?>

		</div>
	</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>