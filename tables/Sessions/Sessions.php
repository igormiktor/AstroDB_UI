<?

require_once 'common/JulianDateFunctions.php';

class tables_Sessions
{

	function beforeSave( &$record )
	{
		$stj = JulianDateFunctions::convertXtfDateToJulianDate( $record->val( 'startTime' ) );
		$ftj = JulianDateFunctions::convertXtfDateToJulianDate( $record->val( 'finishTime' ) );

		$stu = JulianDateFunctions::convertJulianDateToUnixTime( $stj );
		$ftu = JulianDateFunctions::convertJulianDateToUnixTime( $ftj );

		$record->setValue( 'startTimeJ', $stj );
		$record->setValue( 'finishTimeJ', $ftj );
		$record->setValue( 'startTimeU', $stu );
		$record->setValue( 'finishTimeU', $ftu );
	}

	function beforeInsert( &$record )
	{
		$record->setValue( 'source', 'ObsDB ' . date( 'Y-m-d' ) );
	}


//	function number__validate( &$record, $value, &$params )
//	{
//		return true;
//	}
}
?>