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
		@endif
		@if (!empty($textBody))
		<div>{!! $textBody !!}</div>
		
		<!--Block YouTube-->
		<div 
		style="display: grid;
		 grid-gap: 0px;
		  grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
		   grid-template-rows: repeat(100%);">
			<p>
				<iframe 
				style="padding-top: 15px;
				  border-radius: 20px;
				 " title="YouTube video player" src="https://www.youtube.com/embed/t0KEW8ekFDY" width="100%" height="500" frameborder="0" allowfullscreen=""></iframe></p>
			<!-- info block end -->
			<!--Блок конвертер валюты-->
			<div style="width:100%;padding-top: 15px;"><fxwidget-cc amount="100" decimals="2" large="false" shadow="true" symbol="true" grouping="true" border="true" from="USD" to="EUR" background-color="#4682b4"></fxwidget-cc><a href="https://currencyrate.today/">CurrencyRate</a>
			<script async src="https://s.fx-w.io/widgets/currency-converter/latest.js"></script></div>
			<!-- info block end -->
		</div>
		@endif
	</div>
</div>
</div>
@endif