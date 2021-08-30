<?php


if (isset ($_POST['fullname'])) {
    echo 'Success !!!';
    print_r($_POST);
} else {
    echo 'Error !!!';
}
?>