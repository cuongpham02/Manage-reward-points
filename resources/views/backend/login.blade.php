<!DOCTYPE html>
<html>
<head>
    <!-- https://icons.getbootstrap.com/ -->
    <!-- https://www.w3schools.com/bootstrap4/bootstrap_navbar.asp -->
    <title>Phạm Văn Cường</title>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/main.css')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
 -->    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>
<body>
   <div class="d-flex justify-content-center align-items-center mt-5">
    <div class="card">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item text-center"> <a class="nav-link active btl" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Login</a> </li>
        </ul>
        <form>  
        <div class="tab-content" id="pills-tabContent">
                <div class="form px-4 pt-5"> 
                    <input type="text" name="email" class="form-control" placeholder="Email"> 
                    <input type="text" name="password" class="form-control" placeholder="Password"> 
                    <br>
                <input type="submit" name="" value="Login" class="btn btn-dark btn-block"></div>
            </div>
        </div>
        </form>
    </div>
</div>
</body>
</html>