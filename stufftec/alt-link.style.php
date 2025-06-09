<?php 
    $pageName = "Alt-Link-System";
    $pageTopic = "Alit - System";

include_once('includes/header.php');?>
    <div class="container">
        <div class="header">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="#">About</a>
                    <ul>
                        <li><a href="#">Team</a></li>
                        <li><a href="#">Carrier</a>
                        <li><a href="#">History</a>
                    </ul>
                </li>
                <li><a href="#">Contact</a>
                    <ul>
                            <li><a href="#">Office Contact</a></li>
                            <li><a href="#">Social Media</a></li>
                            <li><a href="#">Send Mail</a></li>
                    </ul>
                </li>

                <li><a href="#">Sign In</a></li>
            </ul>
        </div>
        <!-- emd header -->

        <div class="main-content">
            <div class="m-div">
                <h3 class='m-title'>Welcome to CSS Animation</h3>
                <div class="div a1"></div>
                <div class="div a2"></div>
                <div class="div a3"></div>
                <div class="div a4"></div>
                <div class="div a5"></div>
            </div>


            <div class="m-div">
                <div class="top topper"></div>
                <div class="top topper1"></div>
                <div class="top topper2"></div>
                <div class="top topper3"></div>
                <div class="top topper4"></div>
            </div>

            <div class="m-div radio-box">
                <!-- <div class="radio-box"> -->
                       <label for="radios"> <input type="radio" value="In" name="rad1a" id="rad1a" class="rad1a">In</label>
                       
                       <label for="radios"> <input type="radio" value="Out" name="rad1a" id="rad2b" class="rad2b"> Out</label>
                        <button type="submit" onclick="showRadio()">Submit</button>
                <!-- </div> -->
            </div>

            <div class="m-div">
                <select name="select-options" id="select_0ne">
                    <option>Option1</option>
                    <option>Option2</option>
                    <option>Option3</option>
                </select>

                <button type="submit" onclick="showSelection()">Submit</button>
                <svg width="100" height="100">
                    <circle cx="50" cy="50" r="50" stroke="black" fill="pink" /> 
                </svg>
                <i class="fa fa-user"></i>
            </div>
        </div>
       
    </div>

    <script src="js/rad.js"></script>
</body>
</html>