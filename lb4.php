<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <title>Задачи на PHP</title>
    <link rel="stylesheet" type="text/css" href="style2.css">
    <link rel="stylesheet" type="text/css" href="styleb.css">
    <style>
        table {
            margin: 20px 0;
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        h2 {
            margin-top: 20px;
        }
        .cont1{
          width: 50%;
          background-color: white;
          padding: 25px;
          border-radius: 15px;
          margin: 20px;
          z-index: 1;
        }
        .totalcont{
          display: flex;
          flex-direction: column;
          flex-wrap: wrap;
          width: 100%;
          align-content: center;
          justify-content: center;
          z-index: 1;
        
        }
        .inp{
          background-color: #00000033;
          height: 30px;
          padding: 10px;
          border-radius: 7px;
        }
        body{
          background-color: #76769b;
        }
    </style>
</head>
<body>
<div id="rec381512573" class="r t-rec" data-animationappear="off" data-record-type="456">
        <!-- T456 -->
        <div id="nav381512573marker"></div>
        <div id="nav381512573" class="t456 t456__positionstatic" style="background-color: rgb(0 0 0 / 50%); " data-bgcolor-hex="#000000" data-bgcolor-rgba="rgba(255,0,0,0.5)" data-navmarker="nav381512573marker" data-appearoffset="" data-bgopacity-two="" data-menushadow="" data-menushadow-css="" data-bgopacity="1" data-menu-items-align="right" data-menu="yes">
          <div class="t456__maincontainer" style="">
            <div class="t456__leftwrapper" style="min-width:90px;width:90px;">
              <div class="t456__logowrapper" style="display: block;">
                <a onclick="document.location='index.php'">
                  <img class="t456__imglogo t456__imglogomobile" src="https://i.imgur.com/kgkcVti.png" imgfield="img" style="max-width: 90px; width: 90px;" alt="Company">
                </a>
              </div>
            </div>
            <nav class="t456__rightwrapper t456__menualign_right" style="">
              <ul role="list" class="t456__list t-menu__list">
                <li class="t456__list_item" style="padding:0 15px;">

                </li>
                <li class="t456__list_item" style="padding:0 0 0 15px;">

                </li>
              </ul>
            </nav>
          </div>
        </div>
      </div>

  <!----------1----------->
  <div class="totalcont">
<div class="cont1">
    <h1>Проверка уникальности цифр</h1>
    <form class="f1" method="post" action="">
        <table>
            <tr>
                <th>Введите трехзначное число:</th>
                <td><input class="inp" type="number" name="number" required></td>
            </tr>
            <tr>
                <td colspan="2"><button class="but1" type="submit" name="submit_unique">Проверить</button></td>
            </tr>
        </table>
    </form>


    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit_unique"])) {
        $number = $_POST["number"];

        function areDigitsUnique($number) {
            // Преобразуем число в строку
            $strNumber = strval($number);

            // Проверяем, что все цифры различны
            $uniqueDigits = count(array_unique(str_split($strNumber)));

            return $uniqueDigits === strlen($strNumber);
        }

        if (areDigitsUnique($number)) {
            echo "<p>Все цифры числа $number различны.</p>";
        } else {
            echo "<p>В числе $number есть повторяющиеся цифры.</p>";
        }
    }
    ?>
        </div>
  <!----------2----------->
  <div class="cont1">
    <h1>Определение ближайшей точки</h1>
    <form method="post" action="">
        <table>
            <tr>
                <th>Введите координату точки A:</th>
                <td><input class="inp" type="number" name="A" required></td>
            </tr>
            <tr>
                <th>Введите координату точки B:</th>
                <td><input class="inp" type="number" name="B" required></td>
            </tr>
            <tr>
                <th>Введите координату точки C:</th>
                <td><input class="inp" type="number" name="C" required></td>
            </tr>
            <tr>
                <td colspan="2"><button type="submit" name="submit_closest">Определить</button></td>
            </tr>
        </table>
    </form>


    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit_closest"])) {
        $A = $_POST["A"];
        $B = $_POST["B"];
        $C = $_POST["C"];

        function closestPoint($A, $B, $C) {
            // Рассчитываем расстояния от точки A до точек B и C
            $distanceAB = abs($A - $B);
            $distanceAC = abs($A - $C);

            // Определяем, какая точка ближе к A
            if ($distanceAB < $distanceAC) {
                return ["point" => "B", "distance" => $distanceAB];
            } elseif ($distanceAC < $distanceAB) {
                return ["point" => "C", "distance" => $distanceAC];
            } else {
                return ["point" => "B и C", "distance" => $distanceAB];
            }
        }

        $result = closestPoint($A, $B, $C);
        echo "<p>Точка {$result['point']} расположена ближе к точке A на расстоянии {$result['distance']}.</p>";
    }
    ?>
      </div>
      <!----------3---------->
      <div class="cont1">
      <h1>Вычисление значения функции y = f(x)</h1>
      <form method="post" action="">
        <label for="x">Введите значение x:</label>
        <input class="inp" type="text" id="x" name="x">
        <input class="inp" type="submit" value="Рассчитать">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $x = floatval($_POST['x']);
        $a = 4.27;
        $b = 1.39;

        if ($x <= -2) {
            $y = sqrt($a * $x * $x + $b);
        } elseif ($x <= 4) {
            $y = cos(1 / (1 + sqrt(abs($a * $x))));
        } else {
            $y = abs(log(abs($x)) + sin($b * $x));
        }

        echo "<p>Для x = $x, значение y = $y</p>";
    }
    ?>
      </div>
    <!----------4----------->
    <div class="cont1">
    <h1>Вычисление значения функции y = f(x)</h1>
    <form method="post" action="">
        <label for="x">Введите значение x:</label>
        <input class="inp" type="number" step="any" id="x" name="x" required><br><br>
        <input class="inp" type="submit" value="Вычислить">
    </form>


    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $x = $_POST['x'];
        $a = "4.27";
        $b = "4.27";

        function calculateY($x, $a, $b) {
            if ($x == -3) {
                return sqrt($a * pow($x, 2) + $b);
            } elseif ($x == 2) {
                return $a * exp($b * $x); // Пример вычисления для x = 2
            } elseif ($x == 3) {
                return acos(1 / (1 + sqrt(abs($x))));
            } elseif ($x == 5) {
                return log(abs($x)) + sin($b * $x);
            } else {
                return "Для данного значения x нет условия.";
            }
        }

        $y = calculateY($x, $a, $b);
        echo "<h2>Результат: y = $y</h2>";
    }
    ?>
      </div>
  </div>

<div id="rec381529221" class="r t-rec t-rec_pt_15 t-rec_pb_60" style="margin-top: 250px;padding-top:15px;background-color: rgba(0, 0, 0, 0.5); " data-record-type="463" data-bg-color="#000000" data-animationappear="off">
        <!-- T463 -->
        <div class="t463" id="t-footer_381529221">
          <div class="t463__maincontainer">
            <div class="t463__content" style="">
              <div class="t463__colwrapper">
                <div class="t463__col">
                  <a class="t463__link" href="/"><div class="t463__logo t-title" field="title"></div></a>
                </div>
                <div class="t463__col t463__col_center t-align_center">
                <div class="t463__typo t463__copyright t-name t-name_xs" field="text">
                    © 2024 by ASTRAL DESIGN
                  </div>
                </div>
                <div class="t463__col t-align_right"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>



</body>
</html>
