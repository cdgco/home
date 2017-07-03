<style>
.loader{
	margin:200px auto;
}
h1{
	font-family: 'Actor', sans-serif;
	color:#000;
	font-size:16px;
	letter-spacing:1px;
	font-weight:200;
	text-align:center;
}
.loader span{
	width:16px;
	height:16px;
	border-radius:50%;
	display:inline-block;
	position:absolute;
	left:50%;
	margin-left:-10px;
	-webkit-animation:3s infinite linear;
	-moz-animation:3s infinite linear;
	-o-animation:3s infinite linear;
	
}


.loader span:nth-child(2){
	background:#E84C3D;
	-webkit-animation:kiri 1.2s infinite linear;
	-moz-animation:kiri 1.2s infinite linear;
	-o-animation:kiri 1.2s infinite linear;
	
}
.loader span:nth-child(3){
	background:#F1C40F;
	z-index:100;
}
.loader span:nth-child(4){
	background:#2FCC71;
	-webkit-animation:kanan 1.2s infinite linear;
	-moz-animation:kanan 1.2s infinite linear;
	-o-animation:kanan 1.2s infinite linear;
}


@-webkit-keyframes kanan {
    0% {-webkit-transform:translateX(20px);
    }
   
	50%{-webkit-transform:translateX(-20px);
	}
	
	100%{-webkit-transform:translateX(20px);
	z-index:200;
	}
}
@-moz-keyframes kanan {
    0% {-moz-transform:translateX(20px);
    }
   
	50%{-moz-transform:translateX(-20px);
	}
	
	100%{-moz-transform:translateX(20px);
	z-index:200;
	}
}
@-o-keyframes kanan {
    0% {-o-transform:translateX(20px);
    }
   
	50%{-o-transform:translateX(-20px);
	}
	
	100%{-o-transform:translateX(20px);
	z-index:200;
	}
}




@-webkit-keyframes kiri {
     0% {-webkit-transform:translateX(-20px);
	z-index:200;
    }
	50%{-webkit-transform:translateX(20px);
	}
	100%{-webkit-transform:translateX(-20px);
	}
}

@-moz-keyframes kiri {
     0% {-moz-transform:translateX(-20px);
	z-index:200;
    }
	50%{-moz-transform:translateX(20px);
	}
	100%{-moz-transform:translateX(-20px);
	}
}
@-o-keyframes kiri {
     0% {-o-transform:translateX(-20px);
	z-index:200;
    }
	50%{-o-transform:translateX(20px);
	}
	100%{-o-transform:translateX(-20px);
	}
}
</style>
<div class="loader">
    <h1>LOADING</h1>
    <span></span>
    <span></span>
    <span></span>
</div>
<form action="<?php echo DIR ?>auth2.php" name="tokenform" method="post">
<input name="token" type="text" style="display:none;" id="hiddeninput"></input><br>
</form>

<script>
var hash1 = location.hash.substring(1).replace('&token_type=Bearer&expires_in','');
var hash2 = hash1.replace('access_token=','');
document.getElementById('hiddeninput').value = hash2;

window.onload = function(){
  document.forms['tokenform'].submit()

}
</script>
</html>