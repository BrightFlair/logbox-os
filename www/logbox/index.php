<!doctype html>
<html>
<head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Logbox settings</title>

        <style>
body {
	display: flex;
	margin: 0;
	font-family: sans-serif;
}
body::after {
	content: attr(data-version);
	display: block;
	position: absolute;
	top: 1rem;
	right: 1rem;
	opacity: 0.1;
}
label{
	position: fixed;
	display: block;
	top: 0;
	left: 0;
	right: 0;
}
label>div {
	display: none;

	position: fixed;
	top: 0;
	left: 0;
	right: 0;
	bottom: 2rem;
}
[name='toggle'] {
	display: none;
}
iframe {
	display: none;

	border: none;
	width: 100%;
	height: 100%;
}
label>span {
	position: fixed;
	bottom: 0;
	width: 33.333%;
	text-align: center;

	height: 2rem;
	line-height: 2rem;
}
label:nth-of-type(1)>span {
	left: 0;
}
label:nth-of-type(2)>span {
	left: 33.333%;
}
label:nth-of-type(3)>span {
	left: 66.666%;
}
[name='toggle']:checked~div {
	display: block;
}
[name='toggle']:checked~div span {
	background: #38973e;
	color: white;
	font-weight: bold;
}
[name='toggle']:checked~div iframe {
	display: block;
}
        </style>
</head>
<body data-version="180717">

<label>
	<input type="radio" name="toggle" checked />
	<span>Raw data</span>
	<div>
		<iframe src="/raw.php"></iframe>
	</div>
</label>
<label>
	<input type="radio" name="toggle" />
	<span>Settings</span>
	<div>
		<iframe src="/settings.php"></iframe>
	</div>
</label>
<label>
	<input type="radio" name="toggle" />
	<span>Output</span>
	<div>
		<iframe src="/output.php"></iframe>
	</div>
</label>

</body>
</html>
