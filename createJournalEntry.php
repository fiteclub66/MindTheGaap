<?php
session_start();
if ($_SESSION['username'] == null) {
    header('Location: /index.php');
}

if(!empty($_GET['date'])){
    $date = $_GET['date'];
}else{
    $date = "";
}
echo $date;
?>

<html lang="en">
<head>
    <title>NEW JOURNAL ENTRY</title>
    <!-- header is in the header.php file with all the scripts, css, and other files needed for formating -->
    <!doctype html>
    <!doctype html>
    <html lang="en">
    <head>
        <title>NEW JOURNAL ENTRY</title>
        <!-- header is in the header.php file with all the scripts, css, and other files needed for formating -->

        <?php include ($_SERVER['DOCUMENT_ROOT']."/includes/header.php") ?>

<body style="background-color:#FFFFFF">

<!-- horizontal navigation bar at the top of each page is in the navbar.php file -->
<?php include ($_SERVER['DOCUMENT_ROOT']."/includes/navbar.php") ?>
<div class="container">
    <div class="row" style="margin-top: 40px">
        <div class="row col-xs-2 col-sm-2 col-md-2 col-lg-1"></div>
        <div class="row col-xs-10 col-sm-10 col-md-7 col-lg-7">
            <h1 style="color: #DD9787; border-bottom: 3px solid #A6C48A;">NEW JOURNAL ENTRY</h1>
        </div>
        <div class="row col-xs-12 col-sm-12 col-md-12 col-lg-2" style="float: right;">
            <select class="form-control" id="type" name="type">
                <option value="" disabled="true" selected style="color: #D3D3D3">Entry Type</option>
                <option>REF</option>
                <option>ADJ</option>
                <option>CLO</option>
            </select>
        </div>
    </div>
    <!-- BIG OLE STINKIN TABLE -->
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <table id="example" name="example" class="display table-striped" cellspacing="10" width="90%" style="margin-left: auto; margin-right: auto; color: #DD9787">
            <thead>
            <tr>
                <th>DATE</th>
                <th>ACCOUNT</th>
                <th style="padding-left: 15px">DR</th>
                <th></th>
                <th></th>
                <th style="padding-left: 15px">CR</th>
                <th></th>
                <th></th>
                <th style="padding-left:15px; color:white;"></th>
            </tr>
            </thead>
            <tbody id="tableBodD" style="margin-bottom: 10px;">
            <tr id="rowSetDebit0">
                <td><?php echo $date; ?></td>
                <td style="font-size: 28; color: #DD9787; padding-top: 15px">
                    <div class="form-group">
                        <select class="form-control" id="debitAccountName0" name="debitAccountName0">
                            <option value="" disabled="true" selected style="color: #D3D3D3">Account</option>
                            <!-- php for filling debit accounts-->
                        </select>
                    </div>
                </td>
                <td style="padding-top:15px; padding-left: 15px">
                    <div id = "debInput" class="input-group mb-3">
                        <div class="input-group-prepend" style="font-size: 20; padding-top: 5px; padding-right:5px">
                            <span class="input-group-text" >$</span>
                        </div>
                        <input id="debit0" name="debit0" type="text" class="form-control" placeholder="0" style="text-align:right;" aria-label="Amount (to the nearest dollar)" onkeydown="checkKey(event)" onchange="validateFloatKeyPress(this)">
                    </div>
                </td>
                <td>
                    <button id="addBtnD" type="submit" class="btn btn-success" onclick="appendD()" style="font-size: 28; margin-top: 2px; margin-bottom: 1px; background-color: #A6C48A; border-bottom: 5px solid #678D58; border-top: 0px; border-left: 0px; border-right: 0px; width: 50px">+</button>
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
                        <select class="form-control" id="creditAccountName0" name="creditAccountName0">
                            <option value="" disabled="true" selected style="color: #D3D3D3">Account</option>
                            <!-- php for filling debit accounts-->
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
                        <input id="credit0" name="credit0" type="text" class="form-control" placeholder="0" style="text-align:right;" aria-label="Amount (to the nearest dollar)" onkeydown="checkKey(event)" onchange="validateFloatKeyPress(this)">
                    </div>
                </td>
                <td>
                    <button id="addBtnC" type="submit" class="btn btn-success" onclick="appendC()" style="font-size: 28; margin-top: 2px; margin-bottom: 1px; background-color: #A6C48A; border-bottom: 5px solid #678D58; border-top: 0px; border-left: 0px; border-right: 0px; width: 50px">+</button>
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
                    <a href="http://www.mindthegaap.info/journalEntry.php"><button type="submit" class="btn btn-success btn-large" style="margin-top: 2px; margin-bottom: 12px; background-color: #A6C48A; border-bottom: 5px solid #678D58; border-top: 0px; border-left: 0px; border-right: 0px;">CANCEL</button></a>
                </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
        </table>
    </div>
</div>

<script type="text/javascript">
    var dCount = 0, cCount=0;
    var dIDName, cIDName, dAccName, cAccName, debID, credID, mbdLabel, abdLabel, mbcLabel, abcLabel;
    var debTotal=0, credTotal=0;

    function appendD() {
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
            "                            <select class=\"form-control\" id=\"debitAccountName\" name=\"debitAccountName\">\n" +
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
            "                            <input id=\"debit\" name=\"debit\" type=\"text\" class=\"form-control\" placeholder=\"0\" style=\"text-align:right;\" aria-label=\"Amount (to the nearest dollar)\" onkeydown=\"checkKey(event)\" onchange=\"validateFloatKeyPress(this)\">\n" +
            "                        </div>\n" +
            "                    </td>\n" +
            "                    <td>\n" +
            "                        <button id=\"addBtnD\" type=\"submit\" class=\"btn btn-success\" onclick=\"appendD()\" style=\"font-size: 28; margin-top: 2px; margin-bottom: 1px; background-color: #A6C48A; border-bottom: 5px solid #678D58; border-top: 0px; border-left: 0px; border-right: 0px; width: 50px\">+</button>\n" +
            "                    </td>\n" +
            "                    <td style=\"padding-left: 15px\">" +
            "                        <button id=\"minusBtnD\" type=\"submit\" class=\"btn btn-success btn-small\" onclick= \"removeRowD(id)\" style=\"font-size: 28; margin-top: 0px; margin-bottom: 0px; background-color: #DD9787; border-bottom: 5px solid #BF715F; border-top: 0px; border-left: 0px; border-right: 0px; width: 50px\">-</button>\n" +
            "                    </td>\n" +
            "                    <td></td>\n" +
            "                    <td></td>\n" +
            "                    <td></td>\n" +
            "                </tr>")

        $('#debitAccountName').attr( 'name' , dAccName );
        $('#debit').attr( 'name' , debID );
        $('#rowSetDebit').attr( 'id' , dIDName );
        $('#debitAccountName').attr( 'id' , dAccName );
        $('#debit').attr( 'id' , debID );
        $('#minusBtnD').attr( 'id', mbdLabel);
    }
    function appendC() {
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
            "                            <select class=\"form-control\" id=\"creditAccountName\" name=\"creditAccountName\">\n" +
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
            "                    <td></td>\n" +
            "                    <td></td>\n" +
            "                    <td></td>\n" +
            "                    <td style=\"padding-top:15px; padding-left: 15px\">\n" +
            "                        <div  class=\"input-group mb-3\">\n" +
            "                            <div class=\"input-group-prepend\" style=\"font-size: 20; padding-top: 5px; padding-right:5px\">\n" +
            "                                <span class=\"input-group-text\" >$</span>\n" +
            "                            </div>\n" +
            "                            <input id=\"credit\" name=\"credit\" type=\"text\" class=\"form-control\" placeholder=\"0\" style=\"text-align:right;\" aria-label=\"Amount (to the nearest dollar)\" onkeydown=\"checkKey(event)\" onchange=\"validateFloatKeyPress(this)\">\n" +
            "                        </div>\n" +
            "                    </td>\n" +
            "                    <td>\n" +
            "                        <button id=\"addBtnC\" type=\"submit\" class=\"btn btn-success\" onclick=\"appendC()\" style=\"font-size: 28; margin-top: 2px; margin-bottom: 1px; background-color: #A6C48A; border-bottom: 5px solid #678D58; border-top: 0px; border-left: 0px; border-right: 0px; width: 50px\">+</button>\n" +
            "                    </td>\n" +
            "                    <td style=\"padding-left: 15px\">\n" +
            "                        <button id=\"minusBtnC\" type=\"submit\" class=\"btn btn-success btn-small\" onclick= \"removeRowC(id)\" style=\"font-size: 28; margin-top: 0px; margin-bottom: 0px; background-color: #DD9787; border-bottom: 5px solid #BF715F; border-top: 0px; border-left: 0px; border-right: 0px; width: 50px\">-</button>\n" +
            "                    </td>\n" +
            "                    <td></td>\n" +
            "                </tr>");

        $('#creditAccountName').attr( 'name' , cAccName );
        $('#credit').attr( 'name' , credID );
        $('#rowSetCredit').attr( 'id' , cIDName );
        $('#creditAccountName').attr( 'id' , cAccName );
        $('#credit').attr( 'id' , credID );
        $('#minusBtnC').attr( 'id', mbcLabel);
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
    document.getElementById('subBtn').onclick = function () {
        var d=0,c=0;
        for(var i = 0; i <= dCount; ++i)
        {
            d = parseFloat($('#'+("debit"+i)).val());
            if(isNaN(d))
                d = 0;
            debTotal += (d);
        }
        for(var j = 0; j <= cCount; ++j)
        {
            c = parseFloat($('#'+("credit"+j)).val());
            if(isNaN(c))
                c = 0;
            credTotal += (c);
        }
        if(debTotal==credTotal)
            alert("Balanced");
        else if(debTotal>credTotal)
            alert("Debits Higher");
        else if(debTotal<credTotal)
            alert("Credits Higher");
        else
            alert("Something went wrong");
        debTotal=0;
        credTotal=0;
    }
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

