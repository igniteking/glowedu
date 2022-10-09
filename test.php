<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>IDE</title>
</head>

<body>

    <div class="header"> Codeboard Online IDE </div>
    <div class="control-panel">
        Select Language:
        &nbsp; &nbsp;
        <select id="languages" class="languages" onchange="changeLanguage()">
            <option value="c"> C </option>
            <option value="cpp"> C++ </option>
            <option value="php"> PHP </option>
            <option value="python"> Python </option>
            <option value="node"> Node JS </option>
        </select>
    </div>
    <div class="editor" id="editor"></div>

    <div class="button-container">
        <button class="btn" onclick="executeCode()"> Run </button>
    </div>

    <div class="output"></div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="./lib/ace.js"></script>
    <script src="./lib/theme-monokai.js"></script>
    <script src="./lib/ide.js"></script>

    <style>
        * {
            margin: 0;
        }

        .header {
            background: #57a958;
            text-align: left;
            font-size: 20px;
            font-weight: bold;
            color: white;
            padding: 4px;
            font-family: sans-serif;
        }

        .control-panel {
            background: lightgray;
            text-align: right;
            padding: 4px;
            font-family: sans-serif;
        }

        .languages {
            background: white;
            border: 1px solid gray;
        }

        #editor {
            height: 400px;
        }

        .button-container {
            text-align: right;
            padding: 4px;
        }

        .btn {
            background: #57a958;
            color: white;
            padding: 8px;
            border: 0;
        }

        .output {
            padding: 4px;
            border: 2px solid gray;
            min-height: 100px;
            width: 99%;
            resize: none;

        }
    </style>
</body>

</html>