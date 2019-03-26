<?

class tables_MessierObjects
{
	function getTitle( &$record )
	{
		$title = $record->val( 'name' );
		if ( $record->val( 'otherNames' ) )
		{
			$title .= '; ' . $record->val( 'otherNames' );
		}
		return $title;
	}

	function getDescription( &$record )
	{
		$desc = $record->getValue( 'description' );
		$ngcDesc = $record->getValue( 'ngcDesc' );
		if ( isset( $ngcDesc ) )
		{
			$desc .= '; ' . $ngcDesc;
		}
		$notes = $record->getValue( 'notes' );
		if ( isset( $notes ) )
		{
			$desc .= '; ' . $notes;
		}

		return $desc;
	}

	function titleColumn()
	{
		return "concat( name, '; ', otherNames )";
	}
}

?>