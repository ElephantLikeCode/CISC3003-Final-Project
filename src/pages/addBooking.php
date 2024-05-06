<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="style/public.css" type="text/css" rel="stylesheet">
    <link href="style/menu.css" type="text/css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Maven+Pro:wght@400..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Elephant Fitting Club | Stronger than elephant!</title>
    <style>
        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="date"],
        input[type="time"],
        input[type="number"] {
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }

        .beautiful-button {
            appearance: none;
            background-color: #FAFBFC;
            border: 1px solid rgba(27, 31, 35, 0.15);
            border-radius: 6px;
            box-shadow: rgba(27, 31, 35, 0.04) 0 1px 0, rgba(255, 255, 255, 0.25) 0 1px 0 inset;
            box-sizing: border-box;
            color: #24292E;
            cursor: pointer;
            display: inline-block;
            font-family: -apple-system, system-ui, "Segoe UI", Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji";
            font-size: 14px;
            font-weight: 500;
            line-height: 20px;
            list-style: none;
            padding: 6px 16px;
            position: relative;
            transition: background-color 0.2s cubic-bezier(0.3, 0, 0.5, 1);
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
            vertical-align: middle;
            white-space: nowrap;
            word-wrap: break-word;
        }

        .beautiful-button:hover {
            background-color: #F3F4F6;
            text-decoration: none;
            transition-duration: 0.1s;
        }

        .beautiful-button:disabled {
            background-color: #FAFBFC;
            border-color: rgba(27, 31, 35, 0.15);
            color: #959DA5;
            cursor: default;
        }

        .beautiful-button:active {
            background-color: #EDEFF2;
            box-shadow: rgba(225, 228, 232, 0.2) 0 1px 0 inset;
            transition: none 0s;
        }

        .beautiful-button:focus {
            outline: 1px transparent;
        }

        .beautiful-button:before {
            display: none;
        }

        .beautiful-button::-webkit-details-marker {
            display: none;
        }
        .container1 {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 70vh;
        }

        .container2 {
            text-align: center;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;

        }
        td{
            font-size:30px ;
            text-align: left;

        }

        table {
            border-collapse: separate;
            border-spacing: 0 50px;
        }
        input[type="number"]{
            width: 100%;
        }
    </style>
</head>
<body>
<?php include_once "includes/header.php";?>
<section>



    <div class="container1">
        <div class="container2">
            <form action='bookingHandler.php' method='post' id='bookingForm'>
                    <?php
                    $item=$_GET['item'];
                    echo "<h1>$item</h1>";
                    ?>

                <table>
                    <tr>
                        <td>Start From</td>
                        <td>
                            <?php
                            echo "<input type='text' name='item' id='start' value='" . $item . "' style='display:none'>";
                            ?>
                            <input type="date" name="startDate" >
                        </td>
                        <td>
                            <input type="time" name="startTime">
                        </td>
                    </tr>
                    <tr>
                        <td>Until</td>
                        <td>
                            <input type="date" name="endDate">
                        </td>
                        <td>
                            <input type="time" name="endTime">
                        </td>
                    </tr>
                    <tr>
                        <td>Number of people</td>
                        <td colspan="2">
                            <input type="number" min="1" name="number">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" style="text-align: center">
                            <input type="submit" class="beautiful-button">
                        </td>
                    </tr>
                </table>

            </form>
        </div>
    </div>
</section>
</body>
<?php include_once "includes/footer.php";?>
</html>
