<?php

class QueueCircularArray
{
	private $rear;
	private $front;
	private $length;
	private $arr;
	private $maxSize;
	
	public function __construct($size)
	{
		if ($size <= 0) {
			$this->maxSize = 100;
		} else {
			$this->maxSize = $size;
		}
		$this->front = 0;
		$this->rear = $this->maxSize - 1;
		$this->length = 0;
		$this->arr = array_fill(0, $this->maxSize, null);
	}
	
	public function isEmpty()
	{
		return $this->length === 0;
	}
	
	public function isFull()
	{
		return $this->length === $this->maxSize;
	}
	
	public function enqueue($element)
	{
		if ($this->isFull()) {
			echo "Full queue can't enqueue!\n";
		} else {
			$this->rear = ($this->rear + 1) % $this->maxSize;
			$this->arr[$this->rear] = $element;
			$this->length++;
		}
	}
	
	public function dequeue()
	{
		if ($this->isEmpty()) {
			echo "Empty queue can't dequeue!\n";
		} else {
			$this->front = ($this->front + 1) % $this->maxSize;
			$this->length--;
		}
	}
	
	public function getFront()
	{
		if ($this->isEmpty()) {
			throw new Exception("Queue is empty!");
		}
		return $this->arr[$this->front];
	}
	
	public function getRear()
	{
		if ($this->isEmpty()) {
			throw new Exception("Queue is empty!");
		}
		return $this->arr[$this->rear];
	}
	
	public function printQueue()
	{
		if (!$this->isEmpty()) {
			$i = $this->front;
			while ($i !== $this->rear) {
				echo $this->arr[$i] . " ";
				$i = ($i + 1) % $this->maxSize;
			}
			echo $this->arr[$this->rear] . "\n";
		} else {
			echo "Empty queue!\n";
		}
	}
	
	public function queueSearch($element)
	{
		$pos = -1;
		if (!$this->isEmpty()) {
			$i = $this->front;
			while ($i !== $this->rear) {
				if ($this->arr[$i] === $element) {
					$pos = $i;
					break;
				}
				$i = ($i + 1) % $this->maxSize;
			}
			if ($pos === -1 && $this->arr[$this->rear] === $element) {
				$pos = $this->rear;
			}
		} else {
			echo "Queue is empty!\n";
		}
		return $pos;
	}
}

$q1 = new QueueCircularArray(5);
$q1->enqueue(10);
$q1->enqueue(20);
$q1->enqueue(30);
$q1->enqueue(40);
$q1->enqueue(50);
$q1->dequeue();
$q1->enqueue(80);
echo $q1->queueSearch(80) . "\n";

