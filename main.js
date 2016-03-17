jQuery(function($) {
	"use strict";

	var $var_dump = $('.var_dump');
	var firstHTMLContentRegister = '';
	$var_dump.each( function (_i, _elm) {
		var $_elm = $(_elm);
		var _elm_innerText = _elm.innerText;
		if(_i === 0) {
			firstHTMLContentRegister = _elm_innerText;
		}
		if(_elm_innerText === firstHTMLContentRegister) {
			$_elm.css('background-color','green');
		} else {
			$_elm.css('background-color','red');
		}
	});
});