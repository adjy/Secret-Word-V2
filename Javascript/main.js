
function input(){
    let imp = document.getElementsByClassName('mot');
    console.log(imp.length);
    imp[0].focus();

    for(let i=0; i< imp.length; i++){
        imp[i].addEventListener('keyup', function (event){
            console.log(event)
            if(i !== imp.length - 1)
                imp[i+1].focus();

        })
    }

}
document.addEventListener('DOMContentLoaded',function (){
    input();
})