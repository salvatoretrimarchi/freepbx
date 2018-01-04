<?php
global $amp_conf;
$html = '';
$version	 = get_framework_version();
$version = $version ? $version : getversion();
$version_tag = '?load_version=' . urlencode($version);
if ($amp_conf['FORCE_JS_CSS_IMG_DOWNLOAD']) {
  $this_time_append	= '.' . time();
  $version_tag 		.= $this_time_append;
} else {
	$this_time_append = '';
}


// Brandable logos in footer
//fpbx logo
$html .= '<div class="col-md-4">
	<a target="_blank" href="'
                . $amp_conf['BRAND_IMAGE_FREEPBX_LINK_FOOT']
                . '" >'
                . '<img id="footer_logo1" src="'.$amp_conf['BRAND_IMAGE_FREEPBX_FOOT'].$version_tag
                . '" alt="'.$amp_conf['BRAND_FREEPBX_ALT_FOOT'] .'"/>
	</a>
	</div>';

//text
$html .= '<div class="col-md-4" id="footer_text">';
$html .= sprintf(_('%s '),'<a href="https://www.manconsulting.co.uk" target="_blank">MAN Consulting S.A</a>') . br();
$html .= sprintf(_('%s '),'Tel. +504 22626363') . br();
$html .= sprintf(_('%s '),'Centro Morazán, Torre 1, Piso 8, Oficina 10813') . br();
$html .= sprintf(_('%s '),'Tegucigalpa, Honduras') . br();

//module license
if (!empty($active_modules[$module_name]['license'])) {
  $html .= br() . sprintf(_('Current module licensed under %s'),
  trim($active_modules[$module_name]['license']));
}

//benchmarking
if (isset($amp_conf['DEVEL']) && $amp_conf['DEVEL']) {
	$benchmark_time = number_format(microtime_float() - $benchmark_starttime, 4);
	$html .= '<br><span id="benchmark_time">Page loaded in ' . $benchmark_time . 's</span>';
}
$html .= '</div>';

$html .= '<div class="col-md-4">
	<a target="_blank" href="' . $amp_conf['BRAND_IMAGE_SPONSOR_LINK_FOOT']
		. '" >'
		. '<img id="footer_logo" src="' . $amp_conf['BRAND_IMAGE_SPONSOR_FOOT'] . '" '
		. 'alt="' . $amp_conf['BRAND_SPONSOR_ALT_FOOT'] . '"/>
	</a>
	</div>';
echo $html;
?>
