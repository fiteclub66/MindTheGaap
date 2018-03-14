<!DOCTYPE html>
<html>
<head>
	<title>Journal Entry</title>
	<?php include ("includes/header2.php") ?>
<body style="background-color:#FFFFFF">
	<?php include ("includes/navbar.php") ?>
		<div class="container">
			<div class="row" style="margin-top: 40px">
				<div class="row col-xs-2 col-sm-2 col-md-2 col-lg-1"></div>
				<div class="row col-xs-10 col-sm-10 col-md-7 col-lg-7">
					<h1 style="color: #DD9787; border-bottom: 3px solid #A6C48A;">Journal Entry</h1>
				</div>

				<div class="row col-xs-12 col-sm-12 col-md-3 col-lg-4">
					<a href="http://www.mindthegaap.info/Create_journal_Entry.php">
						<button type="button" class="btn btn-success create-button" style="margin-top: 2px; margin-bottom: 12px; background-color: #A6C48A; border-bottom: 5px solid #678D58; border-top: 0px; border-left: 0px; border-right: 0px;">CREATE</button>
						<input type="text" class="the-date" name="the-date" style="width:0;height:0;opacity:0;">
					</a>
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div id="example_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
					<div class="row">
						<div class="col-sm-12 col col-md-6">
							<div class="dataTables_lenght" id="example_length">
								<label>Show
									<select name="example_lenght" placeholder aria-controls="example" class="form-control form-control-sm">
										<option value="10">10</option>
										<option value="25">25</option>
										<option value="50">50</option>
										<option value="100">100</option>
									</select>Entries
								</label>
							</div>
						</div>
						<div class="col-sm-12 col-md-6">
							<div id="example_filter" class="dataTables_filter">
								<label>Search:<input type="search" class="form-control form-control-sm" placeholder aria-controls="example"></label>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<table id="example" name="example" class="display table-striped dataTable" cellspacing="10" width="100%" role="grid" arial-describedby="example_info" style="margin-left: auto; margin-right: auto; color: rgb(221,151,135); width: 100%">
				        <thead>
				        	<tr>
				                <th rowspan="1" colspan="1" class="pr-1 pl-1"><input style="width:120px;" type="text" placeholder="Search Name"></th>
				                <th rowspan="1" colspan="1" class="pr-1 pl-1"><input style="width:120px;" type="text" placeholder="Search REF"></th>
				                <th rowspan="1" colspan="1" class="pr-1 pl-1"><input style="width:120px;" type="text" placeholder="Search Account"></th>
				                <th rowspan="1" colspan="1" class="pr-1 pl-1"><input style="width:120px;" type="text" placeholder="Search DR."></th>
				                <th rowspan="1" colspan="1" class="pr-1 pl-1"><input style="width:120px;" type="text" placeholder="Search CR."></th>
				                <th rowspan="1" colspan="1" class="pr-1 pl-1"><input style="width:120px;" type="text" placeholder="Search Status"></th>
				                <th rowspan="1" colspan="1" class="pr-1 pl-1"><input style="width:120px;" type="text" placeholder="Search File"></th>
				                <th style="color: white">&nbsp;</th>
				            </tr>
				            <tr role="row">
				                <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 59px; ">DATE</th>
				                <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 59px; ">REF</th>
				                <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 59px; ">ACCOUNT</th>
				                <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 59px; ">DR.</th>
				                <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 59px; ">CR.</th>
				                <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 59px; ">STATUS</th>
				                <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 59px; ">FILE</th>
				                <th style="color:white; width: 53px" class="sorting_disabled" rowspan="1" colspan="1">&nbsp;</th>
				            </tr>
				        </thead>
				        <!-- uncomment if search bar per column is wanted -->
				        <tfoot>
				            
				        </tfoot>
						<tbody style="margin-bottom: 10px;">
					    <tr role="row" class="odd">
				                <td>01/14</td>
				                <td>C108</td>
				                <td>Cash</td>
				                <td>150.00</td>
				                <td>0.00</td>
				                <td>active</td>
				                <td>text.txt</td>
				                <td><a href="http://www.mindthegaap.info/Edit_journalEntry.php"><button type="button" class="btn btn-success" style="background-color: #A6C48A; border-bottom: 5px solid #678D58; border-top: 0px; border-left: 0px; border-right: 0px; padding-bottom: -5px">EDIT</button></a>
				                </td>
				            </tr>
				            <tr role="row" class="even">
				                <td>01/14</td>
				                <td>C108</td>
				                <td>Cash</td>
				                <td>150.00</td>
				                <td>0.00</td>
				                <td>active</td>
				                <td>text.txt</td>
				                <td><a href="http://www.mindthegaap.info/Edit_journalEntry.php"><button type="button" class="btn btn-success" style="background-color: #A6C48A; border-bottom: 5px solid #678D58; border-top: 0px; border-left: 0px; border-right: 0px; padding-bottom: -5px">EDIT</button></a>
				                </td>
				            </tr>
				            <tr role="row" class="odd">
				                <td>01/14</td>
				                <td>C108</td>
				                <td>Cash</td>
				                <td>150.00</td>
				                <td>0.00</td>
				                <td>active</td>
				                <td>text.txt</td>
				                <td><a href="http://www.mindthegaap.info/Edit_journalEntry.php"><button type="button" class="btn btn-success" style="background-color: #A6C48A; border-bottom: 5px solid #678D58; border-top: 0px; border-left: 0px; border-right: 0px; padding-bottom: -5px">EDIT</button></a>
				                </td>
				            </tr>
				            <tr role="row" class="even">
				                <td>01/14</td>
				                <td>C108</td>
				                <td>Cash</td>
				                <td>150.00</td>
				                <td>0.00</td>
				                <td>active</td>
				                <td>text.txt</td>
				                <td><a href="http://www.mindthegaap.info/Edit_journalEntry.php"><button type="button" class="btn btn-success" style="background-color: #A6C48A; border-bottom: 5px solid #678D58; border-top: 0px; border-left: 0px; border-right: 0px; padding-bottom: -5px">EDIT</button></a>
				                </td>
				            </tr>
				            <tr role="row" class="odd">
				                <td>01/14</td>
				                <td>C108</td>
				                <td>Cash</td>
				                <td>150.00</td>
				                <td>0.00</td>
				                <td>active</td>
				                <td>text.txt</td>
				                <td><a href="http://www.mindthegaap.info/Edit_journalEntry.php"><button type="button" class="btn btn-success" style="background-color: #A6C48A; border-bottom: 5px solid #678D58; border-top: 0px; border-left: 0px; border-right: 0px; padding-bottom: -5px">EDIT</button></a>
				                </td>
				            </tr>
				        </tbody>
				    </table>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12 col-md-5">
					<div class="dataTables_info" id="example_info" role="status" arial-live="polite">Showing 1 to 10 of 12 entries</div>
					<div class="col-sm-12 col-md-7">
						<div class="dataTables_paginate paging_simple_numbers" id="example_paginate">
							<ul class="pagination">
								<li class="paginate_button page-item previous disabled" id="example_previous"><a href="#" aria-controls="example" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
								<li class="paginate_button page-item previous active"><a href="#" aria-controls="example" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
								<li class="paginate_button page-item"><a href="#" aria-controls="example" data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
								<li class="paginate_button page-item next" id="example_next"><a href="#" aria-controls="example" data-dt-idx="3" tabindex="0" class="page-link">Next</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
		<script type="text/javascript">
			var todayDate = new Date();
			$(document).ready(function(){
				$('.the-date').datepicker({
					minDate: todayDate,
					dateFormat: "yy-mm-dd",
					onSelect: function(dateText, inst) {
						var selectedDate = $(this).val();
						window.location = "createJournalEntry.php?date="+selectedDate;
					}
				});
				$('.create-button').click(function(e){
					e.preventDefault();
					$('.the-date').datepicker("show");

				});
			});
		</script>
	</body>
</html>