<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
IncludeTemplateLangFile(__FILE__);
global $APPLICATION, $arRegion, $arSite, $arTheme;

$arSite = CSite::GetByID(SITE_ID)->Fetch();
$bIncludedModule = \Bitrix\Main\Loader::includeModule('aspro.allcorp3');
?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?=LANGUAGE_ID?>" lang="<?=LANGUAGE_ID?>" class="<?=($_SESSION['SESS_INCLUDE_AREAS'] ? 'bx_editmode ' : '')?><?=strpos( $_SERVER['HTTP_USER_AGENT'], 'MSIE 7.0' ) ? 'ie ie7' : ''?> <?=strpos( $_SERVER['HTTP_USER_AGENT'], 'MSIE 8.0' ) ? 'ie ie8' : ''?> <?=strpos( $_SERVER['HTTP_USER_AGENT'], 'MSIE 7.0' ) ? 'ie ie9' : ''?>">
	<head>
		<?// TASK 19079 ?>
		<?
		$url = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
		$url = explode('?', $url);
		$url = $url[0];

		$metaNoIndex = '<meta name="robots" content="noindex, nofollow"/>';

		if($url == "https://b-monitoring.ru/contacts/sankt-peterburg/" || $url == "https://b-monitoring.ru/contacts/leningradskaya-oblast/"){
			echo $metaNoIndex;
		}
		?>
		<?// TASK 19079 ?>

		<title><?$APPLICATION->ShowTitle()?></title>
		<link rel="canonical" href="<?=$APPLICATION->GetCurDir(); ?>" />
		<?$APPLICATION->ShowMeta("viewport");?>
		<?$APPLICATION->ShowMeta("HandheldFriendly");?>
		<?$APPLICATION->ShowMeta("apple-mobile-web-app-capable", "yes");?>
		<?$APPLICATION->ShowMeta("apple-mobile-web-app-status-bar-style");?>
		<?$APPLICATION->ShowMeta("SKYPE_TOOLBAR");?>
		<?$APPLICATION->ShowHead();?>
		<?$APPLICATION->AddHeadString('<script>BX.message('.CUtil::PhpToJSObject($MESS, false).')</script>', true);?>
		<?if($bIncludedModule)
			CAllcorp3::Start(SITE_ID);?>
<!-- Yandex.Metrika counter --> <script type="text/javascript" > (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)}; m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)}) (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym"); ym(42658284, "init", { clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true }); </script> <noscript><div><img src="https://mc.yandex.ru/watch/42658284" style="position:absolute; left:-9999px;" alt="" /></div></noscript> <!-- /Yandex.Metrika counter -->
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-WB5DCRJ');</script>
<!-- End Google Tag Manager -->
</head>
	<body class="<?=($bIndexBot ? "wbot" : "")?> site_<?=SITE_ID?> <?=($bIncludedModule ? CAllcorp3::getConditionClass() : '')?>" id="main" data-site="<?=SITE_DIR?>">
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WB5DCRJ"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<div class="bx_areas"><?if($bIncludedModule){CAllcorp3::ShowPageType('header_counter');}?></div>

		<?if(!$bIncludedModule):?>
			<?$APPLICATION->SetTitle(GetMessage("ERROR_INCLUDE_MODULE_ALLCORP3_TITLE"));?>
			<?$APPLICATION->IncludeFile(SITE_DIR."include/error_include_module.php");?></body></html>
			<?die();?>
		<?endif;?>

		<?include_once(str_replace('//', '/', $_SERVER['DOCUMENT_ROOT'].'/'.SITE_DIR.'include/header/body_top.php'));?>

		<?$arTheme = $APPLICATION->IncludeComponent("aspro:theme.allcorp3", "", array(), false, ['HIDE_ICONS' => 'Y']);?>
		<?include_once('defines.php');?>
		<?CAllcorp3::SetJSOptions();?>

		<div class="body <?=($isIndex ? 'index' : '')?> hover_<?=$arTheme["HOVER_TYPE_IMG"]["VALUE"];?>">
			<div class="body_media"></div>

			<?CAllcorp3::get_banners_position('TOP_HEADER');?>
			<?CAllcorp3::ShowPageType('eyed_component');?>
			<div class="visible-lg visible-md title-v<?=$arTheme["PAGE_TITLE"]["VALUE"];?><?=($isIndex ? ' index' : '')?>" data-ajax-block="HEADER" data-ajax-callback="headerInit">
				<?CAllcorp3::ShowPageType('mega_menu');?>
				<?CAllcorp3::ShowPageType('header');?>
			</div>

			<?CAllcorp3::get_banners_position('TOP_UNDERHEADER');?>

			<?if($arTheme["TOP_MENU_FIXED"]["VALUE"] == 'Y'):?>
				<div id="headerfixed">
					<?CAllcorp3::ShowPageType('header_fixed');?>
				</div>
			<?endif;?>

			<div id="mobileheader" class="visible-xs visible-sm">
				<?CAllcorp3::ShowPageType('header_mobile');?>
				<div id="mobilemenu" class="mobile-scroll scrollbar">
					<?CAllcorp3::ShowPageType('header_mobile_menu');?>
				</div>
			</div>
			<div id="mobilefilter" class="scrollbar-filter"></div>

			<div role="main" class="main banner-auto">
				<?if(!$isIndex && !$is404 && !$isForm):?>
					<?$APPLICATION->ShowViewContent('section_bnr_content');?>
					<?if($APPLICATION->GetProperty("HIDETITLE")!=='Y'):?>
						<!--title_content-->
						<? CAllcorp3::ShowPageType('page_title');?>
						<!--end-title_content-->
					<?endif;?>
					<?$APPLICATION->ShowViewContent('top_section_filter_content');?>
					<?$APPLICATION->ShowViewContent('top_detail_content');?>
				<?endif; // if !$isIndex && !$is404 && !$isForm?>

				<div class="container <?=($isCabinet ? 'cabinte-page' : '');?><?=($isBlog ? ' blog-page' : '');?> <?=CAllcorp3::ShowPageProps("ERROR_404");?>">
					<?if(!$isIndex):?>
						<div class="row">
							<?if($APPLICATION->GetProperty("FULLWIDTH")!=='Y'):?>
								<div class="maxwidth-theme">
							<?endif;?>
							<?if($is404):?>
								<div class="col-md-12 col-sm-12 col-xs-12 content-md">
							<?else:?>
								<div class="col-md-12 col-sm-12 col-xs-12 content-md">
									<div class="right_block narrow_<?=CAllcorp3::ShowPageProps("MENU");?> <?=$APPLICATION->ShowViewContent('right_block_class')?>">
									<?CAllcorp3::get_banners_position('CONTENT_TOP');?>

									<?ob_start();?>
										<?$APPLICATION->IncludeComponent("bitrix:main.include", "template1", Array(
	"COMPONENT_TEMPLATE" => ".default",
		"PATH" => SITE_DIR."include/left_block/menu.left_menu.php",	// Путь к файлу области
		"AREA_FILE_SHOW" => "file",	// Показывать включаемую область
		"AREA_FILE_SUFFIX" => "",
		"AREA_FILE_RECURSIVE" => "Y",
		"EDIT_TEMPLATE" => "include_area.php",	// Шаблон области по умолчанию
	),
	false
);?>
									<?$sMenuContent = ob_get_contents();
									ob_end_clean();?>
							<?endif;?>
					<?endif;?>
					<?CAllcorp3::checkRestartBuffer();?>