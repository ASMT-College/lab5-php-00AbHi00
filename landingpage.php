<?php
    include('include/header.php');
?>
<style>
    *{
        padding: none;
        margin: none;
        overflow-x: hidden;
     }
     .landingpg{
        display: flex;
        align-items: center;
    }
     body{
        background-color: darkgray;
     }

</style>
<div class="full-container">
    <!-- <img class="landingpg" src="img/background-logo-landingpage.png" alt=""> -->
    <img class="landingpg" src="img/bg-landing.png" alt="">
</div>
<script>
    var image1 = document.getElementsByClassName("landingpg")[0];
        image1.style.height = window.innerHeight + "px";
        image1.style.width= window.innerWidth -20/100*window.innerWidth  + "px";   
    

    window.addEventListener("resize", function() {
        // var image1 = document.getElementsByClassName("landingpg")[0];
        image1.style.height = window.innerHeight + "px";
        image1.style.width= window.innerWidth -20/100*window.innerWidth  + "px";   
    });
</script>

<?php
    include('include/footer.php');
?>