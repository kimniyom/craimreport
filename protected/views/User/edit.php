

<div class="grid">
    <div class="row cells2">
        <div class="cell">
            <label>Name</label>
            <div class="input-control text full-size">
                <input type="text" id="Name" value="<?php echo $use->Name; ?>">
            </div>
        </div>
        <div class="cell">
            <label>Lname</label>
            <div class="input-control text full-size">
                <input type="text" id="Lname" value="<?php echo $use->Lname; ?>">
            </div>
        </div>
    </div>
    <div class="row cells2">
        <div class="cell">
            <label>Card</label>
            <div class="input-control text full-size">
                <input type="text" id="Card" value="<?php echo $use->Card; ?>" maxlength="13">
            </div>
        </div>
        <div class="cell">
            <label>Tel</label>
            <div class="input-control text full-size">
                <input type="text" id="Tel" value="<?php echo $use->Tel; ?>" maxlength="10">
            </div>
        </div>
    </div>
    <div class="row cells2">
        <div class="cell">
            <label>Username</label>
            <div class="input-control text full-size">
                <input type="text" id="Username" value="<?php echo $use->Username; ?>">
            </div>
        </div>
        <div class="cell">
            <label>Password</label>
            <div class="input-control password full-size">
                <input type="password" id="Password" value="<?php echo $use->Password; ?>">
            </div>
        </div>
    </div>
</div>
<hr/>
<center>
    <button class="button warning block-shadow-warning text-shadow" onclick="Save_edit('<?php echo $use->Id; ?>')">
        <span class="icon mif-pencil"></span>
        แก้ไข
    </button>
</center>

