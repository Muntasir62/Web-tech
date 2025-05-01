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

function validatename()
{
  const name_error = document.getElementById('name_error');

  if (fullname.value =='')
    {
     name_error.innerHTML = 'Name must be filled out';
     
     
      return false;
    }
    const namePattern = /^[A-Za-z\s]+$/;
    if(!namePattern.test(fullname.value))
    {
      name_error.innerHTML ='Name must contain only alphabets';
      return false;
    }

    name_error.innerHTML ='';
    return true;

}

function validate_email()
{
  
  const email_error = document.getElementById('email_error');
  if (email.value =='')
    {
      
      email_error.innerHTML = 'Email must be filled out';
      return false;
    }
    const emailpattern = /^\d{2}-\d{5}-\d@student\.aiub\.edu$/;
    if (!emailpattern.test(email.value))
    {
      email_error.innerHTML = 'Invalid email';
      return false;
    }
    email_error.innerHTML ='';
    return true;
}

 function validatepass()
{
  const pass_error = document.getElementById('pass_error');
  const c_pass_error = document.getElementById('c_pass_error');
  let isvalid = true;

  if (password.value == '')
     {
    pass_error.innerHTML = 'Password must be filled out';
    isvalid = false;
 
  } 
  else if (password.value.length > 0 && password.value.length < 8) {
    pass_error.innerHTML = 'Password must be at least 8 characters long';
    isvalid = false;
  }
  else 
  {
    pass_error.innerHTML = '';
  }   
  if (c_password.value == '') 
    {
    c_pass_error.innerHTML = 'Please confirm your password';
    isvalid = false;
  } 
  else if (password.value != c_password.value)
     {
    c_pass_error.innerHTML = 'Passwords dont match';
    isvalid = false;
  } 
  else 
  {
    c_pass_error.innerHTML = '';
  }

  return isvalid
}
  
 

function validatedob()
{
  
   const dob_error = document.getElementById('dob_error');
  if (dob.value == '')
    {
     dob_error.innerHTML = 'Please enter the birth year';
     return false;
    }
     if ( 2025 - parseInt(dob.value) < 18)
     {
       dob_error.innerHTML = 'You must be over 18 to register';
       return false;
     }
     dob_error.innerHTML = '';
     return true;
}





function validate()
{
   
  const nameValid = validatename();
  const emailValid = validate_email();
  const passValid = validatepass();
  const dobValid = validatedob();    
  
  if (!nameValid || !emailValid || !passValid || !dobValid)
  {
    return false;
  }
   
  
    if (!male.checked && !female.checked)
    {
      alert('Please select a gender');
      return false;
    }

   if (!terms.checked)
   {
    alert('You must agree to terms and conditions');
    return false;
   }
    
  
   localStorage.setItem('fullname', fullname.value);
   localStorage.setItem('email', email.value);
   localStorage.setItem('password', password.value);
   localStorage.setItem('dob', dob.value);
   localStorage.setItem('country', country.value);
   localStorage.setItem('gender', male.checked ? 'Male' : 'Female');
   localStorage.setItem('color', color.value);
   localStorage.setItem('opinion', opinion.value);
   localStorage.setItem('terms', 'Accepted');

   alert('Registration successful');
 return true;

}