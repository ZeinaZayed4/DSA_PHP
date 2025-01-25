<?php

class StackApp
{
	public function arePair($open, $close): bool
	{
		if ($open == '(' && $close == ')') {
			return true;
		} else if ($open == '{' && $close == '}') {
			return true;
		} else if ($open == '[' && $close == ']') {
			return true;
		}
		return false;
	}
	
	public function areBalanced($exp): bool
	{
		$stack = [];
		for ($i = 0; $i < strlen($exp); $i++) {
			if ($exp[$i] == '(' || $exp[$i] == '{' || $exp[$i] == '[') {
				array_push($stack, $exp[$i]);
			} else if ($exp[$i] == ')' || $exp[$i] == '}' || $exp[$i] == ']') {
				if (empty($stack) || !$this->arePair(end($stack), $exp[$i])) {
					return false;
				} else {
					array_pop($stack);
				}
			}
		}
		return empty($stack);
	}
}

$s = new StackApp();

echo "Enter an expression: ";
$expression = trim(fgets(STDIN));

if ($s->areBalanced($expression)) {
	echo 'Balanced.' . '<br />';
} else {
	echo 'Not balanced.' . '<br />';
}
