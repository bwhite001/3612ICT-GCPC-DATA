{extends file="../../core.tpl"}
{block name=title}Create / Edit Shooters{/block}
{block name=template}shooterForm{/block}
{block name=body}
	<h1>Shooters Administration Add / Edit Shooter</h1>
	<h2>Add Shooter</h2>
	<form action='action.php' method='post' id='shooterForm'>
        <span class="formTitle">First Name:</span>
        <input class='formText' type="text" name="first">

        <span class="formTitle">Last Name:</span>
        <input class='formText' type="text" name="last">

    	<span class="formTitle">Gender:</span>
    	<select name="gender" class='formText select'>
    		<option value="true">M</option>
    		<option value="false">F</option>
    	</select>

    	<span class="formTitle">Age:</span>
    	<select name="jns" class='formText select'>
        	<option value="true">Senior</option>
        	<option value="false">Junior</option>
    	</select>
    	<span class="formTitle">Grade:</span>
    	<select class='formText select' name="grade">
        	<option value="0">D</option>
        	<option value="1">C</option>
        	<option value="2">B</option>
        	<option value="3">A</option>
        	<option value="4">Master</option>
    	</select>
        <span class="formTitle">Club #:</span>
        <input class='formText' type="text" name="clubn">
        <span class="formTitle">RFID:</span>
        <input class='formText' type="text" name="rfid">
        <input type='submit' class='button formtext' value='Create'>
	</form>
	<span style="display:block; clear:both; height: 20px;"></span>
{/block}