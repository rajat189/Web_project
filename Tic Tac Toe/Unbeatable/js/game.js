var PLAYER = "O";
var CPU = "X";
var BLANK = "_";
var ONEPLAYER = true;
var currentTurn = PLAYER;
var curr_game;
var blankCount = 9;
var oCells;
var cpu_board;
var cpuCurrentTurn;
init_curr();
init_cpu();
clear();
function doHumanTurn(sender,row,col) {
  if(curr_game[row][col] != BLANK) {
    alert("Invalid move!");
    return;
  }
  sender.innerHTML = currentTurn;
  curr_game[row][col] = currentTurn;
  blankCount--;

  checkWinner();

  switchTurn();
}
function doComputerTurn() {
  minimax();

  checkWinner();
}
function checkWinner() {
  var winner = find_winner(curr_game);
  if(winner != "notend"){
    if(winner == "draw"){
      alert("Draw!");
    }else{
      alert("Winner is " + winner + " !!!");
    }
    reset();
    return;
  }
}
function switchTurn() {
  if(currentTurn == PLAYER){
    currentTurn = CPU;
    doComputerTurn();
  }else{
    currentTurn = PLAYER;
  }
}
function switchCPUTurn() {
  if(cpuCurrentTurn == CPU)
    cpuCurrentTurn = PLAYER;
  else
    cpuCurrentTurn = CPU;
}