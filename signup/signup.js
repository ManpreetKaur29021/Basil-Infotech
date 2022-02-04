var click="business";
$(document).ready(function(){
    $(".consumer").click(function(){
      $(".consumer").addClass("yellow");
      $(".business").removeClass("yellow");
      $(".change").text("Sign up with Merchant")
      click="consumer";
      
    });
  });
  $(document).ready(function(){
    $(".business").click(function(){
      $(".business").addClass("yellow");
      $(".consumer").removeClass("yellow");
      $(".change").text("Sign up with Business")
    });
    click="business";
  });  
  
  $(".required").hide();
  $(".google").click(function(){
      $(".right").addClass("invisible");
      $(".right-3").removeClass("invisible")

  })
  $(".btn").click(function(){
  var val=$("#EMAIL").val();

  var password=$("#PASSWORD").val();
  if(val.length <= 0 && password.length <= 0){
    $(".PASSWORD").show();
    $(".EMAIL").show();
  }
  else if (val === undefined || val == null || val.length <= 0){
    $(".EMAIL").show();
    $(".PASSWORD").hide();
  }else if(password === undefined || password == null || password.length <= 0){
    $(".PASSWORD").show();
    $(".EMAIL").hide();
  }
  else {
    $(".right").addClass("invisible");
    $(".right-3").removeClass("invisible")
  }
})
$(".adjust-back").click(function(){
  $(".required").hide();
  $(".right-3").addClass("invisible");
  $(".right").removeClass("invisible")
})


$(".adjust-next").click(function(){

  var name=$("#NAME").val();
  var cno=$("#CNO").val();
  if(name.length <= 0 && cno.length <= 0){
    $(".NAME").show();
    $(".CNO").show();
  }
  else if (name === undefined || name == null || name.length <= 0){
    $(".NAME").show();
    $(".CNO").hide();
  }else if(cno === undefined || cno == null || cno.length <= 0){
    $(".CNO").show();
    $(".NAME").hide();
  }
  else {
    $(".right").addClass("invisible");
    $(".right-3").addClass("invisible");
    $(".right-2").removeClass("invisible")
  }
})



$(".back-button").click(function(){
  $(".required").hide();
  $(".right-2").addClass("invisible");
  $(".right").addClass("invisible");
  $(".right-3").removeClass("invisible")
})
$(".next-button").click(function(){
  $(".right").addClass("invisible");
  $(".right-2").addClass("invisible");
  $(".right-3").addClass("invisible");

})









$("#1").click(function(){
  $(".checkbox-icon").removeClass("check");
  $("#1").children(".checkbox-icon").addClass("check")
})
$("#2").click(function(){
  $(".checkbox-icon").removeClass("check");
  $("#2").children(".checkbox-icon").addClass("check")
})
$("#3").click(function(){
  $(".checkbox-icon").removeClass("check");
  $("#3").children(".checkbox-icon").addClass("check")
})
$("#4").click(function(){
  $(".checkbox-icon").removeClass("check");
  $("#4").children(".checkbox-icon").addClass("check")
})
$("#5").click(function(){
  $(".checkbox-icon").removeClass("check");
  $("#5").children(".checkbox-icon").addClass("check")
})
$("#6").click(function(){
  $(".checkbox-icon").removeClass("check");
  $("#6").children(".checkbox-icon").addClass("check")
})
$("#7").click(function(){
  $(".checkbox-icon").removeClass("check");
  $("#7").children(".checkbox-icon").addClass("check")
})
$("#8").click(function(){
  $(".checkbox-icon").removeClass("check");
  $("#8").children(".checkbox-icon").addClass("check")
})


