<?
class tables_test5
{
	function bar__renderCell( &$record )
	{
		if ( $record->getValue( 'bar' ) = 1 )
		{
			return 'Yes';
		}
		else
		{
			return 'No';
		}
	}
}
?>