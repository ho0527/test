let username=sessionStorage.getItem("name")
let password=sessionStorage.getItem("password")
let usernameid=document.getElementById("username")//.value
let passwordid=document.getElementById("password")//.value
sessionStorage.setItem("name", usernameid)
sessionStorage.setItem("password", passwordid)
usernameid.value=username
passwordid.value=password
console.log(username)
console.log(password)


const drags=document.querySelectorAll('.dragimg')
const drops=document.querySelectorAll('#dropbox')
let a = []
let b = ["", "", ""]

drags.forEach(function(dragbox){
    dragbox.addEventListener('dragstart', dragStart)
})

drops.forEach(function(dropbox){
    dropbox.addEventListener('dragenter',dragEnter)
    dropbox.addEventListener('dragover',dragOver)
    dropbox.addEventListener('dragleave',dragLeave)
    dropbox.addEventListener('drop',drop)
})

function dragStart(e){
    e.dataTransfer.setData('text/plain',e.target.id)
    console.log(e.target.id)
}

function dragEnter(e){
    e.preventDefault()
    e.target.classList.add('drag-over')
}

function dragOver(e){
    e.preventDefault()
    e.target.classList.add('draga-over')
}

function dragLeave(e){
    e.preventDefault()
    e.target.classList.remove('drag-over')
}

function drop(e){
    e.preventDefault()
    e.target.classList.remove('drag-over') 
    const id=e.dataTransfer.getData('text/plain')
    const draggable=document.getElementById(id)
    a.push(id)
    console.log(id)
    console.log(a)
    e.target.appendChild(draggable)
}

function loginclick(key){
    console.log("A")
    for(i=0;i<3;i=i+1){
        b[i]=a[i]
    }
    if(key==0){
        b.sort()
        let tamp=b[0]
        b[0]=b[2]
        b[2]=tamp
        console.log(b);
        if(JSON.stringify(a)==JSON.stringify(b)){
            username=document.getElementById("username").value
            code=document.getElementById("code").value
            location.href='login.php?username='+username+"&code="+code
        }else{
            location.href='login.php?vererror=true'
        }
    }else{
        b.sort()
        console.log(b);
        if(JSON.stringify(a)==JSON.stringify(b)){
            username=document.getElementById("username").value
            code=document.getElementById("code").value
            location.href='login.php?username='+username+"&code="+code
        }else{
            location.href='login.php?vererror=true'
        }
    }
}
