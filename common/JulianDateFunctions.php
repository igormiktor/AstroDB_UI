<?php
class JulianDateFunctions
{
	function convertXtfDateToJulianDate( $xtfDate )
	{
		$year = $xtfDate['year'];
		$month = $xtfDate['month'];
		$day = $xtfDate['day'];
		$hours = $xtfDate['hours'];
		$minutes = $xtfDate['minutes'];
		$seconds = $xtfDate['seconds'];

		$a = floor( (14 - $month)/12 );
		$y = $year + 4800 - $a;
		$m = $month + 12 * $a - 3;
		$jDate = $day + floor( (153*$m + 2)/5) + 365*$y + floor( $y/4 ) - floor( $y/100 ) + floor( $y/400 ) - 32045;
		$jDate += ($hours - 12.0)/24.0 + $minutes/1440.0 + $seconds/86400.0;

		return $jDate;
	}

	function convertJulianDateToXtfDate( $jDate )
	{
		$j = floor( $jDate + 0.5 );

		$t = ($jDate + 0.5 - $j) * 86400;
		$h = floor( $t / 3600 );
		$t = $t - $h*3600;
		$n = floor( $t / 60 );
		$s = $t - $n*60;

		if ( $s == 60 )
		{
			$s = 0;
			$n++;
		}

		if ( $n == 60 )
		{
			$n = 0;
			$h++;
		}

		if ( $h == 24 )
		{
			$h = 0;
			$j++;
		}

		$jj = $j + 32044;
		$g = floor( $jj/146097 );
		$dg = $jj % 146097;
		$c = floor( ( floor( $dg/36524 ) + 1 ) * 3 / 4 );
		$dc = $dg - $c * 36524;
		$b = floor( $dc/1461 );
		$db = $dc % 1461;
		$a = floor( (floor( $db/365 ) + 1) * 3 / 4 );
		$da = $db - $a * 365;
		$y = $g*400 + $c*100 + $b*4 + $a;
		$m = floor( ($da*5 + 308)/153 ) - 2;
		$d = $da - floor( ($m + 4)*153/5 ) + 122;
		$yy = $y - 4800 + floor( ($m+2)/12 );
		$mm = ( $m+2 ) % 12 + 1;
		$dd = $d + 1;

		$xtfDate['year'] = $yy;
		$xtfDate['month'] = $mm;
		$xtfDate['day'] = $dd;
		$xtfDate['hours'] = $h;
		$xtfDate['minutes'] = $n;
		$xtfDate['seconds'] = $s;

		return $xtfDate;
	}



	function convertUnixTimeToJulianDate( $ut )
	{
		$kJulianDateOfUnixEpoch = 2440587.5;
		$kSecondsPerJulianDay = 86400.0;

		return $ut / $kSecondsPerJulianDay + $kJulianDateOfUnixEpoch;
	}



	function convertJulianDateToUnixTime( $jd )
	{
		$kJulianDateOfUnixEpoch = 2440587.5;
		$kSecondsPerJulianDay = 86400.0;

		return round( ( $jd - $kJulianDateOfUnixEpoch) * $kSecondsPerJulianDay );
	}
}
?>