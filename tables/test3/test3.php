<?php

require_once 'common/JulianDateFunctions.php';

class tables_test3
{

	function beforeSave( &$record )
	{
		$jd = JulianDateFunctions::convertXtfDateToJulianDate( $record->val( 'dt' ) );
		$record->setValue( 'number', $jd );
		$newName = $record->val( 'name' );
		$theDate = $record->val( 'dt' );
		$newName .= ' ' . $theDate['year'] . '/' . $theDate['month'] . '/' . $theDate['day'];
		$newName .= ' ' . $theDate['hours'] . '-' . $theDate['minutes'] . '-' . $theDate['seconds'];
		$record->setValue( 'name', $newName );
		$record->setValue( 'dt2', JulianDateFunctions::convertJulianDateToXtfDate( $jd ) );
	}


//	function number__validate( &$record, $value, &$params )
//	{
//		return true;
//	}
}
?>