<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js" integrity="sha384-NaWTHo/8YCBYJ59830LTz/P4aQZK1sS0SneOgAvhsIl3zBu8r9RevNg5lHCHAuQ/" crossorigin="anonymous"></script>
<style>
    h1{
        color = blue;
    }

</style>
</head>

<body>
    <div id="content">
        <h1>ola mundo</h1>
        
        
    </div>
    <button  onclick="gerer()">gerar pdf</button>
    <script>
        
    function gerer(){

        var doc = new jsPDF();
        doc.fromHTML('<h1>Teste para olá a porra do mundo</h1>');
        doc.save('caralho.pdf');
    }
    </script>
</body>

</html>