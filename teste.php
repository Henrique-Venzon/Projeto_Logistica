<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js" integrity="sha384-NaWTHo/8YCBYJ59830LTz/P4aQZK1sS0SneOgAvhsIl3zBu8r9RevNg5lHCHAuQ/" crossorigin="anonymous"></script>
<style>
    algo{
        color = blue;
    }

</style>
</head>

<body>
    <div id="content">
        <h1>ola mundo</h1>
        <input type="text" id=" alfo">
        
        
    </div>
    <button  onclick="gerer()">gerar pdf</button>
    <script>
        
    function gerer(){
            orientation: 'p',
            unity: 'mm',
            <?php ?>    
        var doc = new jsPDF();
        doc.fromHTML(document.getElementById(alfo));
        doc.save('caralho.pdf');
    }
    </script>

</body>

</html>