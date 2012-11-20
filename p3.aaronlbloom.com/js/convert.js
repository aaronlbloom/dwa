/* Grabbed and modified from http://sourceforge.net/projects/isbn10-isbn13/, Aaron 11/14/2012

	/*
	 * ISBN13/ISBN10 Conversion Functions 
	 * Version: 0.2
	 * Updated: 11 October 2006
	 * Author: B. Barlow
	 */
 
 
   /*
	* Convert an ISBN-10 to ISBN-13 or ISBN-13 to ISBN-10. 
	* Note: Only ISBN-13 that start with 978 can be converted to ISBN-10, as ISBN-13 begining with other 
	* digits will not result in a unique ISBN-10 (i.e. they are not backward convertible)
	* param: ISBN-10 or ISBN-13
	* return: a string containing the ISBN-10, ISBN-13 or an error message 
	*/
	function convertISBN(isbn)
	{
		var results = new Array();

		results[0]= "";
		results[1]= "";
		results[2]= false;
		results[3]= "";

		if (isbn.length == 10 || isbn.length == 13) 
		{
			
			if (isbn.length == 13)
			{
				if (isbn.substring(0, 3) == "978")
				{
					if(validISBN13(isbn))
					{
						var isbn2 = isbn.substring(3, 12);				
						var isbn10 = String(isbn2) + String(genchksum10(isbn2));
						results[0] = isbn10;
						results[1] = isbn;
						results[2] = true;
						results[3] = "";
						return results;	
					}
					else
					{
						results[0] = "";
						results[1] = isbn;
						results[2] = false;
						results[3] = 'The value you entered, ' + isbn + ', is not a valid ISBN';
						return results;	
						
					}
				}
				else
				{
					
					    results[0] = ""
						results[1] = isbn;
						results[2] = false;
						results[3] = "Only ISBN-13 numbers begining with 978 can be converted to ISBN-10.";
						return results;	
				}
			}
			
			if (isbn.length == 10)
			{
				if(validISBN10(isbn))
				{
					var isbn2 = "978" + isbn.substring(0, 9);
					var isbn13 = String(isbn2) + String(genchksum13(isbn2));
						results[0] = isbn
						results[1] = isbn13
						results[2] = true;
						results[3] = "";
						return results;	
					 
				}
				else
				{
						results[0] = isbn
						results[1] = ""
						results[2] = false;
						results[3] = 'The value you entered, ' + isbn + ', is not a valid ISBN';
						return results;	
				}
			}
			
			
		}
		else
		{
						results[0] = isbn
						results[1] = ""
						results[2] = false;
						results[3] = 'The value you entered, ' + isbn + ', must be 10 or 13 digits long. Please try again.';
						return results;	
			 
		}
	}
	
	
	/*
	 * Validate an ISBN-10 using the checkdigit (last digit)
	 * param: isbn - ISBN-10
	 */
	function validISBN10(isbn)
	{
		isbn = isbn.toUpperCase(); 
		if(genchksum10(isbn.substring(0, 9)) == isbn.substring(9, 10)) return true;
		else return false;
	}
	
	/*
	 * Validate an ISBN-10 using the checkdigit (last digit)
	 * param: isbn - ISBN-13
	 */
	function validISBN13(isbn)
	{
		if(genchksum13(isbn.substring(0, 12)) == isbn.substring(12, 13)) return true;
		else return false;
	}
	
	
	/** 
	* Calculate an ISBN-13 checkdigit from the first 12 digits in an ISBN-13 string
	* param: isbn - the first 12 digits of an ISBN-13. 
	* return: checkdigit (last digit) for an ISBN-13
	*/
	function genchksum13(isbn)
	{
	
		var oddNumbs = 0;
	  	var evenNumbs = 0;
	  	var check = 0;
		
		for (var i=1; i<=12; i=i+2) 
		{
			oddNumbs = oddNumbs + Number(isbn.charAt(i-1));
		}
	
		for (var j=2; j<=12; j=j+2) 
		{
			evenNumbs = evenNumbs + Number(isbn.charAt(j-1));			
		}
		
		check = (oddNumbs + (evenNumbs*3)) % 10;
		
		if (check!=0) 
		{	
			check = 10 - check;
		}
		
		return check; 
		 
	}
	
	
	/** 
	* Calculate an ISBN-10 checkdigit from the first 9 digits in an ISBN-10 string
	* param: isbn - the first 9 digits of an ISBN-10. 
	* return: checkdigit (last digit) for an ISBN-10
	*/
	function genchksum10(isbn)
	{
		var checkDigit = 0;
		
		for(var i=1; i<=9; i++) 
		{
			checkDigit += ((10-i + 1) * isbn.charAt(i-1));
		}

		checkDigit = 11 - (checkDigit % 11);
		var check = checkDigit;
		if(checkDigit == 10) check='X';
		else if(checkDigit==11) check='0';
		
		return check;

	}


