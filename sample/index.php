<!DOCTYPE html>
<html lang="en">
	<head>

		<title>MiningS by alfredonuhe</title>

        <meta http-equiv="content-type" content="text/html;charset=utf-8" />
		<meta name="keywords" content="bitcoin, wallet, multisig, multisignature, address, browser, segwit, javascript, js, broadcast, transaction, verify, decode" />
		<meta name="description" content="A Bitcoin Wallet written in Javascript. Supports Multisig, SegWit, Custom Transactions, nLockTime and more!" />

		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<link rel="stylesheet" href="css/bootstrap.min.css" media="screen">
		<link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css">
		<link rel="stylesheet" href="css/style.css" media="screen">
		<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <script src="https://www.google.com/recaptcha/api.js?onload=recaptchaCallback&render=explicit" async defer></script>

		<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>

		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/bootstrap-datetimepicker.min.js"></script>

		<script type="text/javascript" src="js/crypto-sha256.js"></script>

		<script type="text/javascript" src="js/queue.js"></script>
		<script type="text/javascript" src="js/ms_utilities.js"></script>
		<script type="text/javascript" src="js/ms_logic.js"></script>
		<script type="text/javascript" src="js/ms_exec.js"></script>
	</head>

	<body>
		<div id="wrap">
			<!-- Fixed navbar -->
			<div id="header" class="navbar navbar-default">
				<div class="container">
					<div class="navbar-header navbar-mobile">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a href="http://localhost/projects/bitcoin-mining-simulator/index.php" class="navbar-brand" id="homeBtn"><img src="../images/logo-mining-simulator.png" style="height:32px;margin-top:-5px;margin-left:-10px"></a>
					</div>
					<div class="collapse navbar-collapse">
						<ul class="nav navbar-nav">
							<li class="active"><a href="#home" data-toggle="tab"><span class="glyphicon glyphicon-home"></span> Home</a></li>
							<li><a href="#about" data-toggle="tab"><span class="glyphicon glyphicon-info-sign"></span> About</a></li>
						</ul>
						<ul id="logout-navbar" class="nav navbar-nav navbar-right">
							<li><button id="logout-button" class="btn btn-danger navbar-btn">Logout</button></li>
						</ul>
					</div>
				</div>
			</div>

			<div id="content" class="container">

				<noscript class="alert alert-danger center-block"><span class="glyphicon glyphicon-exclamation-sign"></span> This page uses javascript, please enable it to continue!</noscript>

				<div class="tab-content">
					<div class="tab-pane active" id="home">
						<div class= "row">
							<div id= "form-pannel" class= "col-md-5">
								<div class="row">
									<h2>Mining Simulator</h2>
								</div>
								<form id="form_ms" action="php/session_guest.php" method="post">
										<div class="row">
                                            <label>Version <span class="glyphicon glyphicon-info-sign info-icon" data-toggle="popover" data-placement="top" data-content="The Bitcoin protocol version number."></span></label>
										</div>
										<div class="row">
											<input id="version_new" name= "version_new" type="text" class="col form-control input-margin-bottom">
										</div>
										<div class="row">
											<label>Previous block hash <span class="glyphicon glyphicon-info-sign info-icon" data-toggle="popover" data-placement="top" data-content="The previous block header hash."></span></label>
										</div>
										<div class="row">
											<input id="prev_block_new" name= "prev_block_new" type="text" class="col form-control input-margin-bottom">
										</div>
										<div class="row">
											<label>Dificulty <span class="glyphicon glyphicon-info-sign info-icon" data-toggle="popover" data-placement="top" data-content="Number of 0's that must be found when hashing the block header in order to meet the required level of proof of work to maintain the block time at 10 minutes."></span></label>
										</div>
										<div class="row">
											<input id="dificulty_new" name= "dificulty_new" type="text" class="col form-control input-margin-bottom">
										</div>
										<div class="row">
											<label>Timestamp <span class="glyphicon glyphicon-info-sign info-icon" data-toggle="popover" data-placement="top" data-content="The timestamp of the block in UNIX (number of seconds since the 1st of January 1970)."></span></label>
										</div>
										<div class="row">
											<input id="timestamp_new" name= "timestamp_new" type="text" class="col form-control input-margin-bottom" readonly>
										</div>
										<div class="row">
											<label>Merkle Root <span class="glyphicon glyphicon-info-sign info-icon" data-toggle="popover" data-placement="top" data-content="A hash of the root of the merkle tree, representing all of the transactions contained in the block."></span></label>
										</div>
										<div class="row input-group input-margin-bottom">
											<input id="merkle_root_new" name= "merkle_root_new" type="text" class="form-control">
											<span class="input-group-btn">
												<button id="random_hash_new" class="btn btn-default" type="button">New</button>
											</span>
										</div>
										<div class="row">
												<label>Nonce <span class="glyphicon glyphicon-info-sign info-icon" data-toggle="popover" data-placement="top" data-content="Value altered by the miners to calculate new hashes and try to meet the block difficulty."></span></label>
										</div>
										<div class="row">
											<div class="form-group">
													<input id="nonce_new" name= "nonce_new" type="text" class="col form-control input-margin-bottom">
											</div>
											<button id="hash_button_new" class="col-md-2 btn btn-primary" type="button">Mine</button>
										</div>
										<div class="row input-margin-top">
											<label>Block Hash <span class="glyphicon glyphicon-info-sign info-icon" data-toggle="popover" data-placement="top" data-content="Hash calculated using all the block header information."></span></label>
										</div>
										<div class="row">
											<input id="block_hash_new" name= "block_hash_new" type="text" class="col-2 form-control input-margin-bottom" readonly>
										</div>
								</form>
							</div>
							<div class= "col-md-6" id= "result_test_sse">
								<div id="prev-hash">
									<div class="row">
										<label>Previous valid hash <span class="glyphicon glyphicon-info-sign info-icon" data-toggle="popover" data-placement="top" data-content="Header's hash value of the last valid block in the blockchain."></span></label>
									</div>
									<div class="row">
										<input id="prev_hash_input" name= "prev_hash_input" type="text" class="col form-control" readonly>
									</div>
								</div>
								<div class="row">
									<div class="form-group input-group dinamic_board">
										<span class="input-group-btn">
											<button class="btn btn-default dinamic_board_btn" type="button">+</button>
										</span>
										<input class="form-control" readonly rows = 1>
									</div>
								</div>
								<div class="row">
									<div class="form-group input-group dinamic_board">
										<span class="input-group-btn">
											<button class="btn btn-default dinamic_board_btn" type="button">+</button>
										</span>
										<input class="form-control" readonly rows = 1>
									</div>
								</div>
								<div class="row">
									<div class="form-group input-group dinamic_board">
										<span class="input-group-btn">
											<button class="btn btn-default dinamic_board_btn" type="button">+</button>
										</span>
										<input class="form-control" readonly rows = 1>
									</div>
								</div>
								<div class="row">
									<div class="form-group input-group dinamic_board">
										<span class="input-group-btn">
											<button class="btn btn-default dinamic_board_btn" type="button">+</button>
										</span>
										<input class="form-control" readonly rows = 1>
									</div>
								</div>
								<div class="row">
									<div class="form-group input-group dinamic_board">
										<span class="input-group-btn">
											<button class="btn btn-default dinamic_board_btn" type="button">+</button>
										</span>
										<input class="form-control" readonly rows = 1>
									</div>
								</div>
								<div class="row">
									<div class="form-group input-group dinamic_board">
										<span class="input-group-btn">
											<button class="btn btn-default dinamic_board_btn" type="button">+</button>
										</span>
										<input class="form-control" readonly rows = 1>
									</div>
								</div>
								<div class="row">
									<div class="form-group input-group dinamic_board">
										<span class="input-group-btn">
											<button class="btn btn-default dinamic_board_btn" type="button">+</button>
										</span>
										<input class="form-control" readonly rows = 1>
									</div>
								</div>
								<div class="row">
									<div class="form-group input-group dinamic_board">
										<span class="input-group-btn">
											<button class="btn btn-default dinamic_board_btn" type="button">+</button>
										</span>
										<input class="form-control" readonly rows = 1>
									</div>
								</div>
								<div class="row">
									<div class="form-group input-group dinamic_board">
										<span class="input-group-btn">
											<button class="btn btn-default dinamic_board_btn" type="button">+</button>
										</span>
										<input class="form-control" readonly rows = 1>
									</div>
								</div>
								<div class="row">
									<div class="form-group input-group dinamic_board">
										<span class="input-group-btn">
											<button class="btn btn-default dinamic_board_btn" type="button">+</button>
										</span>
										<input class="form-control" readonly rows = 1>
									</div>
								</div>
                                <div class="row">
                                    <div class="input-group dinamic_board_text">
                                        <span id="dinamic_board_text_btn" class="input-group-addon btn btn-default">-</span>
                                        <textarea id="dinamic_board_text_area" class="form-control custom-control" rows="20" readonly></textarea>
                                    </div>
                                </div>
                            </div>
						</div>
					</div>
					<div class="tab-pane" id="about">
						<h2>About <small>MiningS</small></h2>
						<p>Version 2.0</p>
						<p>Github <a href="https://github.com/alfredonuhe/bitcoin-mining-simulator">https://github.com/alfredonuhe/bitcoin-mining-simulator</a></p>
                        <h3>What is Bitcoin?</h3>
						<p>Bitcoin is a type of digital currency in which encryption techniques are used to regulate the generation of units of currency and verify the transfer of funds, operating independently of a central bank. See <a href="http://www.weusecoins.com/" target="_blank">weusecoins.com</a> for more information.</p>
						<p>If you are looking to buy some Bitcoin try <a href="https://localbitcoins.com/?ch=173j" target="_blank">LocalBitcoins.com</a>.</p>
                        <h3>What is MiningS?</h3>
                        <p>MiningS is an open-source Bitcoin proof of work mining simulator. It's objective is to visually show the proof of work mechanism of the Bitcoin blockchain.</p>
                        <h3>Donate</h3>
						<p>Please donate to THIS ADDRESS if you found this project useful and want to support the developer!</p>
					</div>
				</div>
            </div>
            <div class = "container-fluid">
                <div class="row footer">
                    <div class="text-right col-sm-12">
                        <p class="text-muted footer-text col-xs-12" align="right" >Version 2.0</p>
                    </div>
                </div>
            </div>
        </div>
        <div class = "container">
            <div id="myModal" class="modal">
                <!-- Modal content -->
                <div class="modal-content">
                    <div class = "row">
                        <div class = "col-md-2 col-xs-2">
                            <span class="glyphicon glyphicon-chevron-left previous-modal disabled-glyphicon"></span>
                        </div>
                        <div class = "col-md-2 col-xs-2">
                            <span class="glyphicon glyphicon-chevron-right next-modal"></span>
                        </div>
                        <div class = "col-md-8 col-xs-8 text-center">
                            <span class="close close-modal">&times;</span>
                        </div>
                    </div>
                    <div class = "row as-parent">
                        <div class = "col-md-12 col-xs-12 as-parent">
                            <div class = "row">
                                <div class = "col-md-12">
                                    <h3>Welcome to MiningS!</h3>
                                </div>
                            </div>
                            <div class = "row">
                                <div class = "col-md-12">
                                    <p>Skip the intro if not interested. To close it click on the top right cross.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-content">
                    <div class = "row">
                        <div class = "col-md-2 col-xs-2">
                            <span class="glyphicon glyphicon-chevron-left previous-modal"></span>
                        </div>
                        <div class = "col-md-2 col-xs-2">
                            <span class="glyphicon glyphicon-chevron-right next-modal"></span>
                        </div>
                        <div class = "col-md-8 col-xs-8 text-center">
                            <span class="close close-modal">&times;</span>
                        </div>
                    </div>
                    <div class = "row as-parent">
                        <div class = "col-md-12 col-xs-12 as-parent">
                            <div class = "row">
                                <div class = "col-md-12">
                                    <h3>Step 1/4: Concepts</h3>
                                </div>
                            </div>
                            <div class = "row">
                                <div class = "col-md-12">
                                    <p>Before starting let's get familiarized with the app. Firstly, we will see the concepts used:</p>
                                    <ul>
                                        <li><strong>Version:</strong> the version is a 4 character input which identifies the block.</li>
                                        <li><strong>Previous block hash:</strong> The previous valid block hash of the blockchain. It appears in top of the right side panel.</li>
                                        <li><strong>Difficulty:</strong> The difficulty used to mine the previous block.</li>
                                        <li><strong>Timestamp:</strong> Auto-generated input with the actual Unix time.</li>
                                        <li><strong>Merkle Root:</strong> hash of the block merkle root. To calculate a new Merkle Root hash click on the "New" button.</li>
                                        <li><strong>Nonce:</strong> Auto-generated nonce of the block.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-content">
                    <div class = "row">
                        <div class = "col-md-2 col-xs-2">
                            <span class="glyphicon glyphicon-chevron-left previous-modal"></span>
                        </div>
                        <div class = "col-md-2 col-xs-2">
                            <span class="glyphicon glyphicon-chevron-right next-modal"></span>
                        </div>
                        <div class = "col-md-8 col-xs-8 text-center">
                            <span class="close close-modal">&times;</span>
                        </div>
                    </div>
                    <div class = "row as-parent">
                        <div class = "col-md-12 col-xs-12 as-parent">
                            <div class = "row">
                                <div class = "col-md-12">
                                    <h3>Step 2/4: Correct Blocks</h3>
                                </div>
                            </div>
                            <div class = "row">
                                <div class = "col-md-12">
                                    <p>Mined block appear on the left side of the page. Blocks can be either correct or incorrect (green or red). To
                                        correctly mine a block you need to input the correct data, and this is:</p>
                                    <ol start="1">
                                        <li><span>The previous block hash of the most recent valid block.</span></li>
                                        <li><span>The same difficulty as the the rest of mined blocks.</span></li>
                                        <li><span>A newly generated Merkle Root hash.</span></li>
                                    </ol>
                                    <p>If this three conditions are satisfied when a block is generated, it will appear in green. Otherwise, it will
                                        appear in red.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-content">
                    <div class = "row">
                        <div class = "col-md-2 col-xs-2">
                            <span class="glyphicon glyphicon-chevron-left previous-modal"></span>
                        </div>
                        <div class = "col-md-2 col-xs-2">
                            <span class="glyphicon glyphicon-chevron-right next-modal"></span>
                        </div>
                        <div class = "col-md-8 col-xs-8 text-center">
                            <span class="close close-modal">&times;</span>
                        </div>
                    </div>
                    <div class = "row as-parent">
                        <div class = "col-md-12 col-xs-12 as-parent">
                            <div class = "row">
                                <div class = "col-md-12">
                                    <h3>Step 3/4: Mining</h3>
                                </div>
                            </div>
                            <div class = "row">
                                <div class = "col-md-12">
                                    <p>To generate a block, introduce valid input data and click on the "Try" button. This will calculate the hash of
                                        your input data and will show it below in the "Block Hash" dialog. Each time the button "Try" is clicked a new
                                        hash is calculated with a new nonce.</p>
                                    <p>In order to generate a block, the hash must have the same number of 0's at the beguinning as the specified
                                        difficulty.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-content">
                    <div class = "row">
                        <div class = "col-md-2 col-xs-2">
                            <span class="glyphicon glyphicon-chevron-left previous-modal"></span>
                        </div>
                        <div class = "col-md-2 col-xs-2">
                            <span class="glyphicon glyphicon-chevron-right next-modal disabled-glyphicon"></span>
                        </div>
                        <div class = "col-md-8 col-xs-8 text-center">
                            <span class="close close-modal">&times;</span>
                        </div>
                    </div>
                    <div class = "row as-parent">
                        <div class = "col-md-12 col-xs-12 as-parent">
                            <div class = "row">
                                <div class = "col-md-12">
                                    <h3>Step 4/4: Enjoy</h3>
                                </div>
                            </div>
                            <div class = "row">
                                <div class = "col-md-12">
                                    <p>Have fun with the simulator and leave a tip in the "About" tab if you will!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</body>
</html>