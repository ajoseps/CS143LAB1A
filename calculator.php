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
eval("\$result=".$expressionStr.";");
echo "$input"."="."$result" ;
/*
$infixArray = preg_split("/([\+\-\/\*])/", $input, -1, PREG_SPLIT_DELIM_CAPTURE);

# return input if there is less than 3 tokens (which is required for an operation)
if(count(infixArray) < 3)
{
	echo "Answer: $input";
}
else
{
	$postfixArray = infixToPostfix($infixArray);
	$resultEvaluation = postfixEval($postfixArray);
	echo "Answer: $resultEvaluation";
}

foreach($postfixArray as $value)
{
	echo "$value <br>";
}


# evaluates the postfix expression
function postfixEval($postfix)
{
	$stackArray = array();
	foreach($postfix as $token)
	{
		if(is_numeric($token))
		{
			array_push($stackArray, $token);
		}
		else
		{
			$poppedStackElement1 = array_pop($stackArray);
			$poppedStackElement2 = array_pop($stackArray);
			# might need to switch the $poppedStackElements around
			$result = operationEval($poppedStackElement2, $poppedStackElement1, $token);
			array_push($stackArray, $result);
		}
	}
	return $stackArray[0];
}

# evaluates an operation on two operands
function operationEval($operand1, $operand2, $operator)
{
	switch($operator)
	{
		case "+":
			return $operand1 + $operand2;
		case "-":
		    return $operand1 - $operand2;
        case "*":
        	return $operand1 * $operand2;
		case "/":
			return $operand1 / $operand2;
		default:
			return -1;
	}
}

#infix to postfix conversion
function infixToPostfix($infix)
{
	$postfix = array();
	$stackArray = array();


	foreach($infix as $token)
	{
		if(is_numeric($token))
		{
			array_push($postfix, $token);
		}
		else
		{
			if(count($stackArray) == 0)
			{
				array_push($stackArray, $token);
			}
			else
			{
				# If stack is not empty, pop all greater/equal operators and add to postfix
				$lastStackElement = $stackArray[count($stackArray) -1];
				while(precedence($lastStackElement, $token))
				{
					$poppedStackElement = array_pop($stackArray);
					array_push($postfix, $poppedStackElement);
					$lastStackElement = $stackArray[count($stackArray) -1];
				}
				array_push($stackArray, $token);
			}
		}
	}
	while(count($stackArray) != 0)
	{
		$remainingStackOperators = array_pop($stackArray);
		array_push($postfix, $remainingStackOperators);
	}
	return $postfix;
}
# Assigns a value to the operator
function precedenceValue($operator)
{
	switch($operator)
	{
		case "+":
		case "-":
		    return 0;
        case "*":
		case "/":
			return 1;
		default:
			return -1;
	}
}

# Returns true if $operator1 has greater than or equal precedence to $operator2
function precedence($operator1, $operator2)
{
    $precedenceop1 = precedenceValue($operator1);
    $precedenceop2 = precedenceValue($operator2);
	if($precedenceop1 >= $precedenceop2)
		return true;
	else
		return false;
}
*/
?>

</body>
