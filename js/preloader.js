document.onreadystatechange = function () {
    if (document.readyState === "complete") {
      setTimeout(function() {
        var preloader = document.getElementById("preloader");
        preloader.style.animation = "fadeOut 1s ease-in-out forwards";
  
        setTimeout(function() {
          preloader.parentNode.removeChild(preloader);
        }, 1000);
      }, 1000); 
    }
  };
  