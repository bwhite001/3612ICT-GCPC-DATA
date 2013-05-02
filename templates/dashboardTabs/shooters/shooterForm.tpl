{extends file="../../core.tpl"}
{block name=title}Create / Edit Shooters{/block}
{block name=template}shooterForm{/block}
{block name=body}
	<h1>Shooters Administration Add / Edit Shooter <a class='back button' href="{$goBack}">Cancel</a></h1>
    {if $type == "Add"}
	   <h2>{$type} Shooter</h2>
    {else}
        <h2>{$type} Shooter - {$shooter.firstname} {$shooter.lastname}</h2>
    {/if}
	<form action='action.php' method='post' id='shooterForm'>
        <span class="formTitle">First Name:</span>
        <input class='formText' type="text" name="firstname" value='{$shooter.firstname}'>

        <span class="formTitle">Last Name:</span>
        <input class='formText' type="text" name="lastname" value='{$shooter.lastname}'>
        <span class="formTitle">Gender:</span>

        <select name="male" id="male" class='formText select'>
            <option value="true">Male</option>
            <option value="false">Female</option>
        </select>

        <span class="formTitle">Age:</span>
        <select id='senior' name="senior" class='formText select'>
            <option value="true">Senior</option>
            <option value="false">Junior</option>
        </select>

        <span class="formTitle">Grade:</span>
        <select class='formText select' name="grade" id="grade">
            <option value="0">D</option>
            <option value="1">C</option>
            <option value="2">B</option>
            <option value="3">A</option>
            <option value="4">Master</option>
        </select>

        {if $type == "Edit"}
            <script type="text/javascript">
                $("#male").val({$shooter.male})
                $("#senior").val({$shooter.senior})
                $("#grade").val({$shooter.grade})
            </script>
        {/if}
        <span class="formTitle">Club #:</span>
        <input class='formText' type="text" name="cnumber" value='{$shooter.cnumber}'>
        <span class="formTitle">RFID:</span>
        <input class='formText' type="text" name="rfid" value='{$shooter.rfid}'>
        <input type='submit' class='button formtext' value='{$type}'>
        {if $type == "Edit"}
            <input type='hidden' name='id' value='{$shooter.id}'>
            <input type='hidden' name='code' value='se'>
        {else}
            <input type='hidden' name='code' value='sa'>
        {/if}
            <input type='hidden' name='return_url' value='{$goBack}'>
	</form>
	<span style="display:block; clear:both; height: 20px;"></span>
{/block}