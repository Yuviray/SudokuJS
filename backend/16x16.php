<?php
namespace Tester;
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
		<link id=FallTheme rel="stylesheet" type="text/css" href="../frontend/FallTheme.css">
		<link id=theme2 rel="stylesheet" type="text/css" href="../frontend/Theme2.css">
		<link id=theme1 rel="stylesheet" type="text/css" href="../frontend/Theme1.css">
		<link id=prefTheme rel="stylesheet" type="text/css" href="<?php echo $row["prefTheme"]; ?>">
		<link rel="stylesheet" media="all" type="text/css" href="../frontend/tutorial.css">

		<style>
			
		* {
			margin:0; padding:0;
			-moz-box-sizing: border-box;
			-webkit-box-sizing: border-box;
			box-sizing: border-box;
		}

		.sudoku-board-cell
		{
			display: inline-block;
			position: relative;
			border: 1px solid #334747;
			max-width: 6.5%;
		}

      	.sudoku-board-cell input
		{
  			background: none;
  			font-size: 16px;
      	}
		

			.wrap {
				padding: 2em 1em;
				width: 600px;
				max-width: 100%;
				margin-left: auto;
				margin-right: auto;
			}

			@media(min-width: 30em){
				.sudoku-board .candidates {
					font-size: .8em;
				}
			}

      	[data-board-size="16"].sudoku-board .sudoku-board-cell:nth-of-type(16n+1)
		{
  			border-left-width: 5px;
  			border-left-color: #334747;
  		}

  		[data-board-size="16"].sudoku-board .sudoku-board-cell:nth-of-type(n):nth-of-type(-n+16)
		{
  			border-top-width: 5px;
  			border-top-color: #334747;
  		}

  		[data-board-size="16"].sudoku-board .sudoku-board-cell:nth-of-type(4n)
		{
  			border-right-width: 5px;
  			border-right-color: #334747;
  		}

  		[data-board-size="16"].sudoku-board .sudoku-board-cell:nth-of-type(n+49):nth-of-type(-n+64),
  		[data-board-size="16"].sudoku-board .sudoku-board-cell:nth-of-type(n+113):nth-of-type(-n+128),
  		[data-board-size="16"].sudoku-board .sudoku-board-cell:nth-of-type(n+177):nth-of-type(-n+192),
      	[data-board-size="16"].sudoku-board .sudoku-board-cell:nth-of-type(n+241):nth-of-type(-n+265)
		{
  			border-bottom-width: 5px;
  			border-bottom-color: #334747;
  		}
		/* ---- Menu Bar Styling ---- */
		.menuBar 
			{
				background-color: #111;
				overflow: visible;
				position: relative;
				top: 0;
				width: 100%;
				border: 10px;
				min-width: 100%;
				user-select: none;
				block-size: 40px;
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
			.dropdown {
  				display: inline-block;
  				position: relative;
				z-index:1;
			}		
			.dropdown-content{
				display: none;
				position: absolute;
				width: 100%;
				overflow: auto;
				bow-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
			}
			.dropdown:hover .dropdown-content{
				display: block;
			}
			.dropdown-content a{
				background-color: grey;
				display: block;
				color: white;
				padding: 5px;
				text-decoration: none;
			}
			.dropdown-content a:hover{
				color : white;
				background-color: #00a4bd;
			}

		</style>

		<title>SudokuJS - board size 16</title>

		<script>document.getElementById('FallTheme').disabled  = true;</script>
		<script defer src="../frontend/tutorial.js"></script>
		<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
		<script type="text/javascript" src="../frontend/sudokuJS.js"></script>
	</head>

	<body>
	<div class="menuBar">
			<menuButton onclick="profileScript()" class="left"><?php echo $row["user_name"]; ?></menuButton>
			<menuButton onclick="logoutScript()">Logout</menuButton>

			<button class = "button-54" data-modal-target="#modal"> Tutorial </button>

			<div class="dropdown">
				<button class ="button-54">Themes</button>
				<div class = "dropdown-content">
				<a onclick="useTheme1()">Theme 1</a>
				<a onclick="useTheme2()">Theme 2</a>
				<a onclick="useFallTheme()">Fall Theme</a>
				</div>
			</div>

			<div class="dropdown">
				<button class ="button-54">More Games</button>
				<div class = "dropdown-content">
				<a onclick="oldGameScript()">Normal</a>
				<a onclick="minesScript()">Minesweeper</a>
				<a onclick="snakeScript()">Snake</a>
				</div>
			</div>

		</div>

		<script> 
			function logoutScript()
			{ 
				window.location.assign('logout.php');
			}
			function oldGameScript()
			{ 
				window.location.assign('index.php');
			}
			function minesScript()
			{ 
				window.location.assign('minesweeper.php');
			}
			function profileScript()
			{ 
				window.location.assign('profilePage.php');
			}
			function snakeScript()
			{ 
				window.location.assign('snakegame.html');
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
				document.getElementById('prefTheme').disabled  = true;
			document.getElementById('FallTheme').disabled  = true;
			document.getElementById('theme2').disabled  = true;
			document.getElementById('theme1').disabled = false;
			}

			function useTheme2()
			{
				document.getElementById('prefTheme').disabled  = true;
			document.getElementById('FallTheme').disabled  = true;
			document.getElementById('theme2').disabled  = false;
			document.getElementById('theme1').disabled = true;
			}

			function useFallTheme()
			{
				document.getElementById('prefTheme').disabled  = true;
			document.getElementById('FallTheme').disabled  = false;
			document.getElementById('theme2').disabled  = true;
			document.getElementById('theme1').disabled = true;
			}
		</script>
		
		<br><br>

	
		<!-- Change Themes and Buttons -->

		<div id="overlay"></div>

		<div id="parent">
	<div id="wide" class="wrap">
		<h1>SudokuPlus<span>Demo</span></h1>
		<!--the only required html-->
		<div id="sudoku" class="sudoku-board">
		</div>

		<!--solve buttons-->
		Solve: <button type="button" class="js-solve-step-btn">One Step</button>
		<button type="button" class="js-solve-all-btn">All</button>
		</h2><button type="button" class="js-clear-board-btn">Clear Board</button>
	</div>
	<!--backend php code that updates table if new score if greater-->

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
	
	<script>
    function retryForever (fn) {
      try {
        return fn()
      } catch (err) {
        console.log('retry...')
        return retryForever(fn)
      }
    }
    function tryGeneratingBoard () {
      var mySudokuJS = $("#sudoku").sudokuJS({
  			boardSize: 16
  		});

  		$(".js-solve-step-btn").on("click", mySudokuJS.solveStep);
  		$(".js-solve-all-btn").on("click", mySudokuJS.solveAll);
		$(".js-clear-board-btn").on("click", mySudokuJS.clearBoard);
    }
    retryForever(tryGeneratingBoard)
	</script>
	</body>

	<script>
		document.getElementById('FallTheme').disabled  = true;
		document.getElementById('theme2').disabled  = true;
		document.getElementById('theme1').disabled = true;
	</script>

</html>