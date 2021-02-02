<?php

/* @var $this yii\web\View */
/* @var $group yii\web\Model */
use yii\helpers\Html;
use yii\web\View;
use app\assets\JqueryUIAsset;

$this->title = 'Főoldal';

//$this->registerJsFile("https://code.jquery.com/jquery-1.12.1.js",["position" => View::POS_HEAD]);
//$this->registerJsFile("https://code.jquery.com/ui/1.12.1/jquery-ui.js",["position" => View::POS_HEAD]);

JqueryUIAsset::register($this);

$this->registerJs(
'$( function() {
  $( ".draggable" ).draggable({containment: ".groups"});
} );'
, View::POS_END //View::POS_HEAD
)


?>

<style>
.draggable {
    text-transform: uppercase;
    font-size: 30px;
    display: inline-block;
}
.groups {
    min-height: 300px;
    border: 1px solid #000;
    padding: 15px 20px;
}
</style>

<div class="site-wrapper">
    <?php if(Yii::$app->user->can('ManageGroups')): ?>
        <div class="groups">
            <?php
                $everyone = $group->getGroups();
                $parents = $group->getGroups(true);
                foreach($parents as $member_out)
                {
                    echo("<div><div class='draggable'>".$member_out->name."</div></div>");
                    foreach($everyone as $member_in)
                    {
                        if($member_out->id === $member_in->parent_id) 
                        echo("<div><div class='draggable'  style='text-indent:20px'>".$member_in->name."</div></div>");
                    }
                }
            ?>
        </div>
    <?php endif; ?>
</div>