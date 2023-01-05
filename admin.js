let num=document.getElementById("num-up-down")
let user=document.getElementById("user-up-down")
let pass=document.getElementById("code-up-down")
let uname=document.getElementById("name-up-down")

num.value="升冪"
user.value="升冪"
pass.value="升冪"
uname.value="升冪"

function updateButton(button){
    num.value="升冪"
    user.value="升冪"
    pass.value="升冪"
    uname.value="升冪"
    if(button.value=="升冪"){
        button.value="降冪"
    }
    console.log(button)
}

num.onclick=function(){
    updateButton(num)
}

user.onclick=function(){
    updateButton(user)
}

pass.onclick=function(){
    updateButton(pass)
}

uname.onclick=function(){
    updateButton(uname)
}

function submitbut(){
    console.log(user.value)
    location.href="adminWelcome.php?up_down=&num-up-down="+num.value+"&user-up-down="+user.value+"&code-up-down="+pass.value+"&name-up-down="+uname.value
}