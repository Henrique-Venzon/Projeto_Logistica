F<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js" integrity="sha384-NaWTHo/8YCBYJ59830LTz/P4aQZK1sS0SneOgAvhsIl3zBu8r9RevNg5lHCHAuQ/" crossorigin="anonymous"></script>
<style>
    

</style>
</head>

<body>
    
        <h1 id="1">ola rafasf</h1>
        <h1 id="2">ola mundo</h1>
        <h1 id="3">ola muaffasndo</h1>
        <h1 id="4">ola mundo</h1>
        <h1 id="5">ola mufsando</h1>
        
        <label id ='mudança'>caralho</label>
        <input type="number" id="alfo">
        <button onclick='calcular()'>calcular</button>
        
        
    
    <button  onclick="gerer()">gerar pdf</button>



    <script>
        function calcular(){
                var a = document.getElementById('alfo').value;

                var tot= a * 50;
                
                document.getElementById('mudança').innerHTML = tot;
                

        }
        
    function gerer(){
        var doc = new jsPDF();
            var palavra = document.querySelector('h1');
            var outro = document.querySelector('label');
            
        
        doc.fromHTML(palavra);
        doc.fromHTML(outro.innerText);
        
        doc.save('caralho.pdf');
    }



    </script>

</body>

</html>