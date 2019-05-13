function open(){
    checkbox = document.querySelector('.checkbox');
     openbox =document.getElementById("checkbtn");
    openbox.addEventListener('click',function () {
            checkbox.style.display = "block";
    });
}
function close() {
    var x = document.getElementById('close');
    x.addEventListener('click',function () {
        checkbox.style.display = "none";
    });
}
function formsubmit() {
    document.getElementById('form').submit();
    alert("更新成功");
}
function  doFirst() {
close();
open();
}
window.onload = doFirst;