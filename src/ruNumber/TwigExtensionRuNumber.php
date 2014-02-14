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

//	kid.commentsCount|ruNumber('Получилось %d %s',['комментарий','комментария','комментариев'])
	public function ruNumber(){
		$args = func_get_args();

		$n = $args[0];

		$pluralNum = ($n%10==1 && $n%100!=11 ? 0 : $n%10>=2 && $n%10<=4 && ($n%100<10 || $n%100>=20) ? 1 : 2);

		if ($n == 1) $pluralNum = 0;

		if (is_string($args[1])){

			return strtr($args[1],[
				'%d' => $n,
				'%s' => $args[2][$pluralNum]
			]);

		}elseif (is_array($args[1])){
			return sprintf('%d %s', $n, $args[1][$pluralNum]);
		}
	}
}