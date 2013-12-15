
<script type="text/javascript" src="/js/jquery-1.10.2.min.js"></script>
<script type="text/javascript">
	function updateClock() {
	  $('.clock').show();
	  var currentTime = new Date();
	  var gtmStatus = 'AM';
	  
	  var hours = currentTime.getHours();
	  if (hours > 12){
	    hours = hours-12;
	    gtmStatus = 'PM';
	  }

	  var minutes = currentTime.getMinutes();
	  var seconds = currentTime.getSeconds();
	  
	  var degree_seconds = -90 + (seconds * 6);
	  var degree_minute = -90 + (minutes * 6);
	  var degree_hour =  -90 + (hours * 30);
	  degree_hour = degree_hour + (0.5 * minutes);

	  $('#time').html(hours + ':' + minutes + ':' + seconds + ' ' + gtmStatus);
	  $('.hour').css('-webkit-transform','rotate('+degree_hour+'deg)');  
	  $('.minute').css('-webkit-transform','rotate('+degree_minute+'deg)');
	  $('.second').css('-webkit-transform','rotate('+degree_seconds+'deg)');
	}

	setInterval(updateClock, 1000);
	updateClock();
</script>
<style type="text/css">
.clock {
  width: 160px;
  height: 160px;
  position: relative;
  top: 50%;
  /*left: 50%;*/
  /*margin-left: -80px;
  margin-top: -80px;*/
  background: #eee;
  display: none;
  -webkit-border-radius: 80px;
  -moz-border-radius: 80px;
  -ms-border-radius: 80px;
  -o-border-radius: 80px;
  border-radius: 80px;
  -webkit-box-shadow: 0 3px 0px #dddddd;
  -moz-box-shadow: 0 3px 0px #dddddd;
  box-shadow: 0 3px 0px #dddddd;
  -webkit-backface-visibility: hidden;
}
.clock:after {
  content: "";
  width: 4%;
  height: 4%;
  background: #aaa;
  position: absolute;
  top: 50%;
  left: 50%;
  margin: -2% 0 0 -2%;
  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  -ms-border-radius: 50%;
  -o-border-radius: 50%;
  border-radius: 50%;
  -webkit-box-shadow: 0 1px 1px #444444, inset 0 1px 1px white;
  -moz-box-shadow: 0 1px 1px #444444, inset 0 1px 1px white;
  box-shadow: 0 1px 1px #444444, inset 0 1px 1px white;
}

.second, .minute, .hour {
  position: absolute;
  top: 50%;
  -webkit-transform: rotate(-90deg);
}
.second:after, .minute:after, .hour:after {
  content: "";
  width: 50%;
  height: 100%;
  background: #555;
  position: absolute;
  left: 50%;
  top: 0;
  -webkit-border-radius: 3px;
  -moz-border-radius: 3px;
  -ms-border-radius: 3px;
  -o-border-radius: 3px;
  border-radius: 3px;
}

.second {
  height: 1px;
  margin-top: -1px;
  width: 90%;
  left: 5%;
}
.second:after {
  background: #d00;
}

.minute {
  height: 3px;
  margin-top: -2px;
  width: 76%;
  left: 12%;
}

.hour {
  height: 5px;
  margin-top: -3px;
  width: 60%;
  left: 20%;
}
#time {
  width: 60px;
  font-size: 9px;
  font-family: helvetica;
  text-align: right;
  color:rgb(60,145,250);
  position: absolute;
  top: 48%;
  left:54%;
}
</style>
<div id="side">
<div class='clock'>
	<div id='time'></div>
	<div class='second'></div>
	<div class='hour'></div>
	<div class='minute'></div>
</div>
</div>
