
<!-- MAKER -->
<div class="part">
    <h3>Maker</h3>
    <label for="actionMaker">créateur</label>
    <select name="maker" id="actionMaker">
        <!-- get makers list -->
        <option value="">maker</option>
        <option value="heliosens">Heliosens</option>
    </select>

    <label for="otherMaker">participant(s)</label>
    <select name="otherMaker" id="otherMaker" multiple>
        <!-- get makers list -->
        <option value="">autre(s)</option>
        <option value="heliosens">Heliosens</option>
    </select>
</div>

<!-- TECHNIC -->
<div class="part">
    <h3>Technique</h3>
    <select name="actionTechnic" id="actionTechnic">
        <!-- get technics list -->
        <option value="">technique utilisée</option>
        <option value="modelisation">Modélisation 3D</option>
    </select>

    <!-- TOOL -->
    <select name="actionTool" id="actionTool">
        <!-- get tools list -->
        <option value="">outils utilisés</option>
        <option value="modelisation">Imprimante 3D</option>
    </select>

    <!-- MATTER -->
    <select name="actionMatter" id="actionMatter">
        <!-- get matters list -->
        <option value="">matière</option>
        <option value="pla">PLA</option>
        <option value="abs">ABS</option>
    </select>

    <!-- TIME -->
    <h3>Temps :</h3>
    <label for="conceptionTime">conception</label>
    <input type="time" name="conception" id="conceptionTime">

    <label for="realisationTime">réalisation</label>
    <input type="time" name="realisation" id="realisationTime">
</div>
<?php
