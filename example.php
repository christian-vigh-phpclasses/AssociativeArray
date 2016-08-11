<?php
	/***********************************************************************************************************

		The following example demonstrates the use of the AssociativeArray class.
		This example will throw an exception when trying to access undefined index 'ZZ'.

	 ***********************************************************************************************************/
	require ( 'AssociativeArray.phpclass' ) ;

	if  ( php_sapi_name ( )  !=  'cli' )
		echo ( "<pre>" ) ;

	$array = new AssociativeArray ( [ 'A' => 'Value of A', 'B' => 'Value of B', 'D' => 'Value of D', 'C' => 'Value of C' ] ) ;

	echo "Getting value of array['A'] : " . $array [ 'A' ] . "\n" ;
	echo "Getting value of array['b'] : " . $array [ 'b' ] . "\n" ;

	echo "********** Unsorted array contents :\n" ;
	print_r ( $array -> ToArray ( ) ) ;

	echo "********** Sorted array contents :\n" ;
	$array -> ksort ( ) ;
	print_r ( $array -> ToArray ( )  ) ;


	if ( isset ( $array [ 'ZZ' ] ) )
		echo "Index 'ZZ' exists\n" ;
	else
		echo "Index 'ZZ' DOES NOT exist\n" ;

	// The following line of code will throw an exception, because index 'ZZ' is not defined
	//echo "Getting value of (inexisting) array['ZZ'] : " . $array [ 'ZZ' ] . "\n" ;


