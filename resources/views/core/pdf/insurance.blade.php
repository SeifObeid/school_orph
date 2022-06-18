<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css"
        integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
    </script>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
        }
    </style>
</head>




<body>

    <table>
        <tr>
            <td>
                1 of 3
            </td>
            <td>
                2 of 3
            </td>
            <td>
                3 of 3
            </td>
        </tr>
    </table>



    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col ">
                1 of 3
            </div>
            <div class="col-md-auto">
                Variable width content
            </div>
            <div class="col ">
                3 of 3
            </div>
        </div>
        <div class="row">
            <div class="col">
                1 of 3
            </div>
            <div class="col-md-auto">
                Variable width content
            </div>
            <div class="col ">
                3 of 3
            </div>
        </div>
    </div>
    <table>
        <tr>
            <th>الاسم</th>
            <th>ؤقم الهاتف</th>

        </tr>
        @for ($i = 0; $i < 17; $i++) @foreach($employees as $employee) <tr>
            <td>{{$employee['name']}}</td>
            <td>{{$employee['phone_number']}}</td>
            </tr>
            @endforeach
            @endfor
    </table>
    سشيشسيشس
</body>

</html>
