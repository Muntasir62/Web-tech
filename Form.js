const fullname = document.getElementById('fullname');
const email = document.getElementById('email');
const password = document.getElementById('password');
const c_password = document.getElementById('c_password');
const dob = document.getElementById('dob');
const country = document.getElementById('country');
const male = document.getElementById('male');
const female = document.getElementById('female');
const color = document.getElementById('color');
const opinion = document.getElementById('opinion');
const terms = document.getElementById('terms');




function validate()
{
   
        
  
  if (fullname.value =='')
    {
      alert('Name must be filled out');
      return;
    }
    if (email.value =='')
    {
      alert('Email must be filled out');
      return;
    }
    const emailpattern = /^\d{2}-\d{5}-\d@student\.aiub\.edu$/;
    if (!emailpattern.test(email.value))
    {
      alert('Invalid email');
      return;
    }
    if (password.value =='' || c_password.value == '')
      {
        alert('Password must be filled out');
        return;
      }    
    if (password.value!== c_password.value)
    {
        
         alert('Password dont match');
         return;
    }
   if (dob.value == '')
   {
    alert('Please enter the birth year');
    return;
   }
    if ( 2025 - parseInt(dob.value) < 18)
    {
      alert('You must be over 18 to register');
      return;
    }
    if (!male.checked && !female.checked)
    {
      alert('Please select a gender');
      return;
    }
   if (!terms.checked)
   {
    alert('You must agree to terms and conditions');
    return;
   }
    
  
   localStorage.setItem('fullname', fullname.value);
   localStorage.setItem('email', email.value);
   localStorage.setItem('password', password.value);
   localStorage.setItem('dob', dob.value);
   localStorage.setItem('country', country.value);
   localStorage.setItem('gender', male.checked ? 'Male' : 'Female');
   localStorage.setItem('color', color.value);
   localStorage.setItem('opinion', opinion.value);
   localStorage.setItem('terms', 'accepted');

   alert('Registration successful');


}