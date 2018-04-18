<?php
session_start();
//if ($_SESSION['username'] == null) {
//    header('Location: /index.php');
//}

if(!empty($_GET['date'])){
    $date = $_GET['date'];
}else{
    $date = "";
}
echo $date;
?>
					
<?php include ($_SERVER['DOCUMENT_ROOT']."/includes/dcf_Populate_CreateJournalEntry.php") ?>
<html lang="en">
	
<head>
	
        <title>NEW JOURNAL ENTRY</title>
        <!-- header is in the header.php file with all the scripts, css, and other files needed for formating -->

        <?php include ($_SERVER['DOCUMENT_ROOT']."/includes/header.php") ?>

<body style="background-color:#FFFFFF">

<!-- horizontal navigation bar at the top of each page is in the navbar.php file -->
<?php include ($_SERVER['DOCUMENT_ROOT']."/includes/navbar.php") ?>
<div class="container">
	<form action="includes/dcf_Write_CreateJournalEntry.php" method="post" class="journal-entry-form">
    <div class="row" style="margin-top: 40px">
        <div class="row col-xs-2 col-sm-2 col-md-2 col-lg-1"></div>
        <div class="row col-xs-10 col-sm-10 col-md-7 col-lg-7">
            <h1 style="color: #DD9787; border-bottom: 3px solid #A6C48A;">NEW JOURNAL ENTRY</h1>
        </div>
        <div class="row col-xs-12 col-sm-12 col-md-12 col-lg-2" style="float: right;">
            <select class="form-control" id="type" name="type">
                <option value="" disabled="true" selected style="color: #D3D3D3">Entry Type</option>
                <option value="REG">REG</option>
                <option value="ADJ">ADJ</option>
                <option value="CLO">CLO</option>
            </select>
        </div>
    </div>
    <div class="row d-none error-wrap">
        <div class="col col-xs-2  col-lg-1"></div>
        <div class="col col-xs-8  col-lg-10">
            <div class="alert alert-danger" role="alert"></div>
        </div>
    </div>
    <!-- BIG OLE STINKIN TABLE -->
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <table id="example" name="example" class="display table-striped" cellspacing="10" width="100%" style="margin-left: auto; margin-right: auto; color: #DD9787">
            <thead>
            <tr>
                <th width="25%">DATE</th>
                <th>ACCOUNT</th>
                <th style="padding-left: 15px">DEBIT</th>
                <th></th>
                <th></th>
                <th style="padding-left: 15px">CREDIT</th>
                <th></th>
                <th></th>
                <th style="padding-left:15px; color:white;"></th>
            </tr>
            </thead>
            <tbody id="tableBodD" style="margin-bottom: 10px;">
            <tr>
				<td class="form-group">
					<div class="input-group date" id="datetimepicker6" data-target-input="nearest" style="padding-right: 20px">
						<input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker6" size="12" id="datetime" name="datetime"/>
						<div class="input-group-append" data-target="#datetimepicker6" data-toggle="datetimepicker"> 
							<div class="input-group-text" style="padding-left: 5px"><i class="fa fa-calendar fa-2x" style="padding-top: 3px"></i></div>
						</div>
					</div>
				</td>
			</tr>
            <tr id="rowSetDebit0">
<!--
                <td><input type="text" id="datepicker" size="10"></td>
-->
				<td></td>
                <td style="font-size: 28; color: #DD9787; padding-top: 15px">
                    <div class="form-group">
<!--<<<<<< HEAD 
                        <select class="form-control" id="debitAccountName0" name="debitAccountName0" onchange="checkOptD(id)">
                            <option value="" disabled="true" selected style="color: #D3D3D3">Select Account</option>
<!--======= -->
                        <select class="accountName debitAccountName form-control" id="debitAccountName0" name="debitAccountName0">
                            <option value="" disabled="true" selected style="color: #D3D3D3">Account</option>
                            <!-- php for filling debit accounts-->                            
                            <?php if ($result->num_rows > 0) {while($dataDebits = $result->fetch_assoc()) { ?>			
						    <?php echo "<option value=".$dataDebits['systemId'].">" . $dataDebits["accountId"] . " - " . $dataDebits["accountName"] . "</option>"; ?>
							<?php }} ?>
                        </select>
                    </div>                    
                </td>
                <td style="padding-top:15px; padding-left: 15px">
                    <div id = "debInput" class="input-group mb-3">
                        <div class="input-group-prepend" style="font-size: 20; padding-top: 5px; padding-right:5px">
                            <span class="input-group-text" >$</span>
                        </div>
                        <input id="debit0" name="debit0" type="text" class="form-control debit-input" placeholder="0" style="text-align:right;" aria-label="Amount (to the nearest dollar)" onkeydown="checkKey(event)" onchange="validateFloatKeyPress(this)">
                    </div>
                </td>
                <td>
                    <button id="addBtnD" type="button" class="btn btn-success" onclick="appendD()" style="font-size: 28; margin-top: 2px; margin-bottom: 1px; background-color: #A6C48A; border-bottom: 5px solid #678D58; border-top: 0px; border-left: 0px; border-right: 0px; width: 50px">+</button>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            
            </tbody>
            <tbody id="tableBodC">
            <tr id="rowSetCredit0">
                <td></td>
                <td style="font-size: 28; color: #DD9787; padding-top: 15px">
                    <div class="form-group">
<!--<<<<<< HEAD 
                        <select class="form-control" id="creditAccountName0" name="creditAccountName0" onchange="checkOptC(id)">
                            <option value="" disabled="true" selected style="color: #D3D3D3">Select Account</option>
<!--======= -->
                        <select class="accountName creditAccountName form-control" id="creditAccountName0" name="creditAccountName0">
                            <option value="" disabled="true" selected style="color: #D3D3D3">Account</option>
<!-->>>>>>> 27a99c5c21bcb122e5a17a7b754caddbe8f7a927 -->
                            <!-- php for filling debit accounts-->                            
                            <?php if ($result2->num_rows > 0) {while($dataCredits = $result2->fetch_assoc()) { ?>			
						    <?php echo "<option value=".$dataCredits['systemId'].">" . $dataCredits["accountId"] . " - " . $dataCredits["accountName"] . "</option>"; ?>
							<?php }} ?>
                        </select>
                    </div>      
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td style="padding-top:15px; padding-left: 15px">
                    <div  class="input-group mb-3">
                        <div class="input-group-prepend" style="font-size: 20; padding-top: 5px; padding-right:5px">
                            <span class="input-group-text" >$</span>
                        </div>
                        <input id="credit0" name="credit0" type="text" class="form-control credit-input" placeholder="0" style="text-align:right;" aria-label="Amount (to the nearest dollar)" onkeydown="checkKey(event)" onchange="validateFloatKeyPress(this)">
                    </div>
                </td>
                <td>
                    <button id="addBtnC" type="button" class="btn btn-success" onclick="appendC()" style="font-size: 28; margin-top: 2px; margin-bottom: 1px; background-color: #A6C48A; border-bottom: 5px solid #678D58; border-top: 0px; border-left: 0px; border-right: 0px; width: 50px">+</button>
                </td>
                <td></td>
            </tr>
            </tbody>
        </table>
    </div>
    <!-- DETAILS/NOTES INPUT SECTION -->
    <div class="row col-xs-4 col-sm-12 col-md-12 col-lg-12" style="margin-top: 20px; width: 100%;">
        <table style="margin: 0 auto;">
            <tr>
                <td>
                    <div class="input-group">
                        <textarea placeholder="Attached File" id="fileDisplay" disabled="true" class="form-control" style="resize: none; font-size: 15; height:30px" ></textarea>
                    </div>
                </td>
                <td col width="400px">
                    <div class="input-group">
                        <textarea id="description" name="description" class="form-control" aria-label="With textarea" maxlength="140" placeholder="Details..."></textarea>
                    </div>
                        <small>Please enter a comment up to 140 characters only.</small>
                </td>
                <td></td>
            </tr>
        </table>
    </div>
    <!-- ATTACH, SUBMIT, AND CANCEL BUTTONS -->
    <div class="row col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-top: 20px; width: 100%;">
        <table style="margin: 0 auto;">
            <tr>
                <td>
                    <label class="btn btn-default btn-success btn-large" style="margin-top: 2px; margin-bottom: 12px; background-color: #A6C48A; border-bottom: 5px solid #678D58; border-top: 0px; border-left: 0px; border-right: 0px;">
                        ATTACH <input id="filename" name="filename" type="file" accept=".xls,.pdf,.csv,.docx" hidden onchange="checkFile(id)" multiple>
                    </label>
                </td>
                <td>
                    <button id="subBtn" type="submit" class="btn btn-success btn-large" style="margin-top: 2px; margin-bottom: 12px; background-color: #A6C48A; border-bottom: 5px solid #678D58; border-top: 0px; border-left: 0px; border-right: 0px;">SUBMIT</button>
                </td>
                <td>
                    <a href="http://www.mindthegaap.info/Journal.php"><button type="button" class="btn btn-success btn-large" style="margin-top: 2px; margin-bottom: 12px; background-color: #A6C48A; border-bottom: 5px solid #678D58; border-top: 0px; border-left: 0px; border-right: 0px;">CANCEL</button></a>
                </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
        </table>
    </div>
    
    <input type="hidden" id="num_Debits" name="numDebits" value="1"/>
    <input type="hidden" id="num_Credits" name="numCredits" value="1"/> 
    
    </form>
</div>

<script type="text/javascript">

$(function() {
    $('#subBtn').click(function(e){
        e.preventDefault();
        var error = false;
        var totalDebit = 0;
        var totalCredit = 0;
        $('.debit-input').each(function(){
            if($(this).val()!='' && !isNaN($(this).val())) {
                totalDebit += parseFloat($(this).val());
            }
            if($(this).val()==''){
                error = true;
                $('.error-wrap').removeClass('d-none');
                $('.error-wrap .alert').html('Error! Please enter the debit amount.');
            }
        });
        $('.credit-input').each(function(){
            if($(this).val()!='' && !isNaN($(this).val())) {
                totalCredit += parseFloat($(this).val());
            }
            if($(this).val()==''){
                error = true;
                $('.error-wrap').removeClass('d-none');
                $('.error-wrap .alert').html('Error! Please enter the credit amount.');
            }
        });

        
        var creditAccountNamesArray = [];
        $('.creditAccountName option:selected').each(function(){
            if(!creditAccountNamesArray.includes($(this).text())){
                creditAccountNamesArray.push($(this).text());
            }else{
                error = true;
                $('.error-wrap').removeClass('d-none');
                $('.error-wrap .alert').html('Error! You can not select the same credit accounts.');
            }
        });
        var debitAccountNamesArray = [];
        $('.debitAccountName option:selected').each(function(){
            if(!debitAccountNamesArray.includes($(this).text())){
                debitAccountNamesArray.push($(this).text());
            }else{
                error = true;
                $('.error-wrap').removeClass('d-none');
                $('.error-wrap .alert').html('Error! You can not select the same debit accounts.');
            }
        });

        var allAccountNamesArray = [];
        $('.accountName option:selected').each(function(){
            if(!allAccountNamesArray.includes($(this).text())){
                allAccountNamesArray.push($(this).text());
            }else{
                error = true;
                $('.error-wrap').removeClass('d-none');
                $('.error-wrap .alert').html('Error! You can not select an account name twice in the same journal transaction.');
            }
        });

        $('.creditAccountName option:selected').each(function(){
            if($(this).text()=="Account"){
                error = true;
                $('.error-wrap').removeClass('d-none');
                $('.error-wrap .alert').html('Error! Please select the credit account name.'); 
            }
        });

        $('.debitAccountName option:selected').each(function(){
            if($(this).text()=="Account"){
                error = true;
                $('.error-wrap').removeClass('d-none');
                $('.error-wrap .alert').html('Error! Please select the debit account name.'); 
            }
        });

        if($('#datetime').val()===""){
            error = true;
            $('.error-wrap').removeClass('d-none');
            $('.error-wrap .alert').html('Error! Please select a date.');
        }
        if($('#type option:selected').val()===""){
            error = true;
            $('.error-wrap').removeClass('d-none');
            $('.error-wrap .alert').html('Error! Please select an entry type.');
        }

        if(!error){
            if(totalDebit==totalCredit) {
                $(this).parents('.journal-entry-form').submit();
            } else if(totalDebit>totalCredit) {
                $('.error-wrap').removeClass('d-none');
                $('.error-wrap .alert').html('Error! Debits are higher than Credits.');
            } else if(totalDebit<totalCredit) {
                $('.error-wrap').removeClass('d-none');
                $('.error-wrap .alert').html('Error! Credits are higher than Debits.');
            }else {
                $('.error-wrap').removeClass('d-none');
                $('.error-wrap .alert').html('Error! Something went wrong.');
            }
        }
    });

    function isFloat(n){
        return n === +n && n !== (n|0);
    }

	$('#datetimepicker6').datetimepicker({
		//defaultDate: "3/1/2018",
		format: 'MM-DD-YYYY', 
		useCurrent: true,
		minDate: new Date(), 
		disabledDate: [
			new Date()
		]
		//disabledDate: [
		//	moment(new Date),
		//	new Date(2018, 11 - 1, 21),
		//	"11/22/2018 00:53"
		//]
		//startDate: '-7d',
		//endDate: '+0d'
	});
});
</script>
<script type="text/javascript">
    var dCount = 0, cCount=0;
    var dIDName, cIDName, dAccName, cAccName, debID, credID, mbdLabel, abdLabel, mbcLabel, abcLabel;
    var debTotal=0, credTotal=0;
    var dIDs= [];
    var cIDs= []; 
    var dNames= []; 
    var cNames = [];
    
	function getAllDebits() {
		var opt = document.getElementById("debitAccountName0").options
		for(var i=1; i<opt.length; ++i){
			var x = opt[i];
			dIDs[i-1] = x.value;
			dNames[i-1] = x.text;
			
		}
	}
	
	function getAllCredits() {
		var opt = document.getElementById("creditAccountName0").options
		for(var i=1; i<opt.length; ++i){
			var x = opt[i];
			cIDs[i-1] = x.value;
			cNames[i-1] = x.text;
			
		}
	}
	
	// function checkOptD(id){
	// 	var selectedOpt = $('#'+id+' option:selected');
	// 	for(var i=0;i<=dCount;++i){
	// 		var compOpt = $('#debitAccountName'+i+' option:selected');
	// 		if( (selectedOpt.text() == compOpt.text())) {
	// 			if(id != ('debitAccountName'+i)){
	// 				alert("Error: You cannot select the same account.");
	// 				$('#'+id+' option:contains("Select")').prop('selected', true);
	// 			}
	// 		}
	// 	}
	// }
	
	// function checkOptC(id){
	// 	var selectedOpt = $('#'+id+' option:selected');
	// 	for(var i=0;i<=cCount;++i){
	// 		var compOpt = $('#creditAccountName'+i+' option:selected');
	// 		if( (selectedOpt.text() == compOpt.text())) {
	// 			if(id != ('creditAccountName'+i)){
	// 				alert("Error: You cannot select the same account.");
	// 				$('#'+id+' option:contains("Select")').prop('selected', true);
	// 			}
	// 		}
	// 	}
	// }
    
    function appendD() {
        getAllDebits();
        ++dCount;
        dIDName = ("rowSetDebit"+dCount);
        dAccName = ("debitAccountName"+dCount);
        debID = ("debit"+dCount);
        mbdLabel = ("minusBtnD"+dCount);
        abdLabel = ("addBtnD"+dCount);

        $("#tableBodD").append("<tr id=\"rowSetDebit\">\n" +
            "                    <td></td>\n" +
            "                    <td style=\"font-size: 28; color: #DD9787; padding-top: 15px\">\n" +
            "                        <div class=\"form-group\">\n" +
//<<<<<<< HEAD
            "                            <select class=\"form-control debitAccountName accountName\" id=\"debitAccountName\" name=\"debitAccountName\" >\n" +
            "                                <option value=\"\" disabled=\"true\" selected style=\"color: #D3D3D3\">Account</option>\n" +
//=======
//            "                            <select class=\"debitAccountName form-control\" id=\"debitAccountName\" name=\"debitAccountName\">\n" +
//            "                                <option value=\"\" disabled=\"true\" selected style=\"color: #D3D3D3\">Account</option>\n" +
//            "                                <option value=\"Cash\">105 Cash</option>\n" +
//            "                                <option value=\"Petty Cash\">106 Petty Cash</option>\n" +
//>>>>>>> 27a99c5c21bcb122e5a17a7b754caddbe8f7a927
            "                            </select>\n" +
            "                        </div>\n" +
            "                    </td>\n" +
            "                    <td style=\"padding-top:15px; padding-left: 15px\">\n" +
            "                        <div id = \"debInput\" class=\"input-group mb-3\">\n" +
            "                            <div class=\"input-group-prepend\" style=\"font-size: 20; padding-top: 5px; padding-right:5px\">\n" +
            "                                <span class=\"input-group-text\" >$</span>\n" +
            "                            </div>\n" +
            "                            <input id=\"debit\" name=\"debit\" type=\"text\" class=\"form-control debit-input\" placeholder=\"0\" style=\"text-align:right;\" aria-label=\"Amount (to the nearest dollar)\" onkeydown=\"checkKey(event)\" onchange=\"validateFloatKeyPress(this)\">\n" +
            "                        </div>\n" +
            "                    </td>\n" +
            "                    <td>\n" +
            "                        <button id=\"addBtnD\" type=\"button\" class=\"btn btn-success\" onclick=\"appendD()\" style=\"font-size: 28; margin-top: 2px; margin-bottom: 1px; background-color: #A6C48A; border-bottom: 5px solid #678D58; border-top: 0px; border-left: 0px; border-right: 0px; width: 50px\">+</button>\n" +
            "                    </td>\n" +
            "                    <td style=\"padding-left: 15px\">" +
            "                        <button id=\"minusBtnD\" type=\"button\" class=\"btn btn-success btn-small\" onclick= \"removeRowD(id)\" style=\"font-size: 28; margin-top: 0px; margin-bottom: 0px; background-color: #DD9787; border-bottom: 5px solid #BF715F; border-top: 0px; border-left: 0px; border-right: 0px; width: 50px\">-</button>\n" +
            "                    </td>\n" +
            "                    <td></td>\n" +
            "                    <td></td>\n" +
            "                    <td></td>\n" +
            "                </tr>");
        $('#debitAccountName').attr( 'name' , dAccName );
        $('#debit').attr( 'name' , debID );
        $('#rowSetDebit').attr( 'id' , dIDName );
        $('#debitAccountName').attr( 'id' , dAccName );
        $('#debit').attr( 'id' , debID );
        $('#minusBtnD').attr( 'id', mbdLabel);

        for(var i=0; i<dIDs.length;++i){
			$('#debitAccountName'+dCount).append($('<option>', {
				value: dIDs[i],
				text: dNames[i]
			}));
		}        
        $('#'+"rowSetDebit"+dCount).show() 
        document.getElementById("num_Debits").value = dCount + 1;
    }
    
    
    
    function appendC() {
        getAllCredits();
        ++cCount;
        cIDName = ("rowSetCredit"+cCount);
        cAccName = ("creditAccountName"+cCount);
        credID = ("credit"+cCount);
        mbcLabel = ("minusBtnC"+cCount);
        abcLabel = ("addBtnC"+cCount);
        $("#tableBodC").append("<tr id=\"rowSetCredit\">\n" +
            "                    <td></td>\n" +
            "                    <td style=\"font-size: 28; color: #DD9787; padding-top: 15px\">\n" +
            "                        <div class=\"form-group\">\n" +
//<<<<<<< HEAD
            "                            <select class=\"creditAccountName form-control accountName\" id=\"creditAccountName\" name=\"creditAccountName\" >\n" +
            "                                <option value=\"\" disabled=\"true\" selected style=\"color: #D3D3D3\">Account</option>\n" +
//=======
//            "                            <select class=\"creditAccountName form-control\" id=\"creditAccountName\" name=\"creditAccountName\">\n" +
//            "                                <option value=\"\" disabled=\"true\" selected style=\"color: #D3D3D3\">Account</option>\n" +
//            "                                <option>105 Cash</option>\n" +
//            "                                <option>106 Petty Cash</option>\n" +
//            "                                <option>201 Get Bent</option>\n" +
//            "                                <option>314 Filler</option>\n" +
//            "                                <option>125 Anything</option>\n" +
//            "                                <option>743 IDK</option>\n" +
//>>>>>>> 27a99c5c21bcb122e5a17a7b754caddbe8f7a927
            "                            </select>\n" +
            "                        </div>\n" +
            "                    </td>\n" +
            "                    <td></td>\n" +
            "                    <td></td>\n" +
            "                    <td></td>\n" +
            "                    <td style=\"padding-top:15px; padding-left: 15px\">\n" +
            "                        <div  class=\"input-group mb-3\">\n" +
            "                            <div class=\"input-group-prepend\" style=\"font-size: 20; padding-top: 5px; padding-right:5px\">\n" +
            "                                <span class=\"input-group-text\" >$</span>\n" +
            "                            </div>\n" +
            "                            <input id=\"credit\" name=\"credit\" type=\"text\" class=\"form-control credit-input\" placeholder=\"0\" style=\"text-align:right;\" aria-label=\"Amount (to the nearest dollar)\" onkeydown=\"checkKey(event)\" onchange=\"validateFloatKeyPress(this)\">\n" +
            "                        </div>\n" +
            "                    </td>\n" +
            "                    <td>\n" +
            "                        <button id=\"addBtnC\" type=\"button\" class=\"btn btn-success\" onclick=\"appendC()\" style=\"font-size: 28; margin-top: 2px; margin-bottom: 1px; background-color: #A6C48A; border-bottom: 5px solid #678D58; border-top: 0px; border-left: 0px; border-right: 0px; width: 50px\">+</button>\n" +
            "                    </td>\n" +
            "                    <td style=\"padding-left: 15px\">\n" +
            "                        <button id=\"minusBtnC\" type=\"button\" class=\"btn btn-success btn-small\" onclick= \"removeRowC(id)\" style=\"font-size: 28; margin-top: 0px; margin-bottom: 0px; background-color: #DD9787; border-bottom: 5px solid #BF715F; border-top: 0px; border-left: 0px; border-right: 0px; width: 50px\">-</button>\n" +
            "                    </td>\n" +
            "                    <td></td>\n" +
            "                </tr>");
        $('#creditAccountName').attr( 'name' , cAccName );
        $('#credit').attr( 'name' , credID );
        $('#rowSetCredit').attr( 'id' , cIDName );
        $('#creditAccountName').attr( 'id' , cAccName );
        $('#credit').attr( 'id' , credID );
        $('#minusBtnC').attr( 'id', mbcLabel);
        
        for(var i=0; i<cIDs.length;++i){
			$('#creditAccountName'+cCount).append($('<option>', {
				value: cIDs[i],
				text: cNames[i]
			}));
		}
        
        document.getElementById("num_Credits").value = cCount + 1;
    }
    //OLD APPEND
    /*document.getElementById('addBtn').onclick = function () {
        ++count;
        idName = ("rowSet"+count);
        accName = ("accountName"+count);
        debID = ("debit"+count);
        credID = ("credit"+count);
        mbLabel = ("minusBtn"+count);
        $( "#tableBod" ).append("<tr id = \"tableRow\" >\n" +
            "                    <td></td>\n" +
            "                    <td style=\"font-size: 28; color: #DD9787; padding-top: 15px\">\n" +
            "                        <div class=\"form-group\">\n" +
            "                            <select class=\"form-control\" id=\"accountName\" name=\"accountName\">\n" +
            "                                <!--<option value=\"\" disabled=\"true\" selected style=\"color: #D3D3D3\">Account</option>-->\n" +
            "                                <option value=\"\" disabled=\"true\" selected style=\"color: #D3D3D3\">Account</option>\n" +
            "                                <option>105 Cash</option>\n" +
            "                                <option>106 Petty Cash</option>\n" +
            "                                <option>201 Get Bent</option>\n" +
            "                                <option>314 Filler</option>\n" +
            "                                <option>125 Anything</option>\n" +
            "                                <option>743 IDK</option>\n" +
            "                            </select>\n" +
            "                        </div>\n" +
            "                    </td>\n" +
            "                    <td style=\"padding-top:15px; padding-left: 15px\">\n" +
            "                        <div id = \"debInput\" class=\"input-group mb-3\">\n" +
            "                            <div class=\"input-group-prepend\" style=\"font-size: 20; padding-top: 5px; padding-right:5px\">\n" +
            "                                <span class=\"input-group-text\" >$</span>\n" +
            "                            </div>\n" +
            "                            <input id=\"debit\" name=\"debitAmount\" type=\"text\" class=\"form-control\" placeholder=\"0\" style=\"text-align:right;\" aria-label=\"Amount (to the nearest dollar)\" onkeydown=\"checkKey(event)\" onchange=\"disableCred(id)\">\n" +
            "                        </div>\n" +
            "                    </td>\n" +
            "                    <td style=\"padding-top:15px; padding-left: 15px\">\n" +
            "                        <div  class=\"input-group mb-3\">\n" +
            "                            <div class=\"input-group-prepend\" style=\"font-size: 20; padding-top: 5px; padding-right:5px\"\">\n" +
            "                                <span class=\"input-group-text\" >$</span>\n" +
            "                            </div>\n" +
            "                            <input id=\"credit\" name=\"creditAmount\" type=\"text\" class=\"form-control\" placeholder=\"0\" style=\"text-align:right;\" aria-label=\"Amount (to the nearest dollar)\" onkeydown=\"checkKey(event)\" onchange=\"disableDeb(id)\">\n" +
            "                        </div>\n" +
            "                    </td>\n" +
            "                    <td style=\"padding-left: 15px\">\n" +
            "                        <button id=\"minusBtn\" type=\"submit\" class=\"btn btn-success btn-small\" onclick='removeRow(id)' style=\"font-size: 28; margin-top: 0px; margin-bottom: 0px; background-color: #DD9787; border-bottom: 5px solid #BF715F; border-top: 0px; border-left: 0px; border-right: 0px; width: 50px\">-</button>\n" +
            "                   </td>\n" +
            "                </tr>");
        $('#accountName').attr( 'name' , accName );
        $('#debit').attr( 'name' , debID );
        $('#credit').attr( 'name' , credID );
        $('#tableRow').attr( 'id' , idName );
        $('#accountName').attr( 'id' , accName );
        $('#debit').attr( 'id' , debID );
        $('#credit').attr( 'id' , credID );
        $('#minusBtn').attr( 'id', mbLabel);
    };*/
    // document.getElementById('subBtn').onclick = function () {
    //     var d=0,c=0;
    //     for(var i = 0; i <= dCount; ++i)
    //     {
    //         d = parseFloat($('#'+("debit"+i)).val());
    //         if(isNaN(d))
    //             d = 0;
    //         debTotal += (d);
    //     }
    //     for(var j = 0; j <= cCount; ++j)
    //     {
    //         c = parseFloat($('#'+("credit"+j)).val());
    //         if(isNaN(c))
    //             c = 0;
    //         credTotal += (c);
    //     }
    //     if(debTotal==credTotal) {
    //         //alert("Balanced");
    //     } else if(debTotal>credTotal) {
    //         alert("Debits are higher than Credits");
    //     } else if(debTotal<credTotal) {
    //         alert("Credits are higher than Debits");
    //     }else {
    //         alert("Something went wrong");
    //     }
    //     debTotal=0;
    //     credTotal=0;
    // }
    //OLD KEYDOWN
    /*    $(document).ready(function() {
            $(".amtInput").keydown(function (e) {
                // Allow: backspace, delete, tab, escape, enter and .
                if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                    // Allow: Ctrl+A, Command+A
                    (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
                    // Allow: home, end, left, right, down, up
                    (e.keyCode >= 35 && e.keyCode <= 40)) {
                    // let it happen, don't do anything
                    return;
                }
                // Ensure that it is a number and stop the keypress
                if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                    e.preventDefault();
                }
            });
        });*/
    function validateFloatKeyPress(el) {
        var v = parseFloat(el.value);
        el.value = (isNaN(v)) ? '' : v.toFixed(2);
    }
    function checkKey(e){
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
            // Allow: Ctrl+A, Command+A
            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
            // Allow: home, end, left, right, down, up
            (e.keyCode >= 35 && e.keyCode <= 40)) {
            // let it happen, don't do anything
            return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    }
    function checkFile(i){
        var fileInput = document.getElementById('filename');
        var filePath = fileInput.value;
        var allowedExtensions = /(\.xls|\.pdf|\.docx|\.csv)$/i;
        if(!allowedExtensions.exec(filePath)){
            alert('Please upload file having extensions .xls/.pdf/.docx/.csv only.');
            fileInput.value = '';
            return false;
        }else{
            var x = document.getElementById(i).value;
            x = x.slice(12);
            document.getElementById("fileDisplay").innerHTML = x;
        }
    }
    function removeRowD(v) {
        var s = v.substr(9);
        var r = ("rowSetDebit"+s);
        $('#'+r).remove();
        $('#'+("debit"+s)).attr('value', 0);
        $('#'+("dAccountName"+s)).attr('value', "");
    }
    function removeRowC(v) {
        var s = v.substr(9);
        var r = ("rowSetCredit"+s);
        $('#'+r).remove();
        $('#'+("credit"+s)).attr('value', 0);
        $('#'+("cAccountName"+s)).attr('value', "");
    }
   
	
</script>
</body>
</html>
