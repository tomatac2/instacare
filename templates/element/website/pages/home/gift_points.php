<div ng-app="popUp" ng-controller="mainCtrl" style="pointer-events: all !important">

  <button id="pop-up-btn" ng-click="openPopUp()">  
    مكافأت انستاكير
    <i class="fa fa-gift" style="-webkit-transform: rotate(180deg) !important; padding: 5px;"></i>
  </button>

  <div id="pop-up">
    <div class="popheader">
    <h3>
    مكافأت انستاكير 
    <i class="fa fa-gift" ></i>
    </h3>
    </div>
    <div class="content-wrap">
    
       <div class="icon-close" ng-click="closePopUp()">x</div>
      
       <div id="resGifts"></div> 
    </div>
  </div>
  <div id="pop-up-bg" style="z-index: 9999999999999999999999999999;"></div>

</div>


<style>
 
.popheader{
  height: 50px;
    background: #0a9a73;
    padding: 0;
    margin: 0;
}
.popheader>h3{
  text-align: center;
    padding-top: 20px;
    font-weight: 400;
    color: #ffffff;
}
button.pop-up-open {
  cursor: auto;
}


/*---------------------------------------------------------*/


/*------------------ Pop Up Animation ---------------------*/


/*---------------------------------------------------------*/

#pop-up {
  z-index: 9999999999999999999999999999;
  visibility: hidden;
  position: fixed;
  z-index: 49;
  margin: 0;
  display: none;
  background:  rgb(255 255 255);
  color: black;
  font-size: 14px;
  text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.46);
  border-radius: 5px;
  -webkit-transition: opacity 0.3s 0.5s, width 0.4s 0.1s, height 0.4s 0.1s, top 0.4s 0.1s, left 0.4s 0.1s, margin 0.4s 0.1s;
  transition: opacity 0.3s 0.5s, width 0.4s 0.1s, height 0.4s 0.1s, top 0.4s 0.1s, left 0.4s 0.1s, margin 0.4s 0.1s;
}

#pop-up .content-wrap {
  opacity: 0;
  -webkit-transition: opacity 0.5s;
  transition: opacity 0.5s;
}

#pop-up-bg:before {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: 99;
  background: rgba(226, 226, 226, 0.7);
  content: '';
  opacity: 0;
  -webkit-transition: opacity 0.5s;
  transition: opacity 0.5s;
  pointer-events: none;
}

#pop-up.pop-up-open {
  z-index: 9999999999999999999999999999 !important;
  visibility: visible;
  z-index: 100;
  top: 50% !important;
  left: 50% !important;
  width: 350px !important;
  height: 350px !important;
  margin: -100px 0 0 -175px;
  -webkit-transition: width 0.4s 0.1s, height 0.4s 0.1s, top 0.4s 0.1s, left 0.4s 0.1s, margin 0.4s 0.1s;
  transition: width 0.4s 0.1s, height 0.4s 0.1s, top 0.4s 0.1s, left 0.4s 0.1s, margin 0.4s 0.1s;
}

#pop-up-bg.pop-up-open::before {
  opacity: 1;
}

#pop-up .icon-close {
  color: #f7f7f7;
    width: 20px;
    height: 20px;
    border-radius: 18%;
    text-align: center;
    font-size: 14px;
    cursor: pointer;
    position: absolute;
    background: #ddcccc52;
    top: 10px;
    right: 10px;
}

#pop-up .icon-close:hover {
  color: #fff;
}

#pop-up .date {
  margin-bottom: 10px;
  font-size: 18px;
}

#pop-up .day-forecast .temp {
  float: left;
  width: 25%;
  text-align: center;
}

#pop-up .day-forecast .temp .title {
  font-weight: 700;
  margin: 10px 0;
}

#pop-up .icon,
#pop-up .description {
  float: left;
}

#pop-up .description {
  line-height: 45px;
  color: rgba(255, 255, 255, 0.66);
}

#pop-up-btn{
    writing-mode: vertical-rl;
    position: fixed;
    left: 0;
    top: 50%;
    z-index: 999999999999999999999999;
    -webkit-transform: rotate(180deg);
    border: 0;
    padding: 10px 10px;
    color: white;
    background: rgb(10 154 115);
    cursor: pointer;
    font-size: 16px;
    outline: none;
}



.list-count{
    text-align: center;
    font-size: large;
    font-weight: 200;
    padding-bottom: 10px;
    margin: 0;
    background: #0a9a73;
    color: gold;}

.session-container>li{background: #0a9a730d;
  box-shadow: 0px 0px 13px 0px #0000001c;
    border: 1px solid #ddd;
    margin-top: 5px;
    padding: 5px;
}
.search-input {
  padding: 5px;
  margin: 10px 0;
}

.session-container {
  margin: 5px;
  padding: 10px;
  border-radius: 4px;
  cursor: pointer;
  overflow-y: overlay;
  height: 250px;

  /* &:hover {
    background-color: lightgray;
  } */
}
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.2.20/angular.min.js"></script>
<script>
    		var popUp = angular.module('popUp', [])
		  .controller('mainCtrl', function($scope, $timeout) {

		    $scope.openPopUp = function() {

		      var buttonElement = document.querySelector('#pop-up-btn');
		      var popUpElement = document.querySelector('#pop-up');

		      popUpElement.style.width = buttonElement.offsetWidth + 'px';
		      popUpElement.style.height = buttonElement.offsetHeight + 'px';
		      popUpElement.style.top = buttonElement.getBoundingClientRect().top + 'px';
		      popUpElement.style.left = buttonElement.getBoundingClientRect().left + 'px';
		      popUpElement.style.display = "block";

		      buttonElement.style.visibility = "hidden";

		      $timeout(function() {
		        angular.element(buttonElement).toggleClass('pop-up-open');
		        angular.element(popUpElement).toggleClass('pop-up-open');
		        angular.element(document.querySelector('#pop-up-bg')).toggleClass('pop-up-open');
		      });

		      $timeout(function() {
		        popUpElement.querySelector('.content-wrap').style.opacity = 1;
		      }, 300);
		    }

		    $scope.closePopUp = function() {
		      var buttonElement = document.querySelector('#pop-up-btn');
		      var popUpElement = document.querySelector('#pop-up');

		      popUpElement.querySelector('.content-wrap').style.opacity = 0;

		      popUpElement.style.visibility = "visible";
		      popUpElement.style.padding = "0";

		      angular.element(buttonElement).toggleClass('pop-up-open');
		      angular.element(popUpElement).toggleClass('pop-up-open');
		      angular.element(document.querySelector('#pop-up-bg')).toggleClass('pop-up-open');

		      $timeout(function() {
		        buttonElement.style.visibility = "visible";
		        popUpElement.removeAttribute("style");
		      }, 500);
		    }

		  })
</script>


<script>
  $(function(){
    
    $.ajax({
          url: '<?=URL?>gifts/get-gifts' , 
          type: 'GET',
          cache: false,
          headers: {
              'X-CSRF-Token': "<?=$this->request->getAttribute('csrfToken')?>"
          },
          success: function(res) {
            //var resGifts = $.parseJSON(res) ; 
            $("#resGifts").html(res);
             //   console.log($.parseJSON(res));
          }
    });

    $("#pop-up-btn").click(function(){
      $("header").css("pointer-events","none");
      $("body").css("pointer-events","none");
    })
    $(".icon-close").click(function(){
      $("header").css("pointer-events","all");
      $("body").css("pointer-events","all");
    })
  })
</script>