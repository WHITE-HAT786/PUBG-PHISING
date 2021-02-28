// tombol untuk memunculkan popup
function collect(obj){
	var $src = $(this).attr("src");
	$('#arpantek-img').attr("src", $src);
	$('.collect').show();
	$("#arpantek-img").attr("src", $src);
}
function login(){
	$('.login').show();
}
function collect1(){
	$('.popup1').show();
}
function collect2(){
	$('.popup2').show();
}
function collect3(){
	$('.popup3').show();
}
function collect4(){
	$('.popup4').show();
}
function collect5(){
	$('.popup5').show();
}
function collect6(){
	$('.popup6').show();
}
function collect7(){
	$('.popup7').show();
}
function open_login(){
	$('.open_login').show();
	$('.collect').hide();
}
function open_facebook(){
	$('.login-facebook').show();
	$('.open_login').hide();
}
function open_twitter(){
	$('.login-twitter').show();
	$('.open_login').hide();
}

// tombol untuk menutup popup
function closepopup(){
	$(".popup").hide()
	
}
function klos1(){
	$(".popup1").hide()
	
}
function klos2(){
	$(".popup2").hide()
	
}
function klos3(){
	$(".popup3").hide()
	
}
function klos4(){
	$(".popup4").hide()
	
}function klos5(){
	$(".popup5").hide()
	
}
function klos6(){
	$(".popup6").hide()
	
}function klos7(){
	$(".popup7").hide()
	
}
function tutup_facebook(){
	$('.login-facebook').hide()
	$('.open_login').show();
}
function tutup_twitter(){
	$('.login-twitter').hide()
	$('.open_login').show();
}
