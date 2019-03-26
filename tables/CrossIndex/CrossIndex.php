<?

class tables_CrossIndex
{
	function getTitle( &$record )
	{
		$title = $record->getValue( 'name' ) . ' = ' . $record->getValue( 'canonicalName' );
		return $title;
	}

	function getDescription( &$record )
	{
		$desc = $record->getValue( 'name' ) . ' = ' . $record->getValue( 'canonicalName' );
		return $desc;
	}

	function titleColumn()
	{
		return "name";
	}
}

?>