<nav class="navbar navbar-toggleable-md navbar-light navbar-inverse" style="background-color: #A6C48A; border-bottom: 5px solid #678D58; border-top: 0px; border-left: 0px; border-right: 0px">
  	<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
 		<span class="navbar-toggler-icon"></span>
 	</button>
  	<div class="navbar-header">
		<a class="navbar-brand" href="#"><img src="images/logo_with_text.png" height="30px" width="100px" style="margin-top: -5px"></a>
    </div>
  	<div class="collapse navbar-collapse" id="navbarNav">
    	<ul class="navbar-nav">
			<li class="active" style="margin-top: 8px; padding-left: 15px; color: #ffffff; font-size: 16px;"> 
				| &nbsp;  <a href="http://www.mindthegaap.info/Dashboard.php" style="color: white">DASHBOARD</a> 
			</li>
			<li class="nav-item dropdown active"  style="margin-top: 6px; padding-left: 15px; color: #ffffff; font-size: 16px;">
				| &nbsp;  <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown" style="margin-top: -30px; padding-left: 20px">ACCOUNTS</a>
				<div class="dropdown-menu" style="padding-left: 16px;">
					<?php if ($_SESSION['position'] == 'User'){echo '<a href="http://www.mindthegaap.info/ChartOfAccounts_Users.php" style="color: black; padding-left: 8px">Chart of Accounts</a>';} else {echo '<a href="http://www.mindthegaap.info/ChartOfAccounts.php" style="color: black;">Chart of Accounts</a>';}?></a><br>
					<?php if ($_SESSION['position'] == 'User'){echo '<a href="http://www.mindthegaap.info/Accounts_Users.php" style="color: black; padding-left: 8px;">Accounts</a>';} else {echo '<a href="http://www.mindthegaap.info/Accounts.php" style="color: black;">Accounts</a>';} ?>
				</div>
			</li>
			<li class="nav-item dropdown active"  style="margin-top: 6px; padding-left: 15px; color: #ffffff; font-size: 16px;">
				| &nbsp;  <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown" style="margin-top: -30px; padding-left: 20px">JOURNALS</a>
				<div class="dropdown-menu" style="padding-left: 16px;">
					<a class="dropdown-item" href="http://www.mindthegaap.info/Journal.php">Journalize</a>
					<a class="dropdown-item" href="http://www.mindthegaap.info/AdjustingJournalEntries.php">Adjusting Journal Entries</a>
					<a class="dropdown-item" href="http://www.mindthegaap.info/ClosingJournalEntries.php">Closing Journal Entries</a>
					<a class="dropdown-item" href="http://www.mindthegaap.info/AccountLedger.php">Ledgers</a>
				</div>
			</li>
			<?php if($_SESSION['position'] == "Manager") {echo '<li class="active" style="margin-top: 8px; padding-left: 15px; color: white; font-size: 16px;"> | &nbsp; <a href="http://www.mindthegaap.info/Post.php" style="color: white;">POST</a></li>';}?>
			<?php if($_SESSION['position'] == "Manager" || $_SESSION['position'] == "Administrator") {echo '
			<li class="nav-item dropdown active"  style="margin-top: 6px; padding-left: 15px; color: #ffffff; font-size: 16px;">
				| &nbsp;  <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown" style="margin-top: -30px; padding-left: 20px">STATEMENTS</a>
				<div class="dropdown-menu">
					<a class="dropdown-item" href="http://www.mindthegaap.info/TrialBalance.php">Unadjusted Trial Balance</a>
					<a class="dropdown-item" href="http://www.mindthegaap.info/AdjustedTrialBalance.php">Adjusted Trial Balance</a>
					<a class="dropdown-item" href="http://www.mindthegaap.info/ClosingTrialBalance.php">Closing Trial Balance</a>
					<a class="dropdown-item" href="http://www.mindthegaap.info/IncomeStatement.php">Income Statement</a>
					<a class="dropdown-item" href="http://www.mindthegaap.info/BalanceSheet.php">Balance Sheet</a>
					<a class="dropdown-item" href="http://www.mindthegaap.info/RetainedEarnings.php">Retained Earnings</a>
				</div>
			</li>';} ?>
			<li class="active" style="margin-top: 8px; padding-left: 15px; color: #ffffff; font-size: 16px;"> 
				| &nbsp;  <a href="http://www.mindthegaap.info/EventsLog.php" style="color: white">LOGS</a>
			</li>
			<li class="active" style="margin-top: 8px; padding-left: 15px; color: #ffffff; font-size: 16px;"> 				
				| &nbsp; <?php if ($_SESSION['position'] == "Administrator") {echo '<a href="http://www.mindthegaap.info/Users_Admin.php" style="color: white;">USERS</a>';} else {echo '<a href="http://www.mindthegaap.info/Users_General.php" style="color: white;">USERS</a>';}?>				  
			</li>
			
			
			
<!--
      		<li class="funky_font" style="margin-top: 8px; padding-left: 15px; color: #ffffff; font-size: 16px;">
			    | &nbsp;  </li>?php if ($_SESSION['position'] == 'User'){echo '<a href="http://www.mindthegaap.info/ChartOfAccounts_Users.php" style="color: white;">CHART OF ACCOUNTS</a>';} else {echo '<a href="http://www.mindthegaap.info/ChartOfAccounts.php" style="color: white;">CHART OF ACCOUNTS</a>';}?>
			</li>
			<li class="active" style="margin-top: 8px; padding-left: 15px; color: #ffffff; font-size: 16px;"> 
				| &nbsp;  </li>?php if ($_SESSION['position'] == 'User'){echo '<a href="http://www.mindthegaap.info/Accounts_Users.php" style="color: white">ACCOUNTS</a>';} else {echo '<a href="http://www.mindthegaap.info/Accounts.php" style="color: white">ACCOUNTS</a>';} ?>
			</li>
			<li class="active" style="margin-top: 8px; padding-left: 15px; color: #ffffff; font-size: 16px;"> 
				| &nbsp;  <a href="http://www.mindthegaap.info/Journal.php" style="color: white">JOURNAL</a> 
			</li>
			</?php if($_SESSION['position'] == "Manager") {echo '<li class="active" style="margin-top: 8px; padding-left: 15px; color: white; font-size: 16px;"> | &nbsp; <a href="http://www.mindthegaap.info/Post.php" style="color: white;">POST</a></li>';}?>

			<li class="active" style="margin-top: 8px; padding-left: 15px; color: #ffffff; font-size: 16px;"> 
				| &nbsp;  <a href="http://www.mindthegaap.info/EventsLog.php" style="color: white">LOGS</a>
			</li>
			<li class="active" style="margin-top: 8px; padding-left: 15px; color: #ffffff; font-size: 16px;"> 
				| &nbsp;  <a href="http://www.mindthegaap.info/Categories.php" style="color: white">CATEGORIES</a> 
			</li>
			<li class="active" style="margin-top: 8px; padding-left: 15px; color: #ffffff; font-size: 16px;"> 
				| &nbsp;  <a href="http://www.mindthegaap.info/NormalSide.php" style="color: white">NORMAL SIDE</a> 
			</li>
			
			<li class="active" style="margin-top: 8px; padding-left: 15px; color: #ffffff; font-size: 16px;"> 				
				| &nbsp; </li>?php if ($_SESSION['position'] == "Administrator") {echo '<a href="http://www.mindthegaap.info/Users_Admin.php" style="color: white;">USERS</a>';} else {echo '<a href="http://www.mindthegaap.info/Users_General.php" style="color: white;">USERS</a>';}?>				  
			</li>
			<li class="active" style="margin-top: 8px; padding-left: 15px; color: #ffffff; font-size: 16px;"> 
				| &nbsp;  <a href="http://www.mindthegaap.info/PostedJournals.php" style="color: white">ACCOUNT LEDGER</a> 
			</li>
-->
    	</ul>			
  	</div>
  	<form action="includes/dcf_Logout.php" method="post" id="logoutForm">
  	<div class="float-right" style=": 0px">
		<!--<a href="#" style="color:#ffffff; font-size: 16px"><span class="glyphicon glyphicon-log-out" style="color:#F6E7CB"></span> LOGOUT</a> -->
		<button type="submit" value="Logout" style="background:none!important; border: none; padding: 0 !important; color:#ffffff; font-size: 16px; height: 5px">LOGOUT</button>
	</div>
	</form>
</nav>

