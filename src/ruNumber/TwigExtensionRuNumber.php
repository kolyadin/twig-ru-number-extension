<?php

namespace TwigExtensionRuNumber;

class TwigExtensionRuNumber extends \Twig_Extension{

	public function getName(){
		return 'ruNumber';
	}

	public function getFilters(){
		return array(
			new \Twig_SimpleFilter('ruNumber', array($this, 'ruNumber')),
		);
	}

	public function ruNumber(){
		$n = func_get_args()[0];

		$pluralNum = ($n%10==1 && $n%100!=11 ? 0 : $n%10>=2 && $n%10<=4 && ($n%100<10 || $n%100>=20) ? 1 : 2);

		return sprintf('%d %s', $n, func_get_args()[1][$pluralNum]);
	}

}