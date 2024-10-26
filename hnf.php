<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main page</title>
    <link rel="stylesheet" href="hnf.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Dancing Script">
    <style>
        /* #header{
            background-color: black ;
        } */
    </style>
</head>
<body>
    <section id="header">
        <nav class="navbar">
            <ul id="nav">
                <img src="./Img/Logo.png" id="logo" class="logo">
                <?php if(!isset($_SESSION['loggedin'] )) { ?>
                    <li class="hideOnMobile">
                    <a href="login.php">Login</a>
                    </li>
                <?php } else { ?>
                <?php if(isset($_SESSION['username'])) { ?>
                    <li class="hideOnMobile">
                    <a href="logoff.php">Log off</a>
                    </li>
                    <li class="hideOnMobile">
                        <a href="user_page.php"><?php echo $_SESSION['username']; ?></a>
                    </li>
                <?php } else { ?>
                    <li class="hideOnMobile">
                        <a href="login.php">Log In</a>
                    </li>
                <?php } ?>
                <?php if(isset($_SESSION['username']) && $_SESSION['username'] == "admin") { ?>
                        <div class="dropdown">
                            <a href="user.php">Users</a>
                        </div>
                </li>
                    <li class="hideOnMobile">
                        <div class="dropdown">
                            <a href="pitem.php">Purchases</a>
                        </div>
                    </li>
                    <li class="hideOnMobile">
                        <div class="dropdown">
                            <a href="addproduct.php">Add product</a>
                        </div>
                    </li>
                    <li class="hideOnMobile">
                        <div class="dropdown">
                            <a href="displayitem.php">Manage product</a>
                        </div>
                    </li>
                    <li class="hideOnMobile">
                        <div class="dropdown">
                            <a href="admindash.php">Dashboard</a>
                        </div>
                    </li>
                <?php } else { ?>
                    <li class="hideOnMobile">
                        <a href="cart.php">Cart</a>
                    </li>
                    <li class="hideOnMobile">
                        <a href="shop.php">Shop</a>
                    </li>
                <?php } ?>
                <li class="hideOnMobile">
                    <a href="menu.php">Home</a>
                </li>
                <?php } ?>
                
            </ul>
        </nav>
    </section>

<script>

function toggleSidebar() {
    const sidebar = document.getElementById('sidebar');
    sidebar.classList.toggle('show');
}
function hideSidebar() {
    const sidebar = document.getElementById('sidebar');
    sidebar.classList.remove('show');
}
document.getElementById('logo').addEventListener('click',function(e){
    console.log('you clicked the logo');
    location.href = 'menu.php';
})

window.addEventListener('click', function(event) {
    const sidebar = document.getElementById('sidebar');
    const menuButton = document.querySelector('.menubutton');
    if (!sidebar.contains(event.target) && event.target !== menuButton) {
        sidebar.classList.remove('show');
    }
});
</script>
</body>
</html>
