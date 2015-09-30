// JavaScript Document
function selectAll() 
{ 
	var len = document.frm.length ;  
	var i ;
	
	for (i = 0  ; i < len ; i++)
	{
		var frmContent = document.frm.elements[i] ;
   
		//if (frmContent.name == 'remove' )  
		//{
			//alert('cont');
			//continue;
		//}
   
		if (frmContent.type == 'checkbox') 
		{
			frmContent.checked = true;		
		} 
	}
	
	//var str=document.getElementById('ab').innerHTML;
	  	 	  
	//if(str='<input name=checkbox type=checkbox onClick=javascript:selectAll();>')
	//{
	//alert('str = ' + str);
	document.getElementById('ab').innerHTML=" &nbsp; <a href='javascript:deselectAll()' title='Click to select/de-select all records'>C</a><hr />";
	//document.getElementById('ab').innerHTML="<input name=checkbox type=checkbox onClick='javascript:deselectAll();'  title='Click to select/de-select all records' checked=checked>";
	//}
 } // function selectAll() 
 
  function deselectAll() {
 
  var len = document.frm.length ;
  
  var i ;
  for (i = 0  ; i < len ; i++)
  {
   var frmContent = document.frm.elements[i];
   
   //if (frmContent.name == 'remove' )  
   //continue;
   
    if (frmContent.type == 'checkbox') {
    frmContent.checked = false;
		
    } 
	  }
	 // var str=document.getElementById('ab').innerHTML;
	//if(str='<input name=checkbox type=checkbox onClick="javascript:deselectAll();" checked=false>')
	//{
	//document.getElementById('ab').innerHTML="<input name=checkbox type=checkbox onClick='javascript:selectAll();'  title='Click to select/de-select all records'>";
	document.getElementById('ab').innerHTML=" &nbsp; <a href='javascript:selectAll()'  title='Click to select/de-select all records'>C</a><hr />";
	//}
}
 
 function DeleteAll()
{
	var len = document.frm.length ;
	
	for(i=0;i < len; i++)
	{ 
		if (document.frm.elements[i].type == "checkbox" )
		{	
			if(document.frm.elements[i].checked == true)
			{
				nFlag=true;
				optVal=document.frm.elements[i].value
				break;
			} // if(document.frm.elements[i].checked == true)
			else
				nFlag=false;		
		} // if (document.frm.elements[i].type == "checkbox" )
	} // for(i=0;i < len; i++)
	
	if(nFlag == false)
	{
		alert("Please Select at least One Record to Delete?")
		nFlag=false;
		return false;
	} // if(nFlag == false)
	//---------------------------start------------------------------------------
	if(window.confirm('Are you sure you Want to Delete the Selected Record?'))
	{				
		document.frm.submit();
		return true;
	} // if(window.confirm('Are you sure you Want to Delete the Selected Record?'))
		return false;
} //  function DeleteAll()
