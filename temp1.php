<!DOCTYPE html>
<html>
<head>
	<title>Deal or No Deal</title>
	<link rel="stylesheet" type="text/css" href="temp1.css">

</head>
<body>
	<div id="logo">
		<img class="logoImg" src="./Pics/don.png">
	</div>
	<div id="boxContainer">
		<div class="box"><span class="boxNr">1</span><span class="boxValue"></span></div>
		<div class="box"><span class="boxNr">2</span><span class="boxValue"></span></div>
		<div class="box"><span class="boxNr">3</span><span class="boxValue"></span></div>
		<div class="box"><span class="boxNr">4</span><span class="boxValue"></span></div>
		<div class="box"><span class="boxNr">5</span><span class="boxValue"></span></div>
		<div class="box"><span class="boxNr">6</span><span class="boxValue"></span></div>
		<div class="box"><span class="boxNr">7</span><span class="boxValue"></span></div>
		<div class="box"><span class="boxNr">8</span><span class="boxValue"></span></div>
		<div class="box"><span class="boxNr">9</span><span class="boxValue"></span></div>
		<div class="box"><span class="boxNr">10</span><span class="boxValue"></span></div>
		<div class="box"><span class="boxNr">11</span><span class="boxValue"></span></div>
		<div class="box"><span class="boxNr">12</span><span class="boxValue"></span></div>
		<div class="box"><span class="boxNr">13</span><span class="boxValue"></span></div>
		<div class="box"><span class="boxNr">14</span><span class="boxValue"></span></div>
		<div class="box"><span class="boxNr">15</span><span class="boxValue"></span></div>
		<div class="box"><span class="boxNr">16</span><span class="boxValue"></span></div>
		<div class="box"><span class="boxNr">17</span><span class="boxValue"></span></div>
		<div class="box"><span class="boxNr">18</span><span class="boxValue"></span></div>
		<div class="box"><span class="boxNr">19</span><span class="boxValue"></span></div>
		<div class="box"><span class="boxNr">20</span><span class="boxValue"></span></div>
		<div class="box"><span class="boxNr">21</span><span class="boxValue"></span></div>
		<div class="box"><span class="boxNr">22</span><span class="boxValue"></span></div>
		<div class="box"><span class="boxNr">23</span><span class="boxValue"></span></div>
		<div class="box"><span class="boxNr">24</span><span class="boxValue"></span></div>
	</div>
	<div id="smallMoneys" class="moneys">
		<div class="moneyShow"></div>
		<div class="moneyShow"></div>
		<div class="moneyShow"></div>
		<div class="moneyShow"></div>
		<div class="moneyShow"></div>
		<div class="moneyShow"></div>
		<div class="moneyShow"></div>
		<div class="moneyShow"></div>
		<div class="moneyShow"></div>
		<div class="moneyShow"></div>
		<div class="moneyShow"></div>
		<div class="moneyShow"></div>
	</div>
	<div id="bigMoneys" class="moneys">
		<div class="moneyShow"></div>
		<div class="moneyShow"></div>
		<div class="moneyShow"></div>
		<div class="moneyShow"></div>
		<div class="moneyShow"></div>
		<div class="moneyShow"></div>
		<div class="moneyShow"></div>
		<div class="moneyShow"></div>
		<div class="moneyShow"></div>
		<div class="moneyShow"></div>
		<div class="moneyShow"></div>
		<div class="moneyShow"></div>
	</div>
	<div id="bank">
		<div id="bankContent">
			<img class="bankLogo"src="https://i.ibb.co/s9HN0Xn/bankimg.png">
			<div class="bankTitle">The bank offers you:</div>
			<div class="bankOffer"></div>
			<button id="yesDeal" class="buttons">Deal</button>
			<button id="noDeal" class="buttons">No Deal</button>
			<div id="prevOffers">Previous Offers: none</div>
		</div>
	</div>
	<div id="finished">
		<div id="finishedContent">
			<div class="modalText">Congratulations, you won:</div>
			<div id="winnings"></div>
		</div>
	</div>
	<div id="lastDeal">
		<div id="lastDealContent">
			<div class="modalText">Do you want to keep you box, or change it for the one remaining box?</div>
			<button id="keepBox" class="buttons">Keep It!</button>
			<button id="changeBox" class="buttons">Change It!</button>
		</div>
	</div>
	<div id="chooseBox">
		<div id="chooseBoxContent">
			<div class="chooseBoxText">Pick a box from 1 to 24!</div>
			<button class="chooseBoxButton">1</button>
			<button class="chooseBoxButton">2</button>
			<button class="chooseBoxButton">3</button>
			<button class="chooseBoxButton">4</button>
			<button class="chooseBoxButton">5</button>
			<button class="chooseBoxButton">6</button>
			<button class="chooseBoxButton">7</button>
			<button class="chooseBoxButton">8</button>
			<button class="chooseBoxButton">9</button>
			<button class="chooseBoxButton">10</button>
			<button class="chooseBoxButton">11</button>
			<button class="chooseBoxButton">12</button>
			<button class="chooseBoxButton">13</button>
			<button class="chooseBoxButton">14</button>
			<button class="chooseBoxButton">15</button>
			<button class="chooseBoxButton">16</button>
			<button class="chooseBoxButton">17</button>
			<button class="chooseBoxButton">18</button>
			<button class="chooseBoxButton">19</button>
			<button class="chooseBoxButton">20</button>
			<button class="chooseBoxButton">21</button>
			<button class="chooseBoxButton">22</button>
			<button class="chooseBoxButton">23</button>
			<button class="chooseBoxButton">24</button>
			<div>
				<button id="seeTutorialButton">See Tutorial</button>
			</div>
		</div>
	</div>
	<div id="tutorial">
		<div id="tutorialContainer">
			<img class="logoImg" src="dealLogo.png">
			<div class="text">
				<ol>
					<li>Pick a box from 1-24 where you think the $1 000 000 is hiding.</li>
					<li>Open boxes that you think have lower amounts. The money in the opened boxes is removed.</li>	
					<li>Every few boxes you open (5, 10, 15, 18 and 21), the bank offers a deal. You have two options:
						<ul>
							<li>Take the deal: the game is over and you walk out with the deal amount.</li>
							<li>Decline the deal: continue opening more boxes.</li>
						</ul>
					</li>
					<li>Once only 2 boxes remain (the one you picked and one other box), you again have two options:
						<ul>
							<li>Keep the box you chose.</li>
							<li>Change your box for the other box.</li>
						</ul>
					</li>
				</ol>
				<p>*Disclaimer: You don't actually win the money!</p>
				<button id="tutorialButton" class="buttons">Got It!</button>
			</div>
		</div>
	</div>
</body>
	<script type="text/javascript" src="dealOrNoDeal.js"></script>
</html>