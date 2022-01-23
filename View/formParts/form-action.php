<!--    if admin
    Action
    create action or user
    read
    update
    delete
-->

<!-- CREATE ACTION -->
<h3><?=$title?></h3>
<form class="operationForm" method="post" action="/index.php?ctrl=admin-view&test=1">
    <div id="ref">
        <!-- ACTION -->
        <div class="part">
            <h2>Action</h2>
            <select name="actionType" id="actionType"></select>
            <input type="text" name="actionTitle" placeholder="titre">
            <textarea name="actionDescription" id="actionDescription" cols="50" rows="3"
                      placeholder="description de l'action"></textarea>
            <label for="startDate">commencée le :</label>
            <input type="date" name="startAction" id="startDate">
            <h4>Image</h4>
            <input type="text" name="imageTitle" placeholder="titre de l'image">
            <input type="text" name="actionImage" placeholder="image">
        </div>
    </div>
    <button id="half" type="submit">publier</button>
</form>
<!-- display error message -->
<?php
if(isset($var['info'])){?>
<div class="red" id="target"><?=
    $var['info'];?>
</div><?php
}
