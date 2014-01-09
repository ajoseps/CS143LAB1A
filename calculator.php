<body>

<h1>Calculator</h1>

<form action="" method="post">
    <input type="test" name="calcInput">
    <input type="submit" value="Calculate">
</form>

<h1>Result</h1>

<?php
$input = $_POST["calcInput"];
$infixArray = preg_split("/([\+\-\/\*])/", $input, -1, PREG_SPLIT_DELIM_CAPTURE);
$expressionStr = implode($infixArray);
$expressionStr = trim($expressionStr);

if (preg_match('/[A-Za-z]/', $expressionStr))
{
	echo "Invalid Expression: $expressionStr";
}
else
{
	if(strpos($expressionStr, "/0") == FALSE)
	{
		eval("\$result=".$expressionStr.";");
	}

	echo "$input"."="."$result" ;
}

?>

</body>
