
//****************** VARIABLES ******************
var selectedWord = "";
var selectedHint = "";
var board = "";
var remainingGuesses = 6;
var rightWords = "";

var alphabet = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 
                'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 
                'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];

var words = [{ word: "snake", hint: "It's a reptile" }, 
             { word: "monkey", hint: "It's a mammal" }, 
             { word: "beetle", hint: "It's an insect" }];


//****************** LISTENERS ******************

// Start the game when the HTML page is loaded.
window.onload = startGame();

// When the replay button is displayed 
$(".replayBtn").on("click", function() {
    // Reloading page from cache.
    //document.location.reload();
    $('#lost').hide();
    $('#won').hide();
    remainingGuesses = 6;
    updateMan();
    board = "";
    selectedWord = "";
    selectedHint = "";
    $("#letters").empty();
    $("#letters").show();
    enableButton($("#hint"));
    $("#hint").show();
    startGame();
});



$("#letters").on("click", ".letter", function(){
    checkLetter($(this).attr("id"));
    disableButton($(this));
});


$("#hint").click(function() {
    $("#word").append("<span class='hint'>Hint: " + selectedHint + "</span>");
    disableButton($(this));
    remainingGuesses -= 1;
    updateMan();
});


function startGame() {
    pickWord();
    createLetters();
    initBoard();
    updateBoard();
}

function pickWord() {
    let randInt = Math.floor(Math.random() * words.length);
    selectedWord = words[randInt].word.toUpperCase();
    selectedHint = words[randInt].hint;
}

function createLetters() {
    for (var letter of alphabet) {
        $("#letters").append("<button class='btn btn-success letter' id='" + letter + "'>" + letter + "</button>");
    }
}

function initBoard() {
    for (var letter in selectedWord) {
        board += '_';
    }
}

function updateBoard() {
    $("#word").empty();
    
    for (var letter of board) {
        $("#word").append(letter);
        $("#word").append(' ');
    }
    
    $("#word").append("<br />");
}

// Update the word
function updateWord(positions, letter) {
    for (var pos of positions) {
        board = replaceAt(board, pos, letter)
    }
    updateBoard(board);
    if (!board.includes('_')) {
        endGame(true);
    }
}

function checkLetter(letter) {
    var positions = new Array();
    
    for (var i = 0; i < selectedWord.length; i++) {
        if (letter == selectedWord[i]) {
            positions.push(i);
        }
    }
    
    if (positions.length > 0) {
        updateWord(positions, letter);
    } else {
        remainingGuesses -= 1;
        updateMan();
        
        if(remainingGuesses == 1){
            disableButton($("#hint"));
        }
        if (remainingGuesses <= 0) {
            endGame(false);
        }
    }
}


function updateMan() {
    $("#hangImg").attr("src", "img/stick_" + (6 - remainingGuesses) + ".png");
}


function endGame(win) {
    $('#letters').hide();
    $('#hint').hide();
    
    if (win) {
        $('#won').show();
        rightWords = selectedWord;
        displayCorrectWords();
    } else {
        $('#lost').show();
    }
}

function displayCorrectWords(){
    $("#correctWord").append("<br>" + rightWords);
}

function disableButton(btn) {
    btn.prop("disabled", true);
    btn.attr("class", "btn btn-danger")
}

function enableButton(btn){
    btn.prop("disabled", false);
    btn.attr("class", "btn btn-success")
}

function replaceAt(str, index, value) {
    return str.substr(0, index) + value + str.substr(index + value.length);
}