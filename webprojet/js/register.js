var password=document.getElementById('password');
var x=1; // 1-> no error // 0-> error
function check(elem){
    if(elem.value.length >0){
        if(elem.value!=password.value){
            document.getElementById('alert').innerText="confirm password doesnt match";
            document.getElementById('alert').style.color="red";
            x=0;
        }else{
            document.getElementById('alert').innerText="";
            x=1;
        }
    }else{
        document.getElementById('alert').innerText="please enter confirm password";
        document.getElementById('alert').style.color="red";
        x=0;
    }
}
function validate(){
    if(x==1){
        return true;
    }else{
        return false;
    }
}
