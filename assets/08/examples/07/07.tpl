{*

	Template Engine — Test page
	author: Bramus Van Damme <bramus.vandamme@kahosl.be>

*}<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
	<title>Template Engine &mdash; Test page</title>
</head>
<body>
	<h1>Template Engine &mdash; Test page</h1>

	<h2>Variables</h2>

	<p>$var</p>

	<ul>
		<li>&ldquo;<em>{$var}</em>&rdquo;</li>
		<li>&ldquo;<em>{$var|ucfirst}</em>&rdquo;</li>
		<li>&ldquo;<em>{$var|ucwords}</em>&rdquo;</li>
		<li>&ldquo;<em>{$var|uppercase}</em>&rdquo;</li>
		<li>&ldquo;<em>{$var|substring:0:10}</em>&rdquo;</li>
		<li>&ldquo;<em>{$var|substring:0:10|uppercase}</em>&rdquo;</li>
	</ul>

	<h2>Options</h2>

	<p>Option assigned?: {option:oAssigned}Yes, I have been assigned{/option:oAssigned}</p>

	<h2>Iterations</h2>

	<h3>Single Iteration</h3>

	<ul>
		{iteration:iSingle}
		<li>I've been spawned by an iteration!</li>
		{/iteration:iSingle}
	</ul>

	<h3>Single Iteration with values</h3>

	<ul>
		{iteration:iSingleWithValue}

		<li>I've been spawned by an iteration and I have a local variable: &ldquo;<em>{$varInIteration}</em>&rdquo; and also can access a global variable, such as $var: &ldquo;<em>{$var}</em>&rdquo;</li>

		{/iteration:iSingleWithValue}
	</ul>

	<h3>Nested Iterations with values</h3>

	<ul>
		{iteration:iNestedOuter}
		<li>
			{$varInNestedOuter}
			<ul>
			{iteration:iNestedInner}
			<li>{$varInNestedInner}</li>
			{/iteration:iNestedInner}
			</ul>
		</li>
		{/iteration:iNestedOuter}
	</ul>

	<h2>Options Revisited</h2>

	<h3>Single Iteration with options</h3>

	<ul>
		{iteration:iSingleWithValueAndOption}
		<li>I've been spawned by an iteration and I am <em>{option:oOdd}odd{/option:oOdd}{option:oEven}even{/option:oEven}</em> ($i = <em>{$i}</em>)</li>
		{/iteration:iSingleWithValueAndOption}
	</ul>

	<h3>Nested Iterations with options</h3>

	<ul>
		{iteration:iNestedOuterWithOption}
		<li>
			{$varInNestedOuter}
			{option:oHasSecondLevel}
				<ul>
				{iteration:iNestedInnerWithOption}
				<li>{$varInNestedInner}{option:oHasExtraInSecondLevel} with option assigned{/option:oHasExtraInSecondLevel}!</li>
				{/iteration:iNestedInnerWithOption}
				</ul>
			{/option:oHasSecondLevel}
		</li>
		{/iteration:iNestedOuterWithOption}
	</ul>
</body>
</html>