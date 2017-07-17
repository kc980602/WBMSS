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
    $this->content = "";
    $this->Head = new PanelHead();
    $this->Body = new PanelBody();
    $this->Foot = new PanelFoot($curr, $page);
    $this->top = "<div class='col-md-10 col-md-offset-1'>
    <div class='panel panel-default panel-table'>";
    $this->table = "<div class='panel-body'>
      <table id='page$curr' class='table table-striped table-bordered table-list'>";
    $this->bottom = "</div></div>";
  }
  function drawHeading($header){
  $itemHtml = <<<EOF
      <div class="panel-heading"><div class="row">
          <div class="col col-xs-6"><h3 class="panel-title">$header</h3>
          </div></div></div>
EOF;
    $this->top .= $itemHtml;
  }
  function tableEnd(){
    $this->table .= $this->Head->getContent().$this->Body->getContent() ."</table></div>";
  }
  function panelEnd(){
    $this->content = $this->top.$this->table.$this->Foot->getContent().$this->bottom;
  }
  function drawPanel(){
    echo $this->content;
  }
}
class PanelHead{
  var $head;
  var $foot;
  var $body;
  function __construct(){
    $this->head = "<thead><tr>";
    $this->foot = "</tr></thead>";
    $this->body = "";
  }
  function addItem($text, $name){
    $this->body .= "<th><a href='?sort=$name'>$text</th>";
  }
  function addItemArray(array $text){
    if(is_array($text)){
      foreach($text as $key => $value){
        $this->addItem($key, $value);
      }
    }
  }
  function draw(){
    echo $this->head.$this->body.$this->foot;
  }
  function getContent(){
    return $this->head.$this->body.$this->foot;
  }
}
class PanelBody{
  var $head;
  var $foot;
  var $body;
  function __construct(){
    $this->head = "<tbody id='tbody'>";
    $this->body = "";
    $this->foot = "</tbody>";
  }
  function addRow($textArray, $tag){
    if(is_array($textArray)){
      $this->body .= "<tr id='Row$tag'>";
      $i = 0;
      foreach($textArray as $value){
          $id = "Row".$tag."Col".$i;
          $this->body .= "<td align='center'id='$id'>$value</td>";
          $i++;
      }
      $this->body .= "</tr>";
    }
  }
  function draw(){
    echo $this->head.$this->body.$this->foot;
  }
  function getContent(){
    return $this->head.$this->body.$this->foot;
  }
}
class PanelFoot{
  var $head;
  var $body;
  var $foot;
  var $pageCount;
  var $currPage;
  function __construct($curr, $page){
    $this->pageCount = $page;
    $this->currPage = $curr;
    $this->head = "<div class='panel-footer'><div class='row'>
        <div class='col col-xs-4'>Page $curr of $page
        </div><div class='col col-xs-8'>";
    $this->body = "<ul class='pagination hidden-xs pull-right'>";
    $this->foot = "</ul>
    <ul class='pagination visible-xs pull-right'>
        <li><a href='?prevpage=1'>&#8592;</a></li>
        <li><a href='?nextpage=1'>&#8594;</a></li>
    </ul></div></div></div>";
    $this->drawPage();
  }
  function drawPage(){
    for($i = 1; $i<=$this->pageCount; $i++){
      if($i==$this->currPage){
          $style = "style='background-color: lightgreen;'";
      }else{
          $style = "";
      }
      $this->body .= "<li><a href='?page=$i' $style>$i</a></li>";
    }
  }
  function draw(){
    echo $this->head.$this->body.$this->foot;
  }
  function getContent(){
    return $this->head.$this->body.$this->foot;
  }
}
 ?>
