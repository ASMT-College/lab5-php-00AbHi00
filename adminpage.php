<?php
include('include/header.php');
?>
<style>
    * {
        --value1: 1;
    }

    .box {
        display: flex;
        height: 10vh;
        width: 10vh;
        color: red;
        background-color: blue;
        justify-content: center;
        align-items: center;
        font-size: 10vh;
        cursor: pointer;
        border-radius: 10px;
        margin: 20px;
        box-shadow: 10px 10px 10px black;
        margin-right: 20vw;
    }

    .box:hover {
        color: blue;
        background-color: red;
        transform: perspective(200px) rotateX(20deg);
        box-shadow: 20px 20px 20px black;
        transition: ease-in-out cubic-bezier(0.075, 0.82, 0.165, 1);
    }

    .row {
        background-color: hsl(283, 10%, 76%);
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: space-between;
    }

    .title {
        color: black;
        padding: 2vw;
    }

    #formContainer {
        border-radius: 20px;    
        display: grid;
        height: 200px;
        width: 300px;
        background-color: hsla(50, 80%, 20%,0.2);
        backdrop-filter: blur(5px);
        position: absolute;
        top: 20%;
        left: 50%;
        transform: translateX(-50%);
        text-align: center;
        justify-content: center;
        align-items: center;
    }

    #closeButton {
        position: absolute;
        top: 10px;
        right: 10px;
        cursor: pointer;
        font-size: 20px;
        color: white;
    }

    #minimizeButton {
        position: absolute;
        top: 10px;
        right: 30px;
        cursor: pointer;
        font-size: 20px;
        color: white;
    }
    #minimizeButton:hover {
        color: palevioletred;
    }

    #closeButton:hover {
        color: palevioletred;
    }
    form input
    {
        height: 30px;
        backdrop-filter: contrast(20%);
        margin-top: 20px;
    }
    form input::placeholder{
        color: grey;
    }
</style>
<div class="row">
    <h2 class="title">Click here to add course </h2>
    <div class="box" onclick="openForm()">+</div>
</div>



<!-- SEE Course -->
<div class="row">
    <h2 class="title">Click here to See all the courses</h2>
    <a href="process/courses/displaycourses.php">
    <div class="box">
        <h6><></h6>
    </div>
    </a>
</div>


<!-- Hidden form add course-->
<div id="formContainer" style="display:none">
    <form id="courseForm" method="post" action="process/courses/add_course.php">
        <!-- Form fields go here -->
        <input type="text" name="gift_name" placeholder="Name of Gift">
        <input type="number" name="price" placeholder="Price of gift">
        <input type="text" name="person" placeholder="Enter your name">
        <br/>
        <button class="submit" type="submit">Submit</button>
    </form>
    
    <span id="minimizeButton" onclick="minimizeForm()">-</span>
    <span id="closeButton" onclick="closeForm()">×</span>
</div>

<!-- hidden course list -->





<script>
     function seeCourses() {
        var courseList = document.getElementById('courseList');
        courseList.style.display="block";
    }

    function applyHueColors() {
        var rows = document.querySelectorAll('.row');
        var hue = Math.floor(Math.random() * 256)
        saturation = 100;

        rows.forEach(function (row, title) {
            var huex = 255 - hue;
            saturation = saturation - 20;
            var title = row.querySelector("h2");
            var box = row.querySelector(".box");
            title.style.color = 'hsl(' + huex + ',' + 100 + '% , 20%)';

            box.style.color = 'hsl(' + hue + ',' + 100 + '% , 95%)';
            box.style.backgroundColor = 'hsl(' + hue + ',' + saturation + '% , 30%)';

            row.style.backgroundColor = 'hsl(' + hue + ',' + saturation + '% , 70%)';
        });
    }
    function openForm() {
        var form = document.getElementById('formContainer')
        form.style.display = "block";
    }
    //to add window event listener
    /*
    window.addEventListener('resize', function () {

     })
    */
     function minimizeForm()
    {
        var form = document.getElementById('formContainer')
        form.style.display = "none";    
    }
    function closeForm() {
        var formContainer = document.getElementById("formContainer");
        var courseForm = document.getElementById("courseForm");
        courseForm.reset();
        formContainer.style.display = "none";
}

    function submitForm() {
        var form = document.getElementById('courseForm');
        var formData = new FormData(form);
        // Make an asynchronous request to add_course.php
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'http://localhost/greentaranepal/process/courses/add_course.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    // Handle the success response from the server
                    console.log(xhr.responseText);
                } else {
                    // Handle the error response from the server
                    console.error('Error submitting the form');
                }
            }
        };
        // Send the request with the form data
        xhr.send(formData);
    }

    // Call the function when the window is loaded
    // window.onload = applyHueColors;
</script>