<style>
.nav{
  cursor:pointer;
  color:blue;
  margin:10px 0;
}
.nav.hover{
  text-decoration:underline;
}
</style>
<div>目前位置:首頁 >分類網誌 > <span id='nav'></span></div>
<fieldset style="display:inline-block;vertical-align:top;width:12%">
  <legend>分類網誌</legend>
<div id="t1" onclick="nav(this)" class="nav">健康新知</div> <!-- this表示此列，當作變數會丟到下面的function -->
<div id="t2" onclick="nav(this)" class="nav">菸害防治</div>
<div id="t3" onclick="nav(this)" class="nav">癌症防治</div>
<div id="t4" onclick="nav(this)" class="nav">慢性病防治</div>
</fieldset>

<fieldset style="display:inline-block;width:75%">
  <legend>文章列表</legend>
  <div class="titles"></div>
</fieldset>

<script>

$("#nav").text($("#t1").text()); // 網頁載入完成時，自動先帶出t1的標題
getTitle(1) //載入時 就把文章抓出來，點擊可以看

function nav(type){
  let str=$(type).text()
  // console.log(str)
  $("#nav").text(str);
  let t=$(type).attr('id').replace("t",""); //attr('id')為字串，找到"t"，以""空白取代
  getTitle(t)
}

// 顯示文章列表的標題
function getTitle(type){
  $.get("api/get_title.php",{type},function(titles){
    let tt=JSON.parse(titles)
    // console.log(tt)
    $(".titles").html("")  //每次執行gettitle之前清空
    tt.forEach(function(value,idx){
      let a=document.creatElement('a');
      let text=document.creatTextNode(value.title);

      a.setAttribute('href',`javascript:getNews(${value.id})`)
      a.setAttribute('style',"display:block")
      a.appendChild(text)

      // let str=`<a href='javascript:getNews(${value.id})' style='display:block'>${value.title}</a>`;
      console.log(a,text)
      $(".titles").append(a)
      
    })
    
    // $(".titles").html(tt[0].title)

  })

}

//顯示文章列表的內容
function getNews(id){
  $.get("api/get_news.php",{id},function(news){
    $(".titles").html(news)

  })

}


</script>
