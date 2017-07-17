<?php
function printFormItem($name, $text, $hint, $type, $value){
  if($type!="date"){
    $length = "255";
    $min = "";
  }else{
    $length = "";
    $min = "1999-12-31";
  }
  $itemHtml = <<< EOD
  <div class="form-group">
    <label class="col-md-4 control-label" for="$name">$text</label>
    <div class="col-md-4">
    <input id="$name" name="$name" type="$type" placeholder="$hint"
    value="$value" class="form-control input-md" required="" maxlength="$length"
    min="$min">
    </div>
  </div>
EOD;
 echo $itemHtml;
}
function printRadio($name, $topic, $textA, $valueA, $textB, $valueB, $checked){
 $a = "";
 $b = "";
  if($checked==$valueA) $a = "checked";
  if($checked==$valueB) $b = "checked";
  $itemHtml = <<< EOF
<div class="form-group">
  <label class="col-md-4 control-label" for="$name">$topic</label>
  <div class="col-md-4">
    <label class="radio-inline" for="$name-0">
      <input type="radio" name="$name" id="$name-0" value="$valueA" $a>
      $textA
    </label>
    <label class="radio-inline" for="$name-1">
      <input type="radio" name="$name" id="$name-1" value="$valueB" $b>
      $textB
    </label>
  </div>
</div>
EOF;
echo $itemHtml;
}
function printFormButton($name, $text, $type, $action){
  $itemHtml = <<< EOC
  <div class="form-group">
    <div class="col-md-4">
      <button type="$type" id="$name" name="$name" class="btn btn-primary" onclick="$action">$text</button>
    </div>
  </div>
EOC;
echo $itemHtml;
}
?>
