<nav class="navbar fixed-top navbar-light bg-light">
    <a class="navbar-brand" href="#">Fixed top</a>
</nav>

<?php
    if(isset($_SESSION['NumOfItems'])) {
        echo "In Cart: " . $_SESSION['NumOfItems'];
    }
    else {
        $_SESSION['NumOfItems'] = 0;
    }

?>