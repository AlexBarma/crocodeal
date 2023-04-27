<!-- C:\OSPanel\domains\crocodeal.org\resources\views\home\inc\text-area.blade.php -->
<?php
$sectionOptions = $getTextAreaOp ?? [];
$sectionData ??= [];

// Fallback Language
$textTitle = data_get($sectionOptions, 'title_' . config('appLang.abbr'));
$textTitle = replaceGlobalPatterns($textTitle);

$textBody = data_get($sectionOptions, 'body_' . config('appLang.abbr'));
$textBody = replaceGlobalPatterns($textBody);

// Current Language
if (!empty(data_get($sectionOptions, 'title_' . config('app.locale')))) {
	$textTitle = data_get($sectionOptions, 'title_' . config('app.locale'));
	$textTitle = replaceGlobalPatterns($textTitle);
}

if (!empty(data_get($sectionOptions, 'body_' . config('app.locale')))) {
	$textBody = data_get($sectionOptions, 'body_' . config('app.locale'));
	$textBody = replaceGlobalPatterns($textBody);
}

$hideOnMobile = (data_get($sectionOptions, 'hide_on_mobile') == '1') ? ' hidden-sm' : '';
?>
@if (!empty($textTitle) || !empty($textBody))
@includeFirst([config('larapen.core.customizedViewPath') . 'home.inc.spacer', 'home.inc.spacer'], ['hideOnMobile' => $hideOnMobile])
<div class="container{{ $hideOnMobile }}">
	<div class="card">
		@if (!empty($textTitle))
		<h2 class="card-title">{{ $textTitle }}</h2>
		<!--Block YouTube info block-->
		<div style="display: grid; grid-gap: 15px; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); grid-template-rows: repeat(100%);"><!-- YouTube block end -->
			<p><iframe style="padding: 15px; border-radius: 30px;" title="YouTube video player" src="https://www.youtube.com/embed/t0KEW8ekFDY" width="100%" height="500" frameborder="0" allowfullscreen="">
				</iframe></p>
			<!-- info block start -->
			<div style="width: 100%; padding: 15px;; text-decoration: none;">
				<div class="info" style="width: 100%; height: 470px; border-radius: 20px; margine-top: 35px; text-decoration: none; background: linear-gradient(PaleTurquoise, #4682b4); display: flex; justify-content: center; align-items: center;">&nbsp; <span style="font-size: 18pt;"><strong><a style="color: #f8f9fa; display: block; margin: 0 auto; padding: 56px; text-align: center;" href="http://crocodeal.test/page/Egypt%20news%20block"><h1>{{ t('helpful_information') }}</h1></a></strong></span></div>
			</div>
		</div>
		<!-- info block end --> 
		@endif
		@if (!empty($textBody))
		<div>{!! $textBody !!}</div>
		@endif
	</div>
</div>
</div>
@endif