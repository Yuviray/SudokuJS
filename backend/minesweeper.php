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
		<link id=FallTheme rel="stylesheet" type="text/css" href="../frontend/FallThemeMines.css">
		<link id=theme2 rel="stylesheet" type="text/css" href="../frontend/Theme2Mines.css">
		<link id=theme1 rel="stylesheet" type="text/css" href="../frontend/Theme1Mines.css">
		<link rel="stylesheet" media="all" type="text/css" href="tutorial.css">
        <script src="mines.js" charset="utf-8"></script>
        
		<style>

		/* ---- Menu Bar Styling ---- */
		.menuBar 
			{
				background-color: #111;
				overflow: hidden;
				position: absolute;
				top: 0;
				width: 100%;
				border: 10px;
				min-width: 100%;
				user-select: none;
                margin-left:-8px;
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

		<title>Minesweeper</title>
        
	</head>

	<body>
	<div class="menuBar">
			<menuButton class="left"><?php echo $row["user_name"]; ?></menuButton>
			<menuButton onclick="logoutScript()">Logout</menuButton>
			<menuButton onclick="oldGameScript()">Normal</menuButton>
            <menuButton onclick="SuperSudokuScript()">16x16</menuButton>

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
			function oldGameScript()
			{ 
				window.location.assign('index.php');
			}
            function SuperSudokuScript()
			{ 
				window.location.assign('16x16.php');
			}
		</script>	
        <div class="modal" id = "modal">
			<div class ="modal-header">
				<div class="title">Minesweeper Tutorial</div>
				<button data-close-button class="close-button">&times;</button>
			</div>
			<div class = "modal-body">
				This will help you understand how to play the popular game Minesweeper!
				This game will be played on a 10x10 grid and there are 20 Bombs on the grid.
				<div class = "modal-ul">
					<ul>
						<li>Click on a Bomb and your dead</li>
						<li>Numbers represent the amount of Bombs surrounding </li>
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
        <div class="container1">
            <h2>Minesweeper</h2>
            <div class="grid"></div>
            <div>Flags left: <span id='flags-left'></span></div>
            <div id="result"></div>
        </div>
        <script defer src="tutorial.js"></script>
        <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
		<script type="text/javascript" src="sudokuJS.js"></script>

		<iframe style="border-radius:12px" src="https://open.spotify.com/embed/playlist/5RrwGzV0r4Ob2MyocYxvBw?utm_source=generator"
		 width="25%" height="200" frameBorder="0" 
		 allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
	
		<!-- Change Themes and Buttons -->

	</body>
</html>