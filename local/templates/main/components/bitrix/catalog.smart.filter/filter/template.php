<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
	{
		die();
	}
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);


?>

<form class="js-filters-form" name="<? echo $arResult["FILTER_NAME"] . "_form" ?>"
      action="<? echo $arResult["FORM_ACTION"] ?>" method="get">

    <div class="section-search__sidebar-actions">
        <div class="search-group">
            <select class="search-group__sort js-form-select form-select"
                    data-minimum-results-for-search="Infinity" onchange="location.href=$(this).val()">
				<? foreach ($arResult['SORTS'] as $code => $arSort): ?>
                    <option
                            <?=$arParams['SORT']==$code?'selected':''?>
                            value="<?=$APPLICATION->GetCurPageParam('sort='.$code,['sort'])?>"><?=$arSort['name']?></option>
				<? endforeach; ?>
            </select>
            <button type="button"
                    class="search-group__filters btn _s-medium _select js-filters-toggle">
                <span class="btn__text">Фильтр</span>

                <svg class="icon-svg icon-svg_filters btn__icon">
                    <use xlink:href="/assets/images/sprite.svg#filters"></use>
                </svg>

            </button>
        </div>
    </div>

    <div class="section-search__sidebar-filters js-filters-menu">
        <div class="search">
            <div class="search__head">
                <h3>Фильтр</h3>
                <button type="button"
                        class="js-filters-toggle navbar-toggle btn _icon _white">

                    <svg class="icon-svg icon-svg_close btn__icon">
                        <use xlink:href="/assets/images/sprite.svg#close"></use>
                    </svg>

                </button>
            </div>
            <div class="card search__card _border">
                <div class="custom-scroll">
                    <div class="search__card-inner">
						<? foreach ($arResult["HIDDEN"] as $arItem): ?>
                            <input type="hidden" name="<? echo $arItem["CONTROL_NAME"] ?>"
                                   id="<? echo $arItem["CONTROL_ID"] ?>"
                                   value="<? echo $arItem["HTML_VALUE"] ?>"/>
						<? endforeach; ?>
						<? foreach ($arResult["ITEMS"] as $key => $arItem)//prices
							{
								$key = $arItem["ENCODED_ID"];
								if (isset($arItem["PRICE"])):
										if ($arItem["VALUES"]["MAX"]["VALUE"] - $arItem["VALUES"]["MIN"]["VALUE"] <= 0)
											{
												continue;
											}

										$step_num = 4;
										$step =
											($arItem["VALUES"]["MAX"]["VALUE"] - $arItem["VALUES"]["MIN"]["VALUE"]) / $step_num;
										$prices = array();
										if (Bitrix\Main\Loader::includeModule("currency"))
											{
												for ($i = 0; $i < $step_num; $i++)
													{
														$prices[$i] =
															CCurrencyLang::CurrencyFormat($arItem["VALUES"]["MIN"]["VALUE"] + $step * $i, $arItem["VALUES"]["MIN"]["CURRENCY"], false);
													}
												$prices[$step_num] =
													CCurrencyLang::CurrencyFormat($arItem["VALUES"]["MAX"]["VALUE"], $arItem["VALUES"]["MAX"]["CURRENCY"], false);
											}
										else
											{
												$precision = $arItem["DECIMALS"] ? $arItem["DECIMALS"] : 0;
												for ($i = 0; $i < $step_num; $i++)
													{
														$prices[$i] =
															number_format($arItem["VALUES"]["MIN"]["VALUE"] + $step * $i, $precision, ".", "");
													}
												$prices[$step_num] =
													number_format($arItem["VALUES"]["MAX"]["VALUE"], $precision, ".", "");
											}
										?>
                                        <div class="form-group custom-scroll">
                                            <div class="form-group-title">Цена в рублях</div>
                                            <div class="catalog-sort">
                                                <div class="catalog-sort-fields">
                                                    <label class="form-input _flex  _pre">
    <?
    if($arItem["VALUES"]["MIN"]["HTML_VALUE"]=='')
     $valMin = $arItem["VALUES"]["MIN"]["VALUE"];
    else $valMin = $arItem["VALUES"]["MIN"]["HTML_VALUE"];

    if($arItem["VALUES"]["MAX"]["HTML_VALUE"]=='')
	    $valMan = $arItem["VALUES"]["MAX"]["VALUE"];
    else $valMan = $arItem["VALUES"]["MAX"]["HTML_VALUE"];
    ?>
                                                        <span class="form-input__pre">от</span>
                                                        <input
                                                                class="js-rangeslider-min form-input__field js-placeholder-animate"
                                                                autocomplete="on"
                                                                type="text"
                                                                name="<? echo $arItem["VALUES"]["MIN"]["CONTROL_NAME"] ?>"
                                                                id="<? echo $arItem["VALUES"]["MIN"]["CONTROL_ID"] ?>"
                                                                value="<? echo $valMin ?>"
                                                                size="5"
                                                                onchange="smartFilter.keyup(this)"
                                                                data-min="<? echo $arItem["VALUES"]["MIN"]["VALUE"] ?>"
                                                        >
                                                    </label>
                                                    <span class="catalog-sort-fields__divider">-</span>
                                                    <label class="form-input _flex  _pre">
                                                        <span class="form-input__pre">до</span>
                                                        <input
                                                                class="js-rangeslider-max form-input__field js-placeholder-animate"
                                                                autocomplete="on"
                                                                type="text"
                                                                placeholder=""
                                                                name="<? echo $arItem["VALUES"]["MAX"]["CONTROL_NAME"] ?>"
                                                                id="<? echo $arItem["VALUES"]["MAX"]["CONTROL_ID"] ?>"
                                                                value="<? echo $valMan ?>"
                                                                size="5"
                                                                data-max="<? echo $arItem["VALUES"]["MAX"]["VALUE"] ?>"
                                                                onchange="smartFilter.keyup(this)"
                                                        >
                                                    </label>
                                                </div>
                                                <div class="catalog-sort-range">
                                                    <input type="hidden" id="amount" readonly
                                                           style="border:0; color:#f6931f; font-weight:bold;">
                                                    <div class="js-slider-range"  id="slider-range"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group-divider"></div>
									<?endif;
							} ?>

						<? //not prices
						foreach ($arResult["ITEMS"] as $key => $arItem)
							{
								if (empty($arItem["VALUES"]) || isset($arItem["PRICE"]))
									{
										continue;
									}

                                if(count($arItem["VALUES"])==1 && $arItem["DISPLAY_TYPE"]!='A')
                                    continue;

								if ($arItem["DISPLAY_TYPE"] == "A" && ($arItem["VALUES"]["MAX"]["VALUE"] - $arItem["VALUES"]["MIN"]["VALUE"] <= 0))
									{
										continue;
									}
								?>
                                <div class="form-group">
                                    <div class="form-checkbox-group">
                                        <span class="bx-filter-container-modef"></span>
                                        <div class="form-group-title"><?= $arItem["NAME"] ?></div>

                                        <div data-role="bx_filter_block">
											<?
											$arCur = current($arItem["VALUES"]);
											switch ($arItem["DISPLAY_TYPE"])
												{
											case "A"://NUMBERS_WITH_SLIDER
												?>
                                                <div class="col-xs-6 bx-filter-parameters-box-container-block bx-left">
                                                    <i class="bx-ft-sub"><?= GetMessage("CT_BCSF_FILTER_FROM") ?></i>
                                                    <div class="bx-filter-input-container">
                                                        <input
                                                                class="min-price"
                                                                type="text"
                                                                name="<? echo $arItem["VALUES"]["MIN"]["CONTROL_NAME"] ?>"
                                                                id="<? echo $arItem["VALUES"]["MIN"]["CONTROL_ID"] ?>"
                                                                value="<? echo $arItem["VALUES"]["MIN"]["HTML_VALUE"] ?>"
                                                                size="5"
                                                                onkeyup="smartFilter.keyup(this)"
                                                        />
                                                    </div>
                                                </div>
                                                <div class="col-xs-6 bx-filter-parameters-box-container-block bx-right">
                                                    <i class="bx-ft-sub"><?= GetMessage("CT_BCSF_FILTER_TO") ?></i>
                                                    <div class="bx-filter-input-container">
                                                        <input
                                                                class="max-price"
                                                                type="text"
                                                                name="<? echo $arItem["VALUES"]["MAX"]["CONTROL_NAME"] ?>"
                                                                id="<? echo $arItem["VALUES"]["MAX"]["CONTROL_ID"] ?>"
                                                                value="<? echo $arItem["VALUES"]["MAX"]["HTML_VALUE"] ?>"
                                                                size="5"
                                                                onkeyup="smartFilter.keyup(this)"
                                                        />
                                                    </div>
                                                </div>

                                                <div class="col-xs-10 col-xs-offset-1 bx-ui-slider-track-container">
                                                    <div class="bx-ui-slider-track" id="drag_track_<?= $key ?>">
														<?
														$precision = $arItem["DECIMALS"] ? $arItem["DECIMALS"] : 0;
														$step =
															($arItem["VALUES"]["MAX"]["VALUE"] - $arItem["VALUES"]["MIN"]["VALUE"]) / 4;
														$value1 =
															number_format($arItem["VALUES"]["MIN"]["VALUE"], $precision, ".", "");
														$value2 =
															number_format($arItem["VALUES"]["MIN"]["VALUE"] + $step, $precision, ".", "");
														$value3 =
															number_format($arItem["VALUES"]["MIN"]["VALUE"] + $step * 2, $precision, ".", "");
														$value4 =
															number_format($arItem["VALUES"]["MIN"]["VALUE"] + $step * 3, $precision, ".", "");
														$value5 =
															number_format($arItem["VALUES"]["MAX"]["VALUE"], $precision, ".", "");
														?>
                                                        <div class="bx-ui-slider-part p1"><span><?= $value1 ?></span>
                                                        </div>
                                                        <div class="bx-ui-slider-part p2"><span><?= $value2 ?></span>
                                                        </div>
                                                        <div class="bx-ui-slider-part p3"><span><?= $value3 ?></span>
                                                        </div>
                                                        <div class="bx-ui-slider-part p4"><span><?= $value4 ?></span>
                                                        </div>
                                                        <div class="bx-ui-slider-part p5"><span><?= $value5 ?></span>
                                                        </div>

                                                        <div class="bx-ui-slider-pricebar-vd" style="left: 0;right: 0;"
                                                             id="colorUnavailableActive_<?= $key ?>"></div>
                                                        <div class="bx-ui-slider-pricebar-vn" style="left: 0;right: 0;"
                                                             id="colorAvailableInactive_<?= $key ?>"></div>
                                                        <div class="bx-ui-slider-pricebar-v" style="left: 0;right: 0;"
                                                             id="colorAvailableActive_<?= $key ?>"></div>
                                                        <div class="bx-ui-slider-range" id="drag_tracker_<?= $key ?>"
                                                             style="left: 0;right: 0;">
                                                            <a class="bx-ui-slider-handle left" style="left:0;"
                                                               href="javascript:void(0)"
                                                               id="left_slider_<?= $key ?>"></a>
                                                            <a class="bx-ui-slider-handle right" style="right:0;"
                                                               href="javascript:void(0)"
                                                               id="right_slider_<?= $key ?>"></a>
                                                        </div>
                                                    </div>
                                                </div>
											<?
											$arJsParams = array(
												"leftSlider" => 'left_slider_' . $key,
												"rightSlider" => 'right_slider_' . $key,
												"tracker" => "drag_tracker_" . $key,
												"trackerWrap" => "drag_track_" . $key,
												"minInputId" => $arItem["VALUES"]["MIN"]["CONTROL_ID"],
												"maxInputId" => $arItem["VALUES"]["MAX"]["CONTROL_ID"],
												"minPrice" => $arItem["VALUES"]["MIN"]["VALUE"],
												"maxPrice" => $arItem["VALUES"]["MAX"]["VALUE"],
												"curMinPrice" => $arItem["VALUES"]["MIN"]["HTML_VALUE"],
												"curMaxPrice" => $arItem["VALUES"]["MAX"]["HTML_VALUE"],
												"fltMinPrice" => intval($arItem["VALUES"]["MIN"]["FILTERED_VALUE"]) ?
													$arItem["VALUES"]["MIN"]["FILTERED_VALUE"] :
													$arItem["VALUES"]["MIN"]["VALUE"],
												"fltMaxPrice" => intval($arItem["VALUES"]["MAX"]["FILTERED_VALUE"]) ?
													$arItem["VALUES"]["MAX"]["FILTERED_VALUE"] :
													$arItem["VALUES"]["MAX"]["VALUE"],
												"precision" => $arItem["DECIMALS"] ? $arItem["DECIMALS"] : 0,
												"colorUnavailableActive" => 'colorUnavailableActive_' . $key,
												"colorAvailableActive" => 'colorAvailableActive_' . $key,
												"colorAvailableInactive" => 'colorAvailableInactive_' . $key,
											);
											?>
                                                <script type="text/javascript">
																									BX.ready(function () {
																										window['trackBar<?=$key?>'] = new BX.Iblock.SmartFilter(<?=CUtil::PhpToJSObject($arJsParams)?>);
																									});
                                                </script>
											<?
											break;
											case "B"://NUMBERS
											?>
                                                <div class="col-xs-6 bx-filter-parameters-box-container-block bx-left">
                                                    <i class="bx-ft-sub"><?= GetMessage("CT_BCSF_FILTER_FROM") ?></i>
                                                    <div class="bx-filter-input-container">
                                                        <input
                                                                class="min-price"
                                                                type="text"
                                                                name="<? echo $arItem["VALUES"]["MIN"]["CONTROL_NAME"] ?>"
                                                                id="<? echo $arItem["VALUES"]["MIN"]["CONTROL_ID"] ?>"
                                                                value="<? echo $arItem["VALUES"]["MIN"]["HTML_VALUE"] ?>"
                                                                size="5"
                                                                onkeyup="smartFilter.keyup(this)"
                                                        />
                                                    </div>
                                                </div>
                                                <div class="col-xs-6 bx-filter-parameters-box-container-block bx-right">
                                                    <i class="bx-ft-sub"><?= GetMessage("CT_BCSF_FILTER_TO") ?></i>
                                                    <div class="bx-filter-input-container">
                                                        <input
                                                                class="max-price"
                                                                type="text"
                                                                name="<? echo $arItem["VALUES"]["MAX"]["CONTROL_NAME"] ?>"
                                                                id="<? echo $arItem["VALUES"]["MAX"]["CONTROL_ID"] ?>"
                                                                value="<? echo $arItem["VALUES"]["MAX"]["HTML_VALUE"] ?>"
                                                                size="5"
                                                                onkeyup="smartFilter.keyup(this)"
                                                        />
                                                    </div>
                                                </div>
											<?
											break;
											case "G"://CHECKBOXES_WITH_PICTURES
											?>
                                                <div class="col-xs-12">
                                                    <div class="bx-filter-param-btn-inline">
														<? foreach ($arItem["VALUES"] as $val => $ar): ?>
                                                            <input
                                                                    style="display: none"
                                                                    type="checkbox"
                                                                    name="<?= $ar["CONTROL_NAME"] ?>"
                                                                    id="<?= $ar["CONTROL_ID"] ?>"
                                                                    value="<?= $ar["HTML_VALUE"] ?>"
																<? echo $ar["CHECKED"] ? 'checked="checked"' : '' ?>
                                                            />
															<?
															$class = "";
															if ($ar["CHECKED"])
																{
																	$class .= " bx-active";
																}
															if ($ar["DISABLED"])
																{
																	$class .= " disabled";
																}
															?>
                                                            <label for="<?= $ar["CONTROL_ID"] ?>"
                                                                   data-role="label_<?= $ar["CONTROL_ID"] ?>"
                                                                   class="bx-filter-param-label <?= $class ?>"
                                                                   onclick="smartFilter.keyup(BX('<?= CUtil::JSEscape($ar["CONTROL_ID"]) ?>')); BX.toggleClass(this, 'bx-active');">
												<span class="bx-filter-param-btn bx-color-sl">
													<? if (isset($ar["FILE"]) && !empty($ar["FILE"]["SRC"])): ?>
                                                        <span class="bx-filter-btn-color-icon"
                                                              style="background-image:url('<?= $ar["FILE"]["SRC"] ?>');"></span>
													<? endif ?>
												</span>
                                                            </label>
														<? endforeach ?>
                                                    </div>
                                                </div>
											<?
											break;
											case "H"://CHECKBOXES_WITH_PICTURES_AND_LABELS
											?>
                                                <div class="col-xs-12">
                                                    <div class="bx-filter-param-btn-block">
														<? foreach ($arItem["VALUES"] as $val => $ar): ?>
                                                            <input
                                                                    style="display: none"
                                                                    type="checkbox"
                                                                    name="<?= $ar["CONTROL_NAME"] ?>"
                                                                    id="<?= $ar["CONTROL_ID"] ?>"
                                                                    value="<?= $ar["HTML_VALUE"] ?>"
																<? echo $ar["CHECKED"] ? 'checked="checked"' : '' ?>
                                                            />
															<?
															$class = "";
															if ($ar["CHECKED"])
																{
																	$class .= " bx-active";
																}
															if ($ar["DISABLED"])
																{
																	$class .= " disabled";
																}
															?>
                                                            <label for="<?= $ar["CONTROL_ID"] ?>"
                                                                   data-role="label_<?= $ar["CONTROL_ID"] ?>"
                                                                   class="bx-filter-param-label<?= $class ?>"
                                                                   onclick="smartFilter.keyup(BX('<?= CUtil::JSEscape($ar["CONTROL_ID"]) ?>')); BX.toggleClass(this, 'bx-active');">
												<span class="bx-filter-param-btn bx-color-sl">
													<? if (isset($ar["FILE"]) && !empty($ar["FILE"]["SRC"])): ?>
                                                        <span class="bx-filter-btn-color-icon"
                                                              style="background-image:url('<?= $ar["FILE"]["SRC"] ?>');"></span>
													<? endif ?>
												</span>
                                                                <span class="bx-filter-param-text"
                                                                      title="<?= $ar["VALUE"]; ?>"><?= $ar["VALUE"]; ?><?
																	if ($arParams["DISPLAY_ELEMENT_COUNT"] !== "N" && isset($ar["ELEMENT_COUNT"])):
																			?> (<span
                                                                                data-role="count_<?= $ar["CONTROL_ID"] ?>"><? echo $ar["ELEMENT_COUNT"]; ?></span>)<?
																	endif; ?></span>
                                                            </label>
														<? endforeach ?>
                                                    </div>
                                                </div>
											<?
											break;
											case "P"://DROPDOWN
											$checkedItemExist = false;
											?>
                                                <div class="col-xs-12">
                                                    <div class="bx-filter-select-container">
                                                        <div class="bx-filter-select-block"
                                                             onclick="smartFilter.showDropDownPopup(this, '<?= CUtil::JSEscape($key) ?>')">
                                                            <div class="bx-filter-select-text"
                                                                 data-role="currentOption">
																<?
																foreach ($arItem["VALUES"] as $val => $ar)
																	{
																		if ($ar["CHECKED"])
																			{
																				echo $ar["VALUE"];
																				$checkedItemExist = true;
																			}
																	}
																if (!$checkedItemExist)
																	{
																		echo GetMessage("CT_BCSF_FILTER_ALL");
																	}
																?>
                                                            </div>
                                                            <div class="bx-filter-select-arrow"></div>
                                                            <input
                                                                    style="display: none"
                                                                    type="radio"
                                                                    name="<?= $arCur["CONTROL_NAME_ALT"] ?>"
                                                                    id="<? echo "all_" . $arCur["CONTROL_ID"] ?>"
                                                                    value=""
                                                            />
															<? foreach ($arItem["VALUES"] as $val => $ar): ?>
                                                                <input
                                                                        style="display: none"
                                                                        type="radio"
                                                                        name="<?= $ar["CONTROL_NAME_ALT"] ?>"
                                                                        id="<?= $ar["CONTROL_ID"] ?>"
                                                                        value="<? echo $ar["HTML_VALUE_ALT"] ?>"
																	<? echo $ar["CHECKED"] ? 'checked="checked"' : '' ?>
                                                                />
															<? endforeach ?>
                                                            <div class="bx-filter-select-popup"
                                                                 data-role="dropdownContent"
                                                                 style="display: none;">
                                                                <ul>
                                                                    <li>
                                                                        <label for="<?= "all_" . $arCur["CONTROL_ID"] ?>"
                                                                               class="bx-filter-param-label"
                                                                               data-role="label_<?= "all_" . $arCur["CONTROL_ID"] ?>"
                                                                               onclick="smartFilter.selectDropDownItem(this, '<?= CUtil::JSEscape("all_" . $arCur["CONTROL_ID"]) ?>')">
																			<? echo GetMessage("CT_BCSF_FILTER_ALL"); ?>
                                                                        </label>
                                                                    </li>
																	<?
																	foreach ($arItem["VALUES"] as $val => $ar):
																			$class = "";
																			if ($ar["CHECKED"])
																				{
																					$class .= " selected";
																				}
																			if ($ar["DISABLED"])
																				{
																					$class .= " disabled";
																				}
																			?>
                                                                            <li>
                                                                                <label for="<?= $ar["CONTROL_ID"] ?>"
                                                                                       class="bx-filter-param-label<?= $class ?>"
                                                                                       data-role="label_<?= $ar["CONTROL_ID"] ?>"
                                                                                       onclick="smartFilter.selectDropDownItem(this, '<?= CUtil::JSEscape($ar["CONTROL_ID"]) ?>')"><?= $ar["VALUE"] ?></label>
                                                                            </li>
																		<? endforeach ?>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
											<?
											break;
											case "R"://DROPDOWN_WITH_PICTURES_AND_LABELS
											?>
                                                <div class="col-xs-12">
                                                    <div class="bx-filter-select-container">
                                                        <div class="bx-filter-select-block"
                                                             onclick="smartFilter.showDropDownPopup(this, '<?= CUtil::JSEscape($key) ?>')">
                                                            <div class="bx-filter-select-text fix"
                                                                 data-role="currentOption">
																<?
																$checkedItemExist = false;
																foreach ($arItem["VALUES"] as $val => $ar):
																		if ($ar["CHECKED"])
																			{
																				?>
																				<? if (isset($ar["FILE"]) && !empty($ar["FILE"]["SRC"])): ?>
                                                                                <span class="bx-filter-btn-color-icon"
                                                                                      style="background-image:url('<?= $ar["FILE"]["SRC"] ?>');"></span>
																			<? endif ?>
                                                                                <span class="bx-filter-param-text">
																<?= $ar["VALUE"] ?>
															</span>
																				<?
																				$checkedItemExist = true;
																			}
																endforeach;
																if (!$checkedItemExist)
																	{
																		?><span
                                                                            class="bx-filter-btn-color-icon all"></span> <?
																		echo GetMessage("CT_BCSF_FILTER_ALL");
																	}
																?>
                                                            </div>
                                                            <div class="bx-filter-select-arrow"></div>
                                                            <input
                                                                    style="display: none"
                                                                    type="radio"
                                                                    name="<?= $arCur["CONTROL_NAME_ALT"] ?>"
                                                                    id="<? echo "all_" . $arCur["CONTROL_ID"] ?>"
                                                                    value=""
                                                            />
															<? foreach ($arItem["VALUES"] as $val => $ar): ?>
                                                                <input
                                                                        style="display: none"
                                                                        type="radio"
                                                                        name="<?= $ar["CONTROL_NAME_ALT"] ?>"
                                                                        id="<?= $ar["CONTROL_ID"] ?>"
                                                                        value="<?= $ar["HTML_VALUE_ALT"] ?>"
																	<? echo $ar["CHECKED"] ? 'checked="checked"' : '' ?>
                                                                />
															<? endforeach ?>
                                                            <div class="bx-filter-select-popup"
                                                                 data-role="dropdownContent"
                                                                 style="display: none">
                                                                <ul>
                                                                    <li style="border-bottom: 1px solid #e5e5e5;padding-bottom: 5px;margin-bottom: 5px;">
                                                                        <label for="<?= "all_" . $arCur["CONTROL_ID"] ?>"
                                                                               class="bx-filter-param-label"
                                                                               data-role="label_<?= "all_" . $arCur["CONTROL_ID"] ?>"
                                                                               onclick="smartFilter.selectDropDownItem(this, '<?= CUtil::JSEscape("all_" . $arCur["CONTROL_ID"]) ?>')">
                                                                            <span class="bx-filter-btn-color-icon all"></span>
																			<? echo GetMessage("CT_BCSF_FILTER_ALL"); ?>
                                                                        </label>
                                                                    </li>
																	<?
																	foreach ($arItem["VALUES"] as $val => $ar):
																			$class = "";
																			if ($ar["CHECKED"])
																				{
																					$class .= " selected";
																				}
																			if ($ar["DISABLED"])
																				{
																					$class .= " disabled";
																				}
																			?>
                                                                            <li>
                                                                                <label for="<?= $ar["CONTROL_ID"] ?>"
                                                                                       data-role="label_<?= $ar["CONTROL_ID"] ?>"
                                                                                       class="bx-filter-param-label<?= $class ?>"
                                                                                       onclick="smartFilter.selectDropDownItem(this, '<?= CUtil::JSEscape($ar["CONTROL_ID"]) ?>')">
																					<? if (isset($ar["FILE"]) && !empty($ar["FILE"]["SRC"])): ?>
                                                                                        <span class="bx-filter-btn-color-icon"
                                                                                              style="background-image:url('<?= $ar["FILE"]["SRC"] ?>');"></span>
																					<? endif ?>
                                                                                    <span class="bx-filter-param-text">
																	<?= $ar["VALUE"] ?>
																</span>
                                                                                </label>
                                                                            </li>
																		<? endforeach ?>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
											<?
											break;
											case "K"://RADIO_BUTTONS
											?>
                                                <div class="col-xs-12">
                                                    <div class="radio">
                                                        <label class="bx-filter-param-label"
                                                               for="<? echo "all_" . $arCur["CONTROL_ID"] ?>">
												<span class="bx-filter-input-checkbox">
													<input
                                                            type="radio"
                                                            value=""
                                                            name="<? echo $arCur["CONTROL_NAME_ALT"] ?>"
                                                            id="<? echo "all_" . $arCur["CONTROL_ID"] ?>"
                                                            onclick="smartFilter.click(this)"
                                                    />
													<span class="bx-filter-param-text"><? echo GetMessage("CT_BCSF_FILTER_ALL"); ?></span>
												</span>
                                                        </label>
                                                    </div>
													<? foreach ($arItem["VALUES"] as $val => $ar): ?>
                                                        <div class="radio">
                                                            <label data-role="label_<?= $ar["CONTROL_ID"] ?>"
                                                                   class="bx-filter-param-label"
                                                                   for="<? echo $ar["CONTROL_ID"] ?>">
													<span class="bx-filter-input-checkbox <? echo $ar["DISABLED"] ?
														'disabled' : '' ?>">
														<input
                                                                type="radio"
                                                                value="<? echo $ar["HTML_VALUE_ALT"] ?>"
                                                                name="<? echo $ar["CONTROL_NAME_ALT"] ?>"
                                                                id="<? echo $ar["CONTROL_ID"] ?>"
															<? echo $ar["CHECKED"] ? 'checked="checked"' : '' ?>
															onclick="smartFilter.click(this)"
                                                        />
														<span class="bx-filter-param-text"
                                                              title="<?= $ar["VALUE"]; ?>"><?= $ar["VALUE"]; ?><?
															if ($arParams["DISPLAY_ELEMENT_COUNT"] !== "N" && isset($ar["ELEMENT_COUNT"])):
																	?>&nbsp;(<span
                                                                        data-role="count_<?= $ar["CONTROL_ID"] ?>"><? echo $ar["ELEMENT_COUNT"]; ?></span>)<?
															endif; ?></span>
													</span>
                                                            </label>
                                                        </div>
													<? endforeach; ?>
                                                </div>
											<?
											break;
											case "U"://CALENDAR
											?>
                                                <div class="col-xs-12">
                                                    <div class="bx-filter-parameters-box-container-block">
                                                        <div class="bx-filter-input-container bx-filter-calendar-container">
															<? $APPLICATION->IncludeComponent('bitrix:main.calendar', '', array(
																'FORM_NAME' => $arResult["FILTER_NAME"] . "_form",
																'SHOW_INPUT' => 'Y',
																'INPUT_ADDITIONAL_ATTR' => 'class="calendar" placeholder="' . FormatDate("SHORT", $arItem["VALUES"]["MIN"]["VALUE"]) . '" onkeyup="smartFilter.keyup(this)" onchange="smartFilter.keyup(this)"',
																'INPUT_NAME' => $arItem["VALUES"]["MIN"]["CONTROL_NAME"],
																'INPUT_VALUE' => $arItem["VALUES"]["MIN"]["HTML_VALUE"],
																'SHOW_TIME' => 'N',
																'HIDE_TIMEBAR' => 'Y',
															), null, array('HIDE_ICONS' => 'Y')); ?>
                                                        </div>
                                                    </div>
                                                    <div class="bx-filter-parameters-box-container-block">
                                                        <div class="bx-filter-input-container bx-filter-calendar-container">
															<? $APPLICATION->IncludeComponent('bitrix:main.calendar', '', array(
																'FORM_NAME' => $arResult["FILTER_NAME"] . "_form",
																'SHOW_INPUT' => 'Y',
																'INPUT_ADDITIONAL_ATTR' => 'class="calendar" placeholder="' . FormatDate("SHORT", $arItem["VALUES"]["MAX"]["VALUE"]) . '" onkeyup="smartFilter.keyup(this)" onchange="smartFilter.keyup(this)"',
																'INPUT_NAME' => $arItem["VALUES"]["MAX"]["CONTROL_NAME"],
																'INPUT_VALUE' => $arItem["VALUES"]["MAX"]["HTML_VALUE"],
																'SHOW_TIME' => 'N',
																'HIDE_TIMEBAR' => 'Y',
															), null, array('HIDE_ICONS' => 'Y')); ?>
                                                        </div>
                                                    </div>
                                                </div>
											<?
											break;
											default://CHECKBOXES
											?>
											<? foreach ($arItem["VALUES"] as $val => $ar): ?>
                                                <div class="form-checkbox-group">
                                                    <label data-role="label_<?= $ar["CONTROL_ID"] ?>"
                                                           class="form-checkbox <? echo $ar["DISABLED"] ? 'disabled' :
															   '' ?>"
                                                           for="<? echo $ar["CONTROL_ID"] ?>">
                                                        <input
                                                                class="form-checkbox__input"
                                                                type="checkbox"
                                                                value="<? echo $ar["HTML_VALUE"] ?>"
                                                                name="<? echo $ar["CONTROL_NAME"] ?>"
                                                                id="<? echo $ar["CONTROL_ID"] ?>"
															<? echo $ar["CHECKED"] ? 'checked="checked"' : '' ?>
                                                                onclick="smartFilter.click(this)"
                                                        />

                                                        <span class="form-checkbox__clone">
                                                             <span class="form-checkbox__clone-icon">
                                                               <svg class="icon-svg icon-svg_s icon-svg_s-check ">
                                                                  <use xlink:href="/assets/images/sprite.svg#s-check"></use>
                                                               </svg>
                                                             </span>
                                                        </span>
                                                        <span
                                                                title="<?= $ar["VALUE"]; ?>"
                                                                class="form-checkbox__title"><?= $ar["VALUE"]; ?></span>
                                                    </label>
                                                </div>
											<? endforeach; ?>
											<?
												}
											?>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group-divider"></div>

								<?
							}
						?>


                        <div class="form-footer _b-small _sticky mt-a" id="modef">
                            <button type="submit"
                                    id="set_filter"
                                    name="set_filter"
                                    class="btn _acsent _full _round btn-submit-js">
                                Показать
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</form>
<script type="text/javascript">
	var smartFilter = new JCSmartFilter('<?echo CUtil::JSEscape($arResult["FORM_ACTION"])?>', '<?=CUtil::JSEscape($arParams["FILTER_VIEW_MODE"])?>', <?=CUtil::PhpToJSObject($arResult["JS_FILTER_PARAMS"])?>);
</script>