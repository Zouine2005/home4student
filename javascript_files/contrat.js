document.addEventListener('DOMContentLoaded', function() {
    const contrat = document.querySelector('#contrat');
    
    const toPDF = function(contrat) {
        const new_window = window.open();
        new_window.document.writeln(`
            <!DOCTYPE html>
            <html>
            <head>
                <link rel="stylesheet" type="text/css" href="contrat.css">
                <title>Export PDF</title>
            </head>
            <body>
                <main class="table">${contrat.innerHTML}</main>
                <script>
                    setTimeout(() => {
                        window.print();
                        window.close();
                    }, 400);
                </script>
            </body>
            </html>
        `);
    };

    toPDF(contrat);
});
document.addEventListener('DOMContentLoaded', function() {
    const contrat = document.querySelector('#contrat');
    
    const toPDF = function(contrat) {
        const new_window = window.open();
        new_window.document.writeln(`
            <!DOCTYPE html>
            <html>
            <head>
                <link rel="stylesheet" type="text/css" href="contrat.css">
                <title>Exporter en PDF</title>
            </head>
            <body>
                <main class="table">${contrat.innerHTML}</main>
                <script>
                    setTimeout(() => {
                        window.print();
                        window.close();
                    }, 400);
                </script>
            </body>
            </html>
        `);
    };

    toPDF(contrat);
});ml
Copy
