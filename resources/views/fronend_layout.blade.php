<!DOCTYPE html>
<html>
<head>
    <!-- https://icons.getbootstrap.com/ -->
    <!-- https://www.w3schools.com/bootstrap4/bootstrap_navbar.asp -->
    <title>Phạm Văn Cường</title>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
 -->    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <style type="text/css">
        .test{
            padding: 5px;
            border-radius: 6px;
            color: black;
        }
        .test:hover{
            text-decoration: none;
            background-color: #cca01c;
        }
        .delete {

            border-radius: 5px;
            margin-top: 9px;
        }
        .edit {
            display: block;
            color: white;
            width: 41px;
            background-color: blue;
            text-decoration: none;
            padding: 3px 7px 4px 7px;
            border-radius: 6px;
        }
        .edit:hover {
            text-decoration: none;
            color: white;
            background-color: #202098;
        }
        .navbar {
            padding: 0px !important;
        }
    </style>
</head>
<body>
    <!-- Grey with black text -->
    <nav class="navbar navbar-expand-sm bg-info navbar-dark">
      <div class="container">
        <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="{{route('home')}}">HOME</a>
            </li>
          </ul>
      </div>
    </nav>
    <div>
        @yield('conten')
    </div>
</body>
</html>