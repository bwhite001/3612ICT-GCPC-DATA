{extends file="../print.tpl"}
{block name=title}Pistol Scoring Administration{/block}
{block name=template}weekly{/block}
{block name=header}Weekly Stats Series 2 | Page 1{/block}
{block name=subheader}{$header}{/block}
{block name=body}
	<h1>Weekly Stats</h1>
	<span class='title'>Total Shooters</span>
	<span class='value'>{count($maleWed) + count($maleFri) + count($femaleWed) + count($femaleFri)}</span>
	<span class='title'>Totals Shooters Wednesday</span>
	<span class='value'>{count($maleWed) + count($femaleWed)}</span>
	<span class='title'>Totals Shooters Friday</span>
	<span class='value'>{count($maleFri) + count($femaleFri)}</span>
	<span class='title'>Total Male Shooters</span>
	<span class='value'>{count($maleWed) + count($maleFri)}</span>
	<span class='title'>Total Female Shooters</span>
	<span class='value'>{count($femaleWed) + count($femaleFri)}</span>
	<span class='title'>Weekly Top Shot Male</span>
	<span class='value'>{$maleTS.name} - {$maleTS.score}</span>
	<span class='title'>Weekly Top Shot Female</span>
	<span class='value'>{$femaleTS.name} - {$femaleTS.score}</span>

	<span style='clear:both; display:block;'></span>
	<h1 class='second'>Weekly Winners</h1>
	<div class='block male'>
		<h2>Male Winners</h2>
		{if count($maleWinners) > 0}
			<table>
				<tr>
					<th>Pos</th>
					<th>Name</th>
					<th>Score</th>
					<th>Hcap</th>
					<th>Total</th>
					<th>STotal</th>
				</tr>
				{foreach from=$maleWinners item=score}
					{assign "shooter" getShooter($score.shooter_id)}
					<tr {cycle values=" ,class='newColor'"}>
						{if $score.points == 3}
							<td>1<sup>st</sup></td>
						{else if $score.points == 2}
							<td>2<sup>nd</sup></td>
						{else if $score.points == 1}
							<td>3<sup>rd</sup></td>
						{else}
							<td>-</td>
						{/if}
						<td><span style='font-size:0.8em'>{$shooter.firstname} {$shooter.lastname}</span></td>
						<td>{$score.score}</td>
						<td>{$score.handicap}</td>
						<td>
							{if $score.total <= 600}
								{$score.total}
							{else}
								<span style='color:red'>{$score.total}</span>
							{/if}
						</td>
						<td>{$score.stotal}</td>
					</tr>
				{/foreach}
			</table>
		{else}
			<p style='text-align:center'>There are no Male Winners!</p>
		{/if}
	</div>
	<div class='block female'>
		<h2>Female Winners</h2>
		{if count($femaleWinners) > 0}
			<table>
				<tr>
					<th>Pos</th>
					<th>Name</th>
					<th>Score</th>
					<th>Hcap</th>
					<th>Total</th>
					<th>STotal</th>
				</tr>
				{foreach from=$femaleWinners item=score}
					{assign "shooter" getShooter($score.shooter_id)}
					<tr {cycle values=" ,class='newColor'"}>
						{if $score.points == 3}
							<td>1<sup>st</sup></td>
						{else if $score.points == 2}
							<td>2<sup>nd</sup></td>
						{else if $score.points == 1}
							<td>3<sup>rd</sup></td>
						{else}
							<td>-</td>
						{/if}
						<td><span style='font-size:0.8em'>{$shooter.firstname} {$shooter.lastname}</span></td>
						<td>{$score.score}</td>
						<td>{$score.handicap}</td>
						<td>
							{if $score.total <= 600}
								{$score.total}
							{else}
								<span style='color:red'>{$score.total}</span>
							{/if}
						</td>
						<td>{$score.stotal}</td>
					</tr>
				{/foreach}
			</table>
		{else}
			<p style='text-align:center'>There are no Female Winners!</p>
		{/if}
	</div>
	<span style='display:block; clear:both'></span>
</div>
<div class='page' style='clear:both; padding-top: 10mm'>
    <div class='pageheader'>
        <div class='cube male'>
            <span class='inside'>&#127942;</span>
        </div>
        <span class='header'>Weekly Stats Series 2 | Page 2</span>
        <span class='subheader'>{$header}</span>
        <div class='cube female'>
            <span class='inside'>&#127942;</span>
        </div>
        <span style='display:block; clear:both'></span>
    </div>
	<h1>Overall Wednesday {$wed}</h1>
		<div class='block male'>
		<h2>Male Shooters</h2>
		{if count($maleWed) > 0}
			<table>
				<tr>
					<th>Name</th>
					<th>Score</th>
					<th>Hcap</th>
					<th>Total</th>
					<th>STotal</th>
					<th>Avg</th>
				</tr>
				{foreach from=$maleWed item=score}
					{assign "shooter" getShooter($score.shooter_id)}

					<tr {cycle values=" ,class='newColor'"}>
						{if $score.handicap > -1}
						<td><span style='font-size:0.8em'>{$shooter.firstname} {$shooter.lastname}</span></td>
							<td>{$score.score}</td>
							<td>{$score.handicap}</td>
							<td>
								{if $score.total <= 600}
									{$score.total}
								{else}
									<span style='color:red'>{$score.total}</span>
								{/if}
							</td>
							<td>{$score.stotal}</td>
						{else}
						<td><span style='font-size:0.8em'>{$shooter.firstname} {$shooter.lastname} Supported</span></td>
							<td>{$score.score}</td>
							<td colspan='4'>N/A</td>
						{/if}
						<td>{$score.avg}</td>
					</tr>
				{/foreach}
			</table>
		{else}
			<p style='text-align:center'>There are no Male Shooters Today!</p>
		{/if}
	</div>
	<div class='block female'>
		<h2>Female Shooters</h2>
		{if count($femaleWed) > 0}
			<table>
				<tr>
					<th>Name</th>
					<th>Score</th>
					<th>Hcap</th>
					<th>Total</th>
					<th>STotal</th>
					<th>Avg</th>
				</tr>
				{foreach from=$femaleWed item=score}
					{assign "shooter" getShooter($score.shooter_id)}
					<tr {cycle values=" ,class='newColor'"}>
						{if $score.handicap > -1}
						<td><span style='font-size:0.8em'>{$shooter.firstname} {$shooter.lastname}</span></td>
							<td>{$score.score}</td>
							<td>{$score.handicap}</td>
							<td>
								{if $score.total <= 600}
									{$score.total}
								{else}
									<span style='color:red'>{$score.total}</span>
								{/if}
							</td>
							<td>{$score.stotal}</td>
						{else}
						<td><span style='font-size:0.8em'>{$shooter.firstname} {$shooter.lastname} Supported</span></td>
							<td>{$score.score}</td>
							<td colspan='4'>N/A</td>
						{/if}
						<td>{$score.avg}</td>
					</tr>
				{/foreach}
			</table>
		{else}
			<p style='text-align:center'>There are no Female Shooters Today!</p>
		{/if}
	</div>
	<span style='display:block; clear:both'></span>
	<h1 class='second'>Overall Friday {$fri}</h1>
		<div class='block male'>
		<h2>Male Shooters</h2>
		{if count($maleFri) > 0}
			<table>
				<tr>
					<th>Name</th>
					<th>Score</th>
					<th>Hcap</th>
					<th>Total</th>
					<th>STotal</th>
					<th>Avg</th>
				</tr>
				{foreach from=$maleFri item=score}
					{assign "shooter" getShooter($score.shooter_id)}
					<tr {cycle values=" ,class='newColor'"}>
						{if $score.handicap > -1}
						<td><span style='font-size:0.8em'>{$shooter.firstname} {$shooter.lastname}</span></td>
							<td>{$score.score}</td>
							<td>{$score.handicap}</td>
							<td>
								{if $score.total <= 600}
									{$score.total}
								{else}
									<span style='color:red'>{$score.total}</span>
								{/if}
							</td>
							<td>{$score.stotal}</td>
						{else}
						<td><span style='font-size:0.8em'>{$shooter.firstname} {$shooter.lastname} Supported</span></td>
							<td>{$score.score}</td>
							<td colspan='4'>N/A</td>
						{/if}
						<td>{$score.avg}</td>
					</tr>
				{/foreach}
			</table>
		{else}
			<p style='text-align:center'>There are no Male Shooters Today!</p>
		{/if}
	</div>
	<div class='block female'>
		<h2>Female Shooters</h2>
		{if count($femaleFri) > 0}
			<table>
				<tr>
					<th>Name</th>
					<th>Score</th>
					<th>Hcap</th>
					<th>Total</th>
					<th>STotal</th>
					<th>Avg</th>
				</tr>
				{foreach from=$femaleFri item=score}
					{assign "shooter" getShooter($score.shooter_id)}
					<tr {cycle values=" ,class='newColor'"}>
						{if $score.handicap > -1}
						<td><span style='font-size:0.8em'>{$shooter.firstname} {$shooter.lastname}</span></td>
							<td>{$score.score}</td>
							<td>{$score.handicap}</td>
							<td>
								{if $score.total <= 600}
									{$score.total}
								{else}
									<span style='color:red'>{$score.total}</span>
								{/if}
							</td>
							<td>{$score.stotal}</td>
						{else}
						<td><span style='font-size:0.8em'>{$shooter.firstname} {$shooter.lastname} Supported</span></td>
							<td>{$score.score}</td>
							<td colspan='4'>N/A</td>
						{/if}
						<td>{$score.avg}</td>
					</tr>
				{/foreach}
			</table>
		{else}
			<p style='text-align:center'>There are no Female Shooters Today!</p>
		{/if}
	</div>
	<span style='display:block; clear:both; margin-bottom: 5mm'></span>
{/block}