<?php 
	include 'Board.php';

	$board->markX(0,0);
	$board->markY(0,0);
	$board->markX(0,1);
	$board->markX(0,2);

	$board->show();

	if ($board->checkBoard("y")) {
		print "Y wins!\n";
	} else {
		print "Y loses.\n";
	}

	if ($board->checkBoard("x")) {
		print "X wins!\n";
	} else {
		print "X loses.\n";
	}
