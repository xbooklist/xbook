function CheckAll(form)
{
	for (var i=0;i<form.elements.length;i++)
	{
		var e = form.elements[i];
		e.checked == true ? e.checked = false : e.checked = true;
	}
}
function Process(){
	if(document.form.title.value == ''){
		alert('��������������.');
		document.form.title.focus();
		return false;
	}
	if(document.form.sortid.value == ''){
		alert('��ѡ�����.');
		document.form.sortid.focus();
		return false;
	}
	return true;
}
function showobj(objID)
{
	var obj = document.getElementById(objID);
        obj.style.display=obj.style.display=='none'?'':'none';

}
function HtmlEdit(obj){
	var Win = window.open("HtmlEdit/index.htm?"+obj, "HtmlEdit�༭��", "width=750,height=420,toolbar=no,resizable=no,scrollbars=yes");
}
function AddOs(str)
{var r;
var a;
a=document.form.os.value;
r=a.split(str);
if(r.length!=1)
{return true;}
if(a.length!=0) str="/"+str;
document.form.os.value+=str;
}
function DelOs(str)
{
document.form.os.value=document.form.os.value.replace("/"+str,"");
document.form.os.value=document.form.os.value.replace(str,"");
if (document.form.os.value.charAt(0)=="/") document.form.os.value=document.form.os.value.replace(document.form.os.value.charAt(0),"");
}
function CheckSubmit(obj)
{
	var enable=0;
	var length = obj.elements.length;
	for (var x=0; x<length; x++) {
		if (obj.elements[x].checked==true)
			enable=1;
	}
	if(enable==1) {
                if (obj.action.value == 'moredel') 
                {
	                if(confirm("�˲�����ɾ����ѡ�е�����!\n\n���Ҫɾ����\nɾ�����޷��ָ���"))
	        	return true;
	                return false;
                }
                if (obj.action.value == 'move') 
                {
                        if (obj.tosortid.options[obj.tosortid.selectedIndex].value == "") 
                        {
                        	alert('��ѡ��Ŀ�����');
		        	return false;
                        }
	                if(confirm("ȷ������ѡ�е�����!\n�ƶ��� " + obj.tosortid.options[obj.tosortid.selectedIndex].text + " ��\n\n�ƶ����޷��ָ���"))
		        return true;
	                return false;
                }
        } else {
                alert('δѡ���κ�����');
	        return false;
        }
}
function delit(f){
        var obj = eval('form.filedel'+f);
        if (obj.checked!=true) obj.checked=true ;
        else obj.checked=false ;
}
function delsoft(title,softid,pid,sortid)
{
        if (confirm(title+"\nȷ��Ҫɾ����������"))
        window.location = "operate.php?action=delsoft&softid="+softid+"&pid="+pid+"&sortid="+sortid
}
