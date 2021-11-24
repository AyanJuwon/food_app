const form = document.getElementById('form');
const name = document.getElementById('Name');
const email = document.getElementById('email');
const text = document.getElementById('text');
let asides = [...document.querySelectorAll('.slide-aside')]
let harmburger = document.querySelector('.nav-toggle');
     let body = document.querySelector('body');

harmburger.addEventListener('click',function(){
    let navbarNav = document.querySelector('.navbar-nav');
    let imgSrc = this.querySelector('img');

    //toggle show classes for elements
    body.classList.toggle('toggle')
    navbarNav.classList.toggle('show')
    
   
})

harmburger.addEventListener('click',()=>{
  navAlt.classList.toggle('slide-left');
  harmburger.classList.toggle('roll')
})

//show input error message
function showError(input,message){
  const formControl = input.parentElement;
  formControl.className = 'form-control error'
  const small = formControl.querySelector('small');
  small.innerText = message
}

//show success outline
function showSuccess(input) {
    const formControl = input.parentElement;
  formControl.className = 'form-control success'
}

//check email is valid
function isValidEmail(email){
    //use js email regExp
    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

//check required fields
function checkRequired(input){
  input.forEach(element => {
      if(element.value.trim() == ''){
          showError(element,`${getFieldName(element)} is required`)
      }else{
          showSuccess(element)
      }
  });
}
//Get fieldname and cap
function getFieldName(input){
    return input.id.charAt(0).toUpperCase() + input.id.slice(1);
}
//Event listeners refactored
form.addEventListener('click',function (e) {
    e.preventDefault();
    // instead of passing input one after the other,pass in an Array,
    // to automate the task at once
    checkRequired([name,email,text])
})
    AOS.init();