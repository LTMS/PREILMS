function printLeaveHistory(){
//	alert("Welcome to Print Page..!");
	
			var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,";
			disp_setting+="scrollbars=yes,width=700, height=500, left=10, top=25";
			var year=document.getElementById('year').value;
			var month=document.getElementById('month').value;
			if(month!="All"){
				var date1=month+", "+year;
			}
			else{
				var date1=year;
			}
			
			var emp=document.getElementById('emp').value;
			var year1=document.getElementById('year1').value;
			var emp_appr=document.getElementById('emp_appr').value; 
			
			
			if(year!=""){
				var txt ="Leave History of "+emp+" - "+date1;
			}
			if(year1!=""){
				var txt ="Leave History of "+emp_appr+" - "+year1;
			}
			

			var content_value = document.getElementById("normal_report").innerHTML;
			var docprint=window.open("","",disp_setting);
			docprint.document.open();
			docprint.document.write('<html><head>');
			docprint.document.write('</head><body onLoad="self.print()"><center>');
			
			docprint.document.write("<table align='center' width='100%'><tr style='font-size:20px;color:black;font-weight:bolder'><td align='center'>PREIPOLAR ENGINEERING PRIVATE LIMITED</td></td></tr></table>");
			docprint.document.write("<table align='center' width='100%'><tr style='font-size:16px;color:black;font-weight:bolder;background:white'><td align='center'>M-17, SIPCOT, Hi-Tech, SEZ, Sriperumbudur, Sunguvarchathiram, Kanchipuram 602105 - India</td></tr></table>");
			docprint.document.write("<p align='center' style='font-size:16px;color: black;font-weight:bold;'> "+txt+"</p>");
			docprint.document.write("");
			docprint.document.write(content_value);			
			docprint.document.write('</center></body></html>');
			docprint.document.close();
			docprint.focus();
			
			
	}



function printJobReport(){

			var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,";
			disp_setting+="scrollbars=yes,width=700, height=500, left=10, top=25";
			//var text = document.getElementById('report_option').value;
			//alert(text);
			var content_value = document.getElementById("contentData").innerHTML;
			var docprint=window.open("","",disp_setting);
			docprint.document.open();
			docprint.document.write('<html><head>');
			docprint.document.write('</head><body onLoad="self.print()"><center>');
			
			docprint.document.write("<table align='center' width='100%'><tr style='font-size:20px;color:black;font-weight:bolder'><td align='center'>PREIPOLAR ENGINEERING PRIVATE LIMITED</td></td></tr></table>");
			docprint.document.write("<table align='center' width='100%'><tr style='font-size:16px;color:black;font-weight:bolder;background:white'><td align='center'>M-17, SIPCOT, Hi-Tech, SEZ, Sriperumbudur, Sunguvarchathiram, Kanchipuram 602105 - India</td></tr></table>");
			docprint.document.write("<p align='center' style='font-size:16px;color: black;font-weight:bold;'> </p>");
			docprint.document.write("");
			docprint.document.write(content_value);
			
			docprint.document.write('</center></body></html>');
			docprint.document.close();
			docprint.focus();
			
	}



function printLeaveHistory1(){

			var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,";
			disp_setting+="scrollbars=yes,width=700, height=500, left=10, top=25";
			//var text = document.getElementById('report_option').value;
			//alert(text);
			var content_value = document.getElementById("contentData").innerHTML;
			var docprint=window.open("","",disp_setting);
			docprint.document.open();
			docprint.document.write('<html><head>');
			docprint.document.write('</head><body onLoad="self.print()"><center>');
			
			docprint.document.write("<table align='center' width='100%'><tr style='font-size:20px;color:black;font-weight:bolder'><td align='center'>PREIPOLAR ENGINEERING PRIVATE LIMITED</td></td></tr></table>");
			docprint.document.write("<table align='center' width='100%'><tr style='font-size:16px;color:black;font-weight:bolder;background:white'><td align='center'>M-17, SIPCOT, Hi-Tech, SEZ, Sriperumbudur, Sunguvarchathiram, Kanchipuram 602105 - India</td></tr></table>");
			docprint.document.write("<p align='center' style='font-size:16px;color: black;font-weight:bold;'> </p>");
			docprint.document.write("");
			docprint.document.write(content_value);
			
			docprint.document.write('</center></body></html>');
			docprint.document.close();
			docprint.focus();
			
	}



function printReport_Timesheet(){

			var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,";
			disp_setting+="scrollbars=yes,width=700, height=500, left=10, top=25";
			//var text = document.getElementById('report_option').value;
			//alert(text);
			var content_value = document.getElementById("contentData").innerHTML;
			var docprint=window.open("","",disp_setting);
			docprint.document.open();
			docprint.document.write('<html><head>');
			docprint.document.write('</head><body onLoad="self.print()"><center>');
			
			docprint.document.write("<table align='center' width='100%'><tr style='font-size:20px;color:black;font-weight:bolder'><td align='center'>PREIPOLAR ENGINEERING PRIVATE LIMITED</td></td></tr></table>");
			docprint.document.write("<table align='center' width='100%'><tr style='font-size:16px;color:black;font-weight:bolder;background:white'><td align='center'>M-17, SIPCOT, Hi-Tech, SEZ, Sriperumbudur, Sunguvarchathiram, Kanchipuram 602105 - India</td></tr></table>");
			docprint.document.write("<p align='center' style='font-size:16px;color: black;font-weight:bold;'> </p>");
			docprint.document.write("");
			docprint.document.write(content_value);
			
			docprint.document.write('</center></body></html>');
			docprint.document.close();
			docprint.focus();
			
	}



function printReport(){
//	alert("Welcome to Print Page..!");
			
		
			var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,";
			disp_setting+="scrollbars=yes,width=700, height=500, left=10, top=25";
			var year=document.getElementById("year").value;
			var month=document.getElementById("month").value;
			var emp = document.getElementById('report_option').value;
			
			var content_value = document.getElementById("contentData").innerHTML;
			var docprint=window.open("","",disp_setting);
			docprint.document.open();
			docprint.document.write('<html><head>');
			docprint.document.write('</head><body onLoad="self.print()"><center>');
			
			docprint.document.write("<table align='center' width='100%'><tr style='font-size:20px;color:black;font-weight:bolder'><td align='center'>PREIPOLAR ENGINEERING PRIVATE LIMITED</td></td></tr></table>");
			docprint.document.write("<table align='center' width='100%'><tr style='font-size:16px;color:black;font-weight:bolder;background:white'><td align='center'>M-17, SIPCOT, Hi-Tech, SEZ, Sriperumbudur, Sunguvarchathiram, Kanchipuram 602105 - India</td></tr></table>");
			docprint.document.write("<p align='center' style='font-size:16px;color: black;font-weight:bold;'> <u>"+emp+"</u></p>");
						docprint.document.write("");
						if(month!=''){
							docprint.document.write("<p align='center' style='font-size:15px;color: black;font-weight:bold;'> <u>"+year+" -  "+month+"</u></p>");
							}
						else{
							docprint.document.write("<p align='center' style='font-size:15px;color: black;font-weight:bold;'><u>"+year+"</u></p>");
							}
			docprint.document.write(content_value);
			
			docprint.document.write('</center></body></html>');
			docprint.document.close();
			docprint.focus();
			
	}



function printSummary(){

			var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,";
			disp_setting+="scrollbars=yes,width=700, height=500, left=10, top=25";
			var text = document.getElementById('report_option').value;
			//alert(text);
			var content_value = document.getElementById("contentData").innerHTML;
			var docprint=window.open("","",disp_setting);
			docprint.document.open();
			docprint.document.write('<html><head>');
			docprint.document.write('</head><body onLoad="self.print()"><center>');
			
			docprint.document.write("<table align='center' width='100%'><tr style='font-size:20px;color:black;font-weight:bolder'><td align='center'>PREIPOLAR ENGINEERING PRIVATE LIMITED</td></td></tr></table>");
			docprint.document.write("<table align='center' width='100%'><tr style='font-size:16px;color:black;font-weight:bolder;background:white'><td align='center'>M-17, SIPCOT, Hi-Tech, SEZ, Sriperumbudur, Sunguvarchathiram, Kanchipuram 602105 - India</td></tr></table>");
			docprint.document.write("<p align='center' style='font-size:16px;color: black;font-weight:bold;'> "+text+"</p>");
			docprint.document.write("");
			docprint.document.write(content_value);
			
			docprint.document.write('</center></body></html>');
			docprint.document.close();
			docprint.focus();
			
	}


function printOT(){

			var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,";
			disp_setting+="scrollbars=yes,width=700, height=500, left=10, top=25";
			var text = document.getElementById('report_option').value;
			var month = document.getElementById('month').value;
			var year = document.getElementById('year').value;
					//alert(text);
			var content_value = document.getElementById("contentData").innerHTML;
			var docprint=window.open("","",disp_setting);
			docprint.document.open();
			docprint.document.write('<html><head>');
			docprint.document.write('</head><body onLoad="self.print()"><center>');
			
			docprint.document.write("<table align='center' width='100%'><tr style='font-size:20px;color:black;font-weight:bolder'><td align='center'>PREIPOLAR ENGINEERING PRIVATE LIMITED</td></td></tr></table>");
			docprint.document.write("<table align='center' width='100%'><tr style='font-size:16px;color:black;font-weight:bolder;background:white'><td align='center'>M-17, SIPCOT, Hi-Tech, SEZ, Sriperumbudur, Sunguvarchathiram, Kanchipuram 602105 - India</td></tr></table>");
			docprint.document.write("<p align='center' style='font-size:16px;color: black;font-weight:bold;'> "+text+" for "+month+" - "+year+"</p>");
			docprint.document.write("");
			docprint.document.write(content_value);
			
			docprint.document.write('</center></body></html>');
			docprint.document.close();
			docprint.focus();
			
	}


function printOT_Admin(){

			var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,";
			disp_setting+="scrollbars=yes,width=700, height=500, left=10, top=25";
			var month = document.getElementById('month').value;
			var year = document.getElementById('year').value;
			var emp = document.getElementById('emp').value;
			var txt = "Over Time Hours Details of "+emp+" for "+month+" - "+year;;
							//alert(text);
			var content_value = document.getElementById("contentData").innerHTML;
			var docprint=window.open("","",disp_setting);
			docprint.document.open();
			docprint.document.write('<html><head>');
			docprint.document.write('</head><body onLoad="self.print()"><center>');
			
			docprint.document.write("<table align='center' width='100%'><tr style='font-size:20px;color:black;font-weight:bolder'><td align='center'>PREIPOLAR ENGINEERING PRIVATE LIMITED</td></td></tr></table>");
			docprint.document.write("<table align='center' width='100%'><tr style='font-size:16px;color:black;font-weight:bolder;background:white'><td align='center'>M-17, SIPCOT, Hi-Tech, SEZ, Sriperumbudur, Sunguvarchathiram, Kanchipuram 602105 - India</td></tr></table>");
			docprint.document.write("<p align='center' style='font-size:16px;color: black;font-weight:bold;'> "+txt+" </p>");
			docprint.document.write("");
			docprint.document.write(content_value);
			
			docprint.document.write('</center></body></html>');
			docprint.document.close();
			docprint.focus();
			
	}


function excelreport()
{
	/*if (action =="")
	{
		alert("select download content");
		return;
	}*/
	var action="hai";
	var interval=document.getElementById("interval").value;
	var startdate=$("#startdate").val();
	var enddate=$("#enddate").val();
	var ro1f=$("#1").attr('checked');
	var ro1r=$("#2").attr('checked');
	var ro2f=$("#3").attr('checked');
	var ro2r=$("#4").attr('checked');
	var ro3f=$("#5").attr('checked');
	var ro3r=$("#6").attr('checked');
	var comp=$("#7").attr('checked');
	var evaf=$("#8").attr('checked');
	var evar=$("#9").attr('checked');
	var evac=$("#10").attr('checked');
	var aunit=$("#11").attr('checked');
	var bunit=$("#12").attr('checked');
	var util=$("#13").attr('checked');
	var makeup=$("#14").attr('checked');
	var boetf=$("#15").attr('checked');
	var bof=$("#16").attr('checked');
	var ef=$("#17").attr('checked');
	
	var params=action+"::"+interval+"::"+startdate+"::"+enddate+"::"+ro1f+"::"+ro1r+"::"+ro2f+"::"+ro2r+"::"+ro3f+"::"+ro3r+"::"+comp+"::"+evaf+"::"+evar+"::"+evac+"::"+aunit+"::"+bunit+"::"+util+"::"+makeup+"::"+boetf+"::"+bof+"::"+ef;
	var downloadurl=site_url+"/reports/download_report/"+params;
	window.location=downloadurl;
		
}
function print_unupdated_timesheet(){
//	alert("Welcome to Print Page..!");
	
			var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,";
			disp_setting+="scrollbars=yes,width=700, height=500, left=10, top=25";
			var year=document.getElementById('year').value;
			var month=document.getElementById('month').value;
			if (month == "AllMon")
				{
				month="All Months ";
				}
			
			var emp=document.getElementById('user').value;
			if (emp =="AllEmp")
				{
				emp ="All Employees";
				}
			
			
			if(year!=""){
				var txt ="Unupdated timesheet  History of "+emp+" for "+month+"   "+year;
			}
			
			

			var content_value = document.getElementById("contentData").innerHTML;
			var docprint=window.open("","",disp_setting);
			docprint.document.open();
			docprint.document.write('<html><head>');
			docprint.document.write('</head><body onLoad="self.print()"><center>');
			
			docprint.document.write("<table align='center' width='100%'><tr style='font-size:20px;color:black;font-weight:bolder'><td align='center'>PREIPOLAR ENGINEERING PRIVATE LIMITED</td></td></tr></table>");
			docprint.document.write("<table align='center' width='100%'><tr style='font-size:16px;color:black;font-weight:bolder;background:white'><td align='center'>M-17, SIPCOT, Hi-Tech, SEZ, Sriperumbudur, Sunguvarchathiram, Kanchipuram 602105 - India</td></tr></table>");
			docprint.document.write("<p align='center' style='font-size:16px;color: black;font-weight:bold;'> "+txt+"</p>");
			docprint.document.write("");
			docprint.document.write(content_value);			
			docprint.document.write('</center></body></html>');
			docprint.document.close();
			docprint.focus();
			
			
	}