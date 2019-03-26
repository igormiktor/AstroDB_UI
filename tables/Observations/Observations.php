<?

require_once 'common/JulianDateFunctions.php';

class tables_Observations
{

/*
	function found__renderCell( &$record )
	{
		$ret = 'No';
		if ( $record->getValue( 'found' ) = 1 )
		{
			$ret = 'Yes';
		}
		return $ret;
	}
*/

	function beforeSave( &$record )
	{
		$otj = JulianDateFunctions::convertXtfDateToJulianDate( $record->getValue( 'observationTime' ) );
		$otej = JulianDateFunctions::convertXtfDateToJulianDate( $record->getValue( 'observationTimeEnd' ) );

		$otu = JulianDateFunctions::convertJulianDateToUnixTime( $otj );
		$oteu = JulianDateFunctions::convertJulianDateToUnixTime( $otej );

		$record->setValue( 'observationTimeJ', $otj );
		$record->setValue( 'observationTimeEndJ', $otej );
		$record->setValue( 'observationTimeU', $otu );
		$record->setValue( 'observationTimeEndU', $oteu );
	}

	function beforeInsert( &$record )
	{
		$found = $record->getvalue( 'found' );
		if ( !$found )
		{
			$record->setValue( 'found', 'false' );
		}

		$record->setValue( 'source', 'ObsDB ' . date( 'Y-m-d' ) );
	}

	function afterSave( &$record )
	{
		$session =& $record->getRelatedRecord( 'Session' );

		// Check is we need to adjust the Session start time
		if ( $session->getValue( 'startTimeJ' ) > $record->getValue( 'observationTimeJ' ) )
		{
			// Set the session start time to the observation start time
			$session->setValue( 'startTime',  $record->getValue( 'observationTime' ) );
			$session->setValue( 'startTimeJ', $record->getValue( 'observationTimeJ' ) );
			$session->setValue( 'startTimeU', $record->getValue( 'observationTimeU' ) );
		}

		// Check is we need to adjust the Session end time
		if ( $session->getValue( 'finishTimeJ' ) < $record->getValue( 'observationTimeEndJ' ) )
		{
			// Set the session end time to the observation end time
			$session->setValue( 'finishTime',  $record->getValue( 'observationTimeEnd' ) );
			$session->setValue( 'finishTimeJ', $record->getValue( 'observationTimeEndJ' ) );
			$session->setValue( 'finishTimeU', $record->getValue( 'observationTimeEndU' ) );
		}

		$session->save();
	}

}
?>