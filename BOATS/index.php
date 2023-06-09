<div id="zone_joystick"></div>

<script src="//yoannmoinet.github.io/nipplejs/javascripts/nipplejs.js"></script>

<script type="text/javascript">

var radius = 100;

var sampleJoystick = {
    mode: 'static',
    position: {
      left: '30%',
      top: '50%'
    },
    size: radius*2,
    color: 'black'
};

var joystick;
var position;
joystick = nipplejs.create(sampleJoystick);
joystick.on('start end', function(evt, data) {
  position = data;
}).on('move', function(evt, data) {
  position = data;
}).on('dir:up plain:up dir:left plain:left dir:down' +
      'plain:down dir:right plain:right',
      function(evt, data) {
  //position=data;
}
     ).on('pressure', function(evt, data) {
  position=data;
});
joystick.prepareEvent = function (evt) { if (evt.target.className == 'front' || evt.target.className == 'back') evt.preventDefault(); return evt.type.match(/^touch/) ? evt.changedTouches : evt; };

</script>



<div class="button" style="position:absolute;right:35%;top:30%">A</div>
<div class="button" style="position:absolute;right:25%;top:40%">B</div>

<style>
    .button {
  width: 100px;
  height: 100px;
  margin: 100px auto;
  border-radius: 100px;
  background-color: blue;
  text-align: center;
  line-height: 100px;
  font-size: 36px;
  color: white;
  
  .button:hover {
  transform: rotatex(20deg) translatey(8px);
  box-shadow: 0px 5px 0px rgba(0,0,0,.7);
  }
}
</style>