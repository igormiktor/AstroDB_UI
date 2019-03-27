<?php

class tables_Asteroids
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
		$desc = 'Asteroid ' . $record->getValue( 'number' );
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