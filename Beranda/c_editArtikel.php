<?php

require_once "m_forum.php";


$judul = $Input =  "";
$judul_err = $Input_err = "";


if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];

    // validasi nama
    $input_judul = trim($_POST["judul"]);
    if(empty($input_judul)){
        $judul_err = "Masukkan judul...";
    } else{
        $judul = $input_judul;
    }

    // validasi nim
    $input_Input = trim($_POST["Input"]);
    if(empty($input_Input)){
        $Input_err = "masukkan Artikel...";
    } else{
        $Input = $input_Input;
    }



 // Check input error
    if(empty($judul_err) && empty($Input_err)){

        $sql = "UPDATE forum SET judul=?, Input=? WHERE id=?";

        if($stmt = mysqli_prepare($link, $sql)){

            mysqli_stmt_bind_param($stmt, "ssi", $param_judul, $param_Input, $param_id);

            // Set parameters
            $param_judul = $judul;
            $param_Input = $Input;
            $param_id = $id;


            if(mysqli_stmt_execute($stmt)){

                header("location: v_forum.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($link);
} else{

    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){

        $id =  trim($_GET["id"]);


        $sql = "SELECT * FROM forum WHERE id = ?";
        if($stmt = mysqli_prepare($link, $sql)){

            mysqli_stmt_bind_param($stmt, "i", $param_id);

            // Set parameters
            $param_id = $id;


            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);

                if(mysqli_num_rows($result) == 1){

                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);


                    $judul = $row["judul"];
                    $Input = $row["Input"];

                } else{

                    header("location: c_error.php");
                    exit();
                }

            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }


        mysqli_stmt_close($stmt);


        mysqli_close($link);
    }  else{

        header("location: c_error.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Update Data</h2>
                    </div>

                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                      <div class="form-group <?php echo (!empty($judul_err)) ? 'has-error' : ''; ?>">
                          <label>Judul</label>
                          <input placeholder="Input Judul..." type="text" name="judul" class="form-control" value="<?php echo $judul; ?>">
                          <span class="help-block"><?php echo $judul_err;?></span>
                      </div>
                      <div class="pt-2 form-group <?php echo (!empty($Input_err)) ? 'has-error' : ''; ?>">
                          <label>Artikel</label>
                          <input placeholder="Input Artikel..." type="textarea" name="Input" class="form-control" value="<?php echo $Input; ?>">
                          <span class="help-block"><?php echo $Input_err;?></span>
                      </div>

                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="v_forum.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
