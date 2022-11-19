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

		<link href="https://fonts.googleapis.com/css2?family=Teko:wght@500&display=swap" rel="stylesheet">
		<link id=theme2 rel="stylesheet" type="text/css" href="Theme2.css">
		<link id=theme1 rel="stylesheet" type="text/css" href="Theme1.css">
		<link id=FallTheme rel="stylesheet" type="text/css" href="FallTheme.css">
		<link rel="stylesheet" media="all" type="text/css" href="tutorial.css">

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

			/* ---- Menu Bar Styling ---- */
			.menuBar 
			{
				background-color: #111;
				overflow: hidden;
				position: relative;
				top: 0;
				width: 100%;
				border: 10px;
				min-width: 100%;
				user-select: none;
			}
  
			.menuBar menuButton
			{
				float: right;
				color: #FFF;
				text-align: center;
				padding: 10px 16px;
				text-decoration: none;
				font-size: 17px;
			}

			.menuBar menuButton.left
			{
				float: left;
				color: #FFF;
				text-align: center;
				padding: 10px 16px;
				text-decoration: none;
				font-size: 17px;
			}

			.menuBar menuButton:hover,.menuBar menuButton.left:hover
			{
				background-color: #ddd;
				color: black;
			}

			/* ---- Menu Bar Styling ---- */
		</style>

		<title>Sudoku Plus Demo</title>

		
		<script defer src="tutorial.js"></script>
		<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
		<script type="text/javascript" src="sudokuJS.js"></script>
	</head>

	<body>

		<div class="menuBar">
			<menuButton class="left"><?php echo $row["user_name"]; ?></menuButton>
			<menuButton onclick="logoutScript()">Logout</menuButton>
			<menuButton onclick="newGameScript()">16x16</menuButton>

			<button class = "button-54" data-modal-target="#modal"> Tutorial </button>

			<button class="button-54" onclick="useTheme1()"> Theme 1 </button>
			<button class="button-54" onclick="useTheme2()"> Theme 2 </button>
			<button class="button-54" onclick="useFallTheme()"> Fall Theme </button>
		</div>

		<script> 
			function logoutScript()
			{ 
				window.location.assign('logout.php');
			}
			function newGameScript()
			{ 
				window.location.assign('16x16.php');
			}
		</script>

		<!-- This is the whole tutorial button in html -->
	
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

		<!-- Change Themes and Buttons -->
		<script class="activate-A-Theme">
			function useTheme1()
			{
			document.getElementById('FallTheme').disabled  = true;
			document.getElementById('theme2').disabled  = true;
			document.getElementById('theme1').disabled = false;
			}

			function useTheme2()
			{
			document.getElementById('FallTheme').disabled  = true;
			document.getElementById('theme2').disabled  = false;
			document.getElementById('theme1').disabled = true;
			}

			function useFallTheme()
			{
			document.getElementById('FallTheme').disabled  = false;
			document.getElementById('theme2').disabled  = true;
			document.getElementById('theme1').disabled = true;
			}
		</script>
		
		<br><br>

		<!-- Change Themes and Buttons -->

		<div id="overlay"></div>

	<!--
	<audio controls>
		<source src="loop-130-bpm.mp3"  type="audio/mp3">
	</audio>
	-->
		
  	<!-- <h1>Welcome < ?php echo $row["user_name"];?></h1> -->

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
	error_reporting(E_ALL ^ E_WARNING); //Disables Warnings
	
	$mins = intval($_GET["w1"]);
	$secs = intval($_GET["w2"]);
	if($secs > 0){
  	$id = $_SESSION["id"];
  	$result = mysqli_query($conn, "SELECT * FROM users WHERE id = $id");
	$row = mysqli_fetch_assoc($result);
	

	/*function add ($mins, $secs) {
    $this->query(
      "INSERT INTO `user` ('minutes', 'seconds') VALUES($mins,$secs)",
      [$mins, $secs]
    );
    	return true;
  	}
	add($mins, $secs);	
	*/
	$sql = "update users set minutes=? where id=?;";
	$stmt = $conn->stmt_init();
	$stmt->prepare($sql);
	$stmt->bind_param('ss',  $mins, $id);
	$stmt->execute();

	$sql = "update users set seconds=? where id=?;";
	$stmt = $conn->stmt_init();
	$stmt->prepare($sql);
	$stmt->bind_param('ss',  $secs, $id);
	$stmt->execute();
	}
  	?>

	<style>
		.content-table{

			border-collapse: collapse;
			margin: 25px 0;
			font-size: 0.9em;
			min-width: 400px;
			border-radius: 5px 5px 0 0;
			overflow: hidden;
			box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
		}

		.content-table thread tr{

			background-color: #009879 ;
			color: #ffffff;
			text-align: left;
			font-weight: bold;
		}

		.content-table th,
		.content-table td{

			padding: 12px 15px;
		}

		.content-table tbody tr{
			border-bottom: 1px solid #dddddd;

		}

		.content-table tbody tr:nth-of-type(even){
			background-color: #f3f3f3;

		}

		.content-table tbody tr:last-of-type{
			border-bottom: 2px solid #009879

		}


	</style>
	<h2>Leaderboard: </h2>
        <table class="content-table">
            <tr>
                <td>Ranking</td>
                <td>UserName</td>
                <td>Times</td>
            </tr>

			<!--displays the rankings in order-->

			<?php
  			/* Mysqli query to fetch rows 
  			in descending order of marks */
			$result = mysqli_query($conn, "SELECT user_name, 
  				minutes, seconds FROM users ORDER BY minutes, seconds ASC");
	
  			/* First rank will be 1 and 
	  		second be 2 and so on */
  			$ranking = 1;
	
  			/* Fetch Rows from the SQL query */
  			if (mysqli_num_rows($result)) {
	  			while ($row = mysqli_fetch_array($result)) {// code the prints ranking will need inline css
		  			echo "<tr><td>{$ranking}</td> 
		  			<td>{$row['user_name']}</td>
		  			<td>{$row['minutes']}:{$row['seconds']}s</td></tr>";
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