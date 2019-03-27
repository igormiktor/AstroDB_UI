<?php

class tables_MasterObjectIndex
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
		$desc = $record->getValue( 'name' ) . '; ' . $record->getValue( 'otherNames' );
		if ( $record->getValue( 'deepSkyCatalog' ) == 1 )
		{
			$dsc =& $record->getRelatedRecord( 'DeepSky' );
			$desc = '(' . $dsc->display( 'constellation' ) . ') ' . $desc . ' ' . $dsc->getValue( 'ngcDesc' ) . ' ' . $dsc->getValue( 'notes' );
		}
		if ( $record->getValue( 'multipleStarCatalog' ) == 1 )
		{
			$ms =& $record->getRelatedRecord( 'MultipleStar' );
			$desc = '(' . $ms->display( 'constellation' ) . ') ' . $desc . ' ' . $ms->getValue( 'notes' );
		}
		if ( $record->getValue( 'coloredStarCatalog' ) == 1 )
		{
			$cs =& $record->getRelatedRecord( 'ColoredStar' );
			$desc = '(' . $cs->display( 'constellation' ) . ') ' . $desc . ' ' . $cs->getValue( 'notes' );
		}
		if ( $record->display( 'variableStarCatalog' ) == 1 )
		{
			$vs =& $record->getRelatedRecord( 'VariableStar' );
			$desc .= ' ' . $vs->getValue( 'constellation' ) . ' ' . $vs->getValue( 'notes' );
		}
		if ( $record->getValue( 'planetCatalog' ) == 1 )
		{
			// $cs =& $record->getRelatedRecord( 'Planet' );
			// $desc .= ' ' . $cs->getValue( 'constellation' ) . ' ' . $cs->getValue( 'notes' );
		}
		if ( $record->getValue( 'asteroidCatalog' ) == 1 )
		{
			// $a =& $record->getRelatedRecord( 'Asteroid' );
			// $desc .= ' ' . $a->getValue( 'constellation' ) . ' ' . $a->getValue( 'notes' );
		}
		if ( $record->getValue( 'cometCatalog' ) == 1 )
		{
			// $c =& $record->getRelatedRecord( 'Comet' );
			// $desc .= ' ' . $c->display( 'constellation' ) . ' ' . $c->getValue( 'notes' );
		}
		if ( $record->getValue( 'specialCatalog' ) == 1 )
		{
			$s =& $record->getRelatedRecord( 'Special' );
			$desc = '(' . $s->display( 'constellation' ) . ') ' . $desc . ' ' . $s->getValue( 'notes' );
		}

		return $desc;
	}

	function titleColumn()
	{
		return "displayName";
	}
}

?>