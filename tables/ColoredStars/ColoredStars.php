<?

class tables_ColoredStars
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
		$desc = 'Colored star';
		$spec = $record->getValue( 'spectralType' );
		if ( isset( $spec ) )
		{
			$desc .= '; ' . $spec;
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