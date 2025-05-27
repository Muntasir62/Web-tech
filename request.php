<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true)
{
  header ("refresh: 1; url = lab1.php");
  exit();
}
?>
<script>
  function validate_selection()
  {
    var checkbox = document.querySelectorAll('input[name="cities[]"]:checked');
      if (checkbox.length < 10) {
        alert('Please select at least 10 cities');
        return false;
    }
   
    return true;
  }
</script>
<link rel="stylesheet" href="Request.css">
<div class="header_btn">
  <a href='profile.php' class='request_profile_btn'> Profile </a>
 <a href='lab1.php' class='request_logout_btn'> Logout </a>
</div>
 <form id='request_form' action='showaqi.php' method='post' onsubmit= " return validate_selection()" >
  
 <h4>Available Cities</h4> <br>
 
  <div class='info'>
<div class='city_info'>
    <label for='kathmandu'> Kathmandu</label>
 <input type='checkbox' id='kathmandu' name='cities[]' value='Kathmandu'> <br>
 </div>

  <div class='city_info'>
   <label for='karachi'> Karachi</label>
 <input type='checkbox' id='karachi' name='cities[]' value='Karachi'> <br>
 </div>

 <div class='city_info'>
   <label for='wuhan'> Wuhan</label> 
   <input type='checkbox' id='wuhan' name='cities[]' value='Wuhan'> <br>

</div>
   <div class='city_info'>

   <label for='johannesburg'> Johannesburg</label>

 <input type='checkbox' id='johannesburg' name='cities[]' value='Johannesburg'> <br>

 </div>


   <div class='city_info'>

     <label for='busan'> Busan</label>

  <input type='checkbox' id='busan' name='cities[]' value='Busan'> <br>
 </div>


 <div class='city_info'>
    <label for='riyadh'> Riyadh </label>
  <input type='checkbox' id='riyadh' name='cities[]' value='Riyadh'> <br>
 </div>

 <div class='city_info'>
     <label for='osaka'> Osaka</label>
 <input type='checkbox' id='osaka' name='cities[]' value='Osaka'> <br>
 </div>


  <div class='city_info'>
     <label for='dubai'> Dubai</label>
 <input type='checkbox' id='dubai' name='cities[]' value='Dubai'> <br>
 </div>

   <div class='city_info'>
     <label for='shanghai'> Shanghai</label>

  <input type='checkbox' id='shanghai' name='cities[]' value='Shanghai'> <br>
 </div>
   <div class='city_info'>
     <label for='seoul'> Seoul</label>
  <input type='checkbox' id='seoul' name='cities[]' value='Seoul'> <br>
 </div>
   <div class='city_info'>
     <label for='manila'> Manila</label>
  <input type='checkbox' id='manila' name='cities[]' value='Manila'> <br>
 </div>

   <div class='city_info'>
     <label for='london'> London</label>
  <input type='checkbox' id='london' name='cities[]' value='London'> <br>
 </div>
   <div class='city_info'>

   <label for='kuala lumpur'> Kuala Lumpur </label>
 <input type='checkbox' id='kuala lumpur' name='cities[]' value='Kuala Lumpur'> <br>
 </div>

   <div class='city_info'>
     <label for='kiyoto'> Kiyoto</label>
  <input type='checkbox' id='kiyoto' name='cities[]' value='Kiyoto'> <br>
 </div>

   <div class='city_info'>
    <label for='jakarta'> Jakarta</label>
   <input type='checkbox' id='jakarta' name='cities[]' value='Jakarta'> <br>
 </div>

   <div class='city_info'>
     <label for='milan'> Milan</label>
  <input type='checkbox' id='milan' name='cities[]' value='Milan'> <br>
 </div>

   <div class='city_info'>
   <label for='belgrade'> Belgrade</label>
 <input type='checkbox' id='belgrade' name='cities[]' value='Belgrade'> <br>
 </div>
   <div class='city_info'>
   <label for='minneapolis'> Minneapolis</label>

  <input type='checkbox' id='minneapolis' name='cities[]' value='Minneapolis'> <br>

 </div>
   <div class='city_info'>

   <label for='tokyo'> Tokyo</label>
 <input type='checkbox' id='tokyo' name='cities[]' value='Tokyo'> <br>
 </div>
  <div class='city_info'>
     <label for='moscow'> Moscow</label>
  <input type='checkbox' id='moscow' name='cities[]' value='Moscow'> <br>

 </div>
 </div>
 
  <input type='submit' name='submit' value='Submit' >
  </form>
