var click="business";
$(document).ready(function(){
    $(".consumer").click(function(){
      $(".consumer").addClass("yellow");
      $(".business").removeClass("yellow");
      $(".change").text("Sign up with Consumer")
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
  
$(".btn").click(function(){
  $(".right").addClass("invisible");
  $(".right-2").removeClass("invisible")
})
$(".back-button").click(function(){
  $(".right-2").addClass("invisible");
  $(".right").removeClass("invisible")
})
$(".next-button").click(function(){
  $(".right-2").addClass("invisible");
  $(".right").removeClass("invisible")
})
$(".next-button").click(function(){
  $(".right").addClass("invisible");
  $(".right-2").addClass("invisible");
  $(".right-3").removeClass("invisible")
  
})
$(".adjust-back").click(function(){
  $(".right").addClass("invisible");
  $(".right-3").addClass("invisible");
  $(".right-4").addClass("invisible");
  $(".right-2").removeClass("invisible")
})
$(".adjust-next").click(function(){
  $(".right").addClass("invisible");
  $(".right-3").addClass("invisible");
  $(".right-2").addClass("invisible");
  $(".right-4").removeClass("invisible")
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

