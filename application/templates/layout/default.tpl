<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>这个是模板文件</title>
</head>
<body>
{include file='layout/header.tpl'}
<h2>这个是模板文件输出的</h2>

<hr/>
子输出一：{block name='first'}{/block}
<hr/>
<hr/>
子输出二：{block name='second'}{/block}
<hr/>

<h2>这个是模板文件输出的</h2>
</body>
</html>