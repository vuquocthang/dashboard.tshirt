<?php

function foo(){
	return "foo";
}

//format date
function fmDate($date, $format1, $format2){
	return \Carbon\Carbon::createFromFormat($format1, $date)->format($format2);
}