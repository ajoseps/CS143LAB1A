<body>

<h1>Calculator</h1>

<form action="calculator.php" method="get">
    <input type="test" name="calcInput">
    <input type="submit" value="Calculate">
</form>

<h1>Result</h1>

<?php
$input = $_GET["calcInput"];
$expressionStr = trim($input);

if(preg_match('/[\+\-]?[0-9]*\.?[0-9]*[\+\-\*\/]{0,2}[0-9]+\.?[0-9]*/', $expressionStr, $matches)==true && strpos($expressionStr, "/0") == false)
{
    ob_start();
    eval("\$result=".$expressionStr.";");
    if ('' !== $error = ob_get_clean()) {
        echo "Invalid Expression: $expressionStr";
        return;
    }
    echo "$input"."="."$result";
}

elseif (strpos($expressionStr, "/0") == true)
{
    ob_start();
    eval("\$result=".$expressionStr.";");
    if ('' !== $error = ob_get_clean()) {
        echo "$input"."=";
        return;
    }
}

else {
    echo "Invalid Expression: $expressionStr";
}



//if(strpos($expressionStr, "/0") == TRUE)
//{
//	ob_start();
//	eval("\$result=".$expressionStr.";");
//	if ('' !== $error = ob_get_clean())
//	{
//		echo "Invalid Expression: $expressionStr";
//		return;
//	}
//	if(strpos($expressionStr, "="))
//	{
//		echo "Invalid Expression: $expressionStr";
//		return;
//	}
//}
//# For cases that contain a /0 but are also Invalid Expressions
//else
//{
//	ob_start();
//	eval("\$result=".$expressionStr.";");
//	if ('' !== $error = ob_get_clean())
//	{
//		echo "Invalid Expression: $expressionStr";
//		return;
//	}
//}
//
//echo "$input"."="."$result";
?>

</body>
