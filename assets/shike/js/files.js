var result = document.getElementsByClassName("result")[0];
var input = document.getElementsByClassName("file_input")[0];
if(typeof FileReader==='undefined'){
    result.innerHTML = "抱歉，你的浏览器不支持 FileReader";
    input.setAttribute('disabled','disabled');
}else{
    input.addEventListener('change',readFile,false);
}

function readFile(){
    var file = this.files[0];
    if(!/image\/\w+/.test(file.type)){
        alert("文件必须为图片！");
        return false;
    }
    var reader = new FileReader();
    reader.readAsDataURL(file);
    reader.onload = function(e){
        result.innerHTML = '<img src="'+this.result+'" alt=""/>'
    }
}



