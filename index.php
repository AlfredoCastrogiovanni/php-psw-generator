<?php
    /**
     * Generate a random password
     * 
     * 
     * @param int $length      How many characters do we want?
     * @param string $keyspace A string of all possible characters
     *
     * @return string
    */
    function random_psw($length, $keyspace) {
        switch ($keyspace) {
            case 0:
                $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                break;
            case 1:
                $keyspace = '0123456789';
                break;
            case 2:
                $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*';
                break;
        }
        $str = '';
        $max = strlen($keyspace) - 1;
        if ($max < 1) {
            echo '$keyspace must be at least two characters long';
        }
        for ($i = 0; $i < $length; ++$i) {
            $str .= $keyspace[random_int(0, $max)];
        }
        return $str;
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PHP Password Generator</title>
        <!-- Boostrap CDN -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <form action="index.php" method="get">
                        <div class="mb-3">
                            <label for="length" class="form-label">Password length</label>
                            <input type="number" class="form-control w-50" name="length" id="length">
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="0" name="keyspace" id="radio1" checked>
                                <label class="form-check-label" for="radio1">
                                    Letters and number
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="1" name="keyspace" id="radio2">
                                <label class="form-check-label" for="radio2">
                                    Only number
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="2" name="keyspace" id="radio3">
                                <label class="form-check-label" for="radio3">
                                    Letters and number with symbols
                                </label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <div class="col-6 d-flex justify-content-center align-items-center">
                    <p> <?php echo isset($_GET["length"]) && isset($_GET["keyspace"]) ? '<strong>New password: </strong>' . random_psw($_GET["length"], $_GET["keyspace"]) : '' ?></p>
                </div>
            </div>
        </div>
    </body>
</html>