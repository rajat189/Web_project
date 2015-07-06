function init_curr() {
  curr_game = new Array(3);
  for(var i = 0 ; i < curr_game.length ; i++)
  {
    curr_game[i] = new Array(3);
    for(var j = 0 ; j < curr_game[i].length ; j++)
    {
        curr_game[i][j] = BLANK;
    }
  }
}
function init_cpu() {
  cpu_board = new Array(3);
  for(var i = 0 ; i < cpu_board.length ; i++) {
    cpu_board[i] = new Array(3);
  }
}
function set_move(row,col,turn) {
  var pos = row*3 + col;
  oCells[pos].innerHTML = turn;
}
function find_winner(g_board) {
  for(var i = 0 ; i < g_board.length ; i++) {
    if(g_board[i][0] == g_board[i][1] &&
      g_board[i][1] == g_board[i][2])
    {
      if(g_board[i][0] != BLANK){
        return g_board[i][0];
      }
    }
  }

  for(var j = 0 ; j < g_board[0].length ; j++) {
    if(g_board[0][j] == g_board[1][j] &&
      g_board[1][j] == g_board[2][j])
    {
      if(g_board[0][j] != BLANK) {
        return g_board[0][j];
      }
    }
  }

  if((g_board[0][0] == g_board[1][1] &&
    g_board[1][1] == g_board[2][2]) ||
    (g_board[0][2] == g_board[1][1] &&
    g_board[1][1] == g_board[2][0]))
  {
    if(g_board[1][1] != BLANK) {
      return g_board[1][1];
    }
  }

  if(blankCount == 0) {
    return "draw";
  }
  return "notend";
}
function copyg_board() {
  for(var i = 0 ; i < cpu_board.length ; i++) {
    for(var j = 0 ; j < cpu_board[i].length; j++) {
      cpu_board[i][j] = curr_game[i][j];
    }
  }
}
function reset(){
  blankCount = 9;
  clear();
  currentTurn = PLAYER;
  for(var i = 0 ; i < curr_game.length ; i++) {
    for(var j = 0 ; j < curr_game[i].length ; j++) {
      curr_game[i][j] = BLANK;
    }
  }
}
function clear() {
  oCells = document.getElementsByName("board");
  for(var i = 0 ; i < oCells.length ; i++) {
    oCells.item(i).innerHTML="";
  }
}