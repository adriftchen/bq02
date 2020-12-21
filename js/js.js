// JavaScript Document
function lo(th,url)
{
	// console.log("Hiii") 
	$.ajax(url,{cache:false,success: function(x){$(th).html(x)}})
}
function good(news,acc,type) /* 按讚用的function，為免混淆以news當作id*/
{
	$.post("api/good.php",{news,acc,type},function(res) /* 設function(res) + console.log(res); 用來檢查 */
	
	{ console.log(res);
		if(type=="1")
		{
			$("#vie"+news).text($("#vie"+news).text()*1+1)
			$("#news"+news).text("收回讚").attr("onclick","good('"+news+"','"+acc+"','2')")
			// console.log("#good+news");
		}
		else
		{
			$("#vie"+news).text($("#vie"+news).text()*1-1)
			$("#news"+news).text("讚").attr("onclick","good('"+news+"','"+acc+"','1')")
		}
	})
}