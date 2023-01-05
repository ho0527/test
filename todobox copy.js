let todoeditblock=document.getElementsByTagName("div")
let button=document.getElementsByClassName("todobut")

for (let i = 0; i < button.length; i++) {
    button[i].disabled = true;
}

for (let i = 0; i < todoeditblock.length; i++) {
    todoeditblock[i].addEventListener('click', function () {
        let buttons = this.querySelectorAll(".todobut");
        for (let i = 0; i < button.length; i++) {
            button[i].disabled = true;
        }
        for (let j = 0; j < buttons.length; j++) {
            buttons[j].disabled = false;
        }
        console.log(todoeditblock[i]);
    })
}

setTimeout(function() {
  for (let i = 0; i < button.length; i++) {
    button[i].disabled = true;
  }
}, 10000);