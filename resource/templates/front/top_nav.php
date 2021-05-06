<div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <div id="mySidenav" class="sidenav">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

                <div  id="mydropdown">
                    <a href="javascript:void(255)"  onclick ="openNav1()">&#8608;  Dropdown  </a>
                    <span style="font-size:30px;cursor:pointer" onclick="openNav1()">&#8608; open</span>
                    <div >
                        <?php
                    $query = "SELECT * FROM categories";
                    $send_query = mysqli_query($connection,$query);

                    if(!$send_query){
                        die("QUERY FAIL" . mysqli_error($connection));
                    }
                    while($row = mysqli_fetch_array($send_query)){
                        echo "<a href='category.php?id={$row['cat_id']}' >{$row['cat_titles']} </a>";
                    }
                ?>
    </div>
</div>
                
                
                            
</div>
        <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>
        </li>
                    <li><a href="index.php">Home</a></li>
                    <li>
                        <a href="shop.php">Shop</a>
                    </li>
                    <li>
                        <a href="login.php">Login</a>
                    </li>
                    <li>
                        <a href="admin">Admin</a>
                    </li>
                     <li>
                        <a href="checkout.php">Checkout</a>
                    </li>
                    <li>
                        <a href="contact.php">Contact</a>
                    </li>

                </ul>
         </div>
            <!-- /.navbar-collapse -->
</div>

        

                <script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */

// Close the dropdown if the user clicks outside of it

</script>
        <script>
        function openNav() {
            document.getElementById("mySidenav").style.width = "250px";
        }
        
        function openNav1() {
            document.getElementById("mydropdown").style.width = "250px";
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
        }
        </script>

                    