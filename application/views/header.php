<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Amr Foley</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <div class="row flex-column">
                <div class="d-block">
                  <h1>Welcome Back <?php echo $this->session->userdata('username');?></h1>
                </div> 
                <ul class="nav justify-content-center">
                    <li class="nav-item active">
                        <a class="nav-link" href="/index.php/dashboard">Dashboard <span class="sr-only">(current)</span></a>
                    </li>
                    <?php if($this->session->userdata('level') != '4' && $this->session->userdata('level') != '3') { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/index.php/users">Users</a>
                        </li>
                    <?php } ?>
                    <?php if($this->session->userdata('level') != '4') { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/index.php/operations">Operations</a>
                        </li>
                    <?php } if($this->session->userdata('level') != '3') { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/index.php/finance">Finance</a>
                        </li>
                    <?php } ?>
                </ul>                         
            </div>