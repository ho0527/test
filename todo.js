let detail=document.getElementById("detail")
let title=document.getElementById("title")
let end=document.getElementById("end")
let start=document.getElementById("starttime")
let deal=document.getElementById("dealc")
let priority=document.getElementById("priorityc")
let uper=document.getElementById("uper")
let lower=document.getElementById("lower")

let user=document.getElementById("user-button")
let setting=document.getElementById("setting-button")
let loggout=document.getElementById("loggout-button")


setting.style.display="none"
loggout.style.display="none"

uper.style.display="inline"
lower.style.display="none"


user.onclick=function(){
    user.style.display="none"
    setting.style.display="inline"
    loggout.style.display="inline"
}

start.onclick=function(){
    if(start.value=="升冪"){
        start.value="降冪"
        deal.value="升冪"
        priority.value="升冪"
        uper.style.display="none"
        lower.style.display="inline"
        console.log(start)
    }else{
        start.value="升冪"
        deal.value="升冪"
        priority.value="升冪"
        uper.style.display="inline"
        lower.style.display="none"
        console.log(start)
    }
}

deal.onclick=function(){
    if(deal.value=="升冪"){
        deal.value="降冪"
        start.value="升冪"
        priority.value="升冪"
        console.log(deal)
    }else{
        deal.value="升冪"
        start.value="升冪"
        priority.value="升冪"
        console.log(deal)
    }
}

priority.onclick=function(){
    if(priority.value=="升冪"){
        priority.value="降冪"
        start.value="升冪"
        deal.value="升冪"
        console.log(priority)
    }else{
        priority.value="升冪"
        start.value="升冪"
        deal.value="升冪"
        console.log(priority)
    }
}