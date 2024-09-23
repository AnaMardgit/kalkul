<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Sederhana</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #eef2f3;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
            margin: 30px;
        }
        .calculator {
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            padding: 20px;
            width: 350px;
        }
        .display {
            width: 100%;
            height: 50px;
            margin-bottom: 20px;
            text-align: right;
            padding: 10px;
            font-size: 32px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background: #f9f9f9;
            box-sizing: border-box;
        }
        .button {
            width: 70px;
            height: 70px;
            margin: 5px;
            font-size: 24px;
            border: none;
            border-radius: 10px;
            background: #007bff;
            color: white;
            cursor: pointer;
            transition: background 0.3s;
        }
        .button:hover {
            background: #0056b3;
        }
        .button.operator {
            background: #28a745;
        }
        .button.operator:hover {
            background: #218838;
        }
        .button.clear {
            background: #dc3545;
        }
        .button.clear:hover {
            background: #c82333;
        }
        .button.delete {
            background: #ffc107;
        }
        .button.delete:hover {
            background: #e0a800;
        }
        .button.equal {
            background: #17a2b8;
            padding: 30px 170px;
        }
        .button.equal:hover {
            background: #138496;
        }
        .button:active {
            transform: scale(0.95);
        }
        .button-container {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px;
        }
        .instructions {
            margin-bottom: 20px;
            font-size: 16px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="calculator">
        <div class="instructions">
            <p>Masukkan dua angka dan pilih operasi:</p>
            <p>1. Masukkan angka pertama.</p>
            <p>2. Klik tombol operasi (+, -, *, /).</p>
            <p>3. Masukkan angka kedua.</p>
            <p>4. Klik "=" untuk mendapatkan hasil.</p>
        </div>
        <input type="text" class="display" id="display" disabled>
        <div class="button-container">
            <button class="button" onclick="appendToDisplay('7')">7</button>
            <button class="button" onclick="appendToDisplay('8')">8</button>
            <button class="button" onclick="appendToDisplay('9')">9</button>
            <button class="button operator" onclick="setOperation('/')">/</button>

            <button class="button" onclick="appendToDisplay('4')">4</button>
            <button class="button" onclick="appendToDisplay('5')">5</button>
            <button class="button" onclick="appendToDisplay('6')">6</button>
            <button class="button operator" onclick="setOperation('*')">*</button>

            <button class="button" onclick="appendToDisplay('1')">1</button>
            <button class="button" onclick="appendToDisplay('2')">2</button>
            <button class="button" onclick="appendToDisplay('3')">3</button>
            <button class="button operator" onclick="setOperation('-')">-</button>

            <button class="button" onclick="appendToDisplay('0')">0</button>
            <button class="button delete" onclick="deleteLast()">Del</button>
            <button class="button clear" onclick="clearDisplay()">C</button>
            <button class="button operator" onclick="setOperation('+')">+</button>
        </div>
        <button class="button equal" onclick="calculate()">=</button>
    </div>

    <script>
        let currentInput = '';
        let operation = null;
        let firstOperand = null;

        function appendToDisplay(value) {
            currentInput += value;
            updateDisplay();
        }

        function updateDisplay() {
            document.getElementById('display').value = currentInput;
        }

        function clearDisplay() {
            currentInput = '';
            firstOperand = null;
            operation = null;
            updateDisplay();
        }

        function deleteLast() {
            currentInput = currentInput.slice(0, -1);
            updateDisplay();
        }

        function setOperation(op) {
            if (currentInput === '') return;
            if (firstOperand === null) {
                firstOperand = parseFloat(currentInput);
            } else if (operation) {
                firstOperand = calculate();
            }
            operation = op;
            currentInput = '';
        }

        function calculate() {
            if (currentInput === '' || firstOperand === null || operation === null) return;
            let secondOperand = parseFloat(currentInput);
            let result;

            switch (operation) {
                case '+':
                    result = firstOperand + secondOperand;
                    break;
                case '-':
                    result = firstOperand - secondOperand;
                    break;
                case '*':
                    result = firstOperand * secondOperand;
                    break;
                case '/':
                    if (secondOperand === 0) {
                        alert("Tidak dapat membagi dengan nol");
                        clearDisplay();
                        return;
                    }
                    result = firstOperand / secondOperand;
                    break;
            }

            clearDisplay();
            currentInput = result.toString();
            updateDisplay();
            return result;
        }
    </script>
</body>
</html>
