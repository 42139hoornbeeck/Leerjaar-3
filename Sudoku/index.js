function possible(board, y, x, n) {
  for (let i = 0; i < 9; i++) {
    if (board[y][i] === n || board[i][x] === n) {
      return false;
    }
  }

  const xSquare = Math.floor(x / 3) * 3;
  const ySquare = Math.floor(y / 3) * 3;

  for (let i = 0; i < 3; i++) {
    for (let j = 0; j < 3; j++) {
      if (board[ySquare+i][xSquare+j] === n) {
        return false;
      }
    }
  }

  return true;
}

function solve(board) {
  for (let y = 0; y < 9; y++) {
    for (let x = 0; x < 9; x++) {
      if (board[y][x] === 0) {
        for (let n = 1; n <= 9; n++) {
          if (possible(board, y, x, n)) {
            board[y][x] = n;
            
            if (solve(board)) return board;
          }
        }
        
        board[y][x] = 0;
        return false;
      }
    }
  }
  
  return board;
}

const string = "004071090976030000501960000307405000090100000000006009040050100169847000053012000";

var data = string.split('').map(Number);

var chunksize = 9;

var chunks = [];

data.forEach((item)=>{
  if(!chunks.length || chunks[chunks.length-1].length == chunksize)
  chunks.push([]);

  chunks[chunks.length-1].push(item);
});

const puzzles = chunks;

console.log(solve(puzzles).map(e => "" + e));



