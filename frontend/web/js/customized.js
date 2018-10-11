printWords();
// button bindings
$('#learnBtn').click(function() {
  flip($(this));
  $('#aboutme').fadeIn();
});
$('#employmentBtn').click(function(e){
  flip($(this));
  $('.timeline').fadeIn(2500);
  $('.ordertimeitem').fadeIn(5000);
  $('.fixedbutton').fadeIn();
  $('#workBtn').fadeIn();
});
$('#workBtn').click(function() {
  flip($(this));
  $('#portfolio').fadeIn(2500);
});

// scroll animation
$('a[href*=\\#]:not([href=\\#])').click(function() {
  if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname) {
    var target = $(this.hash);
    target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
    if (target.length) {
      $('html,body').animate({
        scrollTop: target.offset().top
      }, 1000);
      return false;
    }
  }
});

// scrolling navbar events
$(window).scroll(function() {
  var scroll = $(window).scrollTop();
  if (scroll >= 680) {
    $("#navigator").removeClass("navbar-inverse");
    $("#navigator").addClass("navbar-default");
  } else {
    $("#navigator").addClass("navbar-inverse");
    $("#navigator").removeClass("navbar-default");
  }
});

Speak("Simon",
    "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",

function () {
    setTimeout(function () {
        Speak("Javascript", "Simon has finished speaking!");
    }, 2000);
});



function flip(param){
  $(param).toggleClass('sk-rotating-plane');
  setTimeout(function(){
    $(param).toggleClass('sk-rotating-plane');
  }, 3000);
}


var timer, fullText, currentOffset, onComplete, wordSet;

function Speak(person, text, callback) {
    $("#name").html(person);
    fullText = text;
    wordSet = text.split(" ");
    currentOffset = 0;
    onComplete = callback;
    timer = setInterval(onTick, 300);
}

function onTick() {
    currentOffset++;
    if (currentOffset == wordSet.length) {
        complete();
        return;
    }
    var text = "";
    for(var i = 0; i < currentOffset; i++){
     text += wordSet[i] + " ";
    }
    text.trim();
    $("#message").html(text);
}

function complete() {
    clearInterval(timer);
    timer = null;
    $("#message").html(fullText);
    if (onComplete) onComplete();
}

$(".box").click(function () {
    complete();
});

function printWords() {
    $('#slow-input-content').empty();

    // first
    textWorker("slow-input-content", 'I think,', 5000);

    // second
    textWorker("slow-input-content", 'I learn,', 11000);

    // third
    textWorker("slow-input-content", 'I improve,', 20000);

    // end
    setTimeout(function() {
        addTextIntoElement("slow-input-content", 'I Strive for Excellence.', 300);
    }, 40000);
}

function textWorker(id, text, delay) {
    setTimeout(function() {
        addTextIntoElement(id, text, 300);
    }, delay);
    setTimeout(function() {
        removeTextFromElement(id, text, 300);
    }, delay * 1.5);
}

function addTextIntoElement(elementId, content, interval) {
    var container = $('#' + elementId);
    var textArray = content.split("");
    var countNum = 0;
    textArray.forEach(function(element) {
        setTimeout(function() {
            container.append(element);
        }, interval * countNum++);
    });
}

function removeTextFromElement(elementId, content, interval) {
    var container = $('#' + elementId);
    var tempTextArray = content.split("");
    var countNum = 0;
    tempTextArray.forEach(function(element) {
        setTimeout(function() {
            tempTextArray.pop();
            var tempTex = tempTextArray.join();
            tempTex = tempTex.replace(/[,]/g, "");
            container.html(tempTex);
        }, interval * countNum++);
    });
}
