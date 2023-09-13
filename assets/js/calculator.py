number1 = float(input("Enter first number: "))
number2 = float(input("Enter second number: "))

operation = input("Select operation (+, -, *, /): ")

if operation == "+":
  print(number1, "+", number2, "=", number1 + number2)
elif operation == "-":
  print(number1, "-", number2, "=", number1 - number2)
elif operation == "*":
  print(number1, "*", number2, "=", number1 * number2)
elif operation == "/":
  print(number1, "/", number2, "=", number1 / number2)
