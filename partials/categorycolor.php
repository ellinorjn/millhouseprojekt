<?php
     if (isset($_POST['Klockor'])) {
        handleCategories($_POST["Klockor"]);
       }
    elseif (isset($_POST['Glasögon'])) {
        handleCategories($_POST["Glasögon"]);
        }
    elseif (isset($_POST['Inredning'])) {
        handleCategories($_POST["Inredning"]);
       }
    else {
        allCatergories();
    }
?>