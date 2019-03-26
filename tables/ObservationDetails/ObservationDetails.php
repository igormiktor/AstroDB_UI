<?

class tables_ObservationDetails
{
	function getTitle( &$record )
	{
		$title = $record->display( 'telescope' );
		if ( $record->value( 'eyepiece' ) )
		{
			$title .= ' & ' . $record->display( 'eyepiece' );
		}
		return $title;
	}

	function getDescription( &$record )
	{
		$desc = $record->display( 'telescope' );
		if ( $record->value( 'eyepiece' ) )
		{
			$desc .= ' & ' . $record->display( 'eyepiece' );
		}
		if ( $record->value( 'barlow' ) )
		{
			$desc .= ' & ' . $record->display( 'barlow' );
		}
		if ( $record->value( 'filter' ) )
		{
			$desc .= ' & ' . $record->display( 'filter' );
		}

		return $desc;
	}

	function beforeInsert( &$record )
	{
		$found = $record->val( 'found' );
		if ( !$found )
		{
			$record->setValue( 'found', 'false' );
		}

		$record->setValue( 'source', 'ObsDB ' . date( 'Y-m-d' ) );
	}

	function afterSave( &$record )
	{
		$found = $record->getValue( 'found' );

		// If found for this specific case, update the overall found item for the observation
		if ( $found == 1 || $found == 'true' )
		{
			$observation =& $record->getRelatedRecord( 'Observation' );
			$observation->setValue( 'found', 1 );
			$observation->save();
		}
	}

	function titleColumn()
	{
		return "concat( telescope, ' & ', eyepiece )";
	}

}

?>