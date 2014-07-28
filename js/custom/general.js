var count=0;
$("#date1").datepicker({
	dateFormat: 'dd-mm-yy',
	defaultDate: new Date()	
});



			function findTotalHrs(){
				var start1 = document.getElementById("intimeH").value;
				var start2 = document.getElementById("intimeM").value;
				var start = start1+':'+start2;
				var end1 = document.getElementById("outtimeH").value;
				var end2 = document.getElementById("outtimeM").value;
				var end = end1+':'+end2;
				if(parseInt(start1)< parseInt(end1)){
					start = start.split(":");
				    end = end.split(":");
				    var startDate = new Date(0, 0, 0, start[0], start[1], 0);
				    var endDate = new Date(0, 0, 0, end[0], end[1], 0);if(startDate<endDate){
				    	var diff = endDate.getTime() - startDate.getTime();
						    
					    var hours = Math.floor(diff / 1000 / 60 / 60);
					    diff -= hours * 1000 * 60 * 60;
					    var minutes = Math.floor(diff / 1000 / 60);

					    //return (hours <= 9 ? "0" : "") + hours + ":" + (minutes <= 9 ? "0" : "") + minutes;
					    
						document.getElementById("total").value=(hours <= 9 ? "0" : "") + hours + ":" + (minutes <= 9 ? "0" : "") + minutes+":00";
						
						    }
					    else{
							document.getElementById("total").value="00:00:00";
						}
						
					}
				else{
					document.getElementById("total").value="00:00:00";
				}
			}
			
	
			function enableCol(){
				//document.getElementById('row1').style.display="none";
				document.getElementById('reset').style.display="none";
				document.getElementById('update').style.display="";
				document.getElementById('row2').style.display="";
				document.getElementById('col1').style.display="";
				document.getElementById('col2').style.display="";
				document.getElementById('col3').style.display="";
				document.getElementById('col4').style.display="";
				document.getElementById('col5').style.display="";
				document.getElementById('col6').style.display="";
				document.getElementById('col7').style.display="";
				document.getElementById('col8').style.display="";
				document.getElementById('col11').style.display="";
				document.getElementById('col12').style.display="";
				document.getElementById('col13').style.display="";
				document.getElementById('col14').style.display="none";
				document.getElementById('col16').style.display="none";
				document.getElementById('col15').style.display="";
				document.getElementById('col17').style.display="";
				document.getElementById('col18').style.display="";
				document.getElementById('col19').style.display="";
					document.getElementById("sicklimit").removeAttribute("readonly",0);
				document.getElementById("permiss").removeAttribute("readonly",0);
							
			}
				
			function update_param(){
				var start1 = document.getElementById("intimeH").value;
				var start2 = document.getElementById("intimeM").value;
				var start = start1+':'+start2+':00';
				
				var end1 = document.getElementById("outtimeH").value;
				var end2 = document.getElementById("outtimeM").value;
				var end = end1+':'+end2+':00';
				
				var ot1 = document.getElementById("otH").value;
				var ot2 = document.getElementById("otM").value;
				var oth = ot1+':'+ot2+':00';
				//alert(oth);
				var l1 = document.getElementById("lunchH").value;
				var l2 = document.getElementById("lunchM").value;
				var lh = l1+':'+l2+':00';
				
				var c1 = document.getElementById("coH").value;
				var c2 = document.getElementById("coM").value;
				var ch = c1+':'+c2+':00';
				
				var total=document.getElementById("total").value;
				var sicklimit=document.getElementById("sicklimit").value;
				var permiss1=document.getElementById("permiss").value;
					//alert(permiss1);
				if(start!="00:00:00" && total != '00:00:00' && lh!="00:00:00"){
				
				$.post(site_url+"/general/update_param/",{intime:start,outtime:end,tot:total,ot:oth,lunch:lh,sick_limit:sicklimit,permiss:permiss1,comp:ch},function(data){
									window.location.reload();
					});
				}
				else{
					document.getElementById("error").style.display="";
					
				}
			
			}
				
				
			
			
			function enableCol_details(){
			
				document.getElementById("modify").style.display="none";
				document.getElementById("update").style.display="";
				document.getElementById("cur_pwd").style.display="";
				document.getElementById("row1").style.display="";
				document.getElementById("row2").style.display="";
					
				document.getElementById("cur_pwd").value="";
				document.getElementById("cur_pwd").removeAttribute("readonly",0);
			//	document.getElementById("name").removeAttribute("readonly",0);
				document.getElementById("phone").removeAttribute("readonly",0);
				document.getElementById("mail").removeAttribute("readonly",0);
							
			}
			
			function update_details(){
				document.getElementById('buttonrow').innerHTML='Please wait..! System is sending mail..!';

				var pwd=document.getElementById("pwd_1").value;
				var cpwd=document.getElementById("pwd_2").value;
				
				if(pwd == cpwd){
					var data={};
					data["id"]=document.getElementById("u_id").value;
					data["pwd"]=document.getElementById("pwd_1").value;
					data["name"]=document.getElementById("name").value;				
					data["uname"]=document.getElementById("uname").value;				
					data["mail"]=document.getElementById("mail").value;				
							
					$.post(site_url+"/logincheck/update_details/",data,function(result){
						window.location.reload();
						//alert(result);
					});
				}
				else{
					document.getElementById("error").style.display="";
				}
				
			}
			
			
			function show_holidays(){
				var yr=document.getElementById('year').value;
				if(yr!=""){

					$.post(site_url+"/general/show_holidays",{year:yr},function(data){
						//alert(data);
								$("#contentData").html("");
								$("#contentData").append(data);
					});
				}
			
			}
			
			function show_holidays_emp(){
				var yr=document.getElementById('year').value;
				if(yr!=""){

					$.post(site_url+"/general/show_holidays_emp",{year:yr},function(data){
						//alert(data);
								$("#contentData").html("");
								$("#contentData").append(data);
					});
				}
			
			}
			
			
			function add_holiday(){	
				
				var date1=document.getElementById('date1').value;
				var desc1=document.getElementById('desc1').value;
					
				if(desc1!="" && date1!=""){

					$.post(site_url+"/general/add_holiday",{desc:desc1,date:date1},function(data){
						//alert(data);	
						show_holidays();
						document.getElementById('date1').value="";
						document.getElementById('desc1').value="";
			
					});
					
					
				}
			
			}
			
			function remove_holiday(id1){	
			
				if(id1!=""){
					$.post(site_url+"/general/remove_holiday",{id:id1},function(data){
						//alert(data);			
						show_holidays();
					});
				
				}
			
			}
			
			
			
			function submitForm(){
				
				var form = document.getElementById("loing_form");
			  form.submit();
			  alert('Hi.!');
			}
			
			
			
			
			
			function showDiv(op){
				if(op=='1'){
					document.getElementById('head').innerHTML='Feedback :';
					document.getElementById('FEED').style.color='#FF800D';
					document.getElementById('ERROR').style.color='black';
					
					document.getElementById('feed_error').value='1';
							}
				else{
					document.getElementById('head').innerHTML='Error :';
					document.getElementById('ERROR').style.color='#FF800D';
					document.getElementById('FEED').style.color='black';

					document.getElementById('feed_error').value='2';

				}
			
		}
		

				
				
			function	sendError(){
				
				document.getElementById('buttonrow').innerHTML='Please wait..! System is sending mail..!';
				
				var sub=document.getElementById('feed_error').value;
				var rbody=document.getElementById('body').value;
				var split=":";
				var body=rbody.replace(/[^A-Z0-9]/ig, "_");
				var msg=sub.concat(split,body);
				//alert(msg);
				$.ajaxFileUpload({	type:'post', url :site_url+'/general/upload_file/'+msg,   secureuri  :false, fileElementId  :'file', 
			         		dataType    : 'json',data :{  'msg': msg },success  : function (data)
			         		{
		         		}
					});
     			document.getElementById('buttonrow').innerHTML='Your Feedback/Report has been sent successfully.!';

				juploadstop();
				
				}
			
			
			function juploadstop(result)
			{
			    if(result==0)
			    {
			        $(".imageholder").html("");

			    }
			    // the result will be the path to the image
			    else if(result!=0)
			    {
			        $(".imageholder").html("");
			        // imageplace is the class of the div where you want to add the image  
			        $(".imageplace").append("<img src='"+result+"'>");
			    }   
			}

			$('.fake_section').click(function(e){
			    //e.preventDefault();

			    $('#file').trigger('click');    
			});

			$('#file').change(function(e){
			    var filename = $(this).val();
			    var ext = filename.split('.').pop().toLowerCase();

			    if( $.inArray( ext, ['gif','jpg','jpeg','png','pdf','txt','doc'] ) == -1 ){
			        alert('not valid!');
			    }
			    else{
			        $('input[name="fake_section1"]').val(filename);
			    }
			});
			
			
		function change_job_details(counter)
		{
		document.getElementById("all_jobs").style.display='none';
		document.getElementById("all_jobs_head").style.display='none';
		document.getElementById("search_box").style.display='none';
		document.getElementById("job_edit").style.display='';
		document.getElementById("job_edit_head").style.display='';
		//alert(counter);
		
		var Emp_Name=document.getElementById("name"+counter).innerHTML;
		var Job_No=document.getElementById("job_no"+counter).innerHTML;
		var Target_Hours=document.getElementById("target_hours"+counter).innerHTML;
		var Job_Desc=document.getElementById("job_desc"+counter).innerHTML;
		var Added_Time=document.getElementById("added_time"+counter).innerHTML;
		//alert(Emp_Name+Job_No+Job_Desc);
		$.post(site_url+"/general/fetch_job_emp",{job_no:Job_No},function(data)
		{
			//alert(data);
			var Employee=["","",""];
			var Emp=data.split("!");
			for(i=1;i<Emp.length;i++)
				{
				alert(Emp[i]);
				}
			
		}		
		);
		document.getElementById("job_no_span").innerHTML=Job_No;
		
		if(Target_Hours !=0)
			{
			document.getElementById("target_hours").value=Target_Hours;
			document.getElementById("target_hours").disabled=true;
			}
		document.getElementById("job_time_span").innerHTML=Added_Time;
		document.getElementById("job_desc_span").innerHTML=Job_Desc;
		document.getElementById("job_emp_span").innerHTML=Emp_Name;
		}
		function back_to_all_jobs()
		{
			document.getElementById("all_jobs").style.display='';
			document.getElementById("all_jobs_head").style.display='';
			document.getElementById("search_box").style.display='';
			document.getElementById("job_edit").style.display='none';	
			document.getElementById("job_edit_head").style.display='none';
			window.location.reload();
			
		}
		function Update_job()
		{
			
			var Hours=document.getElementById("target_hours").value;
			var hours_stat=document.getElementById("target_hours").disabled;
	if(hours_stat !=true)
		{
			if(Hours != "")
				{
					if(  isNaN(Hours))
						{
						document.getElementById("error").innerHTML="Please Enter Valid Hours";
						
						}
					else
						{
						document.getElementById("error").innerHTML="";
						var Job_no=document.getElementById("job_no_span").innerHTML;
						$.post(site_url+"/general/Update_job",{job_no:Job_no,hours:Hours},function(data)
								{
								if (data ='ok')
									{
									document.getElementById("error").style.color='#41a317';
									document.getElementById("error").innerHTML="Target hours is updated";
									}
							});
					
						}
				}
			else
				{
				document.getElementById("error").innerHTML="Please Enter  Hours";
				}
		}else
			{
			document.getElementById("error").innerHTML="Hours already Updated";
			}
		}
		String.prototype.trim = function()
		{return ((this.replace(/^[\s\xA0]+/, "")).replace(/[\s\xA0]+$/, ""));};

		String.prototype.startsWith = function(str)
		{return (this.match(str)==str);};

		String.prototype.endsWith = function(str)
		{return (this.match(str+"$")==str);};
		
		String.prototype.endsWithroman = function(str)
		{return (this.match(str+"")==str);};
		function searchbyjobno()
		{
			window.count=0;
			//alert(window.count);
			document.getElementById('search_desc').value="";
			var jobno=document.getElementById('search_job_no').value;
			filterTableByjobno(jobno);
			
		}
		function filterTableByjobno(str){
			
			str.trim();
			 var rowid, colid, rowc,vbid;
			  rcount=document.getElementById("hrowcount");
			  rowc=rcount.value;
			  
			  for(var i=1;i<=rowc;i++){
			    rowid="row"+i;
			    colid="job_no"+i;
			    var lstr=(str.toString()).toLowerCase();
			    
			    //alert(document.getElementById(colid).value);
			    displayRowEndsWith(rowid,colid,lstr,rowc,i);
			  }
			}
		function searchbyjobdesc()
		{
			document.getElementById('search_job_no').value="";
			window.count=0;
			var jobdesc=document.getElementById('search_desc').value;
			filterTableByjobdesc(jobdesc);
			
		}
		function filterTableByjobdesc(str){
			
			str.trim();
			 var rowid, colid, rowc,vbid;
			  rcount=document.getElementById("hrowcount");
			  rowc=rcount.value;
			  
			  for(var i=1;i<=rowc;i++){
			    rowid="row"+i;
			    colid="job_desc"+i;
			    var lstr=(str.toString()).toLowerCase();
			    
			    //alert(document.getElementById(colid).value);
			    displayRowEndsWith(rowid,colid,lstr,rowc,i);
			  }
			}
		function displayRowEndsWith(rowid,colid,str,rowc,i){
			var row = document.getElementById(rowid);
		      var searchcol= document.getElementById(colid);
		     var colstr=searchcol.innerHTML;
		   // alert(colstr);
		    var lcolstr=(colstr.toString()).toLowerCase();
		    
		      if (lcolstr.startsWith(str))
		    	  {
		    	  window.count=window.count+1;
					//alert(window.count);
		    	  document.getElementById("results").innerHTML=window.count+"  results returned...!";
		          row.style.display = '';
		    	  }
		      else
		    	  {
		    	  document.getElementById("results").innerHTML=window.count+"  results returned...!";
		    	row.style.display = 'none';
		    	  }
		      
		}
		