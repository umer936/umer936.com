<script type="text/javascript" src="http://jqueryjs.googlecode.com/files/jquery-1.3.js"></script>
<style type="text/css">
    input[type=text]{
        width:25%;
        padding:10px;
        outline:none;
        font-family: Prosto One, Economica, Droid Sans, serif;
    }
    .focusField{
        border:solid 2px #73A6FF;
        background:#EFF5FF;
        color:#000;
    }
    .idleField{
        background:#EEE;
        color: #6F6F6F;
        border: solid 2px #DFDFDF;
    }
</style>
<script>
$(document).ready(function() {
    $('input[type="text"]').addClass("idleField");
	$('input[type="text"]').focus(function() {
		$(this).removeClass("idleField").addClass("focusField");
        if (this.value == this.defaultValue){
        	this.value = '';
    	}
        if(this.value != this.defaultValue){
	    	this.select();
        }
    });
    $('input[type="text"]').blur(function() {
    	$(this).removeClass("focusField").addClass("idleField");
        if ($.trim(this.value == '')){
        	this.value = (this.defaultValue ? this.defaultValue : '');
    	}
    });
});</script>	