<html>
<style>
    .about{
        text-align: left;
        font-family: "Roboto", sans serif;
        font-size: 12pt;
        padding: 20px;
    }
</style>
<?php
require_once "headerFoot.php";
pageHeader("About");
logIn();

echo "<div class='about'>
<p>
This is a mock pizza storefront for Internet Programming 3610. <br>
You cannot actually buy pizza here, nor is any information you put in secure, so be careful.
</p>
<p>
<h4>Introduction</h4>
In this project you will employ the PHP, Database, CSS, and HTML,  skills you have learned to build Pizza store. Your goal is to produce an attractive, functional, and maintainable system.  <br>
This course has taught you the basics of web programming and how to refer to documentation when necessary. However, some features of the project will require you to access additional information to complete the requirements.

</p>
<p>
<ul>Requirements:
<li>Index page: This page is the index page for your web site. It mainly provides a menu using images for the pizza store. It has some navigations for check out, store location, the other information.</li>
<li>Shopping Cart: The page shows the items in the shopping cart.</li>
<li>Checkout page: This page  is displayed when the user hits Check Out menu.  It provides a form to let the user input credit card info, and address. Please use PHP to validate user input, including telephone number, email address, and credit card number (all must be filled, at least).  If the inputs are not valid, do not place the order in the data base! You then ask the user to enter the information again. The page should have  at  least two buttons Place Order, and Cancel.</li>
<li>Place Order: The page sends items to database, and then updates the tables  in the database, and then clear the cart.</li>
<li>Summary page: This page displays a summary the orders in a day.
<ul>It includes:
<li>How many pizzas are sold out for a particular day.</li>
<li>The total revenue for a particular day. </li>
</ul>
</li>
<li>Signup: Create an account, and store the information into the database.</li>
<li>Log in/Logout: After the user login, he/she should see an on screen indicator that they are logged in. The user remain logged in even after closing their browser and re opening it, assuming cookies are enabled (Hint: use cookies with expires and/or max age tags)</li>
<li>The user is not  allowed to log in again until they have logged out.</li>
</ul>
</p>
</div>";


?>