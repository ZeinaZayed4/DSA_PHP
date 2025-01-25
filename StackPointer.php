<?php

class StackPointer {
	private $top;
	
	public function __construct() {
		$this->top = null;
	}
	
	public function __destruct() {
		while (!$this->isEmpty()) {
			$this->pop();
		}
	}
	
	public function push($newItem) {
		$newNode = new stdClass();
		$newNode->item = $newItem;
		$newNode->next = $this->top;
		$this->top = $newNode;
	}
	
	public function isEmpty() {
		return $this->top === null;
	}
	
	public function pop() {
		if ($this->isEmpty()) {
			echo "Error: Cannot pop from an empty stack.\n";
		} else {
			$this->top = $this->top->next;
		}
	}
	
	public function popWithValue(&$stackTop) {
		if ($this->isEmpty()) {
			echo "Error: Cannot pop from an empty stack.\n";
		} else {
			$stackTop = $this->top->item;
			$this->top = $this->top->next;
		}
	}
	
	public function getTop(&$stackTop) {
		if ($this->isEmpty()) {
			echo "Error: Stack is empty.\n";
		} else {
			$stackTop = $this->top->item;
		}
	}
	
	public function display() {
		$current = $this->top;
		echo "\nItems in the stack: [ ";
		while ($current !== null) {
			echo $current->item . " ";
			$current = $current->next;
		}
		echo "]\n";
	}
}

$s = new StackPointer();
$s->push(100);
$s->push(200);
$s->push(300);
$s->display();

$s->popWithValue($topElement);
echo "Popped element: " . $topElement . "\n";

$s->display();
