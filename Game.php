<?php

	class Game
	{
		public $o;
		public $x;
		public $turn;
		public $board;
		public $started;
		public $move_x;
		public $move_y;

		function __construct()
		{
			$this->o = 0;
			$this->x = 1;
			$this->turn = rand(0, 1);
			$this->board = new Board();
			$this->started = false;
		}

		
		function help()
		{
			print "Welcome to Tic Tac Toe\n".
				"type 'new' to start a new game!\n";
		}

		function getCoordinates($str)
		{
			preg_match_all('!\d+!', $str, $matches);

			if (count($matches[0]) == 2 && 
				$this->board->canMark($matches[0][0], $matches[0][1])) {
				$this->move_x = $matches[0][0];
				$this->move_y = $matches[0][1];

				return true;
			}

			return false;	
		}

		function makeMove()
		{
			if ($this->turn === $this->x)
			{
				$this->board->markX($this->move_x, $this->move_y);
				$this->turn = $this->o;

				if ($this->board->checkBoard('x'))
				{
					print "Winner is X!\n";
					$this->start = false;
				}
			}
			else
			{
				$this->board->markO($this->move_x, $this->move_y);
				$this->turn = $this->x;

				if ($this->board->checkBoard('o'))
				{
					print "Winner is O!\n";
					$this->start = false;
				}
			}

			$this->board->show();
		}

		function start()
		{
			print "Starting game!\n";

			$this->start = true;

			while($this->start)
			{
				if ($this->turn === $this->x)
				{
					print "Player X input coordinates:\n";
				}
				else
				{
					print "Player O input coordinates:\n";
				}

				$line = trim(fgets(STDIN));

				if ($this->getCoordinates($line))
				{
					$this->makeMove();
				}
				else
				{
					print "Bad coordinates!\n";
					$this->board->show();
				}
			}
		}
	}
?>