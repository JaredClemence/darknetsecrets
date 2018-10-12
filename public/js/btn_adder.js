function copyUrl() {
    let span = document.getElementById("referralUrl");
    
    if( document.body.createTextRange ){
        let range = document.body.createTextRange();
        range.moveToElementText(span);
    }else if(window.getSelection){
        let selection = window.getSelection();
        let range = document.createRange();
        range.selectNodeContents( span );
        selection.removeAllRanges();
        selection.addRange(range);
    }
    document.execCommand("copy");
    alert("Copied to Clipboard");
}

function addButton() {
    let btn = document.createElement("A");
    btn.setAttribute("href","#");
    btn.className = "btn btn-primary";
    btn.text = "Copy to Clipboard";
    btn.addEventListener('click', function ( event ) {
        event.stopPropagation();
        event.preventDefault();
        copyUrl();
        return false;
    });
    
    let newLine = document.createElement("BR");
    
    let target = document.getElementById("btn_drop");
    target.appendChild(newLine);
    target.appendChild(btn);
}

window.onload = function(){
    if( document.body.createTextRange || window.getSelection ){
        addButton();
    }
};