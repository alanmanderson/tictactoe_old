<html>
  <head>
    <link rel="stylesheet" type="text/css" href="stylesheets/main.css"/>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
    <script type="text/javascript">
     var turnCount=0;
     var turn = "X";
     var computer = "O";
     var moves = [];
     var wins = [[0,1,2],[3,4,5],[6,7,8],[0,3,6],[1,4,7],[2,5,8],[0,4,8],[2,4,6]];
     var model = ["","","","","","","","",""]; 
     var winner = "";
     $(function(){
       $(".square").click(function() {
         $(this).unbind('click');
	 var myClasses = $(this).attr("class").split(" ");
	 var row = parseInt(myClasses[myClasses.length-1][1]);
	 var col = parseInt(myClasses[myClasses.length-1][2]);
	 var index = 3*row+col;
	 moves.push(index);
	 model[index] = turn;
	 $(this).html(turn);
	 winner = checkWinner();
	 if (winner!=""){
	   alert(winner);
	 }
	 turn = (turn=="O") ? "X" : "O";
	 if (turn==computer) aiGo();
       })
     });
     
     function checkWinner() {
       for(i=0;i<wins.length;i++){
	 var w = wins[i];
         if (model[w[0]]!="" &&
             model[w[0]]==model[w[1]] &&
	     model[w[1]]==model[w[2]]){
	   $(".square").unbind('click');
	   setMovePoints();
	   return turn;
	 }
       }
       return "";
     }
 
     function aiGo() {
       $.getJSON('bestMove.php?action=get&board='+model.toString(), function(data) {
	   $("#piece"+data['NextMove']).click();
       });
     }

     function setMovePoints() {
       var data = "action=set&winner="+winner;
       for(i=0;i< moves.length;i++){
	 data = data + "&moves[]="+moves[i];
       }
       alert(data);
       //$.getJSON
     }

    </script>
  </head>
  <body>
    <form>
      <div id="board">
        <div id="piece0" class="topleft square l00"></div>
        <div id="piece1" class="topcenter square l01"></div>
        <div id="piece2" class="topright square l02"></div>
        <div id="piece3" class="centerleft square l10"></div>
        <div id="piece4" class="centercenter square l11"></div>
        <div id="piece5" class="centerright square l12"></div>
        <div id="piece6" class="bottomleft square l20"></div>
        <div id="piece7" class="bottomcenter square l21"></div>
        <div id="piece8" class="bottomright square l22"></div>
      </div>
      <div id="test">
      </div>
    </form>
  </body>
</html>