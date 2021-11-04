(function() { 
    // var fa_css = document.createElement('link'); 
    // fa_css.href = 'https://use.fontawesome.com/releases/v5.1.0/css/all.css'; 
    // fa_css.rel = 'stylesheet'; 
    // fa_css.type = 'text/css'; 
    // document.getElementsByTagName('head')[0].appendChild(fa_css); 

    // // var bs_css = document.createElement('link'); 
    // // bs_css.href = 'https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css'; 
    // // bs_css.rel = 'stylesheet'; 
    // // bs_css.type = 'text/css'; 
    // // document.getElementsByTagName('head')[0].appendChild(bs_css);

    // var bs_js = document.createElement('script'); 
    // bs_js.src = 'https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js'; 
    // document.getElementsByTagName('head')[0].appendChild(bs_js);
})();
window.addEventListener("load", function(){
    // Add height and width to images on load
    var images = document.getElementsByTagName('img');
    for(i = 0; i < images.length; i++) {
        if(!images[i].classList.contains('rio-except')){
            images[i].setAttribute('height', images[i].clientHeight);
            images[i].setAttribute('width', images[i].clientWidth);
        }
    }
});