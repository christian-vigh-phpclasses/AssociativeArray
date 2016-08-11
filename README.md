# INTRODUCTION #

The **AssociativeArray** class has been designed to implement associative arrays whose keys will be case-insensitive. It tries to mimic the built-in PHP array type to provide as much transparent access as possible.

A basic example would be :

	// Create an array
	$array = new AssociativeArray ( [ 'A' => 'Value of A', 'B' => 'Value of B', 'D' => 'Value of D', 'C' => 'Value of C' ] ) ;

	// Retrieve item 'A', without caring about case-sensitivity. Both lines of code will display the same result :
	echo "Getting value of array['A'] : " . $array [ 'a' ] ;
	echo "Getting value of array['A'] : " . $array [ 'A' ] ;

# WHY HAVING ASSOCIATIVE ARRAY WITH KEYS THAT ARE NOT CASE-SENSITIVE ? #

The origin of this class comes from a habit of mine : I'm using several configuration files that have the format of a Windows .INI file, such as *php.ini*, and always wanted key names to be case-insensisitive. 

I realized one day that I had duplicated a little bit elsewhere the same code that allowed certain associative arrays to be accessed with case-insensitive keys and I told myself that other developers may face the same situtation and may suffer from typos in their code, because they specified an uppercase 'A' instead of lowercase 'a' when accessing an array item by its key.

This is why I developed this class, which I'm heavily using each time I need an associative array with case-insensitive keys.

Since PHP arrays internally use hash tables, where the array keys are case-sensitive hashed values, it is impossible that one day you will be able to use associative arrays with case-insensitive keys. This is the only reason why I developed this class.

Of course, it may seem incomplete (for example, it does not implement all the various sorting functions that you may expect), but it will fit your needs for your day-to-day purposes.

And, of course, it has been optimized to avoid unnecessary computations whenever you insert or delete an item from the array.

# NOTICE #

You may find the list of methods contained in this class a little bit poor and you will be true : I wanted to have a class that exactly fits my day-to-day needs, and nothing more (the day-to-day needs in question were very basic).

However, if you have additional needs, you can freely add the methods of your choice or simply contact me to provide a new version ; I will be happy to enrich this class based on your suggestions.

# REFERENCE #

The class implements the ArrayAccess, Countable and IteratorAggregate interfaces ; this means that you can use the following constructs :

	// Create an array
	$array = new AssociativeArray ( [ 'A' => 'Value of A', 'B' => 'Value of B', 'D' => 'Value of D', 'C' => 'Value of C' ] ) ;

	echo count ( $array ) ; 		// will output "4"

	// Loop through array items using a traditional for() loop
	// Will display :
	//		Value of A
	//		Value of B
	//		Value of D
	//		Value of C
	for ( $i = 0 ; $i < count ( $array ) ; $i ++ ) 
		echo $array [$i] . "\n" ;

	// use a foreach() loop to achieve the same result (but additionally displays the key name)
	foreach ( $array  as $key => $item )
		echo "$key -> $item\n" ;

	// Add a new element to the array 
	$array [ 'newKey' ] 	=  'This is a new value' ;
 
You can also use the *isset()* method to check for the existence of an individual element in an array, and *unset()* to remove a specific element from an array.

Note also that you can access items using either the array notation or the object notation ; the following two lines of code, using the array initialized in the above example, will display the same element, "Value of A" :

	echo $array ['a' ] ;
	echo $array -> A ;

Associative array items can be also accessed by their numerical index :

	echo $array [1] 	;  // Will echo "Value of B" ; 

## $key  =  $array -> keyname ( $index ) ; ##

Returns the array key at the specified integer index.

The following example will echo the value "B" :

	$array = new AssociativeArray ( [ 'A' => 100, 'B' => 101, 'C' => 102 ] ) ;
 	echo $array -> keyname ( 1 ) ;

## $status = $array -> iin\_array ( $value ) ; ##

Checks if an array contains the specified value. Comparison is case-insensitive.

The method returns *true* if *$array* contains *$value*, and *false* otherwise.

## $status = $array -> iin\_subarray ( $value ) ; ##

Checks if an array contains the specified value in one of its nested array items. Comparison is case-insensitive.

The method returns *true* if *$array* contains *$value*, and *false* otherwise.

## $status = $array -> in\_array ( $value ) ; ##

Checks if an array contains the specified value. Comparison is case-sensitive.

The method returns *true* if *$array* contains *$value*, and *false* otherwise.

## $status = $array -> in\_subarray ( $value ) ; ##

Checks if an array contains the specified value in one of its nested array items. Comparison is case-sensitive.

The method returns *true* if *$array* contains *$value*, and *false* otherwise.

## $key  =  $array -> keyname ( $index ) ; ##

Returns the array key at the specified integer index.

The following example will echo the value "B" :

	$array = new AssociativeArray ( [ 'A' => 100, 'B' => 101, 'C' => 102 ] ) ;
 	echo $array -> keyname ( 1 ) ;

## $array -> ksort ( ) ; ##

Sorts the items of *$array* by their key names.

## $value = $array -> pop ( ) ; ##

Like the standard *array\_pop()* PHP function, pops the last item of the specified array and returns its value.

## $values 	=  $array -> ToArray ( ) ; ##

Returns the values in *$array* as a non-associative array.
