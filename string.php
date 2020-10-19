<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>String_Methods
    </title>
</head>
<body>
    
    <?php
        $str = "Hello World";
        $str1 = "Lorem ipsum dolor sit";
        //Add backslash in front of "W"
        echo addcslashes($str,'W');
        echo "<br/>";
        echo addcslashes($str1,'a..z')."<br/>";


        //Add backslashes in front of pre defined symboles i.e. ' " \ NULL
        $str = "Hell'o W\orld!";
        echo addslashes($str)."<br/>";

        
        //Binary to Hex & Hex to Binary
        echo bin2hex($str1)."<br/>";
        echo pack("H*",bin2hex($str1))."<br/>";


        //Removes whitespaces or other predefined characters from the right end of a string
        echo chop($str1,"sit")."<br/>";
        echo chop("Hello "," ")."<br/>"; // white space will be removed
    
        
        // take character from a specified ASCII value
        echo chr(52); // output will be 4, i.e. decimal
        echo chr(052); // output will be *, i.e. Octal
        echo chr(0x52)."<br/>"; // output will be R, i.e. Hex

        // split the string into parts
        echo chunk_split($str1,4,"/")."<br/>"; // it will devide given string into parts of 4 char.

        // encoding and decoding
        echo convert_uuencode($str1);
        echo "<br/>";echo "<br/>";
        echo convert_uudecode(convert_uuencode($str1))."<br/>";

        //count characters in string
        echo count_chars($str1,3); //display all the used char.
        echo "<br/>";
        echo count_chars($str1,4); //display all the unused char.
        echo "<br/>";


        //Check data integrity using crc(cyclic redundancy checksum)
        $str2 = crc32("Hello World!."); 
        /* it will generate unique values depending on inpute.
        if one character changes then all the crc value will get affected*/
        echo $str2."<br/>"; 


        //encryption using standard algos.
        echo "Standard DES:".crypt($str,'st')."<br/>";
        echo "Extended DES:".crypt($str,'_S4..some')."<br/>";
        echo "MD5:".crypt($str,'$1$somethin$')."<br/>";


        //breaking string into array
        $str2 = "Hello World!";
        print_r (explode(" ", $str2));
        echo "<br/>";
        //convert array to string
        $arr = array('Hello','World!','Beautiful','Day!');
        echo implode(" ",$arr);
        echo "<br/>";
        echo join(" ",$arr); // both join and implode are similar
        echo "<br/>";
        


        //write formated string to specific output stream i.e. database or file
        // $number = 9;
        // $str = "Beijing";
        // $file = fopen("test.txt","w");
        // echo fprintf($file,"There are %u million bicycles in %s.",$number,$str);
        

        //The get_html_translation_table() function returns the translation table used by 
        //the htmlentities() and htmlspecialchars() functions.
        print_r (get_html_translation_table(HTML_ENTITIES));
        echo "<br/>";

        //hexadecimal to ASCII
        echo hex2bin("48656c6c6f20576f726c6421");


        //html entity to character
        $str = "Albert Einstein said: &#039;E=MC&sup2;&#039;";
        echo html_entity_decode($str, ENT_COMPAT); // Will only convert double quotes
        echo "<br>";
        echo html_entity_decode($str, ENT_QUOTES); // Converts double and single quotes
        echo "<br>";
        echo html_entity_decode($str, ENT_NOQUOTES); // Does not convert any quotes
        echo "<br>";

        //characters to html entity
        $str = '<a href="https://www.w3schools.com">Go to w3schools.com</a>';
        echo htmlentities($str);
        echo "<br>";

        // lcfirst() - converts the first character of a string to lowercasr
        // ucfirst() - converts the first character of a string to uppercase
        // ucwords() - converts the first character of each word in a string to uppercase
        // strtoupper() - converts a string to uppercase
        // strtolower() - converts a string to lowercase
        echo lcfirst("HELLO");
        echo "<br>";

        /*levenshtein() function returns the Levenshtein distance between two strings.
        The Levenshtein distance is the number of characters you have to replace, insert or delete to transform string1 into string2*/

        echo levenshtein("Hello","ell");
        echo "<br/>";


        
        $str = "Hello World!";
        echo ltrim($str,"Hello"); //rtrim() -  remove from right side, trim() - from both side
        echo "<br/>";

        //md5 hash, md5_file()
        echo "md5($str)";
        //sha1(), sha1_file()

        echo metaphone("cheese");//display how it sounds if it is said by native english speaker


        // nl2br() - newline \n to <br>
        
        //parse the query string into variable
        parse_str("name=mk&ge=21");
        echo $name;

        //similar text same as levenshtein but slower
        similar_text("Hello world","Hello Peter",$percent);
        echo "Hello world and Hello Peter are ".$percent."% similar<br/>";

        //sprintf() function writes a formatted string to a variable
        $number = 9;
        $str = "Beijing";
        $txt = sprintf("There are %u million bicycles in %s.",$number,$str);
        echo $txt . "<br/>";


?>
</body>
</html>