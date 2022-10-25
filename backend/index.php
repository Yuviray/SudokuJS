<?php
require 'config.php';
if(!empty($_SESSION["id"])){
  $id = $_SESSION["id"];
  $result = mysqli_query($conn, "SELECT * FROM users WHERE id = $id");
  $row = mysqli_fetch_assoc($result);
}
else{
  header("Location: login.php");
}
?>
<!DOCTYPE html>
	<head>
		<meta charset="utf-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0'>
		<link rel="stylesheet" media="all" type="text/css" href="theme1.css">
		<link rel="stylesheet" media="all" type="text/css" href="tutorial.css">
		<link href="https://fonts.googleapis.com/css2?family=Teko:wght@500&display=swap" rel="stylesheet">
		<style>
			* {
				margin:0; padding:0;
				-moz-box-sizing: border-box;
				-webkit-box-sizing: border-box;
				box-sizing: border-box;
			}
			.wrap {
				padding: 2em 1em;
				width: 400px;
				max-width: 100%;
				margin-left: auto;
				margin-right: auto;
			}

			@media(min-width: 30em){
				.wrap{
					width: 490px;
				}
				.sudoku-board input {
					font-size: 24px;
					font-size: 1.5rem;
				}
				.sudoku-board .candidates {
					font-size: .8em;
				}
			}

		</style>

		<title>Sudoku Plus Demo</title>

		<script defer src="tutorial.js"></script>
		<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
		<script type="text/javascript" src="sudokuJS.js"></script>
	</head>

	<body>

		<!-- This is the whole tutorial button in html -->
		<button class = "button-54" data-modal-target="#modal"> Tutorial </button>
		<div class="modal" id = "modal">
			<div class ="modal-header">
				<div class="title">Sudoku Tutorial</div>
				<button data-close-button class="close-button">&times;</button>
			</div>
			<div class = "modal-body">
				This will help you understand how to play the popular game Sudoku!
				Sudoku is a game played on a grid of 9x9 spaces.
				<div class = "modal-ul">
					<ul>
						<li>Each row, column, and square has to have the numbers 1 through 9.</li>
						<li>None of the numbers can repeat</li>
					</ul>
				</div>
				To start solving click on a square and input the number that you think is correct.
				If the number is wrong the square will light up red, and blue if correct.
			</div>
		</div>
		<div id="overlay"></div>


		<audio controls>
		<source src="loop-130-bpm.mp3"  type="audio/mp3">
	</audio>
  
  <h1>Welcome <?php echo $row["user_name"]; ?></h1>
    <a href="logout.php">Logout</a>

	<div id="parent">
	<div id="wide" class="wrap">
		<h1>SudokuPlus<span>Demo</span></h1>

		
		<!--genrate board btns-->
		<h2>New Game :</h2>
		<button type="button" class="js-generate-board-btn--easy">Easy</button>
		<button type="button" class="js-generate-board-btn--medium">Medium</button>
		<button type="button" class="js-generate-board-btn--hard">Hard</button>
		<button type="button" class="js-generate-board-btn--very-hard">Very Hard</button>

		<!-- timer for board -->
		<div class="timer">
		<label id="minutes">00</label>
		<label id="colon">:</label>
		<label id="seconds" >00</label>
		<label>s</label>
		</div>


		<!--the only required html-->
		<div id="sudoku" class="sudoku-board">
		</div>

		<!--show candidates toggle-->
		<label for="toggleCandidates"><h2>Show Solution Candidates :</h2> </label><input id="toggleCandidates" class="js-candidate-toggle" type="checkbox"/>
		<br><br>
		<!--solve buttons-->
		<h2>Solve:</h2> <button type="button" class="js-solve-step-btn">One Step</button>&nbsp;<button type="button" class="js-solve-all-btn">All</button>
		<br><br>
		<!--clear board btn-->
		</h2><button type="button" class="js-clear-board-btn">Clear Board</button>
	</div>
<!--backend php code that updates table if new score if greater-->
<?php
    if(isset($_POST["submit"])){
    	$newScore = intval($_POST['newScore']);
    	$id = $_SESSION["id"];
    	$result = mysqli_query($conn, "SELECT * FROM users WHERE id = $id");
    	$row = mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result) > 0){
    	if($newScore > $row['score']){
        	$sql = "update users set score=? where id=?;";
        	$stmt = $conn->stmt_init();
        	$stmt->prepare($sql);
        	$stmt->bind_param('ss',  $newScore, $id);
			$stmt->execute();
      	}
    	}
  	}
  
  	?>
	<!--form submission for testing input need to change for game-->
  	<h2>update score</h2>
      <form class="" action="" method="post" autocomplete="off">
        <label for="newScore">new score : </label>
        <input type="text" name="newScore" id = "newScore" required value=""> <br>
        <button type="submit" name="submit">update</button>
      </form>
      <br>
	<!--leader board need styling-->
	<h2>leader board</h2>
        <table>
            <tr>
                <td>Ranking</td>
                <td>UserName</td>
                <td>Score</td>
            </tr>

			<!--displays the rankings in order-->

			<?php
  			/* Mysqli query to fetch rows 
  			in descending order of marks */
  			$result = mysqli_query($conn, "SELECT user_name, 
  				score FROM users ORDER BY score DESC");
	
  			/* First rank will be 1 and 
	  		second be 2 and so on */
  			$ranking = 1;
	
  			/* Fetch Rows from the SQL query */
  			if (mysqli_num_rows($result)) {
	  			while ($row = mysqli_fetch_array($result)) {// code the prints ranking will need inline css
		  			echo "<tr><td>{$ranking}</td> 
		  			<td>{$row['user_name']}</td>
		  			<td>{$row['score']}</td></tr>";
		  			$ranking++;
	  			}
  			}
  			?>
		</table>
	</div>

	

	<script>
		var	$candidateToggle = $(".js-candidate-toggle"),
			$generateBoardBtnEasy = $(".js-generate-board-btn--easy"),
			$generateBoardBtnMedium = $(".js-generate-board-btn--medium"),
			$generateBoardBtnHard = $(".js-generate-board-btn--hard"),
			$generateBoardBtnVeryHard = $(".js-generate-board-btn--very-hard"),

			$solveStepBtn = $(".js-solve-step-btn"),
			$solveAllBtn = $(".js-solve-all-btn"),
			$clearBoardBtn = $(".js-clear-board-btn"),

			mySudokuJS = $("#sudoku").sudokuJS({
				difficulty: "very hard"
				//change state of our candidate showing checkbox on change in sudokuJS
				,candidateShowToggleFn : function(showing){
					$candidateToggle.prop("checked", showing);
				}
			});

		$solveStepBtn.on("click", mySudokuJS.solveStep);
		$solveAllBtn.on("click", mySudokuJS.solveAll);
		$clearBoardBtn.on("click", mySudokuJS.clearBoard);

		$generateBoardBtnEasy.on("click", function(){
			mySudokuJS.generateBoard("easy");
		});
		$generateBoardBtnMedium.on("click", function(){
			mySudokuJS.generateBoard("medium");
		});
		$generateBoardBtnHard.on("click", function(){
			mySudokuJS.generateBoard("hard");
		});
		$generateBoardBtnVeryHard.on("click", function(){
			mySudokuJS.generateBoard("very hard");
		});

		$candidateToggle.on("change", function(){
			if($candidateToggle.is(":checked"))
				mySudokuJS.showCandidates();
			else
				mySudokuJS.hideCandidates();
		});
		$candidateToggle.trigger("change");
	</script>


	</body>
</html>