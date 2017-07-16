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
  function drawHeading($header, $create, $action){
  $itemHtml = <<<EOF
      <div class="panel-heading"><div class="row">
          <div class="col col-xs-6"><h3 class="panel-title">$header</h3>
          </div><div class="col col-xs-6 text-right">
            <button type="button" class="btn btn-sm btn-primary btn-create" onclick="$action">$create</button>
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
    $this->body = "<th><em class='fa fa-cog'></em></th>";
  }
  function addItem($text){
    $this->body .= "<th>$text</th>";
  }
  function addItemArray(array $text){
    if(is_array($text)){
      foreach($text as $value){
        $this->addItem($value);
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
      $this->body .= "<tr id='Row$tag'><td align='center'>
        <a onclick='editRow($tag);' class='btn btn-default'><em class='fa fa-pencil'></em></a>
        <a onclick='deleteRow($tag);'class='btn btn-danger'><em class='fa fa-trash'></em></a>
      </td>";
      $i = 0;
      foreach($textArray as $value){
          $id = "Row".$tag."Col".$i;
          $this->body .= "<td id='$id'>$value</td>";
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
      $this->body .= "<li><a href='?page=$i'>$i</a></li>";
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
