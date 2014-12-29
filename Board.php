<?php

	class Board
	{
		
		public $board = array(
							array("-", "-", "-"),
							array("-", "-", "-"),
							array("-", "-", "-")
						);

		public function markX($x, $y) {

			if ($this->canMark($x, $y)) {
				$this->board[$x][$y] = 'x';
			}
		}

		public function markO($x, $y) {

			if ($this->canMark($x, $y)) {
				$this->board[$x][$y] = 'o';
			}
		}

		public function canMark($x, $y) {
			if (($x > -1 && $x < 3) &&
					($y > -1 && $x < 3) &&
					$this->board[$x][$y] === "-")
			{
				return true;
			}
			
			print "Bad coordinates!\n";
			return false;
		}

		public function checkBoard($letter) {

			// check columns and rows
			for ($i = 0; $i < 3; $i++)
			{	
				if ($this->checkRow($i, $letter))
				{
					return true;
				} 
				else if($this->checkCol($i, $letter))
				{
					return true;
				}
			}

			// finally check diagonals
			return $this->checkDiag($letter);
		}

		public function checkRow($i, $letter)
		{
			return $this->board[$i][0] === $letter &&
					$this->board[$i][1] === $letter &&
					$this->board[$i][2] === $letter;  
		}

		public function checkCol($i, $letter)
		{
			return $this->board[0][$i] === $letter &&
					$this->board[1][$i] === $letter &&
					$this->board[2][$i] === $letter;
		}

		public function checkDiag($letter)
		{
			if($this->board[0][0] === $letter &&
				$this->board[1][1] === $letter &&
				$this->board[2][2] === $letter)
			{
				return true;
			}
			else if ($this->board[2][0] == $letter &&
				$this->board[1][1] == $letter &&
				$this->board[0][2] == $letter)
			{
				return true;
			}
			
			return false;
		}

		public function show() {
			for ($i = 0; $i < 3; $i++)
			{
				print '|'.$this->board[$i][0].
						'|'.$this->board[$i][1].
						'|'.$this->board[$i][2].'|'."\n";
			}
		}
	}
?>