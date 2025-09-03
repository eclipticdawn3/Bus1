<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="assets/css/navbar.css" />
  </head>
  <body>
    <!-- Navigation -->
    <nav>
      <div class="nav__logo"><a href="./index.php?page=home">BUSONE</a></div>
      <ul class="nav__links">
      <li class="link"><a href="./index.php?page=home">Home</a></li>
      <li class="link"><a href="./index.php?page=schedule">Schedule</a></li>
      <li class="link"><a href="#">Seats</a></li>
      <li class="link"><a href="about.php">About</a></li>
      <li class="link"><a href="cont.php">Contact</a></li>
      </ul>
      <a href="admin.php"><button class="btn">Admin</button></a>
    </nav>
  </body>
</html>
  <script>
    $(document).ready(function(){
      var page = '<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>';
      if(page != ''){
        $('.nav__links li').removeClass('active')
        $('.nav__links li.nav-'+page).addClass('active')
      }
      $('#manage_account').click(function(){
      uni_modal('Manage Account','manage_account.php')
  })
    })

  </script>