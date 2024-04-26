const signInBtn=document.querySelector('#signIn')
const signUpBtn=document.querySelector('#signUp')
const container=document.querySelector('.container')
const container_signin=document.querySelector('#sign_in')
const container_signup=document.querySelector("#sign_up")
const signUp=document.querySelector('.signUp')
const signIn=document.querySelector('.signIn')
signUp.addEventListener('click',()=>{
    container_signin.classList.add("none")
    container_signup.classList.remove("none")

})
signIn.addEventListener('click',()=>{
    container_signin.classList.remove("none")
    container_signup.classList.add("none")

})
signInBtn.addEventListener("click",()=>{
    container.classList.remove("panel-active")
})
signUpBtn.addEventListener("click",()=>{
    container.classList.add("panel-active")
})

const forms = document.querySelectorAll('form');
forms.forEach((form) => {
    form.addEventListener('submit', function (event) {
        event.preventDefault(); // 阻止表单的默认提交行为

        const formData = new FormData(form);
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'login.php');
        xhr.onload = function () {
            if (xhr.status === 200) {
                const response = JSON.parse(xhr.responseText);
                const loginResult = response.loginResult;

                // 在 HTML 页面中进行显示
                if (loginResult === 2) {
                    alert('Email already registered.');
                } else if (loginResult === 3) {
                    alert('Wrong account password.');
                }
                else {
                    alert('Email not registered.');
                }
            }
    };
    xhr.send(formData);
    });
});