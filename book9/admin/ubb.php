<script language="javascript">
<!--
function validate(theform){
if (document.all||document.getElementById){
for (i=0;i<theform.length;i++){
var tempobj=theform.elements[i]
if(tempobj.type.toLowerCase()=="submit"||tempobj.type.toLowerCase()=="reset")
tempobj.disabled=true
}
}
}
//-->
</script>

<script language="javascript">
<!--
function bbcode(thebbcode) {
if (thebbcode!=""){
document.form.content.value += thebbcode+" ";
document.form.content.focus();
}
}
//-->
</script>
<SCRIPT language=JavaScript1.2>





function html_trans(str) {

	str = str.replace(/\r/g,"");

	str = str.replace(/on(load|click|dbclick|mouseover|mousedown|mouseup)="[^"]+"/ig,"");

	str = str.replace(/<script[^>]*?>([\w\W]*?)<\/script>/ig,"");

	

	str = str.replace(/<a[^>]+href="([^"]+)"[^>]*>(.*?)<\/a>/ig,"\n[url=$1]$2[/url]\n");

	

	str = str.replace(/<font[^>]+color=([^ >]+)[^>]*>(.*?)<\/font>/ig,"\n[color=$1]$2[/color]\n");

	

	str = str.replace(/<img[^>]+src="([^"]+)"[^>]*>/ig,"\n[img]$1[/img]\n");

	

	str = str.replace(/<([\/]?)b>/ig,"[$1b]");

	str = str.replace(/<([\/]?)strong>/ig,"[$1b]");

	str = str.replace(/<([\/]?)u>/ig,"[$1u]");

	str = str.replace(/<([\/]?)i>/ig,"[$1i]");

	

	str = str.replace(/&nbsp;/g," ");

	str = str.replace(/&/g,"&");

	str = str.replace(/"/g,"\"");

	str = str.replace(/</g,"<");

	str = str.replace(/>/g,">");

	

	str = str.replace(/<br>/ig,"\n");

	str = str.replace(/<[^>]*?>/g,"");

	str = str.replace(/\[url=([^\]]+)\]\n(\[img\]\1\[\/img\])\n\[\/url\]/g,"$2");

	str = str.replace(/\n+/g,"\n");

	

	return str;

}



function trans(){

	var str = "";

	rtf.focus();

	rtf.document.body.innerHTML = "";

	rtf.document.execCommand("paste");

	str = rtf.document.body.innerHTML;

	if(str.length == 0) {

		alert("���а治���ڳ��ı����ݣ�");

		return "";

	}

	return html_trans(str);

}

</SCRIPT>

<input type="button" value="����" style="FONT-WEIGHT: bold" onclick="bbcode('[B][/B]')" title="���� (alt+b)" accesskey="b">
<input type="button" value="б��" style="FONT-STYLE: italic" onclick="bbcode('[I][/I]')" title="б�� (alt+i)" accesskey="i">
<input type="button" value="�»���" style="TEXT-DECORATION: underline" onclick="bbcode('[U][/U]')" title="�»��� (alt+u)" accesskey="u">
<input type="button" value="����" onclick="bbcode('[QUOTE][/QUOTE]')" title="����">
<input type="button" value="����" onclick="bbcode('[CODE][/CODE]')" title="����">
<input type="button" value="����" onclick="bbcode('[CENTER][/CENTER]')" title="����">
<input type="button" value="��ַ" style="TEXT-DECORATION: underline" onclick="bbcode('[URL][/URL]')" title="��ַ">
<input type="button" value="����" style="TEXT-DECORATION: underline" onclick="bbcode('[URL=][/URL]')" title="����">
<input type="button" value="E-mail" onclick="bbcode('[EMAIL][/EMAIL]')" title="Email">
<input type="button" value="ͼƬ" onclick="bbcode('[IMG][/IMG]')" title="ͼƬ">
<IFRAME id=rtf style="WIDTH: 0px; HEIGHT: 0px" marginWidth=0 marginHeight=0 
src="about:blank" scrolling=no></IFRAME>
<INPUT onclick="document.getElementById('content').value += trans()" type=button value=ת��>
<SCRIPT>

rtf.document.designMode="On";

</SCRIPT>