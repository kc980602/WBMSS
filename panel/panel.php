<?php
class Panel{
  var $top;
  var $Head;
  var $Body;
  var $Foot;
  var $table;
  var $bottom;
  var $content;
  function __construct($curr, $page){
    $content = "";
    $Head = new PanelHead();
    $Body = new PanelBody();
    $Foot = new PanelFoot($curr, $page);
    $top = "<div class='col-md-10 col-md-offset-1'>
    <div class='panel panel-default panel-table'>";
    $table = "<div class='panel-body'>
      <table class='table table-striped table-bordered table-list'>";
    $bottom = "</div></div>";
  }
  function drawHeading($header, $create, $action){
  $itemHtml = <<<EOF
      <div class="panel-heading"><div class="row">
          <div class="col col-xs-6"><h3 class="panel-title">$header</h3>
          </div><div class="col col-xs-6 text-right">
            <button type="button" class="btn btn-sm btn-primary btn-create" onclick="$action">$create</button>
          </div></div></div>
EOF;
  $top .= $itemHtml;
  }
  function tableEnd(){
    $table .= $Head->getContent().$Body->getContent() ."</table></div>";
  }
  function panelEnd(){
    $content = $top.$Head->getContent().$table.$Foot->getContent().$bottom;
  }
  function drawPanel(){
    echo $content;
  }
}
class PanelHead{
  var $head;
  var $foot;
  var $body;
  function __construct(){
    $head = "<thead><tr>";
    $foot = "</tr></thead>";
    $body = "<th><em class='fa fa-cog'></em></th>";
  }
  function addItem($text){
    $body .= "<th>$text</th>";
  }
  function addItemArray($text){
    if(is_array($text)){
      foreach($text as $value){
        $body.="<th>$value</th>";
      }
    }
  }
  function draw(){
    echo $head.$foot.$body;
  }
  function getContent(){
    return $head.$foot.$body;
  }
}
class PanelBody{
  var $head;
  var $foot;
  var $body;
  function __construct(){
    $head = "<tbody>";
    $body = "";
    $foot = "</tbody>";
  }
  function addRow($textArray){
    if(is_array($textArray)){
      $body .= "<tr><td align='center'>
        <a class='btn btn-default'><em class='fa fa-pencil'></em></a>
        <a class='btn btn-danger'><em class='fa fa-trash'></em></a>
      </td>";
      foreach($textArray as $value){
          $body .= "<td>$value</td>";
      }
      $body .= "</tr>";
    }
  }
  function draw(){
    echo $head.$body.$foot;
  }
  function getContent(){
    return $head.$body.$foot;
  }
}
class PanelFoot{
  var $head;
  var $body;
  var $foot;
  var $pageCount;
  var $currPage;
  function __construct($curr, $page){
    $pageCount = $page;
    $currPage = $curr;
    $head = "<div class='panel-footer'><div class='row'>
        <div class='col col-xs-4'>Page $curr of $page
        </div><div class='col col-xs-8'>";
    $body = "<ul class='pagination hidden-xs pull-right'>";
    $foot = "</ul>
    <ul class='pagination visible-xs pull-right'>
        <li><a href='?prevpage=1'>&#8592;</a></li>
        <li><a href='?nextpage=1'>&#8594;</a></li>
    </ul></div></div></div>";
  }
  function drawPage(){
    for($i = 1; $i<=$pageCount; $i++){
      $body .= "<li><a href='?page=$i'>$i</a></li>";
    }
  }
  function draw(){
    echo $head.$body.$foot;
  }
  function getContent(){
    return $head.$body.$foot;
  }
}
 ?>
