
document.addEventListener('DOMContentLoaded', function(){
    var btn_search=document.getElementById('btn_search');
    var form_search=document.getElementById('form_search');
    if(btn_search){
        btn_search.addEventListener('click', function(e){
            e.preventDefault();
            form_search.style.display='block';
        });
    }
});