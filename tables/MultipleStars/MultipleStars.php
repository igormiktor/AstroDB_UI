<?php

class tables_MultipleStars
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
		$desc = 'Multiple star';
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