<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.2/html2pdf.bundle.min.js" integrity="sha512-MpDFIChbcXl2QgipQrt1VcPHMldRILetapBl5MPCA9Y8r7qvlwx1/Mc9hNTzY+kS5kX6PdoDq41ws1HiVNLdZA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
    <div id="content">
        <h1>ola mundo</h1>
        <p>este será o conteudo do pdf</p>
    </div>
    <button id="generate-pdf">gerar pdf</button>
    <script>
        const btnGerate=document.querySelector("#generate-pdf")

        btnGerate.addEventListener("click",() =>{
            const content=document.querySelector("#content")
            const optinos ={
                margin:[10,10,10,10],
                filename:"arquivo.pdf",
                html2canvas:{scale:2},
                jsPDF {unit: "mm", format:"a4",orientation:"portrait"}
            };
html2pdf().set(optinos).from(content).save()
        }
    );
    </script>
</body>
</html>