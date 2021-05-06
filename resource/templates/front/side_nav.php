<div class="col-md-3">
                <p class="lead">Shop Name</p>
                <!--div class="list-group"-->
                <div id="mySidenav" class="sidenav">
                        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                        <br><br><

                	<?php
                	   $query = "SELECT * FROM categories";
                	   $send_query = mysqli_query($connection,$query);

                	   if(!$send_query){
                	   	   die("QUERY FAIL" . mysqli_error($connection));
                	   }
                	   while($row = mysqli_fetch_array($send_query)){
                	   	   echo "<a href='category.php?id={$row['cat_id']}' class='list-group-item'>{$row['cat_titles']} </a>";
                	   }
                	?>

                </div>
                <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>

<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>
</div>


<!--div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="#">About</a>
  <a href="#">Services</a>
  <a href="#">Clients</a>
  <a href="#">Contact</a>
</div-->


