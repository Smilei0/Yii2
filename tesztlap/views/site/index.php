<?php

/* @var $this yii\web\View */
/* @var $group yii\web\Model */
use yii\helpers\Html;
use yii\web\View;

$this->title = 'Főoldal';

$this->registerJsFile("https://code.jquery.com/jquery-1.12.1.js",["position" => View::POS_HEAD]);
$this->registerJsFile("https://code.jquery.com/ui/1.12.1/jquery-ui.js",["position" => View::POS_HEAD]);

$this->registerJs(
'$( function() {
  $( ".draggable" ).draggable({containment: "parent"});
} );'
, View::POS_HEAD
)


?>

<style>
.draggable {
  text-transform: uppercase;
  font-size: 30px;
}
</style>

<div class="site-wrapper">
  <?php 
    if(Yii::$app->User != null )
      if(Yii::$app->User->can('ManageGroups'))
      { 
        $everyone = $group->getGroups();
        $parents = $group->getGroups(true);
        foreach($parents as $member_out)
        {
          echo("<div class='draggable'>".$member_out->name."</div>");
          foreach($everyone as $member_in)
          {
            if($member_out->id === $member_in->parent_id) 
              echo("<div class='draggable'  style='text-indent:2%'>".$member_in->name."</div>");
            
          }
        }

      }
    ?>

</div>