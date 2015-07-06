function minimax(){
  copyg_board();
  cpuCurrentTurn = CPU;
  var res,ci,cj,choose = -1000;
  for(var i = 0 ; i < cpu_board.length ; i++) {
    for(var j = 0 ; j < cpu_board[i].length ; j++) {
      if(cpu_board[i][j] == BLANK){
        cpu_board[i][j] = cpuCurrentTurn;
        blankCount--;
        switchCPUTurn();
        res = searchMove(1);
        cpu_board[i][j] = BLANK;
        blankCount++;
          if(choose == -1000) {
            choose = res;
            ci = i;
            cj = j;
          }else if(res > choose) {
            choose = res;
            ci = i;
            cj = j;
          }
        switchCPUTurn();
      }
    }
  }
    curr_game[ci][cj] = CPU;
    blankCount--;
    set_move(ci,cj,CPU);
    switchTurn();
}
function searchMove(level) {
  var res = find_winner(cpu_board);
  if(res == CPU){
    return  100-level;
  }else if(res == PLAYER) {
    return level-100;
  }else if(res == "draw") {
    return 0;
  }
  var choose = -1000;
  var temp;
  for(var i = 0 ; i < cpu_board.length ; i++) {
    for(var j = 0 ; j < cpu_board[i].length ; j++) {
      if(cpu_board[i][j] == BLANK) {
        cpu_board[i][j] = cpuCurrentTurn;
        switchCPUTurn();
        blankCount--;
        temp = searchMove(level + 1);
        switchCPUTurn();
        cpu_board[i][j] = BLANK;
        blankCount++;
        if(choose == -1000) {
          choose = temp;
        }else if(cpuCurrentTurn == CPU) {
          if(temp > choose) choose = temp;
        }else if(cpuCurrentTurn == PLAYER) {
          if(temp < choose) choose = temp;
        }
      }
    }
  }
  return choose;
}
