<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action = "calc.php" method = "POST">
    <input type = "text" placeholder = "Enter number 1" name = "num1"></br>
    <input type = "text" placeholder = "Enter number 2" name = "num2"></br>
    <select name = "operator">
    <option value = "" disabled>Select</option>
    <option value = "add">Add</option>
    <option value = "subt">Subtract</option>
    <option value = "mult">Multiply</option>
    <option value = "div">Divide</option>
    </select></br>
    <button type = "submit">Submit</button>
    </form>
</body>
</html>