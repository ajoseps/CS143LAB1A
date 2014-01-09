<body>

<h1>Calculator</h1>

<form action="" method="get">
    <input type="test" name="calcInput">
    <input type="submit" value="Calculate">
</form>

<h1>Result</h1>

<?php
$input = $_GET["calcInput"];
$expressionStr = trim($input);

if(strpos($expressionStr, "/0") == FALSE)
{
	ob_start();
	eval("\$result=".$expressionStr.";");
	if ('' !== $error = ob_get_clean()) 
	{
		echo "Invalid Expression: $expressionStr";
		return;
	}
	if(strpos($expressionStr, "="))
	{
		echo "Invalid Expression: $expressionStr";
		return;
	}
}
# For cases that contain a /0 but are also Invalid Expressions
else
{
	ob_start();
	eval("\$result=".$expressionStr.";");
	if ('' !== $error = ob_get_clean())
	{
		echo "Invalid Expression: $expressionStr";
		return;
	}
}

echo "$input"."="."$result";
?>

</body>
