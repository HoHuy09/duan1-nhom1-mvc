function change(type, element) {

    var btn = document.getElementsByClassName('content__status-btn');
    for(var i = 0 ; i < btn.length; i++){
         btn[i].style.backgroundColor = '#eee';
         btn[i].style.color = '#000';
        
    }
    element.style.backgroundColor = '#E5101D';
    element.style.color = '#fff';
   
    switch(type){
        case 'trend':
            document.querySelector('.trend').style.display = 'block';
            document.querySelector('.new').style.display = 'none';
        break;
        case 'new':
            document.querySelector('.trend').style.display = 'none';
            document.querySelector('.new').style.display = 'block';
        break;
    }
  
}