<?php

class StackArray
{
	private $top;
	private $items;
	private const MAX_SIZE = 100;
	
	public function __construct()
	{
		$this->top = -1;
		$this->items = [];
	}
	
	public function push($e)
	{
		if ($this->top >= self::MAX_SIZE - 1) {
			echo 'Stack is full';
		} else {
			$this->top++;
			$this->items[$this->top] = $e;
		}
	}
	
	public function isEmpty()
	{
		return $this->top < 0;
	}
	
	public function pop()
	{
		if ($this->isEmpty()) {
			echo 'Stack is empty on pop';
		} else {
			unset($this->items[$this->top]);
			$this->top--;
		}
	}
	
	public function popWithValue(&$e)
	{
		if ($this->isEmpty()) {
			echo 'Stack is empty on pop';
		} else {
			$e = $this->items[$this->top];
			unset($this->items[$this->top]);
			$this->top--;
		}
	}
	
	public function getTop(&$st)
	{
		if ($this->isEmpty()) {
			echo 'Stack is empty on getTop';
		} else {
			$st = $this->items[$this->top];
		}
	}
	
	public function print()
	{
		echo '[ ';
		for ($i = $this->top; $i >= 0; $i--) {
			echo $this->items[$i] . ' ';
		}
		echo ']';
	}
}

$s = new StackArray();

$s->push(5);
$s->push(10);
$s->push(15);
$s->push(20);
$s->pop();
$s->push(4);
$s->print();
