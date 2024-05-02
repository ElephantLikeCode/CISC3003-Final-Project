const popup = document.querySelector(".popup"),
    close = popup.querySelector(".close");



close.onclick = ()=>{
    popup.classList.remove("show");
    document.getElementById("popup-overlay").classList.add("none");
    document.body.style.overflow = "auto";

}

function showup(message){
    const message_result=document.getElementById("result");
    message_result.textContent=message;
    popup.classList.toggle("show");
    document.getElementById("popup-overlay").classList.remove("none");
    document.body.style.overflow = "hidden";
}
//弹窗显示


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
//上面的是为注册和登录之间的切换提供动效

function validateEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}//判断邮箱格式

const code="";

const forms = document.querySelectorAll('form');
forms.forEach((form) => {
    form.addEventListener('submit', function (event) {
        event.preventDefault(); // 阻止表单的默认提交行为

        const clickedButton = event.target.querySelector('button[type="submit"]:focus');




        if (clickedButton.id==="send"||clickedButton.id==="send1") {
            const formData = new FormData(form);
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'test.php');
            xhr.onload = function () {
                if (xhr.status === 200){
                    clickedButton.disabled = true; // 禁用按钮
                    clickedButton.classList.add('disabled'); // 添加 disabled 类，改变按钮样式

                    var count = 60; // 倒计时时间（秒）
                    clickedButton.innerHTML = count + 's'; // 显示初始倒计时时间

                    var timer = setInterval(function() {
                        count--;
                        clickedButton.innerHTML = count + 's'; // 更新倒计时时间

                        if (count <= 0) {
                            clearInterval(timer); // 倒计时结束，清除计时器
                            clickedButton.disabled = false; // 启用按钮
                            clickedButton.classList.remove('disabled'); // 移除 disabled 类，恢复按钮样式
                            clickedButton.innerHTML = 'send'; // 恢复按钮文字
                        }
                    }, 1000);
                }
            };
            xhr.send(formData);
        }else{
            const formData = new FormData(form);
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'login.php');
            xhr.onload = function () {
                if (xhr.status === 200) {
                    const response = JSON.parse(xhr.responseText);
                    const loginResult = response.loginResult;

                    // 在 HTML 页面中进行显示
                    if (loginResult === 2) {
                        showup('Email already registered.');
                    } else if (loginResult === 3) {
                        showup('Wrong account password.');
                    }else if (loginResult===0){
                        showup('Input cannot be empty.');
                    }
                    else if (loginResult===6){
                        showup('Email format error.');
                    }
                    else if (loginResult===7){
                        showup('Wrong verification code.');
                    }
                    else if (loginResult === 1) {
                        window.location.href = 'index.php';
                    }
                    else if (loginResult === 5) {
                        window.location.href = 'index.php';
                    }
                    else {
                        showup('Email not registered.');
                    }
                }
            };
            xhr.send(formData);
        }

    });
});

