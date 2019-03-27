<?php

class tables_Comets
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
		$desc = 'Comet ' . $record->getValue( 'designation' );
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